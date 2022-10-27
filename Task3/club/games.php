<?php
$title = "games";
include("layouts/header.php");
include("layouts/navbar.php");
?>

<body class="" <!--style="background: url('images//images (2).jfif') no-repeat center/cover;"-->>
    <div class="container col-7 pt-5" >
       <form action="result.php" method="post">
       <input type="hidden" name="client_name" value="<?= $_POST['client_name'] ?>">
            <?php 
            for($i = 1; $i <=  $_POST['number_of_members'] ; $i++){ ?>
                <div class="col-9  mb-5 alert alert-info">
                    <h1>Member <?= $i; ?></h1>              
                    <div class="form-group">
                                    <label for="name">Member Name</label>
                                    <input type="text" name="members[<?= $i ?>][name]" id="name" class="form-control" placeholder=""
                                        aria-describedby="helpId">
                                </div>
                    <div class="form-check">
                        <input class="form-check-input" name="members[<?= $i ?>][games][football]" value="football" type="checkbox"  id="football<?= $i ?>">
                        <label class="form-check-label" for="football<?= $i ?>">
                            Football 300 LE
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="members[<?= $i ?>][games][swimming]" value="swimming" type="checkbox"  id="Swimming<?= $i ?>">
                        <label class="form-check-label" for="swimming<?= $i ?>">
                        Swimming 250 LE
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" name="members[<?= $i ?>][games][volleyball]" value="volleyball" type="checkbox"  id="Vollyball<?= $i ?>">
                        <label class="form-check-label" for="volleyball<?= $i ?>">
                        Volleyball 150 LE
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="members[<?= $i ?>][games][others]" value="others" type="checkbox"  id="Others<?= $i ?>">
                        <label class="form-check-label" for="others<?= $i ?>">
                        Others 100 LE
                        </label>
                    </div>              
                </div> 
             <?php 
            }?>    
           <div class="col-auto col-9 text-center mb-5">
                <button class="btn btn-info mb-3 col-6 mx-auto">Check Price</button>
           </div>
        </form>
    </div>
<?php
include("layouts/scripts.php");
include("layouts/footer.php");
?>