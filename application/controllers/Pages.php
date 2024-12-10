<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit','2048M');
date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{
        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                             
            $this->load->view('includes/header');
            $this->load->view('includes/navbarmain');
            $this->load->view('pages/'.$page);         
            $this->load->view('includes/footer');               
        }  
        public function about(){
            $page = "about";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                             
            $this->load->view('includes/header');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page);         
            $this->load->view('includes/footer');               
        } 
        public function services(){
            $page = "services";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                             
            $this->load->view('includes/header');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page);         
            $this->load->view('includes/footer');               
        }
        public function appointment(){
            $page = "appointment";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            $data['items'] = $this->Clinic_model->getAllDoctor();
            $this->load->view('includes/header');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page,$data);         
            $this->load->view('includes/footer');               
        } 
        public function view_available(){
            $page = "view_available";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            $code=$this->input->post('apcode');            
            $m=$this->input->post('month');
            $d=explode('-',$m);
            $month=$d[0];
            $year=$d[1];
            $data['month'] = $month;
            $data['year'] = $year;
            $data['item'] = $this->Clinic_model->getSingleDoctor($code);
            $this->load->view('includes/header');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page,$data);         
            $this->load->view('includes/footer');               
        }  
        public function appointment_details(){
            $page = "appointment_details";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            $code=$this->input->post('apcode');
            $datearray=$this->input->post('datearray');
            $data['datearray'] = $datearray;
            $data['item'] = $this->Clinic_model->getSingleDoctor($code);
            $this->load->view('includes/header');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page,$data);         
            $this->load->view('includes/footer');               
        }  
        public function save_appointment(){
            $save=$this->Clinic_model->save_appointment();
            if($save){
                redirect(base_url()."appointment_receipt");
            }else{
                redirect(base_url()."appointment_failed");
            }
        }
        public function appointment_receipt(){
            $page = "appointment_receipt";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                             
            $this->load->view('includes/header');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page);         
            $this->load->view('includes/footer');               
        }
        public function appointment_failed(){
            $page = "appointment_failed";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                             
            $this->load->view('includes/header');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page);         
            $this->load->view('includes/footer');               
        }
}
?>
