<?php
    $dom_hocky = new DOMDocument();
    $dom_hocky->load('./xml/hocky.xml');
    $dom_monhoc = new DOMDocument();
    $dom_monhoc->load('./xml/monhoc.xml');
    $dom_giangvien = new DOMDocument();
    $dom_giangvien->load('./xml/giangvien.xml');
    $dom_lop = new DOMDocument();
    $dom_lop->load('./xml/lop.xml');

    $dshocky = $dom_hocky->getElementsByTagName('hocky');
    $dsmonhoc = $dom_monhoc->getElementsByTagName('monHoc');
    $dsgiangvien = $dom_giangvien->getElementsByTagName('giangvien');
    $dslop = $dom_lop->getElementsByTagName('lop');
?>
<div class="content">
<div class="signin">
            <div class="notice_title text-center">PHÂN CÔNG</div>
            <div class="signin_form">
                <h3 class="text-center mb-4">ĐIỀN THÔNG TIN</h3>
                <form action="index.php?controller=phancong&action=addPhanCong" method="post">
                    <div class="row">
                        <div class="col mb-4">
                            <label for="maphancong" class="form-label">ID</label>
                            <input type="text" id="maphancong" class="form-control border-dark" name="maphancong" required>
                        </div>
                        <div class="col mb-4">
                            <label for="hocky" class="form-label">Học Kỳ</label>
                            <select class="form-select border-dark" id="hocky" name="hocky">
                                <?php
                                    foreach ($dshocky as $hocky) {
                                        $mahocky = $hocky->getElementsByTagName('maHK')->item(0)->nodeValue;
                                        $tenhocky = $hocky->getElementsByTagName('tenHK')->item(0)->nodeValue;
                                        echo '<option value="'.$tenhocky.'">'.$tenhocky.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <label for="monhoc" class="form-label">Môn Học</label>
                            <select class="form-select border-dark" id="monhoc" name="monhoc">
                                <?php
                                    foreach ($dsmonhoc as $monhoc) {
                                        $mamonhoc = $monhoc->getElementsByTagName('maMonHoc')->item(0)->nodeValue;
                                        $tenmonhoc = $monhoc->getElementsByTagName('tenMonHoc')->item(0)->nodeValue;
                                        echo '<option value="'.$tenmonhoc.'">'.$tenmonhoc.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col mb-4">
                            <label for="giangvien" class="form-label">Giảng Viên</label>
                            <select class="form-select border-dark" id="giangvien" name="giangvien">
                                <?php
                                    foreach ($dsgiangvien as $giangvien) {
                                        $magiangvien = $giangvien->getElementsByTagName('magv')->item(0)->nodeValue;
                                        $tengiangvien = $giangvien->getElementsByTagName('tengv')->item(0)->nodeValue;
                                        echo '<option value="'.$tengiangvien.'">'.$tengiangvien.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <label for="lop" class="form-label">Lớp</label>
                            <select class="form-select border-dark" id="lop" name="lop">
                                <?php
                                    foreach ($dslop as $lop) {
                                        $malop = $lop->getElementsByTagName('malop')->item(0)->nodeValue;
                                        $tenlop = $lop->getElementsByTagName('tenlop')->item(0)->nodeValue;
                                        echo '<option value="'.$tenlop.'">'.$tenlop.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                <button type="submit" class="btn w-100 btn-warning" name="updateID" value="<?php echo $updateID ?>">LƯU PHÂN CÔNG</button>
                </form>
            </div>
        </div>
</div>