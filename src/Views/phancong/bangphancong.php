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
        <div class="subject_management">
            <div class="notice_title text-center">BẢNG PHÂN CÔNG</div>
            <div class="add-search_student">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_subject_form_modal">Thêm Phân Công</button>
                <!-- <form class="search d-flex" action="" method="post">
                    <input type="text" class="form-control">
                    <button type="button" class="btn custom-search-btn"><i class="bi bi-search"></i></button>
                </form> -->
            </div>
            <div class="table-container">
                <table class="table table-striped table_custom">
                    <thead class="table_th_custom">
                        <tr>
                            <th>ID</th>
                            <th>Học Kỳ</th>
                            <th>Môn Học</th>
                            <th>Giảng Viên</th>
                            <th>Lớp</th>
                            <th>Trạng Thái</th>
                            <th>Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $xml = simplexml_load_file('./xml/phancong.xml') or die("lỗi");
                        $status = 'Chưa Hoàn Thành';

                        foreach($xml->children() as $phancong) 
                        {

                            $dom = new DOMDocument();
                            $dom->load('./xml/ketquahoctap.xml');
                            $phancong_kqht = $dom->getElementsByTagName('phancong');

                            foreach($phancong_kqht as $pc_kqht)
                            {
                                if($pc_kqht->getElementsByTagName('maphancong')->item(0)->nodeValue == $phancong->maphancong)
                                {
                                    $status = 'Đã Hoàn Thành';
                                }
                            }
                        ?>
                        <tr>
                            <td><?php echo $phancong->maphancong ?></td>
                            <td><?php echo $phancong->hocky.$phancong->namhoc ?></td>
                            <td><?php echo $phancong->monhoc ?></td>
                            <td><?php echo $phancong->giangvien ?></td>
                            <td><?php echo $phancong->lop ?></td>
                            <td>

                                <?php
                                if($status == 'Chưa Hoàn Thành')
                                { 
                                ?>

                                <form class="d-inline-block" action="index.php?controller=phancong&action=hoanThanhPC" method="post">
                                    <button type="submit" class="btn btn-secondary" name="delID" value="<?php echo $phancong->maphancong ?>"><i class="bi bi-x"></i>Chưa Hoàn Thành</button>
                                </form>

                                <?php
                                }
                                else
                                {

                                ?>
                                <form class="d-inline-block" action="index.php?controller=phancong&action=chuaHoanThanhPC" method="post">
                                    <button type="submit" class="btn btn-info" name="delID" value="<?php echo $phancong->maphancong ?>"><i class="bi bi-check-circle"></i>Hoàn Thành</button>
                                </form>

                                <?php
                                }
                                $status = 'Chưa Hoàn Thành';
                                ?>

                            </td>
                            <td>
                                <form class="d-inline-block" action="index.php?controller=phancong&action=delPhanCong" method="post">
                                    <button type="submit" class="btn btn-danger" name="delID" value="<?php echo $phancong->maphancong ?>"><i class="bi bi-trash"></i>Xóa</button>
                                </form>
                                <form class="d-inline-block" action="index.php?controller=diem&action=nhapdiem" method="post">
                                    <button type="submit" class="btn btn-primary" name="maphancong" value="<?php echo $phancong->maphancong ?>"><i class="bi bi-pencil"></i>Điểm</button>
                                </form>
                                <!-- <form class="d-inline-block" action="" method="post">
                                    <button type="submit"  class="btn btn-primary"><i class="bi bi-info-circle"></i>Thông tin</button>
                                </form> -->
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_subject_form_modal" tabindex="-1" aria-labelledby="addSubjectFormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h3 class="modal-title custom-modal-title">Điền Thông Tin</h3>
                    <button type="button" class="btn-close" id="close_dialog" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php?controller=phancong&action=addPhanCong" method="post">
                        <div class="row">
                            <div class="col mb-4">
                                <label for="maphancong" class="form-label">ID</label>
                                <input type="text" id="maphancong" class="form-control border-dark" name="maphancong" required>
                            </div>
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
                                <label for="hocky" class="form-label">Học Kỳ</label>
                                <select class="form-select border-dark" id="hocky" name="hocky">
                                    <?php
                                        foreach ($dshocky as $hocky) {
                                            $mahocky = $hocky->getElementsByTagName('maHK')->item(0)->nodeValue;
                                            $tenhocky = $hocky->getElementsByTagName('tenHK')->item(0)->nodeValue;
                                            $namhoc = $hocky->getElementsByTagName('namHoc')->item(0)->nodeValue;
                                            echo '<option value="'.$tenhocky.' năm học '.$namhoc.'">'.$tenhocky.' năm học '.$namhoc.'</option>';
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
    </div>
