<?php
require_once("db.php");
require_once("appointment.php");
require_once("doctordao.php");

class AppointmentDao
{

    public static function setData($row)
    {
        $doctor = new Doctor();
        $doctor->setId($row['id']);
        $doctor->setName($row['name']);
        return $doctor;
    }

    public static function getTimeByDoctorAndDate($date, $doctor)
    {
//        var_dump($date);
//        var_dump($doctor);
//        SELECT max(time) FROM appointment  where date ='" . $date . "' and doctor_id = $doctor->id
        $query = "SELECT max(time) FROM appointment where date ='" . $date . "' and doctor_id =" . $doctor->id." order by time DESC";

        $result = CommonDao::getResults($query);
        $row = $result->fetch_assoc();

//            $time = $row['time'];
//            $times[] = $time;

        return $row;
    }

    public static function Save($data)
    {
        $query = "INSERT INTO appointment (name, mobile,email, date,time,doctor_id) VALUES ('" . $data->name . "','" . $data->mobile . "','" . $data->email . "','" . $data->date . "','" . $data->time . "'," . $data->doctor->id . ")";
//        var_dump($query);
        return CommonDao::getResults($query);
    }

}
