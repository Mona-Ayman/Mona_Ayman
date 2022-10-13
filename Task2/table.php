<?php
$users = [
  (object)[
    'id' => 1,
    'name' => 'ahmed',
    "gender" => (object)[
      'gender' => 'm'
    ],
    'hobbies' => [
      'football', 'swimming', 'running',
    ],
    'activities' => [
      "school" => 'drawing',
      'home' => 'painting'
    ],
    'phones' => ["0123123", "0151515155"],
  ],
  (object)[
    'id' => 2,
    'name' => 'mohamed',
    "gender" => (object)[
      'gender' => 'm'
    ],
    'hobbies' => [
      'swimming', 'running',
    ],
    'activities' => [
      "school" => 'painting',
      'home' => 'drawing'
    ],
    'phones' => ["2345"],
  ],
  (object)[
    'id' => 3,
    'name' => 'menna',
    "gender" => (object)[
      'gender' => 'f'
    ],
    'hobbies' => [
      'running',
    ],
    'activities' => [
      "school" => 'painting',
      'home' => 'drawing'
    ],
    'phones' => [""],
  ]
];

?>

<!doctype html>
<html lang="en">

<head>
  <title>Table</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class=" mt-5 pt-5">

  <?php if (!empty($users)) { ?>
    <div class="col-9 mx-auto table-primary border border-3 pb-5 text-center">
      <table class="table table-hover ">
        <thead>
          <?php
          echo   "<tr>";
          foreach ($users[0] as $index => $value) {
            echo   "<th> $index </th>";
          }
          echo   "</tr>";
          ?>
        </thead>
        <tbody>
          <?php
          foreach ($users as $user) {
            echo "<tr>";

            foreach ($user as $property => $value) {
              echo   "<td>";

              if (gettype($value) == 'object' || gettype($value) == 'array') {

                foreach ($value as $secondProperty => $secondValue) {
                  if ($property == 'gender' && $secondProperty == 'gender') {
                    if ($secondValue == 'm') {
                      $secondValue = 'male';
                    } elseif ($secondValue == 'f') {
                      $secondValue = 'female';
                    }
                  }
                    echo $secondValue . '<br>';
                }
              } else {
                echo $value;
              }
              echo   "</td>";
            }
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    <?php } else echo "<div class='alert alert-danger col-9 mx-auto text-center'><h1>Sorry There Are No Users Found! </h1></div>"; ?>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>