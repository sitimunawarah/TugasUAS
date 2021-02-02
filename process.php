<?php
require_once('config.php');
?>

<?php

if(isset($_POST)){
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $telp           = $_POST['telp'];

    $sql = "INSERT INTO users (firstname, lastname, email, password, telp ) VALUES(?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$firstname, $lastname, $email, $password, $telp]);
    if($result){
        echo 'Successfully saved.';
    }else{
        echo 'There were errors while saving the data.';
    }
}else{
    echo 'No data';
}
?>