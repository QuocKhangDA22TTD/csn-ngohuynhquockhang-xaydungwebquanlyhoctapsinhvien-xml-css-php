<div class="content">
        <div class="class_management">
            <div class="notice_title text-center">LỚP HỌC</div>
            <div class="f-end my-3">
                <!-- <form class="search d-flex" action="" method="post">
                    <input type="text" class="form-control">
                    <label for="student_data" class="form-label"><i class="bi bi-search"></i></label>
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
                                <th>Lớp Học</th>
                                <th>Chức Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $xml = simplexml_load_file('./xml/phancong.xml') or die("lỗi");

                            foreach($xml->children() as $phancong) 
                            {
                            ?>
                            <tr>
                                <td><?php echo $phancong->maphancong ?></td>
                                <td><?php echo $phancong->hocky ?></td>
                                <td><?php echo $phancong->monhoc ?></td>
                                <td><?php echo $phancong->giangvien ?></td>
                                <td><?php echo $phancong->lop ?></td>
                                <td>
                                    <?php
                                    if(isset($phancong->dssinhvien->sinhvien))
                                    {
                                        $num = 0;
                                        $dssinhvien = $phancong->dssinhvien;
                                        foreach($dssinhvien->children() as $sinhvien)
                                        {
                                            if($sinhvien->masv == $_SESSION['userid'])
                                            {
                                                $num++;
                                            }
                                        }
                                        if($num > 0)
                                        {
                                            include 'huydangky.php';
                                        }

                                        if($num == 0)
                                        {
                                            include 'dangky.php';
                                        }
                                    }
                                    else
                                    {
                                        include 'dangky.php';
                                    }
                                    ?>
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