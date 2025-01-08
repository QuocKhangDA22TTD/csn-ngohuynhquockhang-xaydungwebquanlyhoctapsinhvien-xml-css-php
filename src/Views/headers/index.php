<?php
    if(isset($_SESSION['userid']))
    {
        $userid = $_SESSION['userid'];
    }
    else
    {
        $userid = "000000000";
    }

    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
    }
    else
    {
        $username = "Guest";
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Kết Quả Học Tập Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Public/css/home.css">
    <link rel="stylesheet" href="./Public/css/signin.css">
    <link rel="stylesheet" href="./Public/css/student_m.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a href="index.php?"><img id="logo" src="https://cdn.haitrieu.com/wp-content/uploads/2021/12/Logo-DH-Tra-Vinh-TVU.png" alt="Logo-DH-Tra-Vinh-TVU"></a>
            <ul class="navbar-nav ms-auto">
                <div class="text-center pt-3 px-2"><?php echo $username; ?></div>
                <a class="avatar" href="#"><i class="bi bi-person-circle"></i></a>
            </ul>
        </div>
    </nav>