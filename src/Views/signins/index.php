
    <div class="content">
        <div class="signin">
            <div class="notice_title text-center">ĐĂNG NHẬP</div>
            <div class="signin_form">
                <h3 class="text-center mb-4">Đăng nhập tài khoản</h3>
                <form action="index.php?controller=signin&action=signin" method="post">
                    <div class="custom-field d-flex mb-4">
                        <label for="user_id" class="form-label"><i class="bi bi-person-fill"></i></label>
                        <input type="text" id="user_id" class="form-control custom-input" name="user_id" required>
                    </div>
                    <div class="custom-field d-flex mb-4">
                        <label for="person_pass" class="form-label"><i class="bi bi-lock-fill"></i></label>
                        <input type="password" id="person_pass" class="form-control custom-input-pass" name="person_pass" required>
                        <button type="button" class="hidden_and_show_pass"><i class="bi bi-eye-fill"></i></button>
                    </div>
                <button type="submit" class="btn w-100 custom-btn">Đăng Nhập</button>
                </form>
            </div>
        </div>
    </div>