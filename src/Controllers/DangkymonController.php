<?php
class DangkymonController extends BaseController {

    private $DangkymonModel;

    public function __construct()
    {
        $this->loadModel('DangkymonModel');
        $this->DangkymonModel = new DangkymonModel;
        session_start();

        if($_SESSION['jobtitle'] == 'sinh viên')
        {
            $this->studentHeader();
            echo $_SESSION['jobtitle'];
        }
        if($_SESSION['jobtitle'] == 'giảng viên')
        {
            echo $_SESSION['jobtitle'];
            $this->teacherHeader();
        }
        if($_SESSION['jobtitle'] == 'quản trị viên')
        {
            echo $_SESSION['jobtitle'];
            $this->adminHeader();
        }
    }

    public function index()
    {
        if($this->isSignin())
        {
            if($_SESSION['jobtitle'] == 'sinh viên')
            {
                $this->view('dangkymon.index') . $this->view('footers/index');
            }
            else
            {
                header('location: index.php?');
            }
        }
        else
        {
            $this->headerToSignin();
        }
    }

    public function dangky()
    {
        $this->DangkymonModel->themSVvaoLop();
        $this->index();
    }

    public function huydangky()
    {
        $this->DangkymonModel->xoaSVkhoiLop();
        $this->index();
    }
}