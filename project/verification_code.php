<?php
$title = "Verification Code";
include "layouts/header.php";
include "layouts/navbar.php";
include "layouts/breadcrumb.php";

use APP\DB\Models\User;
use APP\HTTP\Validation;
use APP\Mail\VerificationCode;

$validation = new Validation;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validation->setValue($_POST['verification_code'] ?? "")->setInputname("verification_code")->required()->numeric()->numOfDigits(5);
    if (empty($validation->getErrors())) {
        $user = new User;
        $user->setEmail($_SESSION['verification_email'])->setVerification_code($_POST['verification_code']);
        if ($user->checkCode()) {
            if ($user->checkCode()->num_rows == 1) {
                $user->setEmail_verified_at(date('y-m-d H:i:s'));
                if ($user->verified()) {
                    if ($_SESSION['page'] == 'register') {
                        unset($_SESSION['verification_email']);
                        unset($_SESSION['page']);
                        $successMessage = "<div class='alert alert-success'>Correct Verification Code , You Will Be Directed To Login Page Soon</div>";
                        header('refresh:3;url=login.php');
                    }elseif ($_SESSION['page'] == 'login') {
                        unset($_SESSION['verification_email']);
                        unset($_SESSION['page']);
                        $successMessage = "<div class='alert alert-success'>Correct Verification Code , You Will Be Directed To Your Account Soon</div>";
                        $_SESSION['user'] = $user->checkCode()->fetch_object();
                        header('refresh:3;url=my-account.php');
                    }elseif ($_SESSION['page'] == 'forgotPassword') {
                        unset($_SESSION['page']);
                        $successMessage = "<div class='alert alert-success'>Correct Verification Code , You Will Be Directed To Reset Password Page Soon</div>";
                        header('refresh:3;url=reset_password.php');
                    }
                } else {
                    $error = "<div class='alert alert-danger'>Something Went Wrong</div>";
                }
            } else {
                $errorCode = "<p class='font-weight-bold text-danger'>Wrong Verification Code</p>";
            }
        } else {
            $error = "<div class='alert alert-danger'>Something Went Wrong</div>";
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

                                        <input type="number" name="verification_code" placeholder="Verification Code">
                                        <?= $validation->getErrorPrag('verification_code') ?>
                                        <?= $errorCode ?? "" ?>

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