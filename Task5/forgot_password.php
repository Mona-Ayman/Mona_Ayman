<?php
$title = "Forgot Password";
include "layouts/header.php";
include "layouts/navbar.php";
include "layouts/breadcrumb.php";

use APP\DB\Models\User;
use APP\HTTP\Validation;
use APP\Mail\VerificationCode;

$validation = new Validation;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validation->setValue($_POST['email'] ?? "")->setInputname('email')->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->exist('users', 'email');
    if (empty($validation->getErrors)) {
        $forgetPasswordCode = rand(10000, 99999);
        $user = new User;
        $user->setEmail($_POST['email'])->setVerification_code($forgetPasswordCode);
        if ($user->update()) {

            $body = "<p>Hello {$_POST['email']} </p>
                     <p>Your Verifivation Code is : {$forgetPasswordCode} </p>
                     <p>ECOMMERCE TEAM</p>";
            $sendmail = new VerificationCode($_POST['email'], "Verification Code", $body);
            if ($sendmail->send()) {
                $_SESSION['verification_email'] = $_POST['email'];
                $_SESSION['page'] = "forgotPassword";
                header('location:verification_code.php');die;
            } else {
                $error = "<div class='alert alert-danger text-center'> Try Again Later </div>";
            }
        } else {
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
                                    <?= $error ?? "" ?>
                                        <input type="email" name="email" placeholder="Email">
                                        <?= $validation->getErrorPrag('email') ?>
                                        

                                        <div class="button-box mt-5">
                                            <button type="submit"><span>Verify</span></button>
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