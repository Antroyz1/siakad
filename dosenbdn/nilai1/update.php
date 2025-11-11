<?php

//update.php

include('database_connection.php');

$query = "
UPDATE krs
SET ".$_POST["name"]." = '".$_POST["value"]."' 
WHERE Id_krs = '".$_POST["pk"]."'
";

$connect->query($query);

?>