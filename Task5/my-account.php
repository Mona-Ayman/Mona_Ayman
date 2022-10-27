<?php
$title = "My Account";
include "layouts/header.php";
include "APP/HTTP/middlewares/auth.php";

use APP\DB\Models\User;
use APP\Services\Media;
use APP\HTTP\Validation;

$validation = new Validation;

if (isset($_POST['update_data'])) {
    $validation->setValue($_POST['first_name'] ?? "")->setInputname('first_name')->required()->string()->between(2, 32);
    $validation->setValue($_POST['last_name'] ?? "")->setInputname('last_name')->required()->string()->between(2, 32);
    $validation->setValue($_POST['gender'] ?? "")->setInputname('gender')->required()->in([0, 1]);
    if (empty($validation->getErrors())) {
        $user = new User;
        $user->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])->setGender($_POST['gender'])->setEmail($_SESSION['user']->email);
        if ($user->updateData()) {
            $_SESSION['user']->first_name = $_POST['first_name'];
            $_SESSION['user']->last_name = $_POST['last_name'];
            $_SESSION['user']->gender = $_POST['gender'];
            $successdata = "<div class='alert alert-success text-center'> Profile Updated Successfully </div>";
        } else {
            $errordata = "<div class='alert alert-danger text-center'> Something went wrong </div>";
        }
    }

    
}
if(isset($_POST['upload-image'])){
    if ($_FILES['image']['error'] == 0) {
        // validation
        $validation->setFile($_FILES['image'])->setInputName('image')->size(3 * 10 ** 6)->extensions(['png', 'jpg', 'jpeg']);
        if (empty($validation->getErrors())) {
            // upload image
            $media = new Media;
            if ($media->setFile($_FILES['image'])->upload('assets/img/users/')) {
                // elmost5dm lw byrf3 sora msh l awl mara => ams7 eladema
                if ($_SESSION['user']->image != 'default.jpg') {
                    $media->delete('assets/img/users/' . $_SESSION['user']->image);
                }
                $user = new User;
                $user->setImage($media->getNewMediaName())->setEmail($_SESSION['user']->email);
                if ($user->updateImage()) {
                    $_SESSION['user']->image = $media->getNewMediaName();
                    $success = "<div class='alert alert-success text-center'> Profile Picture Uploaded Successfully </div>";
                } else {
                    // error in updating
                    $error = "<div class='alert alert-danger text-center'> Something went wrong </div>";
                }
            } else {
                // upload error
                $error = "<div class='alert alert-danger text-center'> Something went wrong </div>";
            }
        }
    }
}
if (isset($_POST['change_password'])) {
    $validation->setValue($_POST['old_password'] ?? "")->setInputname('old_password')->required()->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/', "Minimum eight and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character")->exist('users', 'password');
    $validation->setValue($_POST['password'] ?? "")->setInputname('password')->required()->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/', "Minimum eight and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character")->confirmed($_POST['password_confirmation']);;
    $validation->setValue($_POST['password_confirmation'] ?? "")->setInputname('password_confirmation')->required();
    if (empty($validation->getErrors())) {
        $user = new User;
        $user->setPassword($_POST['password'])->setEmail($_SESSION['user']->email);
        if ($user->changePassword()) {
            $_SESSION['user']->password = $_POST['password'];
            $successpassword = "<div class='alert alert-success text-center'> Password Updated Successfully </div>";
        } else {
            $errorpassword = "<div class='alert alert-danger text-center'> Something went wrong </div>";
        }
    }
}

include "layouts/navbar.php";
include "layouts/breadcrumb.php";
?>
<!-- my account start -->
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="billing-information-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>My Account Information</h4>
                                                <h5>Your Personal Details</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <?= $errordata ?? "" ?>
                                                    <?= $successdata ?? "" ?>
                                                    <?= $error ?? "" ?>
                                                    <?= $success ?? "" ?>

                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4 offset-4 text-center my-3">
                                                            <?php
                                                            if ($_SESSION['user']->image == 'default.jpg') {
                                                                if ($_SESSION['user']->gender == 0) {
                                                                    $image = 'male.jpg';
                                                                } else {
                                                                    $image = 'female.png';
                                                                }
                                                            } else {
                                                                $image = $_SESSION['user']->image;
                                                            }
                                                            ?>
                                                            <label for="file"><img src="assets/img/users/<?= $image ?>" id="image" class="w-100 rounded-circle" style="cursor: pointer;" alt=""></label>
                                                            <input type="file" name="image" id="file" class="d-none" onchange="loadFile(event)">
                                                            <?= $validation->getErrorPrag('image') ?>
                                                            <button class="btn btn-success rounded my-3" name="upload-image" style="cursor: pointer"> <i class="fa fa-camera" aria-hidden="true"></i> Upload </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>First Name</label>
                                                        <input type="text" name="first_name" value="<?= $_SESSION['user']->first_name ?>">
                                                        <?= $validation->getErrorPrag('first_name') ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name" value="<?= $_SESSION['user']->last_name ?>">
                                                        <?= $validation->getErrorPrag('last_name') ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="billing-info">
                                                        <select name="gender" class="form-control" id="">
                                                            <option <?= $_SESSION['user']->gender == '0' ? 'selected' : '' ?> value="0">Male</option>
                                                            <option <?= $_SESSION['user']->gender == '1' ? 'selected' : '' ?> value="1">Female</option>
                                                        </select>
                                                        <?= $validation->getErrorPrag('gender') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">

                                                <div class="billing-btn">
                                                    <button type="submit" name="update_data">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <form method="post">
                                        <div class="billing-information-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>Change Password</h4>
                                                <h5>Your Password</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <?= $errorpassword ?? "" ?>
                                                    <?= $successpassword ?? "" ?>

                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Old Password</label>
                                                        <input type="password" name="old_password">
                                                        <?= $validation->getErrorPrag('old_password') ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>New Password</label>
                                                        <input type="password" name="password">
                                                        <?= $validation->getErrorPrag('password') ?>

                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password Confirm</label>
                                                        <input type="password" name="password_confirmation">
                                                        <?= $validation->getErrorPrag('password_confirmation') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">

                                                <div class="billing-btn">
                                                    <button type="submit" name="change_password">Change</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Modify your address book entries </a></h5>
                            </div>
                            <div id="my-account-3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Address Book Entries</h4>
                                        </div>
                                        <div class="entries-wrapper">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                    <div class="entries-info text-center">
                                                        <p>Farhana hayder (shuvo) </p>
                                                        <p>hastech </p>
                                                        <p> Road#1 , Block#c </p>
                                                        <p> Rampura. </p>
                                                        <p>Dhaka </p>
                                                        <p>Bangladesh </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                    <div class="entries-edit-delete text-center">
                                                        <a class="edit" href="#">Edit</a>
                                                        <a href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="billing-back-btn">
                                            <div class="billing-back">
                                                <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                            </div>
                                            <div class="billing-btn">
                                                <button type="submit">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>4</span> <a href="wishlist.php">Modify your wish list </a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- my account end -->
<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('image');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
<?php

include "layouts/footer.php";
include "layouts/scripts.php";

?>