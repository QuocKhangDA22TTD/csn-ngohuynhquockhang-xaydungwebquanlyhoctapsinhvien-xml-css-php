<?php
    $updateID = $_POST['updateID'];

    $dom = new DOMDocument();
    $dom->load('./xml/hocky.xml');

    $dshocky = $dom->getElementsByTagName('hocky');
    foreach ($dshocky as $hocky) {
        if ($hocky->getElementsByTagName('maHK')->item(0)->nodeValue == $updateID) {
            $maHK = $hocky->getElementsByTagName('maHK')->item(0)->nodeValue;
            $tenHK = $hocky->getElementsByTagName('tenHK')->item(0)->nodeValue;
            $namHoc = $hocky->getElementsByTagName('namHoc')->item(0)->nodeValue;
        }
    }
?>
<div class="content">
<div class="signin">
            <div class="notice_title text-center">SỬA THÔNG TIN HỌC KỲ</div>
            <div class="signin_form">
                <h3 class="text-center mb-4">ĐIỀN THÔNG TIN</h3>
                <form action="index.php?controller=hocky&action=updateHocky" method="post">
                    <div class="row">
                        <div class="col mb-4">
                            <label for="maHK" class="form-label">Mã Học Kỳ</label>
                            <input type="text" id="maHK" class="form-control border-dark" name="maHK" value="<?php echo $maHK ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="tenHK" class="form-label">Tên Học Kỳ</label>
                            <input type="text" id="tenHK" class="form-control border-dark" name="tenHK" value="<?php echo $tenHK ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <label for="namHoc" class="form-label">Năm Học</label>
                            <input type="text" id="namHoc" class="form-control border-dark" name="namHoc" value="<?php echo $namHoc ?>" required>
                        </div>
                    </div>
                <button type="submit" class="btn w-100 btn-warning" name="updateID" value="<?php echo $updateID ?>">SỬA THÔNG TIN MÔN HỌC</button>
                </form>
            </div>
        </div>
</div>