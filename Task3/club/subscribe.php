<?php
$title = "subscribe";
include("layouts/header.php");
include("layouts/navbar.php");
?>
<body class="" <!--style="background: url('images//images (2).jfif') no-repeat center/cover;"-->>
    <div class="container col-7 alert alert-info pt-5 rounded-pill" style="margin-top: 200px;">
        <form action="games.php" method="post">
            <div class="mb-5 col-9 mx-auto">
                <label for="exampleInputPassword1" class="form-label"><h3>Member Name</h3></label>
                <input type="text" name="client_name"  class="form-control mb-3" id="exampleInputPassword1">
                <h5 class="text-info text-center">Club Suubscription Starts With 10,000 LE</h5>
            </div>
            <div class="mb-5 col-9 mx-auto">
                <label for="exampleInputPassword1" class="form-label"><h3>Count Of Family Members</h3></label>
                <input type="number" name="number_of_members" class="form-control mb-3" id="exampleInputPassword1">
                <h5 class="text-info text-center">Cost Of Each Member Is 2,500 LE</h5>

            </div>
            <div class="mb-5 col-6 mx-auto mb-5 pb-4">
            <button  class="btn btn-dark col-12 mx-auto">Subscribe</button>
            </div>
        </form>
    </div>
<?php
include("layouts/scripts.php");
include("layouts/footer.php");
?>