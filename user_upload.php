<?php

//Command line Directives
$shortopts  = "";
$shortopts .= "u::"; // Optional value
$shortopts .= "p::"; // Optional value
$shortopts .= "h:"; // Optional value

$longopts  = array(
 "file::",     // Optional value
 "create_table",    // No value
 "dry_run::",     // Optional value
 "help",      // No value
);

//Essential variables with default values
$csv_file = "users.csv"; 
$create_value = 2;
$dr_run = 3;
$hp = 4;
$user_name = "root";
$pword = "123456";
$hs_name = "localhost";

//Collects command line Diretives
$opts = getopt($shortopts,$longopts);

//Checks command line Directives
foreach($opts as $x => $x_value) {
    if ($x == 'filename'){
        $csv_file = $x_value;        
    }
    if ($x == 'create_table'){
        $create_value = 1; 
    }
    if ($x == 'dry_run'){
        $dr_run = 1; 
    }
    if ($x == 'help'){
        $hp = 1; 
    }
    if ($x == 'u'){
        $user_name = $x_value;        
    }
    if ($x == 'p'){
        $pword = $x_value;      
    }
    if ($x == 'h'){
        $hs_name = $x_value;      
    }  
}

//prints values of command line Directives 
echo $csv_file; 
echo $create_value;
echo $dr_run;
echo $hp;
echo $user_name;
echo $pword;
echo $hs_name;

?>