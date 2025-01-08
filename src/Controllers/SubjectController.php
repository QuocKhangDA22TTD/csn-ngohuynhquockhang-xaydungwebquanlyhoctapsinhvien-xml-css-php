<?php
class SubjectController extends BaseController {

    private $subjectModel;

    public function __construct()
    {
        $this->loadModel('SubjectModel');
        $this->subjectModel = new subjectModel;
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
                $this->view('subjects.index') . $this->view('footers/index');
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

    public function addSubject()
    {
        $maMon = $_POST["subject_id"];
        if($this->subjectModel->addSubjectXML())
        {
            header("location: index.php?controller=subject&action=index");
        } else {
            $this->subjectModel->showError('Trùng mã môn học. '.'Mã môn học '.$maMon.' đã có trước đó');
        }
        $this->index();
    }

    public function delSubject()
    {
        $this->subjectModel->delSubjectXML();
        header("location: index.php?controller=subject&action=index");
    }

    public function updateSubjectForm()
    {
        return $this->view('subjects.update') . $this->view('footers/index');
    }

    public function updateSubject()
    {
        $maMon = $_POST['subjectID'];
        if($this->subjectModel->updateSubjectXML())
        {
            header('location: index.php?controller=subject&action=index');
        } else {
            $this->subjectModel->showError('Trùng mã môn học. '.'Mã môn học '.$maMon.' đã có trước đó');
        }
        $this->index();
    }
}