<?php $maphancong = $_GET['maphancong']; echo $maphancong?>
<div class="content">
        <div class="student_management">
            <div class="notice_title text-center">Kết Quả Học Tập</div>
            <div class="table-container">
                <table class="table table-striped table_custom">
                    <thead class="table_th_custom">
                        <tr>
                            <th>ID</th>
                            <th>Tên Sinh Viên</th>
                            <th>Điểm Lần 1</th>
                            <th>Điểm Lần 2</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $xml = simplexml_load_file('./xml/ketquahoctap.xml') or die("lỗi");
                        
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
                                    $tbmon = $tbqt + $tbkt + $thi1;
                                    $diemlan2 = $tbqt + $tbkt + $thi2;
                        ?>

                        <tr>
                            <td><?php echo $sinhvien->masv; ?></td>
                            <td><?php echo $sinhvien->tensv; ?></td>
                            <td><?php echo round($tbmon, 1); ?></td>
                            <td>
                                <?php
                                    if($tbmon > 4.0)
                                    { 
                                        echo 'Không Thi Lại';
                                    }
                                    else
                                    {
                                        echo round($diemlan2, 1);
                                    }
                                ?>
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