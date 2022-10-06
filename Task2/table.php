<?php
$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 
            // 'swimming', 'running',
        ],
        'activities' => [
            "school" => 'drawing',
            // 'home' => 'painting'
        ],
         'phones'=>"0123123",
         

    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming',
            //  'running',
        ],
        'activities' => [
            "school" => 'painting',
            // 'home' => 'drawing'
        ],
       'phones'=>"2345",

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
            // 'home' => 'drawing'
        ],
         'phones'=>"",
         

        
      ],
      
      
    
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





<div class="col-9 mx-auto table-primary border border-3 pb-5 text-center">
  <h1 class="text-center my-3">Table</h1>
  
  <table class="table table-hover ">
  <thead>
  <?php
echo "<tr>";
  foreach($users As $index=>$value){
     foreach($value As $x=>$y){
        echo   "<th> $x </th>";       
       }
       break;
    } 
    echo "</tr>";
?>
  <!-- <?php
//  for($i = 0; $i < count($users); $i++){
//   "<tr>";
  
//   foreach($users[$i] As $index=>$value){
   
    
//     echo   "<th> {$index}</th>";
    
  
//   "</tr>";
//  }
// }
 ?> -->

  </thead>
  <tbody>
  

  <?php
 echo "<tr>";
   foreach($users As $value){
    
    // echo   "<td> $index </td>";
     foreach($value As $x=>$y){
      
      // foreach($y As $m=>$n){
        if(is_array($y) || is_object($y)){
          
         foreach($y As $m=>$n){
          if($n == 'm'){
            $n = 'male';
          }elseif($n == 'f'){
            $n = 'female';
          }
          
          echo   "<td>" . $n . "</td>";
       }



        //  if(is_array($y) || is_object($y)){
        //   echo   "<td>" . ' ' . "</td>";
        //   foreach($y As $m=>$n){
        //     if(sizeof($n) > 1){
        //     $n = ' '; 
        //   echo $n;}
        //   else{
        //     echo   "<td>" . $n . "</td>";
        //   }
        //   }
        //   // if(is_array($y) || is_object($y))
        // }
        }else{
      echo   "<td>" . $y . "</td>";
        }
        // echo   "<td> $index->$y </td>";
      
       
        // break;
    }
 echo "/<tr>";

    
  // }
   }
?>



  <!-- <?php

  // foreach($users As $index=>$value){
  //   echo "<tr>";
  //   // echo   "<th> $index </th>";
  //    foreach($value As $x=>$y){
      
  //     // foreach($y As $m=>$n){
  //       echo   "<th> {$y} </th>";
  //      }
     
  //   }
  // }
?> -->
  <?php
//   echo "<tr>";
//  foreach($users As $value){
// //   echo "<tr>";
// //   // echo   "<th> $index[$i] </th>";

// //     // foreach($value As $x=>$y){
       
   
//       echo   "<td>" . $value->id . "</td>";
      // echo   "<tr><td>" . $value->name . "</td></tr>";

     
      // echo   "<tr><td>" . $value->name . "</td></tr>";
    // foreach($y As $m=>$n){
    //   echo   "<th> {$n} </th>";
    
    // }
  //  }
//  }
?>
<?Php
// for($i = 0; $i < count($users); $i++){
//   echo "<tr>" ;
  
//   foreach($users[$i] As $index=>$value){
//       if($index[$i] == $i){
    
//     echo   "<th> $value->name </th>";
    
//       }
//    "</tr>";
//   }
//  }

?>
  <!-- <?php
//  for($i = 0; $i < count($users); $i++){
//   "<tr>";
  
//   foreach($users[$i] As $index=>$value){
   
    
//     echo   "<th> {$value[$i]}</th>";
    
  
//   "</tr>";
//  }
// }
 ?> -->

 
 
  </tbody>
</table>
</div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>