<?php

class RegisterController extends BaseController {
    public function __construct()
    {
        session_start();

        if($_SESSION['jobtitle'] == 'sinh viên')
        {
            $this->studentHeader();
        }
        if($_SESSION['jobtitle'] == 'giảng viên')
        {
            $this->teacherHeader();
        }
        if($_SESSION['jobtitle'] == 'quản trị viên')
        {
            $this->adminHeader();
        }
    }

    public function index()
    {
        if($this->isSignin())
        {
            return $this->view('registers.index') . $this->view('footers/index');
        }
        else
        {
            $this->headerToSignin();
        }
    }
}