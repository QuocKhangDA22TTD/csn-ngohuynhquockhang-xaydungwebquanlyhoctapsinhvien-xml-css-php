<?php
class SigninController extends BaseController {

    private $signinModel;

    public function __construct()
    {
        $this->loadModel('SigninModel');
        $this->signinModel = new SigninModel;
        session_start();
    }

    public function index()
    {
        // $this->header();
        return $this->view('headers.index') . $this->view('navigations.noSignin') . $this->view('signins.index') . $this->view('footers/index');
    }

    public function signin()
    {
        $ma = $_POST['user_id'];
        $matkhau = $_POST['person_pass'];

        if(round($ma / 1000000) == 110)
        {
            if($this->signinModel->checkSignin('sinhVien', 'sinhvien', 'masv', 'matkhau', $ma, $matkhau) == true)
            {
                $_SESSION['signin'] = true;
                $_SESSION['jobtitle'] = 'sinh viên';
                $_SESSION['userid'] = $ma;
                $_SESSION['username'] = $this->signinModel->selectOneByIdXML('sinhVien', 'sinhvien', 'masv', $ma, 'tensv');
                header('location: index.php?');
            }
            else
            {
                $this->signinModel->showError('sai mã số người dùng hoặc mật khẩu');
                $this->index();
                exit;
            }
        }

        if(round($ma / 1000000) == 220)
        {
            if($this->signinModel->checkSignin('giangvien', 'giangvien', 'magv', 'matkhau', $ma, $matkhau) === true)
            {
                $_SESSION['signin'] = true;
                $_SESSION['jobtitle'] = 'giảng viên';
                $_SESSION['userid'] = $ma;
                $_SESSION['username'] = $this->signinModel->selectOneByIdXML('giangvien', 'giangvien', 'magv', $ma, 'tengv');
                header('location: index.php?');
            }
            else
            {
                $this->signinModel->showError('sai mã số người dùng hoặc mật khẩu');
                $this->index();
                exit;
            }
        }

        if(round($ma / 1000000) == 330)
        {
            if($this->signinModel->checkSignin('quantrivien', 'quantrivien', 'maqtv', 'matkhau', $ma, $matkhau) === true)
            {
                $_SESSION['signin'] = true;
                $_SESSION['jobtitle'] = 'quản trị viên';
                $_SESSION['userid'] = $ma;
                $_SESSION['username'] = 'Quản trị viên';
                header('location: index.php?');
            }
            else
            {
                $this->signinModel->showError('sai mã số người dùng hoặc mật khẩu');
                $this->index();
                exit;
            }
        }
        $this->signinModel->showError('sai mã số người dùng hoặc mật khẩu');
        $this->index();
    }

    public function signout()
    {
        session_unset();
        session_destroy();
        $this->headerToSignin();
    }
}