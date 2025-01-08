<?php

class BaseController {
    const VIEW_FOLDER_NAME = 'Views';
    const MODEL_FOLDER_NAME = 'Models';

    protected function isSignin()
    {
        return isset($_SESSION['signin']) && $_SESSION['signin'] === true;
    }

    protected function view($viewPath) 
    {
        $viewPath = self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $viewPath) . '.php';
        return require $viewPath;
    }

    protected function loadModel($modelPath) 
    {
        require self::MODEL_FOLDER_NAME . '/' . $modelPath . '.php';
    }

    protected function adminHeader()
    {
        return $this->view('headers.index') . $this->adminNavigation();
    }

    protected function studentHeader()
    {
        return $this->view('headers.index') . $this->studentNavigation();
    }

    protected function teacherHeader()
    {
        return $this->view('headers.index') . $this->teacherNavigation();
    }

    protected function headerToSignin()
    {
        header('location: index.php?controller=signin&action=index');
    }

    protected function adminNavigation()
    {
        return $this->view('navigations.index');
    }

    protected function studentNavigation()
    {
        return $this->view('navigations.sinhvien');
    }

    protected function teacherNavigation()
    {
        return $this->view('navigations.giangvien');
    }
}