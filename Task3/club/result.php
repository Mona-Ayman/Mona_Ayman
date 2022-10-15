<?php
$title = "number";
include("layouts/header.php");
include("layouts/navbar.php");
function result(){
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    // header("location:review.php");
}
}
?>

<body class="" <!--style="background: url('images//images (2).jfif') no-repeat center/cover;"-->>
    <div class="container col-6  px-5 bg-info">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Subscriber</th>
                    <th scope="col"><?= $_SESSION['name'] ?></th>
                    
                </tr>
            </thead>  
            <tbody>     
                <?php 
                print_r($_SESSION);die;
                for($i = 0 ; $i < $_SESSION['members'] ; $i++){?>
                    <tr>
                        <td>
                         <?php 
                               echo $_SESSION['name1'][$i]; 

                            ?>
                        </td>
                        <td>
                           <?php 
                           if(isset($_SESSION['sport1'][$i])) {echo "football";}else {echo '0';}
                        // echo $_SESSION['sport1'][$i]; 
                           ?>
                        </td>
                        <td>
                        <?php 
                           if(isset($_SESSION['sport2'][$i])) {echo "swimming";}else {echo '0';}
                        // echo $_SESSION['sport2'][$i]; 
                           ?>
                        </td>
                        <td>
                        <?php 
                           if(isset($_SESSION['sport3'][$i])) {echo "volyball";}else {echo '0';}
                        // echo $_SESSION['sport3'][$i]; 
                           ?>
                        </td>
                        <td>
                        <?php 
                           if(isset($_SESSION['sport4'][$i])) {echo "other";}else {echo '0';}
                        // echo $_SESSION['sport4'][$i]; 
                           ?>
                        </td>
                    </tr>                  
                <?php 
                }?>  
            </tbody>
        </table>   
    </div>   
<?php
 result();
include("layouts/scripts.php");
include("layouts/footer.php");
?>