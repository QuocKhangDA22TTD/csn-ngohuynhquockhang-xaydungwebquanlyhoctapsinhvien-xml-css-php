<?php

class DiemModel extends BaseModel {
    public function luudiemXML($diemqt1, $diemqt2, $diemqt3, $diemkt1, $diemkt2, $diemthi1, $diemthi2)
    {
        $maphancong = $_POST['maphancong'];
        $masv = $_POST['masv'];

        $xml = simplexml_load_file('./xml/phancong.xml') or die("lỗi");

        foreach($xml->children() as $phancong)
        {
            if($phancong->maphancong == $maphancong)
            {
                $dssinhvien = $phancong->dssinhvien;
                foreach($dssinhvien->children() as $sinhvien)
                {
                    if($sinhvien->masv == $masv)
                    {
                        $diemlan1 = $sinhvien->diemlan1;
                        $diemlan1->diemqt1 = $diemqt1;
                        $diemlan1->diemqt2 = $diemqt2;
                        $diemlan1->diemqt3 = $diemqt3;
                        $diemlan1->diemkt1 = $diemkt1;
                        $diemlan1->diemkt2 = $diemkt2;
                        $diemlan1->diemthi1 = $diemthi1;
                        $diemlan1->diemthi2 = $diemthi2;
                    }
                }
            }
        }

        $xml->asXML('./xml/phancong.xml');

        // $tbqt = (($diemqt1 + $diemqt2 + $diemqt3) / 2) / 2;
        // $tbkt = (($diemkt1 + $diemkt2) / 2) / 2;
        // $thi = $diemthi1 / 2;

        // $tbmon = $tbqt + $tbkt + $thi;
    }

    public function xuatdiemXML()
    {
        $maphancong = $_POST['maphancong'];
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