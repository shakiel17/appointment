<?php
    date_default_timezone_set('Asia/Manila');
    class Clinic_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }    
        public function getAllDoctor(){
            $result=$this->db->query("SELECT * FROM docfile ORDER BY lastname ASC");
            return $result->result_array();
        }
        public function getSingleDoctor($code){
            $result=$this->db->query("SELECT * FROM docfile WHERE code='$code'");
            return $result->row_array();
        }
    }
?>
