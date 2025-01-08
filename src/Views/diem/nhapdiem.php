<?php $maphancong = $_POST['maphancong']; ?>
<div class="content">
        <div class="student_management">
            <div class="notice_title text-center">QUẢN LÝ ĐIỂM</div>
            <div class="add-search_student">
                <?php
                        // $xml = simplexml_load_file('./xml/ketquahoctap.xml') or die("lỗi");
                        // $hienthixuatdien = true;
                        // foreach($xml->children() as $phancong)
                        // {
                        //     if($phancong->maphancong == $phancong)
                        //     {
                        //         $hienthixuatdien = false;
                        //     }
                        // }

                        // if($hienthixuatdien == true)
                        // {
                ?>

                <form action="index.php?controller=diem&action=xuatdiem" method="post">
                    <div><button class="btn btn-primary p-2" name="maphancong" value="<?php echo $maphancong ?>"><i class="fas fa-print mx-2"></i>Xuất Danh Sách Điểm</button></div>
                </form>

                <?php
                        // }
                ?>
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
                            <th>Tên Sinh Viên</th>
                            <th>Điểm Lần 1</th>
                            <th>Điểm Lần 2</th>
                            <th>Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $xml = simplexml_load_file('./xml/phancong.xml') or die("lỗi");
                        
                        foreach($xml->children() as $phancong)
                        {
                            if($phancong->maphancong == $maphancong)
                            {
                                $dssinhvien = $phancong->dssinhvien;
                                foreach($dssinhvien->children() as $sinhvien)
                                {
                                    $diemlan1 = $sinhvien->diemlan1;
                                    $diemlan2 = $sinhvien->diemlan2;
                                    $DiemQT1 = $diemlan1->diemqt1;
                                    $DiemQT2 = $diemlan1->diemqt2;
                                    $DiemQT3 = $diemlan1->diemqt3;
                                    $DiemKT1 = $diemlan1->diemkt1;
                                    $DiemKT2 = $diemlan1->diemkt2;
                                    $DiemThi1 = $diemlan1->diemthi1;
                                    $DiemThi2 = $diemlan1->diemthi2;

                                    $tbqt = (($DiemQT1 + $DiemQT2 + $DiemQT3) / 3) / 3;
                                    $tbkt = (($DiemKT1 + $DiemKT2) / 2) / 3;
                                    $thi1 = $DiemThi1 / 3;
                                    $thi2 = $DiemThi2 / 3;
                                    $tbmonlan1 = $tbqt + $tbkt + $thi1;
                                    $diemlan2 = $tbqt + $tbkt + $thi2;
                        ?>

                        <tr>
                            <td><?php echo $sinhvien->masv; ?></td>
                            <td><?php echo $sinhvien->tensv; ?></td>
                            <td>
                            <?php
                            if(!empty($diemlan1->diemqt1) && !empty($diemlan1->diemqt2) && !empty($diemlan1->diemqt3) && !empty($diemlan1->diemkt1) && !empty($diemlan1->diemkt2) && !empty($diemlan1->diemthi1)) 
                            {
                                echo round($tbmonlan1, 1);
                            }
                            ?>
                            </td>
                            <td>
                            <?php 
                            if($tbmonlan1 < 4.0 && !empty($diemlan1->diemqt1) && !empty($diemlan1->diemqt2) && !empty($diemlan1->diemqt3) && !empty($diemlan1->diemkt1) && !empty($diemlan1->diemkt2) && !empty($diemlan1->diemthi1) && empty($diemlan1->diemthi2))
                            {
                                echo 'thi lại';
                            }
                            if($tbmonlan1 > 4.0 && !empty($diemlan1->diemqt1) && !empty($diemlan1->diemqt2) && !empty($diemlan1->diemqt3) && !empty($diemlan1->diemkt1) && !empty($diemlan1->diemkt2) && !empty($diemlan1->diemthi1) && empty($diemlan1->diemthi2))
                            {
                                echo 'không thi lại';
                            }
                            if($tbmonlan1 < 4.0 && !empty($diemlan1->diemqt1) && !empty($diemlan1->diemqt2) && !empty($diemlan1->diemqt3) && !empty($diemlan1->diemkt1) && !empty($diemlan1->diemkt2) && !empty($diemlan1->diemthi1) && !empty($diemlan1->diemthi2))
                            {
                                echo round($diemlan2, 1);
                            }
                            ?>
                            </td>
                            <td>
                                <form action="index.php?controller=diem&action=formnhapdiem" method="post">
                                    <button type="submit" class="btn btn-success" name="masv" value="<?php echo $sinhvien->masv; ?>"><i class="bi bi-pencil"></i>Nhập Điểm</button>
                                    <input class="d-none" type="text" name="maphancong" value="<?php echo $maphancong; ?>">
                                </form>
                            </td>
                        </tr>

                        <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>