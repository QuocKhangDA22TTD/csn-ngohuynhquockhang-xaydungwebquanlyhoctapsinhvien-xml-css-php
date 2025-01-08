<?php
    $updateID = $_POST['updateID'];

    $dom = new DOMDocument();
    $dom->load('./xml/giangvien.xml');

    $dsgiangvien = $dom->getElementsByTagName('giangvien');
    foreach ($dsgiangvien as $gv) {
        if ($gv->getElementsByTagName('magv')->item(0)->nodeValue == $updateID) {
            $magv = $gv->getElementsByTagName('magv')->item(0)->nodeValue;
            $tengv = $gv->getElementsByTagName('tengv')->item(0)->nodeValue;
            $matkhau = $gv->getElementsByTagName('matkhau')->item(0)->nodeValue;
            $gioitinh = $gv->getElementsByTagName('gioitinh')->item(0)->nodeValue;
            $namsinh = $gv->getElementsByTagName('namsinh')->item(0)->nodeValue;
            $noisinh = $gv->getElementsByTagName('noisinh')->item(0)->nodeValue;
            $sdt = $gv->getElementsByTagName('sdt')->item(0)->nodeValue;
        }
    }
?>
<div class="content">
    <div class="signin">
            <div class="notice_title text-center">SỬA THÔNG TIN GIẢNG VIÊN</div>
            <div class="signin_form">
                <h3 class="text-center mb-4">ĐIỀN THÔNG TIN</h3>
                <form action="index.php?controller=giangvien&action=updateGiangVien" method="post">
                    <div class="row">
                        <div class="col mb-4">
                            <label for="magv" class="form-label">Mã Giảng Viên</label>
                            <input type="text" id="magv" class="form-control border-dark" name="magv" value="<?php echo $magv ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="tengv" class="form-label">Tên Giảng Viên</label>
                            <input type="text" id="tengv" class="form-control border-dark" name="tengv" value="<?php echo $tengv ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <label for="matkhau" class="form-label">Mật Khẩu</label>
                            <input type="text" id="matkhau" class="form-control border-dark" name="matkhau" value="<?php echo $matkhau ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="namsinh" class="form-label">Năm Sinh</label>
                            <input type="text" id="namsinh" class="form-control border-dark" name="namsinh" value="<?php echo $namsinh ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <label for="gioitinh" class="form-label">Giới Tính</label>
                            <input type="text" id="gioitinh" class="form-control border-dark" name="gioitinh" value="<?php echo $gioitinh ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="noisinh" class="form-label">Nơi Sinh</label>
                            <input type="text" id="noisinh" class="form-control border-dark" name="noisinh" value="<?php echo $noisinh ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="sdt" class="form-label">Số Điện Thoại</label>
                            <input type="text" id="sdt" class="form-control border-dark" name="sdt" value="<?php echo $sdt ?>" required>
                        </div>
                    </div>
                <button type="submit" class="btn w-100 btn-warning" name="updateID" value="<?php echo $updateID ?>">SỬA THÔNG TIN MÔN HỌC</button>
                </form>
            </div>
        </div>
</div>