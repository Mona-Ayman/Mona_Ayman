<?php
$title = "games";
include("layouts/header.php");
include("layouts/navbar.php");
function games(){
if($_SERVER['REQUEST_METHOD'] == "POST"){
   
    $_SESSION['name1'] = $_POST['name1']; 
    // $test = $_POST['name1'];
    $_SESSION['sport1'] = $_POST['sport1'];  
    $_SESSION['sport2'] = $_POST['sport2'];  
    $_SESSION['sport3'] = $_POST['sport3'];  
    $_SESSION['sport4'] = $_POST['sport4'];  
    echo "<script> window.location.href='result.php';</script>";
    // header("location:result.php");
}
}
?>

<body class="" <!--style="background: url('images//images (2).jfif') no-repeat center/cover;"-->>
    <div class="container col-7 pt-5" >
       <form method="post">
            <?php 
            for($i = 0; $i < $_SESSION['members'] ; $i++){ ?>
                <div class="col-9  mb-5 alert alert-info">
                    <h1>Member <?= $i; ?></h1>              
                    <div class="col-auto mb-3">
                        <input type="text" name="name1[]" class="form-control" value="<?=$_SESSION['name1'][$i] ?? ""; ?>" id="inputPassword2">            
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="sport1[]" value="<?= $_SESSION['sport1'][$i] ?? ""; ?>" type="checkbox" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Football 300 LE
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="sport2[]" value="<?= $_SESSION['sport2'][$i] ?? ""; ?>" type="checkbox"  id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Swimming 250 LE
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="sport3[]" value="<?= $_SESSION['sport3'][$i] ?? ""; ?>" type="checkbox"  id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Vollyball 150 LE
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="sport4[]" value="<?= $_SESSION['sport4'][$i] ?? ""; ?>" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Others 100 LE
                        </label>
                    </div>                  
                </div> 
             <?php 
            }?>    
           <div class="col-auto col-9 text-center mb-5">
                <button type="submit" class="btn btn-info mb-3 col-6 mx-auto">Check Price</button>
           </div>
        </form>
    </div>
<?php
 games();
include("layouts/scripts.php");
include("layouts/footer.php");
?>