<?php
$title = "review";
include("layouts/header.php");
include("layouts/navbar.php");
function review(){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $_SESSION['first'] = $_POST['first'];
        $_SESSION['second'] = $_POST['second'];
        $_SESSION['third'] = $_POST['third'];
        $_SESSION['forth'] = $_POST['forth'];
        $_SESSION['fifth'] = $_POST['fifth'];
        if($_SESSION['first'] == 'bad'){
            $res1 = 0;
        }elseif($_SESSION['first'] == 'good'){
            $res1 = 3;
        }elseif($_SESSION['first'] == 'verygood'){
            $res1 = 5;
        }elseif($_SESSION['first'] == 'excellent'){
            $res1 = 10;
        }

        if($_SESSION['second'] == 'bad'){
            $res2 = 0;
        }elseif($_SESSION['second'] == 'good'){
            $res2 = 3;
        }elseif($_SESSION['second'] == 'verygood'){
            $res2 = 5;
        }elseif($_SESSION['second'] == 'excellent'){
            $res2 = 10;
        }

        if($_SESSION['third'] == 'bad'){
            $res3 = 0;
        }elseif($_SESSION['third'] == 'good'){
            $res3 = 3;
        }elseif($_SESSION['third'] == 'verygood'){
            $res3 = 5;
        }elseif($_SESSION['third'] == 'excellent'){
            $res3 = 10;
        }

        if($_SESSION['forth'] == 'bad'){
            $res4 = 0;
        }elseif($_SESSION['forth'] == 'good'){
            $res4 = 3;
        }elseif($_SESSION['forth'] == 'verygood'){
            $res4 = 5;
        }elseif($_SESSION['forth'] == 'excellent'){
            $res4 = 10;
        }

        if($_SESSION['fifth'] == 'bad'){
            $res5 = 0;
        }elseif($_SESSION['fifth'] == 'good'){
            $res5 = 3;
        }elseif($_SESSION['fifth'] == 'verygood'){
            $res5 = 5;
        }elseif($_SESSION['fifth'] == 'excellent'){
            $res5 = 10;
        }
        $result = $res1 + $res2 + $res3 + $res4 + $res5;
        $_SESSION['result'] = $result;
        echo "<script> window.location.href='result.php';</script>";
        // header("location:test.php");     
    }
}
?>
<body class="" <!--style="background: url('images//images (2).jfif') no-repeat center/cover;"-->>
    <div class="container col-10  rounded rounded-5 mt-5 bg-info px-5">
       <form method="post" style="margin-top: 100px;">
            <div class="row justify-content-between mb-3 pb-3 pt-5 mx-auto border-bottom">
                <h3>QUESTIONS</h3>
                <div class="form-check col-5">
                    <label class="form-check-label" style="margin-right: 50px;" for="flexCheckDefault">
                        <h3> Bad</h3>
                    </label>
                    <label class="form-check-label" style="margin-right: 50px;" for="flexCheckDefault">
                        <h3>Good</h3>
                    </label>
                    <label class="form-check-label" style="margin-right: 50px;" for="flexCheckDefault">
                        <h3> Very Good</h3>
                    </label>
                    <label class="form-check-label" style="margin-right: 50px;" for="flexCheckDefault">
                        <h3> Excellent</h3>
                    </label>
                </div>             
            </div>
            <div class="row justify-content-between mb-3 pb-3 pt-3 mx-auto border-bottom">
                <h3>Are you satisfied with the level of cleanliness?</h3>
                <div class="mt-2 row col-5 ">
                    <div class="form-check" style="margin-right: 100px;">
                      <input class="form-check-input"  type="radio" name="first" value="bad" id="flexCheckDefault">
                    </div>
                    <div class="form-check "  style="margin-right: 140px;">
                      <input class="form-check-input" type="radio" name="first" value="good" id="flexCheckDefault">
                    </div>
                    <div class="form-check "  style="margin-right: 160px;">
                      <input class="form-check-input" type="radio" name="first" value="verygood" id="flexCheckDefault">
                    </div>
                    <div class="form-check ">
                      <input class="form-check-input" type="radio" name="first" value="excellent" id="flexCheckDefault">
                    </div>
                </div>        
            </div> 
            <div class="row justify-content-between mb-3 pb-3 mx-auto border-bottom">
                <h3>Are you satisfied with the service prices?</h3>
                <div class="mt-2 row col-5 ">
                    <div class="form-check" style="margin-right: 100px;">
                      <input class="form-check-input"  type="radio" name="second" value="bad" id="flexCheckDefault">
                    </div>
                    <div class="form-check "  style="margin-right: 140px;">
                      <input class="form-check-input" type="radio" name="second" value="good" id="flexCheckDefault">
                    </div>
                    <div class="form-check "  style="margin-right: 160px;">
                      <input class="form-check-input" type="radio" name="second" value="verygood" id="flexCheckDefault">
                    </div>
                    <div class="form-check ">
                      <input class="form-check-input" type="radio" name="second" value="excellent" id="flexCheckDefault">
                    </div>
                </div>               
            </div> 
            <div class="row justify-content-between mb-3 pb-3 mx-auto border-bottom">
                <h3>Are you satisfied with the nursing service?</h3>
                <div class="mt-2 row col-5 ">
                    <div class="form-check" style="margin-right: 100px;">
                      <input class="form-check-input"  type="radio" name="third" value="bad" id="flexCheckDefault">
                    </div>
                    <div class="form-check "  style="margin-right: 140px;">
                      <input class="form-check-input" type="radio" name="third" value="good" id="flexCheckDefault">
                    </div>
                    <div class="form-check "  style="margin-right: 160px;">
                      <input class="form-check-input" type="radio" name="third" value="verygood" id="flexCheckDefault">
                    </div>
                    <div class="form-check ">
                      <input class="form-check-input" type="radio" name="third" value="excellent" id="flexCheckDefault">
                    </div>
                </div>               
            </div>
            <div class="row justify-content-between mb-3 pb-3 mx-auto border-bottom">
                <h3>Are you satisfied with the level of the doctor</h3>
                <div class="mt-2 row col-5 ">
                    <div class="form-check" style="margin-right: 100px;">
                      <input class="form-check-input"  type="radio" name="forth" value="bad" id="flexCheckDefault">
                    </div>
                    <div class="form-check "  style="margin-right: 140px;">
                      <input class="form-check-input" type="radio" name="forth" value="good" id="flexCheckDefault">
                    </div>
                    <div class="form-check "  style="margin-right: 160px;">
                      <input class="form-check-input" type="radio" name="forth" value="verygood" id="flexCheckDefault">
                    </div>
                    <div class="form-check ">
                      <input class="form-check-input" type="radio" name="forth" value="excellent" id="flexCheckDefault">
                    </div>
                </div>              
            </div> 
            <div class="row justify-content-between mb-3 pb-3 mx-auto border-bottom">
                <h3>Are you satisfied with the calmness of the hospital?</h3>
                <div class="mt-2 row col-5 ">
                    <div class="form-check" style="margin-right: 100px;">
                      <input class="form-check-input"  type="radio" name="fifth" value="bad" id="flexCheckDefault">
                    </div>
                    <div class="form-check "  style="margin-right: 140px;">
                      <input class="form-check-input" type="radio" name="fifth" value="good" id="flexCheckDefault">
                    </div>
                    <div class="form-check "  style="margin-right: 160px;">
                      <input class="form-check-input" type="radio" name="fifth" value="verygood" id="flexCheckDefault">
                    </div>
                    <div class="form-check ">
                      <input class="form-check-input" type="radio" name="fifth" value="excellent" id="flexCheckDefault">
                    </div>
                </div>               
            </div>  
            <div class="mb-5 col-6 mx-auto pb-4 mt-5">
                <button type="submit" class="btn btn-dark col-12 mx-auto">Submit</button>
            </div>
        </form>
    </div>
<?php
review();
include("layouts/scripts.php");
include("layouts/footer.php");
?>