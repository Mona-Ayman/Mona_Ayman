<?php
function check(){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $loan = $_POST['loan'];
        $year = $_POST['year'];
        if($loan > 0){
            if($year <= 3 && $year > 0){
                $rate = 10 . '%';
                $interestRate = ($loan/10) * $year;
                $loanAfterInterest = $loan + $interestRate;
                $monthly = 'The Monthly Installement is:' . $loanAfterInterest / ($year*12) . 'EGP';
            }elseif($year > 3){
                $rate = 15 . '%';
                $interestRate = ($loan/15) * $year;
                $loanAfterInterest = $loan + $interestRate;
                $monthly = 'The Monthly Installement is:' . $loanAfterInterest / ($year*12) . 'EGP';
            }else{
                $rate = 'Invalid Year';
                $interestRate ='Invalid Year';
                $loanAfterInterest = 'Invalid Year';
                $monthly = 'Please Enter A Valid Year!';
            }
            ?>
            <div class="container col-6 pt-5 rounded-pill ">
                <div class="bg-info px-5 ">
                    <div class="row justify-content-between  mx-auto border-bottom">
                        <h3>Name</h3>
                        <h3 class="mt-2"><?=$name?></h3>        
                    </div> 
                    <div class="row justify-content-between mx-auto border-bottom">
                        <h3>Loan</h3>
                        <h3 class="mt-2"><?=$loan?></h3>        
                    </div> 
                    <div class="row justify-content-between mx-auto border-bottom">
                        <h3>Number Of Years</h3>
                        <h3 class="mt-2"><?=$year?></h3>        
                    </div>
                    <div class="row justify-content-between mx-auto border-bottom">
                        <h3>Rate Of Interest Per Year</h3>
                        <h3 class="mt-2"><?=$rate?></h3>        
                    </div> 
                    <div class="row justify-content-between mx-auto border-bottom">
                        <h3>Interest Rate</h3>
                        <h3 class="mt-2"><?=$interestRate?></h3>        
                    </div> 
                    <div class="row justify-content-between mx-auto border-bottom">
                        <h3>Loan After Interest</h3>
                        <h3 class="mt-2"><?=$loanAfterInterest?></h3>        
                    </div> 
                    <div class="row justify-content-center mx-auto border-bottom">
                        <h3> <?=$monthly?> </h3>     
                    </div> 
                </div>
            </div>;
         <?php 
        }
        else{?>
            <div class="container col-6 pt-5 rounded-pill ">
                <div class="bg-info px-5 ">
                    <div class="row justify-content-between  mx-auto border-bottom">
                        <h3>Name</h3>
                        <h3 class="mt-2"><?=$name?></h3>        
                    </div> 
                    <div class="row justify-content-between mx-auto border-bottom">
                        <h3>Loan</h3>
                        <h3 class="mt-2"><?=$loan?></h3>        
                    </div> 
                    <div class="row justify-content-between mx-auto border-bottom">
                        <h3>Number Of Years</h3>
                        <h3 class="mt-2"><?=$year?></h3>        
                    </div>
                    <div class="row justify-content-between mx-auto border-bottom">
                        <h3>Rate Of Interest Per Year</h3>
                        <h3 class="mt-2">Invalid Loan</h3>        
                    </div> 
                    <div class="row justify-content-between mx-auto border-bottom">
                        <h3>Interest Rate</h3>
                        <h3 class="mt-2">Invalid Loan</h3>        
                    </div> 
                    <div class="row justify-content-between mx-auto border-bottom">
                        <h3>Loan After Interest</h3>
                        <h3 class="mt-2">Invalid Loan</h3>        
                    </div> 
                    <div class="row justify-content-center mx-auto border-bottom">
                        <h3>Please Enter A Valid Loan!</h3>     
                    </div> 
                </div>
            </div>;
         <?php 
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
  <title>Bank</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class=" mt-5 pt-5" <!--style="background: url('images//images (2).jfif') no-repeat center/cover;"-->>
    <div class="container col-7 bg-info pt-5 rounded-pill ">
        <form method="post">
            <div class="mb-5 col-9 mx-auto">
                <label for="exampleInputEmail1" class="form-label"><h3>Name</h3></label>
                <input type="text" name="name" value="<?= $_POST['name'] ?? ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-5 col-9 mx-auto">
                <label for="exampleInputPassword1" class="form-label"><h3>Loan</h3></label>
                <input type="number" name="loan" value="<?= $_POST['loan'] ?? ""; ?>" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-5 col-9 mx-auto">
                <label for="exampleInputPassword1" class="form-label"><h3>Number Of Years</h3></label>
                <input type="number" name="year" value="<?= $_POST['year'] ?? ""; ?>" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-5 col-6 mx-auto mb-5 pb-4">
                <button type="submit" class="btn btn-dark col-12 mx-auto">Submit</button>
            </div>
        </form>
    </div>
    <?php
      check();
    ?>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>