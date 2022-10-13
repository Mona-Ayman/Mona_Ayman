<?php
$title = "result";
include("layouts/header.php");
include("layouts/navbar.php");
function result(){  
    if($_SESSION['result'] < 25){
        $message1 = "<div class='alert alert-danger col-6 mx-auto text-center'><h3>Total Review is: Bad</h3></div>";
        $message2 = "<div class='alert alert-info col-6 mx-auto text-center'><h3>We will call you later on this phone: {$_SESSION['num']} to be able to make the service better.</h3></div>";
        echo $message1;
        echo $message2;
    
    }else{
        $message1 = "<div class='alert alert-success col-6 mx-auto text-center'><h3>Total Review is: Good</h3></div>";
        $message2 = "<div class='alert alert-info col-6 mx-auto text-center'><h3>Thank you for your time.</h3></div>";
        echo $message1;
        echo $message2;
    }   
}       
?>
<body class="" <!--style="background: url('images//images (2).jfif') no-repeat center/cover;"-->>
    <div class="bg-info px-5 container col-6 mb-4 rounded rounded-5" style="margin-top: 100px;">
        <div class="row justify-content-between mt-3 pt-4 mx-auto border-bottom">
            <h3>QUESTION</h3>
            <h3 class="mt-2">REVIEW</h3>        
        </div>
        <div class="row justify-content-between mt-3 mx-auto border-bottom">
            <h3>Are you satisfied with the level of cleanliness?</h3>
            <h3><?=$_SESSION['first']?></h3>        
        </div> 
        <div class="row justify-content-between mt-3 mx-auto border-bottom">
            <h3>Are you satisfied with the service prices?</h3>
            <h3><?=$_SESSION['second']?></h3>        
        </div>
        <div class="row justify-content-between mt-3 mx-auto border-bottom">
            <h3>Are you satisfied with the nursing service?</h3>
            <h3><?=$_SESSION['third']?></h3>        
        </div> 
        <div class="row justify-content-between mt-3 mx-auto border-bottom">
            <h3>Are you satisfied with the level of the doctor</h3>
            <h3><?=$_SESSION['forth']?></h3>        
        </div> 
        <div class="row justify-content-between mt-3 mx-auto border-bottom pb-3">
            <h3>Are you satisfied with the calmness of the hospital?</h3>
            <h3><?=$_SESSION['fifth']?></h3>        
        </div>         
    </div>
<?php
result();
include("layouts/scripts.php");
include("layouts/footer.php");
?>