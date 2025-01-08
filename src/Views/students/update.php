<?php
    $updateID = $_POST['updateID'];

    $dom = new DOMDocument();
    $dom->load('./xml/sinhVien.xml');

    $dssv = $dom->getElementsByTagName('sinhvien');
    foreach ($dssv as $sinhvien) {
        if ($sinhvien->getElementsByTagName('masv')->item(0)->nodeValue == $updateID) {
            $masv = $sinhvien->getElementsByTagName('masv')->item(0)->nodeValue;
            $tensv = $sinhvien->getElementsByTagName('tensv')->item(0)->nodeValue;
            $matkhau = $sinhvien->getElementsByTagName('matkhau')->item(0)->nodeValue;
            $gioitinh = $sinhvien->getElementsByTagName('gioitinh')->item(0)->nodeValue;
            $namsinh = $sinhvien->getElementsByTagName('namsinh')->item(0)->nodeValue;
            $noisinh = $sinhvien->getElementsByTagName('noisinh')->item(0)->nodeValue;
            $nganh = $sinhvien->getElementsByTagName('nganh')->item(0)->nodeValue;
        }
    }
?>
<div class="content">
    <div class="signin">
            <div class="notice_title text-center">SỬA THÔNG TIN SINH VIÊN</div>
            <div class="signin_form">
                <h3 class="text-center mb-4">ĐIỀN THÔNG TIN</h3>
                <form action="index.php?controller=student&action=updateStudent" method="post">
                    <div class="row">
                        <div class="col mb-4">
                            <label for="masv" class="form-label">Mã Sinh Viên</label>
                            <input type="text" id="masv" class="form-control border-dark" name="masv" value="<?php echo $masv ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="tensv" class="form-label">Tên Sinh Viên</label>
                            <input type="text" id="tensv" class="form-control border-dark" name="tensv" value="<?php echo $tensv ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <label for="matkhau" class="form-label">Mật Khẩu</label>
                            <input type="text" id="matkhau" class="form-control border-dark" name="matkhau" value="<?php echo $matkhau ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="gioitinh" class="form-label">Giới Tính</label>
                            <input type="text" id="gioitinh" class="form-control border-dark" name="gioitinh" value="<?php echo $gioitinh ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <label for="namsinh" class="form-label">Năm Sinh</label>
                            <input type="text" id="namsinh" class="form-control border-dark" name="namsinh" value="<?php echo $namsinh ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="noisinh" class="form-label">Nơi Sinh</label>
                            <input type="text" id="noisinh" class="form-control border-dark" name="noisinh" value="<?php echo $noisinh ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="nganh" class="form-label">Ngành</label>
                            <input type="text" id="nganh" class="form-control border-dark" name="nganh" value="<?php echo $nganh ?>" required>
                        </div>
                    </div>
                <button type="submit" class="btn w-100 btn-warning" name="updateID" value="<?php echo $updateID ?>">SỬA THÔNG TIN MÔN HỌC</button>
                </form>
            </div>
        </div>
</div>