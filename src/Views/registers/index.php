    <div class="content">
        <div class="student_management">
            <div class="notice_title text-center">ĐĂNG KÝ MÔN HỌC</div>
            <div class="f-end my-3">
                <form class="search d-flex" action="" method="get">
                    <input type="text" class="form-control" name="search_key">
                    <button type="submit" class="btn custom-search-btn"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="register">
                <div class="table-container">
                    <table class="table table-striped table_custom">
                        <thead class="table_th_custom">
                            <tr>
                                <th>ID</th>
                                <th>Môn Học</th>
                                <th>Giảng Viên</th>
                                <th>Số Lượng</th>
                                <th>Còn Lại</th>
                                <th>Chức Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SV002</td>
                                <td>Lịch Sử Đảng</td>
                                <td>Phạm Minh C</td>
                                <td>40</td>
                                <td>20</td>
                                <td>
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#comfirmation_form_modal"><i class="bi-clipboard-check"></i>Đăng Ký</button>
                                </td>
                            </tr>
                            <tr>
                                <td>SV003</td>
                                <td>Vi Tích Phân</td>
                                <td>Nguyễn Văn A</td>
                                <td>40</td>
                                <td>18</td>
                                <td>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#comfirmation_form_modal"><i class="bi-clipboard-check"></i>Hủy Đăng Ký</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="comfirmation_form_modal" tabindex="-1" aria-labelledby="comfirmationFormModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h3 class="modal-title custom-modal-title">Xác Nhận</h3>
                    <button type="button" class="btn-close" id="close_dialog" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button class="btn btn-secondary w-25">Không</button>
                    <button class="btn btn-danger w-25">Có</button>
                </div>
            </div>
        </div>
    </div>