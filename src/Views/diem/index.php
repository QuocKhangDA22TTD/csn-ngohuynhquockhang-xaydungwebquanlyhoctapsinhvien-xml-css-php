<div class="content">
        <div class="class_management">
            <div class="notice_title text-center">Lịch Phân Công Môn Học</div>
            <div class="my-3">
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
                            <th>Năm Học</th>
                            <th>Giảng Viên</th>
                            <th>Lớp</th>
                            <th>Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $xml = simplexml_load_file('./xml/phancong.xml') or die("lỗi");

                        foreach($xml->children() as $phancong)
                        {
                            $maPhanCong = $phancong->maphancong;
                            if($phancong->giangvien == $_SESSION['username'])
                            {
                        ?>
                        <tr>
                            <td><?php echo $phancong->maphancong ?></td>
                            <td><?php echo $phancong->hocky ?></td>
                            <td><?php echo $phancong->namhoc ?></td>
                            <td><?php echo $phancong->monhoc ?></td>
                            <td><?php echo $phancong->giangvien ?></td>
                            <td><?php echo $phancong->lop ?></td>
                            <td>
                                <form class="d-inline-block" action="index.php?controller=diem&action=nhapdiem" method="post">
                                    <button type="submit" class="btn btn-primary" name="maphancong" value="<?php echo $phancong->maphancong ?>"><i class="bi bi-pencil"></i>Điểm</button>
                                </form>
                                <!-- <form class="d-inline-block" action="index.php?controller=phancong&action=delphancong" method="post">
                                    <button type="submit" class="btn btn-danger" name="delID" value="<?php //echo $phancong->maphancong ?>"><i class="bi bi-trash"></i>Xóa</button>
                                </form> -->
                                <!-- <form class="d-inline-block" action="" method="post">
                                    <button type="submit"  class="btn btn-primary"><i class="bi bi-info-circle"></i>Thông tin</button>
                                </form> -->
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>