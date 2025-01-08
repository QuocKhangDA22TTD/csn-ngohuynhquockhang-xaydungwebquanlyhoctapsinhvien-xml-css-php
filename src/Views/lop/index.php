    <div class="content">
        <div class="class_management">
            <div class="notice_title text-center">LỚP HỌC</div>
            <div class="add-search_student">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#info_form_modal">Thêm Lớp Học</button>
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
                            <th>Tên Lớp</th>
                            <th>CHỨC NĂNG</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $xml = simplexml_load_file('./xml/lop.xml') or die("lỗi");

                        foreach($xml->children() as $lop) 
                        {
                        ?>
                        <tr>
                            <td><?php echo $lop->malop ?></td>
                            <td><?php echo $lop->tenlop ?></td>
                            <td>
                                <form class="d-inline-block" action="index.php?controller=lop&action=updateLopForm" method="post">
                                    <button type="submit" class="btn btn-warning" name="updateID" value="<?php echo $lop->malop ?>"><i class="bi bi-pencil"></i>Sửa</button>
                                </form>
                                <form class="d-inline-block" action="index.php?controller=lop&action=delLop" method="post">
                                    <button type="submit" class="btn btn-danger" name="delID" value="<?php echo $lop->malop ?>"><i class="bi bi-trash"></i>Xóa</button>
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
                    <form action="index.php?controller=lop&action=addLop" method="post">
                    <div class="mb-3">
                            <label for="malop" class="form-label">Mã Lớp</label>
                            <input type="text" class="form-control" id="malop" name="malop">
                        </div>
                        <div class="mb-3">
                            <label for="tenlop" class="form-label">Tên Lớp</label>
                            <input type="text" class="form-control" id="tenlop" name="tenlop">
                        </div>
                        <button type="submit" class="btn btn-primary w-50">Thêm Lớp Học</button>
                    </form>
                </div>
            </div>
        </div>
    </div>