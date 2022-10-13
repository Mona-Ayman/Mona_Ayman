<!doctype html>
<html lang="en">

<head>
    <title>Supermarket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class=" mt-5 pt-5" <!--style="background: url('images//images (2).jfif') no-repeat center/cover;" -->>
    <form method="post">
        <div class="container col-7 alert alert-info pt-5 rounded-pill ">
            <div class="mb-5 col-9 mx-auto">
                <label for="exampleInputEmail1" class="form-label">
                    <h3>Name</h3>
                </label>
                <input type="text" name="name" value="<?= $_POST['name'] ?? ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-5 col-9 mx-auto">
                <label for="exampleInputPassword1" class="form-label">
                    <h3>City</h3>
                </label>
                <select class="form-select form-select-lg mb-3 col-12" name="city" aria-label=".form-select-lg example">
                    <option <?= $_POST['city'] == 'cairo' ? 'selected' : '' ?> value="cairo">Cairo</option>
                    <option <?= $_POST['city'] == 'giza' ? 'selected' : '' ?> value="giza">Giza</option>
                    <option <?= $_POST['city'] == 'alex' ? 'selected' : '' ?> value="alex">Alex</option>
                    <option <?= $_POST['city'] == 'other' ? 'selected' : '' ?> value="other">Other</option>
                </select>
            </div>
            <div class="mb-5 col-9 mx-auto">
                <label for="exampleInputPassword1" class="form-label">
                    <h3>Number Of Varietes</h3>
                </label>
                <input type="number" name="varieties" value="<?= $_POST['varieties'] ?? ""; ?>" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-5 col-6 mx-auto mb-5 pb-4">
                <button type="submit" name="button1" class="btn btn-dark col-12 mx-auto">Submit</button>
            </div>
        </div>
        <?php
        if (isset($_POST['button1'])) {
            $name = $_POST['name'];
            $city = $_POST['city'];
            $varieties = $_POST['varieties']; ?>
            <div class="container col-6  px-5 text-center alert alert-info">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantities</th>
                        </tr>
                    </thead>
                    <?php
                    for ($i = 1; $i <= $varieties; $i++) { ?>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="mb-3">
                                        <input type="text" name="product[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </td>
                                <td>
                                    <div class="mb-3">
                                        <input type="number" name="price[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </td>
                                <td>
                                    <div class="mb-3">
                                        <input type="number" name="quantity[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    <?php
                    } ?>
                </table>
                <div class="mb-3">
                    <button type="submit" name="button2" class="btn btn-dark col-6">Submit</button>
                </div>
            </div>
        <?php

        } ?>
        <?php if (isset($_POST['button2'])) {

            $product = $_POST['product'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
        ?>
            <div class="container col-6  px-5 text-center alert alert-info mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantities</th>
                            <th scope="col">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < $_POST['varieties']; $i++) { ?>
                            <tr>
                                <td>

                                    <div class="mb-3">
                                        <?= $product[$i]; ?>
                                    </div>
                                </td>
                                <td>

                                    <div class="mb-3">
                                        <?= $price[$i]; ?>
                                    </div>
                                </td>
                                <td>

                                    <div class="mb-3">
                                        <?= $quantity[$i]; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="mb-3">
                                        <?= $quantity[$i] * $price[$i]; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php  } ?>
                        <tr>
                            <th>Client Name</th>
                            <td><?= $_POST['name'] ?></td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td><?= $_POST['city'] ?></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td><?php $total = 0;
                                for ($i = 0; $i < $_POST['varieties']; $i++) {
                                    $total += ($quantity[$i] * $price[$i]);
                                }
                                echo $total;; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td><?php if ($total < 1000) {
                                    echo $discount = 0;
                                } elseif ($total >= 1000 && $total < 3000) {
                                    echo $discount = ($total * 10) / 100;
                                } elseif ($total >= 3000 && $total < 4500) {
                                    echo $discount = ($total * 15) / 100;
                                } else {
                                    echo $discount = ($total * 20) / 100;
                                }         ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Total After Discount</th>
                            <td><?= $totalAfterDiscount = ($total - $discount); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Delivery</th>
                            <td><?php if ($_POST['city'] == 'cairo') {
                                    echo $delivery = 0;
                                } elseif ($_POST['city'] == 'giza') {
                                    echo $delivery = 30;
                                } elseif ($_POST['city'] == 'alex') {
                                    echo $delivery = 50;
                                } elseif ($_POST['city'] == 'other') {
                                    echo $delivery = 100;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-danger">Net Total</th>
                            <th><?= $netTotal = ($totalAfterDiscount + $delivery); ?></th>
                        </tr>

                    </tbody>
    </form>
<?php } ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>