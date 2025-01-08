<?php
    $masv = $_POST['masv'];
    $maphancong = $_POST['maphancong'];

    $xml = simplexml_load_file('./xml/phancong.xml') or die("lỗi");

    foreach($xml->children() as $phancong) 
    {
        if($phancong->maphancong == $maphancong)
        {
            $dssinhvien = $phancong->dssinhvien;
            foreach($dssinhvien->children() as $sv)
            {
                if($sv->masv == $masv)
                {
                    $DiemQT1 = $sv->diemlan1->diemqt1;
                    $DiemQT2 = $sv->diemlan1->diemqt2;
                    $DiemQT3 = $sv->diemlan1->diemqt3;
                    $DiemKT1 = $sv->diemlan1->diemkt1;
                    $DiemKT2 = $sv->diemlan1->diemkt2;
                    $DiemThi1 = $sv->diemlan1->diemthi1;
                    $DiemThi2 = $sv->diemlan1->diemthi2;
                }
            }
        }
    }
    $tbqt = (($DiemQT1 + $DiemQT2 + $DiemQT3) / 3) / 3;
    $tbkt = (($DiemKT1 + $DiemKT2) / 2) / 3;
    $thi1 = $DiemThi1 / 3;
    $thi2 = $DiemThi2 / 3;
    $tbmonlan1 = $tbqt + $tbkt + $thi1;
    $diemlan2 = $tbqt + $tbkt + $thi2;
?>
<div class="content">
<div class="signin">
            <div class="notice_title text-center">SỬA THÔNG TIN LỚP</div>
            <div class="signin_form">
                <h3 class="text-center mb-4">ĐIỀN THÔNG TIN</h3>
                <form action="index.php?controller=diem&action=tinhdiem" method="post">
                    <div class="row">
                        <div class="col mb-4">
                            <label for="diemqt1" class="form-label">Điểm QT 1</label>
                            <input type="text" id="diemqt1" class="form-control border-dark" name="diemqt1" value="<?php echo $DiemQT1 ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="diemqt2" class="form-label">Điểm QT 2</label>
                            <input type="text" id="diemqt2" class="form-control border-dark" name="diemqt2" value="<?php echo $DiemQT2 ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="diemqt3" class="form-label">Điểm QT 3</label>
                            <input type="text" id="diemqt3" class="form-control border-dark" name="diemqt3" value="<?php echo $DiemQT3 ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <label for="diemkt1" class="form-label">Điểm KT 1</label>
                            <input type="text" id="diemkt1" class="form-control border-dark" name="diemkt1" value="<?php echo $DiemKT1 ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="diemkt2" class="form-label">Điểm KT 2</label>
                            <input type="text" id="diemkt2" class="form-control border-dark" name="diemkt2" value="<?php echo $DiemKT2 ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="diemthi1" class="form-label">Điểm Thi 1</label>
                            <input type="text" id="diemthi1" class="form-control border-dark" name="diemthi1" value="<?php echo $DiemThi1 ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        if($tbmonlan1 < 4.0 & $DiemQT1 != '' && $DiemQT2 != '' && $DiemQT3 != '' && $DiemKT1 != '' && $DiemKT2 != '' && $DiemThi1 != '' && $DiemThi2 == '')
                        {
                        ?>
                        <div class="col mb-4">
                            <label for="diemthi2" class="form-label">Điểm Thi 2</label>
                            <input type="text" id="diemthi2" class="form-control border-dark" name="diemthi2" value="<?php echo $DiemThi2 ?>">
                        </div>
                        <?php
                        }
                        if($DiemThi2 != '')
                        {
                        ?>
                        <div class="col mb-4">
                            <label for="diemthi2" class="form-label">Điểm Thi 2</label>
                            <input type="text" id="diemthi2" class="form-control border-dark" name="diemthi2" value="<?php echo $DiemThi2 ?>">
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                <button type="submit" class="btn w-100 btn-warning" name="masv" value="<?php echo $masv ?>">LƯU KẾT QUẢ HỌC TẬP</button>
                <input class="d-none" type="text" name="maphancong" value="<?php echo $maphancong ?>">
                </form>
            </div>
        </div>
</div>