<?php
class HockyController extends BaseController {

    private $hockyModel;

    public function __construct()
    {
        $this->loadModel('HockyModel');
        $this->hockyModel = new HockyModel;
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
            if($_SESSION['jobtitle'] == 'quản trị viên')
            {
                $this->view('cachocky.index') . $this->view('footers/index');
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

    public function addHocky()
    {
        
        $maHK = $_POST['maHK'];
        if($this->hockyModel->addHockyXML())
        {
            header("location: index.php?controller=hocky&action=index");
        } else {
            $this->hockyModel->showError('Trùng mã học kỳ. Mã học kỳ '.$maHK.' đã có trước đó');
        }
        $this->index();
    }

    public function updateHockyForm()
    {
        return $this->view('cachocky.update') . $this->view('footers/index');
    }

    public function updateHocky()
    {
        $maHK = $_POST['maHK'];
        if($this->hockyModel->updateHockyXML())
        {
            header("location: index.php?controller=hocky&action=index");
        } else {
            $this->hockyModel->showError('Trùng mã học kỳ. Mã học kỳ '.$maHK.' đã có trước đó');
        }
        $this->index();
    }

    public function delHocky()
    {
        $this->hockyModel->delHockyXML();
        header("location: index.php?controller=hocky&action=index");
    }

    public function timnamhoc()
    {
        
    }
}