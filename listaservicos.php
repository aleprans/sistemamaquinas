<?php

include_once('connect.php');

$sql = "SELECT * FROM servicos";

$resultado = mysqli_query($connect, $sql);

?>