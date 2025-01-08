<?php
class HomeController extends BaseController {

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
            return $this->view('homes.index') . $this->view('footers/index');
        }
        else
        {
            $this->headerToSignin();
        }
    }

    public function diemsinhvien()
    {
        return $this->view('homes.diemsinhvien') . $this->view('footers/index');
    }
}