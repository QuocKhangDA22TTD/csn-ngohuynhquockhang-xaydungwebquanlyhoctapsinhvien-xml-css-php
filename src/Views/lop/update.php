<?php
    $updateID = $_POST['updateID'];

    $dom = new DOMDocument();
    $dom->load('./xml/lop.xml');

    $dslop = $dom->getElementsByTagName('lop');
    foreach ($dslop as $lop) {
        if ($lop->getElementsByTagName('malop')->item(0)->nodeValue == $updateID) {
            $malop = $lop->getElementsByTagName('malop')->item(0)->nodeValue;
            $tenlop = $lop->getElementsByTagName('tenlop')->item(0)->nodeValue;
        }
    }
?>
<div class="content">
<div class="signin">
            <div class="notice_title text-center">SỬA THÔNG TIN LỚP</div>
            <div class="signin_form">
                <h3 class="text-center mb-4">ĐIỀN THÔNG TIN</h3>
                <form action="index.php?controller=lop&action=updatelop" method="post">
                    <div class="row">
                        <div class="col mb-4">
                            <label for="malop" class="form-label">Mã Lớp</label>
                            <input type="text" id="malop" class="form-control border-dark" name="malop" value="<?php echo $malop ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="tenlop" class="form-label">Tên Lớp</label>
                            <input type="text" id="tenlop" class="form-control border-dark" name="tenlop" value="<?php echo $tenlop ?>" required>
                        </div>
                    </div>
                <button type="submit" class="btn w-100 btn-warning" name="updateID" value="<?php echo $updateID ?>">SỬA THÔNG TIN MÔN HỌC</button>
                </form>
            </div>
        </div>
</div>