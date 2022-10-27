<?php
$title = "register";
include "layouts/header.php";
include "APP/HTTP/middlewares/guest.php";
include "layouts/navbar.php";
include "layouts/breadcrumb.php";

use APP\DB\Models\User;
use APP\HTTP\Validation;
use APP\Mail\VerificationCode;

$validation = new Validation;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $validation->setValue($_POST['first_name'] ?? "")->setInputname("first_name")->required()->string()->between(2,32);
    $validation->setValue($_POST['last_name'] ?? "")->setInputname("last_name")->required()->string()->between(2,32);
    $validation->setValue($_POST['phone'] ?? "")->setInputname("phone")->required()->regex('/01[0125][0-9]{8}/')->unique('users','phone');
    $validation->setValue($_POST['email'] ?? "")->setInputname("email")->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->unique("users","email");
    $validation->setValue($_POST['password'] ?? "")->setInputname("password")->required()->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/',"Minimum eight and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character")->confirmed($_POST['verification_password']);
    $validation->setValue($_POST['verification_password'] ?? "")->setInputname("verification_password")->required();
    $validation->setValue($_POST['gender'] ?? "")->setInputname("gender")->required()->in([0,1]);
    if(empty($validation->getErrors())){
        $verificationCode = rand(10000,99999);
        $user = new User;
        $user->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])
        ->setEmail($_POST['email'])->setPassword($_POST['password'])->setGender($_POST['gender'])
        ->setVerification_code($verificationCode)->setPhone($_POST['phone']);
        if($user->create()){
            //send mail
            $body = "<p>Hello {$_POST['first_name']} </p>
                     <p>Your Verifivation Code is : {$verificationCode} </p>
                     <p>ECOMMERCE TEAM</p>" ;
            $sendmail = new VerificationCode($_POST['email'],"Verification Code",$body);
            if($sendmail->send()){
                $_SESSION['verification_email'] = $_POST['email'];
                $_SESSION['page'] = "register";
                header('location:verification_code.php');die;
            }else{
            $error = "<p class='text-danger'>Try Again Later</p>";
            }
        }
        else{
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

                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">

                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?= $error ?? "" ?>
                                    <form method="post">
                                        <input type="text" name="first_name" placeholder="First Name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : ''?>">
                                        <?= $validation->getErrorPrag("first_name") ?>
                                        <input type="text" name="last_name" placeholder="Last Name" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : ''?>">
                                        <?= $validation->getErrorPrag("last_name") ?>
                                        <input type="number" name="phone" placeholder="Phone Number" value="<?= isset($_POST['phone']) ? $_POST['phone'] : ''?>">
                                        <?= $validation->getErrorPrag("phone") ?>
                                        <input type="email" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''?>">
                                        <?= $validation->getErrorPrag("email") ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?= $validation->getErrorPrag("password") ?>
                                        <input type="password" name="verification_password" placeholder="Verification Password">
                                        <?= $validation->getErrorPrag("verification_password") ?>                                      
                                        <select class="form-control mb-5" name="gender">
                                            <option <?= isset($_POST['gender']) && $_POST['gender'] == 0 ? 'selected' : '' ?> value="0">Male</option>
                                            <option <?= isset($_POST['gender']) && $_POST['gender'] == 1 ? 'selected' : '' ?> value="1">Female</option>
                                        </select>
                                        <?= $validation->getErrorPrag("gender") ?>                                                                             
                                        <div class="button-box mt-5">
                                            <button type="submit"><span>Register</span></button>
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