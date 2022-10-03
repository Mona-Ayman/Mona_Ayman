<?php
$result = '';
$num1 = '';
$num2 = '';
if($_POST){
   $num1 =  $_POST['firstno'];
   $num2 =  $_POST['secondno'];
   if($_POST['calc'] == '+'){
    $result = "<div class='alert alert-info text-center col-10 '>" . $num1 + $num2 ."</div>";
   }elseif($_POST['calc'] == '-'){
    $result = "<div class='alert alert-info text-center col-10'>" . $num1 - $num2 ."</div>";
   }elseif($_POST['calc'] == '*'){
    $result = "<div class='alert alert-info text-center col-10'>" . $num1 * $num2 ."</div>";
   }elseif($_POST['calc'] == '/'){
    $result = "<div class='alert alert-info text-center col-10'>" . $num1 / $num2 ."</div>";
   }elseif($_POST['calc'] == '%'){
    $result = "<div class='alert alert-info text-center col-10'>" . $num1 % $num2 ."</div>";
   }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Calculator</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="contianer overflow-hidden ">
        <div class="row">
            <div class="col-12 text-center text-info mt-5">
                <h1> Calculator </h1>
            </div>
            <div class="col-4 offset-4 mt-5">
                <form  method="post">
                    <div class="row form-group">
                      <label for="number" class="col-4">FirstNumber</label>
                      <input type="number" name="firstno" id="number" class="form-control col-5" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="row form-group">
                      <label for="number" class="col-4">SecondNumber</label>
                      <input type="number" name="secondno" id="number" class="form-control col-5" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="row my-5 fs-1 mx-auto px-5 fw-bold">
                      <div class="form-group col-2">
                      <input type="submit" name="calc" value="+"  class="form-control btn-outline-info" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group col-2">
                      <input type="submit" name="calc" value="-"  class="form-control btn-outline-info" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group col-2">
                      <input type="submit" name="calc" value="*"  class="form-control btn-outline-info" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group col-2">
                      <input type="submit" name="calc" value="/"  class="form-control btn-outline-info" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group col-2">
                      <input type="submit" name="calc" value="%"  class="form-control btn-outline-info" placeholder="" aria-describedby="helpId">
                      </div>
                    </div>
                </form>      
                <?php 
                     echo $result;
                ?>
            </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>