<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function index()
    {
        $this->load->view('Home/home');
    }
    function dashboard()
    {
        $this->load->view('Home/basetemplate');
        $this->load->view('Home/dashboard');
    }
    function logout()
    {
        $this->load->view('Home/home');
    }
}