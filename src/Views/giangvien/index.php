    <div class="content">
        <div class="teacher_management">
            <div class="notice_title text-center">QUẢN LÝ GIẢNG VIÊN</div>
            <div class="add-search_student">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_teacher_form_modal">Thêm Giảng Viên</button>
                <form class="search d-flex" action="index.php?controller=giangvien&action=index" method="post">
                    <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm tên giảng viên">
                    <button type="submit" class="btn custom-search-btn"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="table-container">
                <table class="table table-striped table_custom">
                    <thead class="table_th_custom">
                        <tr>
                            <th>ID</th>
                            <th>Họ Tên</th>
                            <th>Mật Khẩu</th>
                            <th>Giới Tính</th>
                            <th>Năm Sinh</th>
                            <th>Nơi Sinh</th>
                            <th>Số Điện Thoại</th>
                            <th>Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <?php
                        $xml = simplexml_load_file('./xml/giangvien.xml') or die("lỗi");

                        if(isset($_POST['keyword']))
                        {
                            $keyword = $_POST['keyword'];
                            include 'search.php';
                        }
                        else
                        {
                            include 'nosearch.php';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_teacher_form_modal" tabindex="-1" aria-labelledby="addSubjectFormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h3 class="modal-title custom-modal-title">Điền Thông Tin</h3>
                    <button type="button" class="btn-close" id="close_dialog" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php?controller=giangvien&action=addGiangVien" method="post">
                        <div class="mb-3">
                            <label for="magv" class="form-label">Mã Giảng Viên</label>
                            <input type="text" class="form-control" id="magv" name="magv">
                        </div>
                        <div class="mb-3">
                            <label for="tengv" class="form-label">Tên Giảng Viên</label>
                            <input type="text" class="form-control" id="tengv" name="tengv">
                        </div>
                        <div class="mb-3">
                            <label for="matkhau" class="form-label">Mật Khẩu</label>
                            <input type="text" class="form-control" id="matkhau" name="matkhau">
                        </div>
                        <div class="mb-3">
                            <label for="gioitinh" class="form-label">Giới Tính</label>
                            <input type="texttext" class="form-control" id="gioitinh" name="gioitinh">
                        </div>
                        <div class="mb-3">
                            <label for="namsinh" class="form-label">Năm Sinh</label>
                            <input type="texttext" class="form-control" id="namsinh" name="namsinh">
                        </div>
                        <div class="mb-3">
                            <label for="noisinh" class="form-label">Nơi Sinh</label>
                            <input type="text" class="form-control" id="noisinh" name="noisinh">
                        </div>
                        <div class="mb-3">
                            <label for="sdt" class="form-label">Số Điện Thoại</label>
                            <input type="texttext" class="form-control" id="sdt" name="sdt">
                        </div>
                        <button type="submit" class="btn btn-primary w-50">Thêm Giảng Viên</button>
                    </form>
                </div>
            </div>
        </div>
    </div>