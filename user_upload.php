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
$create_value = 0;
$d_run = 0;
$hp = 0;
$user_name = "root";
$pword = "123456";
$hs_name = "localhost";

//Collects command line Diretives
$opts = getopt($shortopts,$longopts);

//Reads command line Directives
foreach($opts as $x => $x_value) {
    if ($x == 'file'){
        $csv_file = $x_value;        
    }
    if ($x == 'create_table'){
        $create_value = 1; 
    }
    if ($x == 'dry_run'){
        $d_run = 1; 
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

//database connection details
$connect = mysql_connect($hs_name,$user_name,$pword);
if (!$connect) {
 die('Could not connect to MySQL: ' . mysql_error());
}

//Selects Database
$cid =mysql_select_db('test',$connect);

//Performs command line directive 
 if  ($create_value == 1){
   create_tabel (); 
   fwrite(STDOUT, "Just the users table has been created Successfully\n"); 
} else if ($hp == 1){
   Dispay_help (); 
} else if ($d_run == 1){
    global $csv_file;
    Dry_run ($csv_file);
} else {

create_tabel ();
if (($handle = fopen($csv_file, "r")) !== FALSE) {
   fgetcsv($handle);   
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
          $col[$c] = $data[$c];
        }
        
 $col1 = mysql_real_escape_string(format_name($col[0]));
 $col2 = mysql_real_escape_string(format_name($col[1]));
 $col3 = mysql_real_escape_string(strtolower(trim($col[2])));
 
   
// SQL Query to insert data into DataBase
if (filter_var($col3, FILTER_VALIDATE_EMAIL)) {			
    $query = "INSERT INTO users(name,surname,email) VALUES('".$col1."','".$col2."','".$col3."')";
    $s = mysql_query($query, $connect );
 }else{
    fwrite(STDOUT, "Invalid email format of $col3 \n"); 
}
}
    fclose($handle);
}
fwrite(STDOUT, "Validated data successfully imported to database\n");

mysql_close($connect);
}

function format_name($names) {
    $names = ucfirst(strtolower(trim($names)));	// Make a string's first character uppercase
    return preg_replace('/[^A-Za-z0-9-\']/', '', $names); // Removes special chars.
}

function create_tabel (){
    $sqlCreate = "CREATE TABLE IF NOT EXISTS `users` (
            `email` VARCHAR(255) NOT NULL,
            `name` VARCHAR(255) NOT NULL,
            `surname` VARCHAR(255) NOT NULL,
            PRIMARY KEY (`email`));";
    mysql_query($sqlCreate);
}

function Dispay_help (){
        
        fwrite(STDOUT, "Program Command Details\n
\n
--file		Command to pass the CSV file name.\n
                example: --file=users.csv\n
--Create_table	Command to create just the Mysql\n
                Users Table. example: --create_table\n 
--Dry_run	Command to run the program and pass the\n
                CSV file name without inserting\n
		data into the database.\n 
                example: --dry_run --file=users.csv\n
-u		Command to change the username of Mysql\n
                Database. example: -u=root\n
-p		Command to change the password of Mysql\n
                Database. example: -p=password\n
-h		Command to change the hostname of Mysql\n
                Database. example: -h=hostname\n
-help		Command to display all the available\n
                commands with details. example: --help\n"); 
        
}
    
function Dry_run ($cs_file){
    
if (($handle1 = fopen($cs_file, "r")) !== FALSE) {
   fgetcsv($handle1);   
   while (($data1 = fgetcsv($handle1, 1000, ",")) !== FALSE) {
        $num = count($data1);
        for ($c=0; $c < $num; $c++) {
          $col[$c] = $data1[$c];
        }
   }
}
fwrite(STDOUT, "Dry run of the pragram has been successful without inserting data\n");
}

?>