<?php

use APP\DB\Models\User;
use APP\HTTP\Validation;

$title = "login";
include "layouts/header.php";
include "APP/HTTP/middlewares/guest.php";
include "layouts/navbar.php";
include "layouts/breadcrumb.php";

$validation = new Validation;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validation->setValue($_POST['email'] ?? "")->setInputname('email')->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->exist('users', 'email');
    $validation->setValue($_POST['password'] ?? "")->setInputname('password')->required()->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/', 'Wrong Email Or Password');
    if (empty($validation->getErrors())) {
        $user = new User;
        $user->setEmail($_POST['email'])->setPassword($_POST['password']);
        if ($user->getUserByEmail() !== false) {
            if ($user->getUserByEmail()->num_rows == 1) {
                $user = $user->getUserByEmail()->fetch_object();
                if($_POST['password'] == $user->password){
                    if(is_null($user->email_verified_at)){
                        $_SESSION['verification_email'] = $_POST['email'];
                        $_SESSION['page'] = "login";
                        header('location:verification_code.php');die;
                    }else{
                        if(isset($_POST['remember_me'])){
                           setcookie('remember_me',$_POST['email'],  time() + 86400 * 365 , '/');
                        }
                        $_SESSION['user'] = $user;
                        header('location:index.php');die;
                    }
                }else{
                $loginerror = "<p class='text-danger'>Wrong Email Or Password</p>";
                }
            } else {
                $loginerror = "<p class='text-danger'>Wrong Email Or Password</p>";
            }
        } else {
            $error = "<p class='text-danger'>something went wrong</p>";
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
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="email" name="email" placeholder="Email">
                                        <input type="password" name="password" placeholder="Password">
                                        <?= $validation->getErrorPrag('email') ?? "" ?>
                                        <?= $validation->getErrorPrag('password') ?? "" ?>
                                        <?= $loginerror ?? "" ?>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" name="remember_me">
                                                <label>Remember me</label>
                                                <a href="forgot_password.php">Forgot Password?</a>
                                            </div>
                                            <button type="login"><span>Login</span></button>
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
include "layouts/footer.php";
include "layouts/scripts.php";
?>