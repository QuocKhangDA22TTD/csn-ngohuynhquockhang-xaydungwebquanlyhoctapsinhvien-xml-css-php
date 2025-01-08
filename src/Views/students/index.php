    <div class="content">
        <div class="student_management">
            <div class="notice_title text-center">QUẢN LÝ SINH VIÊN</div>
            <div class="add-search_student">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#info_form_modal">Thêm Sinh Viên</button>
                <form class="search d-flex" action="index.php?controller=student&action=index" method="post">
                    <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm tên sinh viên">
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
                            <th>Ngành</th>
                            <th>Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $xml = simplexml_load_file('./xml/sinhVien.xml') or die("lỗi");

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
    <div class="modal fade" id="info_form_modal" tabindex="-1" aria-labelledby="infoFormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h3 class="modal-title custom-modal-title">Điền Thông Tin</h3>
                    <button type="button" class="btn-close" id="close_dialog" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php?controller=student&action=addStudent" method="post">
                    <div class="mb-3">
                            <label for="masv" class="form-label">Mã Sinh Viên</label>
                            <input type="text" class="form-control" id="masv" name="masv">
                        </div>
                        <div class="mb-3">
                            <label for="tensv" class="form-label">Họ Tên</label>
                            <input type="text" class="form-control" id="tensv" name="tensv">
                        </div>
                        <div class="mb-3">
                            <label for="matkhau" class="form-label">Mật Khẩu</label>
                            <input type="text" class="form-control" id="matkhau" name="matkhau">
                        </div>
                        <div class="mb-3">
                            <label for="gioitinh" class="form-label">Giới Tính</label>
                            <input type="text" class="form-control" id="gioitinh" name="gioitinh">
                        </div>
                        <div class="mb-3">
                            <label for="namsinh" class="form-label">Năm Sinh</label>
                            <input type="text" class="form-control" id="namsinh" name="namsinh">
                        </div>
                        <div class="mb-3">
                            <label for="noisinh" class="form-label">Nơi Sinh</label>
                            <input type="text" class="form-control" id="noisinh" name="noisinh">
                        </div>
                        <div class="mb-3">
                            <label for="nganh" class="form-label">Ngành</label>
                            <input type="text" class="form-control" id="nganh" name="nganh">
                        </div>
                        <button type="submit" class="btn btn-primary w-50">Thêm Sinh viên</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_form_modal" tabindex="-1" aria-labelledby="deleteFormModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h3 class="modal-title custom-modal-title">Bạn Muốn Xóa</h3>
                    <button type="button" class="btn-close" id="close_dialog" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button class="btn btn-secondary w-25">Không</button>
                    <button class="btn btn-danger w-25">Có</button>
                </div>
            </div>
        </div>
    </div>