<?php
require_once("./appointmentdao.php");

$errors = "";
$result = "";
$defaultTime ="08:00:00";
$appointmentARRAY1 = array();
if (!isset($_POST['appointment'])) {
    $errors = "Appointment Not Available";
} else {
    $appointmentOBJ = $_POST['appointment'];
    $appointment = json_decode($appointmentOBJ);
//   var_dump($appointment);
        $appointmentARRAY1["name"] = $appointment->name;
        $appointmentARRAY1["mobile"] = $appointment->mobile;
        $appointmentARRAY1["email"] = $appointment->email;
        $appointmentARRAY1["date"] = $appointment->date;
        $appointmentARRAY1["time"] = $defaultTime;
        $appointmentARRAY1["doctor"] = $appointment->doctor;


//   var_dump($appointmentARRAY1);
    if (!((isset($appointment->name)) && (isset($appointment->mobile)) && (isset($appointment->email)) && (isset($appointment->date)) && (isset($appointment->time)) && (isset($appointment->doctor)))) {
        $errors = "Appointment Data Is Missing..";
    } else {

        if (!preg_match("/^[A-Z][a-z]{2,}$/", $appointment->name)) {
            $errors = $errors . "Name Invalid\n";
        }
        if (!preg_match("/^([0-9]{10})$/", $appointment->mobile)) {
            $errors = $errors . "Mobile Invalid\n";
        }
        if (!preg_match("/^[a-z0-9]+[@][a-z]+.[a-z]+$/", $appointment->email)) {
            $errors = $errors . "Email Invalid\n";
        }

        if ($appointment->doctor == null) {
            $errors = $errors . "Doctor Not Selected\n";
        }
    }
    $times =  AppointmentDao::getTimeByDoctorAndDate($appointment->date,$appointment->doctor);
    $time ="09:10:00";
    if (!$errors == "") {
        echo($errors);
    } else {

        if ($times !== null) {



            if($defaultTime !== $times['max(time)']){
                $m = (int)explode(":",$defaultTime)[1];
                $h = (int)explode(":",$defaultTime)[0];
                $m = $m+10;
                if($m >= 60){
                    $h = $h + 1;
                    $m = $m - 60;
                    if(8 < $h && $h < 17){

                    }
                    var_dump($h.":".$m);

                }

            }
//             var_dump($times['max(time)']);
//             var_dump($defaultTime);


        } else {
//        $result = AppointmentDao::save($appointment);
        if ($result != 1) {
            echo("DataBase Error!");
        }
       }
    }

//    function genarateTime(){
//
//        $val= Number.parseInt( btnTime.value);
//        setTime($val);
//        $y= $val+1;
//
//
//    }
//
//    function setTime($val){
//
//        for ( $h = 8; $h < 18; $h++) {
//            for ( m = 0.0; m<60; m+=10) {
//                if (h>=13) {
//                    time.push(h+":"+m);
//                }else{
//                    time.push(h+":"+m);
//                }
//            }
//
//        }
//        return(time[val]);





    echo $result;


}



