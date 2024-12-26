<?php
    date_default_timezone_set('Asia/Manila');
    class Clinic_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }    
        public function getAllDoctor(){
            $result=$this->db->query("SELECT * FROM docfile wHERE specialization <> 'ROD' ORDER BY lastname ASC");
            return $result->result_array();
        }
        public function getSingleDoctor($code){
            $result=$this->db->query("SELECT * FROM docfile WHERE code='$code'");
            return $result->row_array();
        }
        public function save_appointment(){
            $code=$this->input->post('apcode');
            $datearray=$this->input->post('datearray');
            $lastname=$this->input->post('lastname');
            $firstname=$this->input->post('firstname');
            $middlename=$this->input->post('middlename');
            $suffix=$this->input->post('suffix');
            $birthdate=$this->input->post('birthdate');
            $contactno=$this->input->post('contactno');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("INSERT INTO appointment(apcode,lastname,firstname,middlename,suffix,birthdate,contactno,appointment_date,datearray,timearray) VALUES('$code','$lastname','$firstname','$middlename','$suffix','$birthdate','$contactno','$datearray','$date','$time')");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllDoctorByDept($dept){
            $result=$this->db->query("SELECT * FROM docfile WHERE specialization = '$dept' ORDER BY lastname ASC");
            return $result->result_array();
        }
        public function getAllDepartment(){
            $result=$this->db->query("SELECT specialization FROM docfile WHERE specialization <> 'ROD' AND specialization <> '' GROUP BY specialization ORDER BY specialization ASC");
            return $result->result_array();
        }
    }
?>
