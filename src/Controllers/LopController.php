<?php
class LopController extends BaseController {

    private $lopModel;

    public function __construct()
    {
        $this->loadModel('LopModel');
        $this->lopModel = new LopModel;
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
                $this->view('lop.index') . $this->view('footers/index');
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

    public function addLop()
    {
        $malop = $_POST['malop'];
        if($this->lopModel->addLopXML())
        {
            header("location: index.php?controller=lop&action=index");
        } else {
            $this->lopModel->showError('Trùng mã lớp. Mã lớp '.$malop.' đã có trước đó');
        }
        $this->index();
    }

    public function updateLopForm()
    {
        return $this->view('lop.update') . $this->view('footers/index');
    }

    public function updateLop()
    {
        $malop = $_POST['malop'];
        if($this->lopModel->updateLopXML())
        {
            header("location: index.php?controller=Lop&action=index");
        } else {
            $this->lopModel->showError('Trùng mã lớp. Mã lớp '.$malop.' đã có trước đó');
        }
        $this->index();
    }

    public function delLop()
    {
        $this->lopModel->delLopXML();
        header("location: index.php?controller=Lop&action=index");
    }
}