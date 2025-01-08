<?php

class PhancongModel extends BaseModel {
    public function addPhanCongXML()
    {
        $maphancong = $_POST["maphancong"];
        $hocky = $_POST["hocky"];
        $namhoc = $_POST["namhoc"];
        $monhoc = $_POST["monhoc"];
        $giangvien = $_POST["giangvien"];
        $lop = $_POST["lop"];

        if($this->selectXML('phancong', 'phancong', 'maphancong', $maphancong))
        {
            if($this->selectXML('phancong', 'phancong', 'giangvien', $giangvien) ||$this->selectXML('phancong', 'phancong', 'hocky', $hocky) || $this->selectXML('phancong', 'phancong', 'monhoc', $monhoc) || $this->selectXML('phancong', 'phancong', 'lop', $lop))
            {
                $dom = new DOMDocument('1.0', 'UTF-8');

                $dom->load("./xml/phancong.xml");
    
                $dsphancong = $dom->documentElement;
    
    
                $phancong = $dom->createElement('phancong');
                $firstChild = $dsphancong->firstChild;
    
                $dsphancong->insertBefore($phancong, $firstChild);
    
    
                $MaPhanCong= $dom->createElement('maphancong',$maphancong);
                $TenMonHoc= $dom->createElement('monhoc', $monhoc);
                $HocKy= $dom->createElement('hocky', $hocky);
                $namHoc= $dom->createElement('namhoc', $namhoc);
                $GiangVien= $dom->createElement('giangvien', $giangvien);
                $Lop= $dom->createElement('lop', $lop);
                $Dssinhvien= $dom->createElement('dssinhvien', '');
    
                $phancong->appendChild($MaPhanCong);
                $phancong->appendChild($TenMonHoc);
                $phancong->appendChild($HocKy);
                $phancong->appendChild($namHoc);
                $phancong->appendChild($GiangVien);
                $phancong->appendChild($Lop);
                $phancong->appendChild($Dssinhvien);
    
                $dom->formatOutput = true;
                $dom->save('./xml/phancong.xml');
    
                return true;
            }
        } else {
            return false;
        }
    }
    public function delPhanCongXML($path, $tagname, $maphancong)
    {
        $dom = new DOMDocument();
        $dom->load("./xml/${path}.xml") or die("Lỗi khi đọc tệp XML");
    
        $dsphancong = $dom->getElementsByTagName('phancong');
        foreach ($dsphancong as $phancong) {
            if($phancong->getElementsByTagName($tagname)->item(0)->nodeValue == $maphancong)
            {
                $phancong->parentNode->removeChild($phancong);
            }
        }
    
        $dom->save("./xml/${path}.xml");
    }

    public function xuatdiemXML()
    {
        $maphancong = $_POST['delID'];
        $dom = new DOMDocument();
        $dom->load('./xml/phancong.xml');
    
        $dsphancong = $dom->getElementsByTagName('phancong');
        foreach ($dsphancong as $phancong) {
            $MaPhanCong = $phancong->getElementsByTagName('maphancong')->item(0)->nodeValue;
        
            if ($phancong->getElementsByTagName('maphancong')->item(0)->nodeValue == $maphancong) {
        
                $dom_ketquahoctap = new DOMDocument('1.0', 'UTF-8');
        
                if (!file_exists('./xml/ketquahoctap.xml')) {
                    $dsketquahoctap = $dom_ketquahoctap->createElement('dsketquahoctap');
                    $dom_ketquahoctap->appendChild($dsketquahoctap);
                } else {
                    $dom_ketquahoctap->load('./xml/ketquahoctap.xml');
                    $dsketquahoctap = $dom_ketquahoctap->getElementsByTagName('dsketquahoctap')->item(0);
                }
        
                $exists = false;

                $sinhvienList = $dsketquahoctap->getElementsByTagName('phancong');
                foreach ($sinhvienList as $sinhvien) {
                    $existingName = $sinhvien->getElementsByTagName('maphancong')->item(0)->nodeValue;
                    if ($existingName == $maphancong) {
                        $exists = true;
                        return true;
                        break;
                    }
                }
        
                if (!$exists) {
                    $timeElement = $dom_ketquahoctap->createElement('time', date('Y-m-d'));

                    $new_sinhvien = $dom_ketquahoctap->importNode($phancong, true);

                    $new_sinhvien->appendChild($timeElement);
        
                    $dsketquahoctap->appendChild($new_sinhvien);
        
                    $dom_ketquahoctap->save('./xml/ketquahoctap.xml');
                }
            }
        }
    }
    
}