<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // $this->load->model('Auth_model');
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
    }

    /*
    |--------------------------------------------------------------------------
    | Login Page
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $captcha = strtoupper(substr(md5(mt_rand()),0,6));

        $this->session->set_userdata('captcha',$captcha);

        $data['captcha'] = $captcha;

        $this->load->view('auth/login',$data);
		// $this->load->view('auth/login');
    }

    /*
    |--------------------------------------------------------------------------
    | Register Page
    |--------------------------------------------------------------------------
    */

    public function register()
    {
        $this->load->view('auth/register');
    }

    /*
    |--------------------------------------------------------------------------
    | Save Registration
    |--------------------------------------------------------------------------
    */

    public function register_user()
    {

        $this->form_validation->set_rules('name','Name','required|trim');

        $this->form_validation->set_rules('email','Email',
            'required|trim|valid_email');

        $this->form_validation->set_rules('password',
            'Password',
            'required|min_length[6]');

        $this->form_validation->set_rules('confirm_password',
            'Confirm Password',
            'matches[password]');

        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('register');
            return;
        }

        if($this->Auth_model->email_exists($this->input->post('email')))
        {
            $this->session->set_flashdata(
                'error',
                'Email already exists.'
            );

            redirect('auth/register');
        }

        $data=array(

            'name'=>$this->input->post('name',TRUE),

            'email'=>$this->input->post('email',TRUE),

            'password'=>password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            )

        );

        $this->Auth_model->register_user($data);

        $this->session->set_flashdata(
            'success',
            'Registration Successful.'
        );

        redirect('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */

    public function login()
    {

        $email=$this->input->post('email',TRUE);

        $password=$this->input->post('password');

        $captcha=$this->input->post('captcha');

        if(
            strtoupper($captcha)!=$this->session->userdata('captcha')
        )
        {
            $this->session->set_flashdata(
                'error',
                'Invalid Captcha'
            );

            redirect('auth');
        }

        $user=$this->Auth_model->get_user_by_email($email);

        if(!$user)
        {
            $this->session->set_flashdata(
                'error',
                'Email not found.'
            );

            redirect('auth');
        }

        if(password_verify($password,$user->password))
        {

            $userdata=array(

                'user_id'=>$user->id,

                'name'=>$user->name,

                'email'=>$user->email,

                'logged_in'=>TRUE

            );

            $this->session->set_userdata($userdata);

            $this->session->sess_regenerate(TRUE);

            redirect('auth/dashboard');

        }
        else
        {

            $this->session->set_flashdata(
                'error',
                'Incorrect Password.'
            );

            redirect('auth');

        }

    }

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {

        if(!$this->session->userdata('logged_in'))
        {
            redirect('auth');
        }

        $this->load->view('dashboard');

    }

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    // public function logout()
    // {

    //     $this->session->sess_destroy();

    //     redirect('auth');

    // }

}
