<?php

class GiangvienModel extends BaseModel {
    
    public function addGiangVienXML()
    {
        $magv = $_POST["magv"];
        $matkhau = $_POST["matkhau"];
        $tengv = $_POST["tengv"];
        $gioitinh = $_POST["gioitinh"];
        $namsinh = $_POST["namsinh"];
        $noisinh = $_POST["noisinh"];
        $sdt = $_POST['sdt'];

        if($this->selectXML('giangvien', 'giangvien', 'magv', $magv))
        {
            $dom = new DOMDocument('1.0', 'UTF-8');

            $dom->load("./xml/giangvien.xml");

            $dsgiangvien = $dom->documentElement;


            $giangvien = $dom->createElement('giangvien');
            $firstChild = $dsgiangvien->firstChild;

            $dsgiangvien->insertBefore($giangvien, $firstChild);


            $maGiangVien= $dom->createElement('magv',$magv);
            $tenGiangVien= $dom->createElement('tengv', $tengv);
            $matKhau= $dom->createElement('matkhau', $matkhau);
            $gioiTinh= $dom->createElement('gioitinh', $gioitinh);
            $namSinh= $dom->createElement('namsinh', $namsinh);
            $noiSinh= $dom->createElement('noisinh', $noisinh);
            $soDienThoai= $dom->createElement('sdt', $sdt);

            $giangvien->appendChild($maGiangVien);
            $giangvien->appendChild($tenGiangVien);
            $giangvien->appendChild($matKhau);
            $giangvien->appendChild($gioiTinh);
            $giangvien->appendChild($namSinh);
            $giangvien->appendChild($noiSinh);
            $giangvien->appendChild($soDienThoai);

            $dom->formatOutput = true;
            $dom->save('./xml/giangvien.xml');

            return true;
        } else {
            return false;
        }
    }

    public function updateGiangVienXML()
    {
        $updateID = $_POST['updateID'];
        $magv = $_POST['magv'];
        $matkhau = $_POST['matkhau'];
        $tengv = $_POST['tengv'];
        $gioitinh = $_POST['gioitinh'];
        $namsinh = $_POST['namsinh'];
        $noisinh = $_POST['noisinh'];
        $sdt = $_POST['sdt'];
        
        if($this->selectXML('giangvien', 'giangvien', 'magv', $magv) || $updateID == $magv)
        {
            $dom = new DOMDocument('1.0', 'UTF-8');

            $dom->load("./xml/giangvien.xml");

            $dsgiangvien = $dom->getElementsByTagName('giangvien');

            foreach ($dsgiangvien as $giangvien) {
                if ($giangvien->getElementsByTagName('magv')->item(0)->nodeValue == $updateID) {
                    $giangvien->getElementsByTagName('magv')->item(0)->nodeValue = $magv;
                    $giangvien->getElementsByTagName('tengv')->item(0)->nodeValue = $tengv;
                    $giangvien->getElementsByTagName('matkhau')->item(0)->nodeValue = $matkhau;
                    $giangvien->getElementsByTagName('gioitinh')->item(0)->nodeValue = $gioitinh;
                    $giangvien->getElementsByTagName('namsinh')->item(0)->nodeValue = $namsinh;
                    $giangvien->getElementsByTagName('noisinh')->item(0)->nodeValue = $noisinh;
                    $giangvien->getElementsByTagName('sdt')->item(0)->nodeValue = $sdt;
                }
            }
            $dom->save('./xml/giangvien.xml');

            return true;
        } else {
            return false;
        }
    }

    public function delGiangVienXML()
    {
        $delID = $_POST['delID'];
    
        $dom = new DOMDocument();
        $dom->load('./xml/giangvien.xml');
        
        $dsgiangvien = $dom->getElementsByTagName('giangvien');
        
        foreach ($dsgiangvien as $giangvien) {
            if ($giangvien->getElementsByTagName('magv')->item(0)->nodeValue == $delID) {
                $giangvien->parentNode->removeChild($giangvien);
            }
        }
        
        $dom->save('./xml/giangvien.xml');
    }
}