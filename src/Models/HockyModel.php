<?php

class HockyModel extends BaseModel {

    public function addHockyXML()
    {
        $maHK = $_POST['maHK'];
        $tenHK = $_POST['tenHK'];
        $namHoc = $_POST['namHoc'];

        if($this->selectXML('hocky', 'hocky', 'maHK', $maHK))
        {
            $dom = new DOMDocument('1.0', 'UTF-8');

            $dom->load("./xml/hocky.xml");

            $dshocky = $dom->documentElement;


            $hocky = $dom->createElement('hocky');
            $firstChild = $dshocky->firstChild;

            $dshocky->insertBefore($hocky, $firstChild);


            $maHocKy = $dom->createElement('maHK',$maHK);
            $tenHocKy= $dom->createElement('tenHK', $tenHK);
            $namHocKy= $dom->createElement('namHoc', $namHoc);

            $hocky->appendChild($maHocKy);
            $hocky->appendChild($tenHocKy);
            $hocky->appendChild($namHocKy);

            $dom->formatOutput = true;
            $dom->save('./xml/hocky.xml');

            return true;
        } else {
            return false;
        }
    }

    public function updateHockyXML()
    {
        $updateID = $_POST['updateID'];
        $maHK = $_POST['maHK'];
        $tenHK = $_POST['tenHK'];
        $namHoc = $_POST['namHoc'];
        
        if($this->selectXML('hocky', 'hocky', 'maHK', $maHK) || $updateID == $maHK)
        {
            $dom = new DOMDocument('1.0', 'UTF-8');

            $dom->load("./xml/hocky.xml");

            $dshocky = $dom->getElementsByTagName('hocky');

            foreach ($dshocky as $hocky) {
                if ($hocky->getElementsByTagName('maHK')->item(0)->nodeValue == $updateID) {
                    $hocky->getElementsByTagName('maHK')->item(0)->nodeValue = $maHK;
                    $hocky->getElementsByTagName('tenHK')->item(0)->nodeValue = $tenHK;
                    $hocky->getElementsByTagName('namHoc')->item(0)->nodeValue = $namHoc;
                }
            }
            $dom->save('./xml/hocky.xml');

            return true;
        } else {
            return false;
        }
    }

    public function delHockyXML()
    {
        $delID = $_POST['delID'];
    
        $dom = new DOMDocument();
        $dom->load('./xml/hocky.xml');
        
        $dshocky = $dom->getElementsByTagName('hocky');
        
        foreach ($dshocky as $hocky) {
            if ($hocky->getElementsByTagName('maHK')->item(0)->nodeValue == $delID) {
                $hocky->parentNode->removeChild($hocky);
            }
        }
        
        $dom->save('./xml/hocky.xml');
    }
}