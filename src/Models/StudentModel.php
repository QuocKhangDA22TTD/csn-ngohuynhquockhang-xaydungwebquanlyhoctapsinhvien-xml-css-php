<?php

class studentModel extends BaseModel {

    public function addStudentXML()
    {
        $masv = $_POST["masv"];
        $tensv = $_POST["tensv"];
        $matkhau = $_POST["matkhau"];
        $gioitinh = $_POST["gioitinh"];
        $namsinh = $_POST["namsinh"];
        $noisinh = $_POST["noisinh"];
        $nganh = $_POST['nganh'];

        if($this->selectXML('sinhVien', 'sinhvien', 'masv', $masv))
        {
            $dom = new DOMDocument('1.0', 'UTF-8');

            $dom->load("./xml/sinhVien.xml");

            $dssv = $dom->documentElement;


            $sinhvien = $dom->createElement('sinhvien');
            $firstChild = $dssv->firstChild;

            $dssv->insertBefore($sinhvien, $firstChild);


            $maSinhVien= $dom->createElement('masv',$masv);
            $tenSinhVien= $dom->createElement('tensv', $tensv);
            $matKhau= $dom->createElement('matkhau', $matkhau);
            $gioiTinh= $dom->createElement('gioitinh', $gioitinh);
            $namSinh= $dom->createElement('namsinh', $namsinh);
            $noiSinh= $dom->createElement('noisinh', $noisinh);
            $nganhHoc= $dom->createElement('nganh', $nganh);

            $sinhvien->appendChild($maSinhVien);
            $sinhvien->appendChild($tenSinhVien);
            $sinhvien->appendChild($matKhau);
            $sinhvien->appendChild($gioiTinh);
            $sinhvien->appendChild($namSinh);
            $sinhvien->appendChild($noiSinh);
            $sinhvien->appendChild($nganhHoc);

            $dom->formatOutput = true;
            $dom->save('./xml/sinhVien.xml');

            return true;
        } else {
            return false;
        }
    }

    public function updateStudentXML()
    {
        $updateID = $_POST['updateID'];
        $masv = $_POST['masv'];
        $tensv = $_POST['tensv'];
        $matkhau = $_POST['matkhau'];
        $gioitinh = $_POST['gioitinh'];
        $namsinh = $_POST['namsinh'];
        $noisinh = $_POST['noisinh'];
        $nganh = $_POST['nganh'];
        
        if($this->selectXML('sinhVien', 'sinhvien', 'masv', $masv) || $updateID == $masv)
        {
            $dom = new DOMDocument();
            $dom->load('./xml/sinhVien.xml');
            
            $dssv = $dom->getElementsByTagName('sinhvien');
    
            foreach ($dssv as $sinhvien) {
                if ($sinhvien->getElementsByTagName('masv')->item(0)->nodeValue == $updateID) {
                    $sinhvien->getElementsByTagName('masv')->item(0)->nodeValue = $masv;
                    $sinhvien->getElementsByTagName('tensv')->item(0)->nodeValue = $tensv;
                    $sinhvien->getElementsByTagName('matkhau')->item(0)->nodeValue = $matkhau;
                    $sinhvien->getElementsByTagName('gioitinh')->item(0)->nodeValue = $gioitinh;
                    $sinhvien->getElementsByTagName('namsinh')->item(0)->nodeValue = $namsinh;
                    $sinhvien->getElementsByTagName('noisinh')->item(0)->nodeValue = $noisinh;
                    $sinhvien->getElementsByTagName('nganh')->item(0)->nodeValue = $nganh;
                }
            }
    
            $dom->save('./xml/sinhVien.xml');

            return true;
        } else {
            return false;
        }
    }

    public function delStudentXML()
    {
        $delID = $_POST['delID'];
        
        $dom = new DOMDocument();
        $dom->load('./xml/sinhVien.xml');
        
        $dssv = $dom->getElementsByTagName('sinhvien');
        
        foreach ($dssv as $sinhvien) {
            if ($sinhvien->getElementsByTagName('masv')->item(0)->nodeValue == $delID) {
                $sinhvien->parentNode->removeChild($sinhvien);
            }
        }
        
        $dom->save('./xml/sinhVien.xml');
    }
}