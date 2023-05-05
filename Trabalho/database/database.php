<?php
    //Qual é banco?
    //Qual o endereço do banco
    $local = '127.0.0.1:3307';
    $user = 'root';
    $pwd = '';
    $db = 'loja';

    $con = new mysqli($local, $user, $pwd, $db);

    if ($con->connect_error) {
        echo $con->connect_error;
    }
?>