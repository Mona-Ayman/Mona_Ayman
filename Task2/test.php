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
        'yyyy' => [
            "school" => 'drawing',
            'home' => 'painting'
        ]
        // 'phones'=>"0123123",
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
        'kkkkk' => [
            'swimming', 'running',
        ],
        // 'phones'=>"2345",
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
        // 'phones'=>"",
    ]
];





    
    foreach($users[0] As $index=>$value){
     
          echo   "<th>{$value}</th> <br>";
       
      
    }
   



// for($i = 0; $i < count($users); $i++){
//     "<tr>";
    
//     foreach($users[$i] As $index=>$value){
     
//           echo   "<th>{$index}</th> <br>";
       
      
//     }
//     "</tr>";
//    }




//  for($i = 0; $i < count($users); $i++){
//   "<tr>";
  
//   foreach($users[$i] As $index=>$value){
//     if(!in_array($users[$i],$users)){
//         echo   "<th>{$index}</th> <br>";
     
//     }else{
//         echo 'hiiiii<br>';
//     // echo   "<th>{$index}</th> <br>";
//     }
//   }
//   "</tr>";
//  }


// for($i = 0; $i < count($users); $i++){
    
//     foreach($users[$i] As $index=>$value){
//         if($users[$i]->$index == $users[$i+1]->$index){
//             continue;
            
//         }else{
//             echo $index . "<br>";
//         }
//     }
// }
// $i = 0;
//  foreach($users[$i] As $index=>$value){
//     echo $index . "<br>";
//     $i++;
// }
// for($i = 0; $i < count($users); $i++){
// $arr = $users[$i];
// echo $arr;
// }

// foreach($users[$i] As $index=>$value){




// for($i = 0; $i < count($users); $i++){
// foreach($users[$i] As $index=>$value){
    
//     echo $users[$i] . "<br>";
// }
// }
// for($i = 0; $i < count($users); $i++){
    
//     foreach($users[$i] As $index=>$value){
//         // if(isset($index)){
//         //     continue;
//         // } 
            
            
//     }
//     echo $index . "<br>";  

// }
// $i=0;
// foreach($users[$i] As $index=>$value){
//     echo $index . "<br>";  
//     $i++;
//     if($i >= count($index)){
//         break;
//     }
     
// }
