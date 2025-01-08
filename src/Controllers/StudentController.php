<?php
class StudentController extends BaseController {

    private $studentModel;

    public function __construct()
    {
        $this->loadModel('StudentModel');
        $this->studentModel = new studentModel;
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
                 $this->view('students.index') . $this->view('footers/index');
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

    public function addStudent()
    {
        $masv = $_POST['masv'];
        if($this->studentModel->addStudentXML())
        {
            header("location: index.php?controller=student&action=index");
        } else {
            $this->studentModel->showError('Trùng mã sinh viên. Mã sinh viên '.$masv.' đã có trước đó');
        }
        $this->index();
    }

    public function updateStudentForm()
    {
        return $this->view('students.update') . $this->view('footers/index');
    }

    public function updateStudent()
    {
        $masv = $_POST['masv'];
        if($this->studentModel->updateStudentXML())
        {
            header('location: index.php?controller=student&action=index');
        } else {
            $this->studentModel->showError('Trùng mã sinh viên. Mã sinh viên '.$masv.' đã có trước đó');
        }
        $this->index();
    }

    public function delStudent()
    {
        $this->studentModel->delStudentXML();
        header("location: index.php?controller=student&action=index");
    }
}