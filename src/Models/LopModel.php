<?php

class LopModel extends BaseModel {
    public function addLopXML()
    {
        $malop = $_POST['malop'];
        $tenlop = $_POST['tenlop'];

        if($this->selectXML('lop', 'lop', 'malop', $malop))
        {
            $dom = new DOMDocument('1.0', 'UTF-8');

            $dom->load("./xml/lop.xml");

            $dslop = $dom->documentElement;


            $lop = $dom->createElement('lop');
            $firstChild = $dslop->firstChild;

            $dslop->insertBefore($lop, $firstChild);


            $malophoc = $dom->createElement('malop',$malop);
            $tenlophoc = $dom->createElement('tenlop', $tenlop);

            $lop->appendChild($malophoc);
            $lop->appendChild($tenlophoc);

            $dom->formatOutput = true;
            $dom->save('./xml/lop.xml');

            return true;
        } else {
            return false;
        }
    }

    public function updateLopXML()
    {
        $updateID = $_POST['updateID'];
        $malop = $_POST['malop'];
        $tenlop = $_POST['tenlop'];
        
        if($this->selectXML('lop', 'lop', 'malop', $malop) || $updateID == $malop)
        {
            $dom = new DOMDocument('1.0', 'UTF-8');

            $dom->load("./xml/lop.xml");

            $dslop = $dom->getElementsByTagName('lop');

            foreach ($dslop as $lop) {
                if ($lop->getElementsByTagName('malop')->item(0)->nodeValue == $updateID) {
                    $lop->getElementsByTagName('malop')->item(0)->nodeValue = $malop;
                    $lop->getElementsByTagName('tenlop')->item(0)->nodeValue = $tenlop;
                }
            }
            $dom->save('./xml/lop.xml');

            return true;
        } else {
            return false;
        }
    }

    public function delLopXML()
    {
        $delID = $_POST['delID'];
    
        $dom = new DOMDocument();
        $dom->load('./xml/lop.xml');
        
        $dslop = $dom->getElementsByTagName('lop');
        
        foreach ($dslop as $lop) {
            if ($lop->getElementsByTagName('malop')->item(0)->nodeValue == $delID) {
                $lop->parentNode->removeChild($lop);
            }
        }
        
        $dom->save('./xml/lop.xml');
    }
}