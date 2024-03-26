<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errors extends CI_Controller
{
    public function error404()
    {
        $data['title'] = 'Error 404';

        $this->load->view('templates/header/errorheader', $data);
        $this->load->view('error404');
        $this->load->view('templates/footer/errorfooter');
    }

    public function blocked()
    {
        $data['title'] = 'Blocked';

        $this->load->view('templates/header/errorheader', $data);
        $this->load->view('blocked');
        $this->load->view('templates/footer/errorfooter');
    }
}
