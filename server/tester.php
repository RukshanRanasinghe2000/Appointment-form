<?php
echo("Testing....!!!");

require_once("db.php");
require_once("doctordao.php");
require_once("appointmentdao.php");

$gender = GenderDao::getById(1);

var_dump($gender);

$id = $gender->getId();
$name = $gender->getName();

echo("[{'id':'$id','name':'$name'}]");

echo("<br><br>---------------------------------------------------------<br><br>");


$genders = GenderDao::getByAll();
var_dump($genders);

$json = "[";

foreach ($genders as $itm => $gender) {
    $json = $json . "{ 'id':" . $gender->getId() . " ,'name' : '" . $gender->getName() . "'},";

}
$json = rtrim($json, ",");
$json = $json . "]";

echo($json);

echo("<br><br>---------------------------------------------------------<br><br>");

$employee = EmployeeDao::getById(6);

var_dump($employee);

$id = $employee->getId();
$name = $employee->getName();
$age = $employee->getAge();
$age = $employee->getNic();

$gender = $employee->getGender();

echo("[{'id':'$id','name':'$name','age':'$age','gender'{id:'$id',name:'$name'}}]");

echo("<br><br>---------------------------------------------------------<br><br>");


$employees = EmployeeDao::getByAll();
var_dump($employees);
$id = $employee->getId();
$name = $employee->getName();
$age = $employee->getAge();
$gender = $employee->getGender();

var_dump("[{'id':'$id','name':'$name','age':'$age','gender'{id:'$id',name:'$name'}}]");


//    $json = "[";

//   foreach($employees as $itm=>$employee){
//       $json =$json."{ 'id':".$employee->getId()." ,'name' : '".$employee->getName().",'age':".$employee->getAge()." ,'gender':".$employee->getGender()." '},";

//   }

//   $json = rtrim($json,",");
//   $json =$json."]";

//   echo($json);


?>