<?php

    class Appointment{

        public $id;
        public $name;
        public $email;
        public $date;
        public $time;
        public $doctor;
        public $appointment_id;


        function __construct(){}


        public function getId(){return $this->id;}


        public function setId($id){$this->id = $id;}


        public function getName(){return $this->name;}


        public function setName($name){$this->name = $name;}



        public function getAppointmentId(){return $this->appointment_id;}


        public function setAppointmentId($appointment_id){$this->appointment_id = $appointment_id;}


        public function getEmail(){return $this->email;}


        public function setEmail($email){$this->email = $email;}


        public function getDate(){return $this->date;}


        public function setDate($date){$this->date = $date;}


        public function getTime(){return $this->time;}


        public function setTime($time){$this->time = $time;}


        public function getDoctorId(){return $this->doctor;}


        public function setDoctorId($doctor){$this->doctor = $doctor;}



    }



?>