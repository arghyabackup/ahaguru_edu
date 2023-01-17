<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('frontend_model');
        $this->load->database();
    }
    public function index() {
        $returns = $this->frontend_model->listing_table_data_by_limit('students', '0', '5');

        $data = array(
            'returns'  => $returns
        );
        $this->load->view('frontend/index', $data);
    }
    public function add_update_action() {

        $id = $this->input->post( 'id' );

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        if($id == ''){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[students.email]');
        }
        $this->form_validation->set_rules('class', 'Class', 'required');

        if ($this->form_validation->run() == false) {
            $response_arr['msg']  = validation_errors();
            $response_arr['flag'] = false;

        }else{
            $data = array(
                'name'        => $this->input->post('name'),
                'mobile'       => $this->input->post('mobile'),
                'email'       => $this->input->post('email'),
                'class'       => $this->input->post('class'),
            );

            if($id){
                $data['modified'] = date('Y-m-d h:i:s');
                $result =$this->frontend_model->update_table_data($data, $id, 'students');
            }else{
                $result =$this->frontend_model->add_table_data($data, 'students');
            }

            if($result) {
                if($id){
                  $response_arr['msg'] = 'Student updated';
                  $response_arr['id'] = $id;
                  $response_arr['html'] = $this->get_html($data, $id, 'edit');
                }else{
                  $response_arr['msg'] = 'New Student added';
                  $response_arr['id'] = '';
                  $response_arr['html'] = $this->get_html($data, $result, 'add');
                }
                $response_arr['flag'] = true;

            }else{
                if($id){
                  $response_arr['msg'] = 'Student not updated';
                }else{
                  $response_arr['msg'] = 'New Student not added';
                }
                $response_arr['flag'] = false;
            }
        }
        echo json_encode($response_arr);
        exit(0);
    }
    public function edit_student_action() {
        $id = $this->input->post( 'id' );

        $returns = $this->frontend_model->get_table_data_by_id($id, 'students');

        echo json_encode($returns);
        exit(0);
    }
    public function delete_data(){
    
    $id=$_POST['id'];
    $check_field=$_POST['check_field'];
    $table_name=$_POST['table_name'];

    $result = $this->frontend_model->deleted_table_data($check_field, $id, $table_name);

    if($result){
      $msg = message( 
              array(
                  'msg' => "Deleted Successfully ...", 
                  'flag' => 1
              )
          );
      $this->session->set_flashdata( 'message', $msg );

      $response['status']  = 'success';
      $response['message'] = 'Deleted Successfully ...';

    }else{
      $msg = message( 
              array(
                  'msg' => "Unable to delete ...", 
                  'flag' => 2
              )
          );
      $this->session->set_flashdata( 'message', $msg );

      $response['status']  = 'error';
      $response['message'] = 'Unable to delete ...';

    }

    echo json_encode($response);
  } 
    public function student_list() {

        $row = $_POST['row'];
        $rowperpage = 5;

        $returns = $this->frontend_model->listing_table_data_by_limit('students', $row, $rowperpage);

        $data = array(
            'returns'  => $returns
        );
        
        $content = $this->load->view('frontend/listing_table_2', $data, true); 

        echo $content;
        exit(0);
    }
    public function get_html($data, $id, $mode){

        $data_cont = array(
            'return'  => $data,
            'id'  => $id,
            'mode' => $mode
        );

        return $this->load->view('frontend/listing_table', $data_cont, true);          
    }
    
}
