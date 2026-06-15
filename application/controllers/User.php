<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');

        $this->load->library('session');
    }

    public function index()
    {
        $data['users'] = $this->User_model->getUsers();

        $this->load->view('user_list',$data);
    }

    public function create()
    {
        $data['states'] = $this->User_model->getStates();

        $this->load->view('user_form',$data);
    }

    public function store()
    {
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('mobile','Mobile','required|numeric|exact_length[10]');
        $this->form_validation->set_rules('gender','Gender','required');
        $this->form_validation->set_rules('state_id','State','required');

        if($this->form_validation->run()==FALSE)
        {
            $data['states'] = $this->User_model->getStates();

            $this->load->view('user_form',$data);
        }
        else
        {
            $data = array(
                'name'     => $this->input->post('name',TRUE),
                'email'    => $this->input->post('email',TRUE),
                'mobile'   => $this->input->post('mobile',TRUE),
                'gender'   => $this->input->post('gender',TRUE),
                'state_id' => $this->input->post('state_id',TRUE)
            );

            $this->User_model->insertUser($data);
            $this->session->set_flashdata(
                'success',
                'User added successfully.'
            );

            redirect('user');
        }
    }

    public function edit($id)
    {
        $data['user'] = $this->User_model->getUserById($id);
        $data['states'] = $this->User_model->getStates();

        $this->load->view('edit_user',$data);
    }

    public function update($id)
    {
        $data = array(
            'name'     => $this->input->post('name',TRUE),
            'email'    => $this->input->post('email',TRUE),
            'mobile'   => $this->input->post('mobile',TRUE),
            'gender'   => $this->input->post('gender',TRUE),
            'state_id' => $this->input->post('state_id',TRUE)
        );

        $this->User_model->updateUser($id,$data);

        $this->session->set_flashdata(
            'success',
            'User updated successfully.'
        );
        redirect('user');
    }

    public function delete($id)
    {
        $this->User_model->deleteUser($id);

        redirect('user');
    }
}