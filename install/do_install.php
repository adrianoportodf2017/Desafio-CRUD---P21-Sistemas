<?php

ini_set('max_execution_time', 300); //300 seconds

$settings_file = __DIR__ . DIRECTORY_SEPARATOR . 'settings.json';

if (!file_exists($settings_file)) {
  die("Arquivo de configuração não encontrado!");
} else {
  $contents = file_get_contents($settings_file);
  $settings = json_decode($contents, true);
}

if (!empty($_POST)) {
  $host = $_POST["host"];
  $dbuser = $_POST["dbuser"];
  $dbpassword = $_POST["dbpassword"];
  $dbname = $_POST["dbname"];

  
  

  //check required fields
  if (!($host && $dbuser && $dbname)) {
    echo json_encode(array("success" => false, "message" => "Por favor insira todos os campos."));
    exit();
  }

  //check for valid database connection
  $mysqli = @new mysqli($host, $dbuser, $dbpassword, $dbname);

  if (mysqli_connect_errno()) {
    echo json_encode(array("success" => false, "message" => $mysqli->connect_error));
    exit();
  }

  //all input seems to be ok. check required fiels
  if (!is_file($settings['database_file'])) {
    echo json_encode(array("success" => false, "message" => "O arquivo ../banco.sql não foi encontrado na pasta de instalação!"));
    exit();
  }

  /*
   * check the db config file
   * if db already configured, we'll assume that the installation has completed
   */
  $db_file_path = ".." . $settings['writeable_directories']['database'];
  $db_file = file_get_contents($db_file_path);
  $is_installed = strpos($db_file, "enter_hostname");

  if (!$is_installed) {
    echo json_encode(array("success" => false, "message" => "Parece que este aplicativo já está instalado! Você não pode reinstalá-lo novamente."));
    exit();
  }

  //start installation
  $sql = file_get_contents($settings['database_file']);

  //set admin information to database


  //create tables in datbase
  $mysqli->multi_query($sql);
  do { } while (mysqli_more_results($mysqli) && mysqli_next_result($mysqli));
  $mysqli->close();
  // database created

  // set the database config file
  $db_file = str_replace('enter_hostname', $host, $db_file);
  $db_file = str_replace('enter_db_username', $dbuser, $db_file);
  $db_file = str_replace('enter_db_password', $dbpassword, $db_file);
  $db_file = str_replace('enter_database_name', $dbname, $db_file);

  file_put_contents($db_file_path, $db_file);

 



  // set the environment = production
  $index_file_path = ".." . $settings['writeable_directories']['index'];
  $index_file = file_get_contents($index_file_path);
  $index_file = preg_replace('/pre_installation/', 'development', $index_file, 1); //replace the first occurence of 'pre_installation'

  file_put_contents($index_file_path, $index_file);

  echo json_encode(array("success" => true, "message" => "Instalação bem sucedida."));
  exit();
}
