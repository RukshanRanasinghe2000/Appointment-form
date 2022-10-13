<?php
require_once("doctordao.php");
$doctors = DoctorDao::getAll();
//var_dump($doctors);
$jsonData = json_encode($doctors);
echo $jsonData;

?>