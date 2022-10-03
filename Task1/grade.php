<?php
$message = '';
$grades = '';
$result = '';
$Max_Grade = 500;
if($_POST){
    $grades = $_POST['physics'] + $_POST['chemistry'] + $_POST['biology'] + $_POST['mathematics'] + $_POST['computer'];
    $result = ($grades/$Max_Grade)*100;
    if($result >= 90 && $result <= 100){
        $message = "<div class='alert alert-success'> Percentage : {$result} , Grade : A  </div>";
    }elseif($result >= 80 && $result < 90){
        $message = "<div class='alert alert-success'> Percentage : {$result} , Grade : B  </div>";
    }elseif($result >= 70 && $result < 80){
        $message = "<div class='alert alert-success'> Percentage : {$result} , Grade : C  </div>";
    }elseif($result >= 60 && $result < 70){
        $message = "<div class='alert alert-warning'> Percentage : {$result} , Grade : D  </div>";
    }elseif($result >= 40 && $result < 60){
        $message = "<div class='alert alert-warning'> Percentage : {$result} , Grade : E  </div>";
    }elseif($result >= 0 && $result < 40){
        $message = "<div class='alert alert-danger'> Percentage : {$result} , Grade : F  </div>";
    }else{
        $message = "<div class='alert alert-primary'>Invalid Grade</div>";
        $message = "Invalid Grade";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Grades</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="contianer overflow-hidden">
        <div class="row">
            <div class="col-12 text-center text-primary mt-5">
                <h1> Grades </h1>
            </div>
            <div class="col-4 offset-4 mt-5">
                <form  method="post">
                    <div class="form-group">
                      <label for="number">Physics</label>
                      <input type="number" name="physics" id="number" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="number">Chemistry</label>
                      <input type="number" name="chemistry" id="number" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="number">Biology</label>
                      <input type="number" name="biology" id="number" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="number">Mathematics </label>
                      <input type="number" name="mathematics" id="number" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="number">Computer </label>
                      <input type="number" name="computer" id="number" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                   
                    <div class="form-group my-5">
                        <button class="btn btn-outline-primary rounded form-control"> Grades </button>
                    </div>                       
                </form>
                   <?php  echo  $message;?>
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