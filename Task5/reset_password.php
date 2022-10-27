<?php
$title = "Reset Password";
include "layouts/header.php";
include "layouts/navbar.php";
include "layouts/breadcrumb.php";

use APP\DB\Models\User;
use APP\HTTP\Validation;
use APP\Mail\VerificationCode;

$validation = new Validation;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validation->setValue($_POST['password'] ?? "")->setInputname("password")->required()->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/',"Minimum eight and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character")->confirmed($_POST['verification_password']);
    $validation->setValue($_POST['verification_password'] ?? "")->setInputname("verification_password")->required();
    if(empty($validation->getErrors())){
        $user = new User;
        $user->setPassword($_POST['password'])->setEmail($_SESSION['verification_email']);
        if($user->updatePassword()){
            unset($_SESSION['verification_email']);
            $successMessage = "<div class='alert alert-success'>Successfully Updated , You Will Be Directed To Login Page Soon</div>";
            header('refresh:3;url=login.php');
        }else{
            $error = "<div class='alert alert-danger text-center'> Something went wrong </div>";
        }
    }
}
?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">

                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> <?= $title ?> </h4>
                        </a>
                    </div>
                    <div class="tab-content">

                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?= $error ?? "" ?>
                                    <?= $successMessage ?? "" ?>
                                    <form method="post">
                                    <input type="password" name="password" placeholder="Password">
                                        <?= $validation->getErrorPrag("password") ?>
                                        <input type="password" name="verification_password" placeholder="Verification Password">
                                        <?= $validation->getErrorPrag("verification_password") ?>         
                                        

                                        <div class="button-box mt-5">
                                            <button type="submit"><span>Reset</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "layouts/scripts.php";
?>