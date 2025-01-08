    <div class="content">
        <div class="subject_management">
            <div class="notice_title text-center">QUẢN LÝ MÔN HỌC</div>
            <div class="add-search_student">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_subject_form_modal">Thêm Môn Học</button>
                <form class="search d-flex" action="index.php?controller=subject&action=index" method="post">
                    <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm môn học">
                    <button type="submit" class="btn custom-search-btn"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="table-container">
                <table class="table table-striped table_custom">
                    <thead class="table_th_custom">
                        <tr>
                            <th>ID</th>
                            <th>Môn Học</th>
                            <th>Tín Chỉ Thực Hành</th>
                            <th>Tín Chỉ Lý Thuyết</th>
                            <th>Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $xml = simplexml_load_file('./xml/monhoc.xml') or die("lỗi");
                        
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
    <div class="modal fade" id="add_subject_form_modal" tabindex="-1" aria-labelledby="addSubjectFormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h3 class="modal-title custom-modal-title">Điền Thông Tin</h3>
                    <button type="button" class="btn-close" id="close_dialog" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php?controller=subject&action=addSubject" method="post">
                        <div class="mb-3">
                            <label for="subject_id" class="form-label">Mã Môn Học</label>
                            <input type="text" class="form-control" id="subject_id" name="subject_id">
                        </div>
                        <div class="mb-3">
                            <label for="subject_name" class="form-label">Tên Môn Học</label>
                            <input type="text" class="form-control" id="subject_name" name="subject_name">
                        </div>
                        <div class="mb-3">
                            <label for="TCLT" class="form-label">số tín chỉ lý thuyết</label>
                            <input type="number" class="form-control" id="TCLT" name="TCLT">
                        </div>
                        <div class="mb-3">
                            <label for="TCTH" class="form-label">số tín chỉ thực hành</label>
                            <input type="number" class="form-control" id="TCTH" name="TCTH">
                        </div>
                        <button type="submit" class="btn btn-primary w-50">Thêm Môn Học</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
