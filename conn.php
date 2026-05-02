<?php
    $dbHost = 'sql104.infinityfree.com';
    $dbUsername = 'if0_40233388'; 
    $dbPassword = 'ecomap25';
    $dbName = 'if0_40233388_db_ecomap';


    //Variável de conexão
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 


    //Testar se a conexão foi bem sucedida (Deu certo)
    
      //  if ($conn->connect_error) {
      //      echo"Conexão falhou";
      //  }
      //  else {
      //      echo"Conexão bem sucedida";
      //  }

?>