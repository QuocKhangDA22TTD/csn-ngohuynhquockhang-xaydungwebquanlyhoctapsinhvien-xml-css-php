<?php
    $updateID = $_POST['updateID'];

    $dom = new DOMDocument();
    $dom->load('./xml/monhoc.xml');

    $monHocs = $dom->getElementsByTagName('monHoc');
    foreach ($monHocs as $monHoc) {
        if ($monHoc->getElementsByTagName('maMonHoc')->item(0)->nodeValue == $updateID) {
            $maMon = $monHoc->getElementsByTagName('maMonHoc')->item(0)->nodeValue;
            $tenMon = $monHoc->getElementsByTagName('tenMonHoc')->item(0)->nodeValue;
            $TCLT = $monHoc->getElementsByTagName('soTCLT')->item(0)->nodeValue;
            $TCTH = $monHoc->getElementsByTagName('soTCTH')->item(0)->nodeValue;
        }
    }
?>
<div class="content">
    <div class="signin">
            <div class="notice_title text-center">SỬA THÔNG TIN MÔN HỌC</div>
            <div class="signin_form">
                <h3 class="text-center mb-4">ĐIỀN THÔNG TIN</h3>
                <form action="index.php?controller=subject&action=updateSubject" method="post">
                    <div class="row">
                        <div class="col mb-4">
                            <label for="subjectID" class="form-label">Mã Môn Học</label>
                            <input type="text" id="subjectID" class="form-control border-dark" name="subjectID" value="<?php echo $maMon ?>" required>
                        </div>
                        <div class="col mb-4">
                            <label for="subjectName" class="form-label">Tên Môn Học</label>
                            <input type="text" id="subjectName" class="form-control border-dark" name="subjectName" value="<?php echo $tenMon ?>" required>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col mb-4">
                        <label for="TCLT" class="form-label">số tín chỉ lý thuyết</label>
                        <input type="number" id="TCLT" class="form-control border-dark" name="TCLT" value="<?php echo $TCLT ?>" required>
                    </div>
                    <div class="col mb-4">
                        <label for="TCTH" class="form-label">số tín chỉ thực hành</label>
                        <input type="number" id="TCTH" class="form-control border-dark" name="TCTH" value="<?php echo $TCTH ?>" required>
                    </div>
                    </div>
                <button type="submit" class="btn w-100 btn-warning" name="updateID" value="<?php echo $updateID ?>">SỬA THÔNG TIN MÔN HỌC</button>
                </form>
            </div>
        </div>
</div>