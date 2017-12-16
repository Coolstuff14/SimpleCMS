<?php


//Connect to database
function db_connect() {

    // Define connection as a static variable, to avoid connecting more than once
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
        // Load configuration as an array. Use the actual location of your configuration file
       $config = parse_ini_file('config\config.ini');
       $connection = odbc_connect($config['dns'],$config['username'],$config['password']);
    }

    if (!$connection){
     return 0;
    }

      return $connection;
}



function dbcall($sql){
  $rows = array();
  $connection = db_connect(); //Connect to DB
  $result = odbc_exec($connection,$sql); //Execute Sql on DB

  //Check if there are results and add them to an array
  if(($result !== false)&&(count($result) > 0)) {
  while($row = @odbc_fetch_array($result)){
    array_push($rows, $row); //Array of associative arrays
  }

  return $rows; //If successful send back array or arrays
}

  return false; //If no results send back OBDC_ERROR
}

/*
//Test Functions
$rows = dbcall("SELECT username,fullname FROM user");
foreach ($rows as $row){
  printf("<b>%s:</b>", $row['fullname']);
  printf("%s <br>", $row['username']);
}
*/

?>
