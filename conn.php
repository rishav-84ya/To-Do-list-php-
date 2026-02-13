<?php

try{
    $conn = new PDO("mysql:host=localhost;dbname=project 1","root","");
    
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?>