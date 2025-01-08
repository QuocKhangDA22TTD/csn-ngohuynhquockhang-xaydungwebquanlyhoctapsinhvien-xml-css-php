<?php
class PhancongController extends BaseController {

    private $PhancongModel;

    public function __construct()
    {
        $this->loadModel('PhancongModel');
        $this->PhancongModel = new PhancongModel;
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
                $this->view('phancong.bangphancong') . $this->view('footers/index');
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

    public function addPhanCong()
    {
        $maphancong = $_POST['maphancong'];
        if($this->PhancongModel->addPhanCongXML())
        {
            header("location: index.php?controller=phancong&action=index");
        } else {
            $this->PhancongModel->showError('Trùng mã phân công hoặc học kỳ, môn học, lớp học.');
        }
        $this->index();
    }

    public function bangphancong()
    {
        if($this->isSignin())
        {
            if($_SESSION['jobtitle'] == 'quản trị viên')
            {
                $this->view('phancong.bangphancong') . $this->view('footers/index');
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

    public function delPhanCong()
    {
        $maphancong = $_POST['delID'];
        $this->PhancongModel->delPhanCongXML('phancong', 'maphancong', $maphancong);
        $this->index();
    }

    public function chuaHoanThanhPC()
    {
        $maphancong = $_POST['delID'];
        $this->PhancongModel->delPhanCongXML('ketquahoctap', 'maphancong', $maphancong);
        $this->index();
    }

    public function hoanThanhPC()
    {
        if($this->PhancongModel->xuatdiemXML())
        {
            $this->PhancongModel->showError("danh sách đã xuất ra trước đó");
        }
        $this->index();
    }
}