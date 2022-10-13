<?php
$title = "number";
include("layouts/header.php");
include("layouts/navbar.php");
function hospital(){
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $_SESSION['num'] = $_POST['number'];
    header("location:review.php");
}
}
?>

<body class="" <!--style="background: url('images//images (2).jfif') no-repeat center/cover;"-->>
    <div class="container col-7 bg-info pt-5 rounded-pill" style="margin-top: 200px;">
    <form method="post">
        <div class="mb-5 col-9 mx-auto">
            <label for="exampleInputPassword1" class="form-label"><h3>Number</h3></label>
            <input type="number" name="number" value="<?= $_POST['number'] ?? ""; ?>" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-5 col-6 mx-auto mb-5 pb-4">
        <button type="submit" class="btn btn-dark col-12 mx-auto">Submit</button>
        </div>
    </form>
    </div>
<?php
 hospital();
include("layouts/scripts.php");
include("layouts/footer.php");
?>