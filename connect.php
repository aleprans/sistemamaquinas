<?php

    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $db_name = "controlmaq";

    $connect = mysqli_connect($servername, $username, $password, $db_name);

    if (mysqli_connect_error()):
        echo "Falha na conexão: ".mysqli_connect_error();
    endif;
