<?php
class GiangvienController extends BaseController {

    private $giangVienModel;

    public function __construct()
    {
        $this->loadModel('GiangvienModel');
        $this->giangVienModel = new GiangvienModel;
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
                $this->view('giangvien.index') . $this->view('footers/index');
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

    public function addGiangVien()
    {
        $magv = $_POST['magv'];
        if($this->giangVienModel->addGiangVienXML())
        {
            header("location: index.php?controller=giangvien&action=index");
        } else {
            $this->giangVienModel->showError('Trùng mã giảng viên. Mã giảng viên '.$magv.' đã có trước đó');
        }
        $this->index();
    }

    public function updateGiangVienForm()
    {
        return $this->view('giangvien.update') . $this->view('footers/index');
    }

    public function updateGiangVien()
    {
        $magv = $_POST['magv'];
        if($this->giangVienModel->updateGiangVienXML())
        {
            header("location: index.php?controller=giangvien&action=index");
        } else {
            $this->giangVienModel->showError('Trùng mã giảng viên. Mã giảng viên '.$magv.' đã có trước đó');
        }
        $this->index();
    }

    public function delGiangVien()
    {
        $this->giangVienModel->delGiangVienXML();
        header("location: index.php?controller=giangvien&action=index");
    }
}