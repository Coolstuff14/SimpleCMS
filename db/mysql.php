<?php
//Connect to database
function db_connect() {

    // Define connection as a static variable, to avoid connecting more than once
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
        // Load configuration as an array. Use the actual location of your configuration file
       $config = parse_ini_file('config.ini');
       $connection = @mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
    }

    if (!$connection){
     return mysqli_connect_error();
    }

      return $connection;
}

//Query the database mostly INSERT and UPDATE
function db_query($query) {
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = @mysqli_query($connection,$query);

    return $result;
}

//Query the database with SELECT
function db_select($query) {
    $rows = array();
    $result = db_query($query);

    // If query failed, return `false`
    if($result === false) {
        return false;
    }

    // If query was successful, retrieve all the rows into an array
    while ($row = @mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//Remove special characters and quotes
function db_quote($value) {
    $connection = db_connect();
    return "'" . @mysqli_real_escape_string($connection,$value) . "'";
}

//Send back error to be handled
function db_error() {
    $connection = db_connect();
    return mysqli_error($connection);
}

//Remove single quotes around something
function db_squote($var){
  return $var = preg_replace('/(^[\"\']|[\"\']$)/', '', $var);
}



 ?>
