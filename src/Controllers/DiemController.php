<?php
class DiemController extends BaseController {

    private $DiemModel;

    public function __construct()
    {
        session_start();
        if($_SESSION['jobtitle'] == 'giảng viên' || $_SESSION['jobtitle'] == 'quản trị viên')
        {
            $this->loadModel('DiemModel');
            $this->DiemModel = new DiemModel;
        }
        else
        {
            header('location: index.php?');
        }

        if($_SESSION['jobtitle'] == 'sinh viên')
        {
            echo $_SESSION['jobtitle'];
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
            if($_SESSION['jobtitle'] == 'giảng viên')
            {
                $this->view('diem.index') . $this->view('footers/index');
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

    public function nhapdiem()
    {
        $this->view('diem.nhapdiem') . $this->view('footers/index');
    }

    public function formnhapdiem()
    {
        $this->view('diem.formnhapdiem') . $this->view('footers/index');
    }

    public function tinhdiem()
    {
        $maphancong = $_POST['maphancong'];
        $masv = $_POST['masv'];

        $diemqt1 = $_POST['diemqt1'];
        $diemqt2 = $_POST['diemqt2'];
        $diemqt3 = $_POST['diemqt3'];
        $diemkt1 = $_POST['diemkt1'];
        $diemkt2 = $_POST['diemkt2'];
        $diemthi1 = $_POST['diemthi1'];
        $diemthi2 = $_POST['diemthi2'];

        $this->DiemModel->luudiemXML($diemqt1, $diemqt2, $diemqt3, $diemkt1, $diemkt2, $diemthi1, $diemthi2);
        $this->view('diem.nhapdiem') . $this->view('footers/index');
    }

    public function xuatdiem()
    {
        if($this->DiemModel->xuatdiemXML())
        {
            $this->DiemModel->showError("danh sách đã xuất ra trước đó");
        }
        else
        {
            $this->DiemModel->showError("xuất danh sách thành công");
        }
        $this->view('diem.nhapdiem') . $this->view('footers/index');
    }
}