    <div class="content">
        <div class="student_management">
            <div class="notice_title text-center">QUẢN LÝ HỌC KỲ</div>
            <div class="add-search_student">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#info_form_modal">Thêm Học Kỳ</button>
                <!-- <form class="search d-flex" action="index.php?controller=hocky&action=timnamhoc" method="post">
                    <input type="text" class="form-control" placeholder="Nhập Năm Học">
                    <button type="submit" name="namhoc" type="button" class="btn custom-search-btn"><i class="bi bi-search"></i></button>
                </form> -->
            </div>
            <div class="table-container">
                <table class="table table-striped table_custom">
                    <thead class="table_th_custom">
                        <tr>
                            <th>ID</th>
                            <th>Tên Học Kỳ</th>
                            <th>Năm Học</th>
                            <th>Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $xml = simplexml_load_file('./xml/hocky.xml') or die("lỗi");

                        foreach($xml->children() as $hk) 
                        {
                        ?>
                        <tr>
                            <td><?php echo $hk->maHK ?></td>
                            <td><?php echo $hk->tenHK ?></td>
                            <td><?php echo $hk->namHoc ?></td>
                            <td>
                                <form class="d-inline-block" action="index.php?controller=hocky&action=updateHockyForm" method="post">
                                    <button type="submit" class="btn btn-warning" name="updateID" value="<?php echo $hk->maHK ?>"><i class="bi bi-pencil"></i>Sửa</button>
                                </form>
                                <form class="d-inline-block" action="index.php?controller=hocky&action=delHocky" method="post">
                                    <button type="submit" class="btn btn-danger" name="delID" value="<?php echo $hk->maHK ?>"><i class="bi bi-trash"></i>Xóa</button>
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
    <div class="modal fade" id="info_form_modal" tabindex="-1" aria-labelledby="infoFormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h3 class="modal-title custom-modal-title">Điền Thông Tin</h3>
                    <button type="button" class="btn-close" id="close_dialog" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php?controller=hocky&action=addHocky" method="post">
                    <div class="mb-3">
                            <label for="maHK" class="form-label">Mã Học Kỳ</label>
                            <input type="text" class="form-control" id="maHK" name="maHK">
                        </div>
                        <div class="mb-3">
                            <label for="tenHK" class="form-label">Tên Học Kỳ</label>
                            <input type="text" class="form-control" id="tenHK" name="tenHK">
                        </div>
                        <div class="mb-3">
                            <label for="namHoc" class="form-label">Năm Học</label>
                            <input type="text" class="form-control" id="namHoc" name="namHoc">
                        </div>
                        <button type="submit" class="btn btn-primary w-50">Thêm Học Kỳ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>