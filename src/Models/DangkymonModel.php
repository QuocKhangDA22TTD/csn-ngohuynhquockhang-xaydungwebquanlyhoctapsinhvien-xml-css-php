<?php

class DangkymonModel extends BaseModel {
    public function themSVvaoLop()
    {
        $maphancong = $_POST['maphancong'];

        $xml = simplexml_load_file("./xml/phancong.xml") or die("lỗi");

        $phancong = $xml->phancong;

        foreach($phancong as $pc)
        {
            if($pc->maphancong == $maphancong)
            {
                $sv = $pc->dssinhvien->addChild('sinhvien');

                $sv->addChild('masv', $_SESSION['userid']);
                $sv->addChild('tensv', $_SESSION['username']);
                $sv->addChild('diemlan1');
                $sv->addChild('diemlan2');

                $diemlan1 = $sv->diemlan1;
                $diemlan1->addChild('diemqt1');
                $diemlan1->addChild('diemqt2');
                $diemlan1->addChild('diemqt3');
                $diemlan1->addChild('diemkt1');
                $diemlan1->addChild('diemkt2');
                $diemlan1->addChild('diemthi1');
                $diemlan1->addChild('diemthi2');
            }
        }
    
        $xml->asXML("./xml/phancong.xml");
    }

    public function xoaSVkhoiLop()
    {
        $maphancong = $_POST['maphancong'];

        $dom = new DOMDocument('1.0', 'UTF-8');

        $dom->load("./xml/phancong.xml");

        $dsphancong = $dom->getElementsByTagName('phancong');

        foreach($dsphancong as $phancong)
        {
            if($phancong->getElementsByTagName('maphancong')->item(0)->nodeValue == $maphancong)
            {
                $dssinhvien = $phancong->getElementsByTagName('dssinhvien');
                $sinhvien = $phancong->getElementsByTagName('sinhvien');

                foreach($sinhvien as $sv)
                {
                    if($sv->getElementsByTagName('masv')->item(0)->nodeValue == $_SESSION['userid'])
                    {
                        $sv->parentNode->removeChild($sv);
                    }
                }
            }
        }
        $dom->save('./xml/phancong.xml');
    }
}