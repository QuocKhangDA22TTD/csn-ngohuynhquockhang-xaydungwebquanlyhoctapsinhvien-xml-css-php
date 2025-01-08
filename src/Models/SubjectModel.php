<?php

class SubjectModel extends BaseModel {

    public function addSubjectXML()
    {
        $maMon = $_POST["subject_id"];
        $tenMon = $_POST["subject_name"];
        $tclt = $_POST["TCLT"];
        $tcth = $_POST["TCTH"];

        if($this->selectXML('monhoc', 'monHoc', 'maMonHoc', $maMon))
        {
            $dom = new DOMDocument('1.0', 'UTF-8');

            $dom->load("./xml/monhoc.xml");

            $mon = $dom->documentElement;


            $monHoc = $dom->createElement('monHoc');
            $firstChild = $mon->firstChild;

            $mon->insertBefore($monHoc, $firstChild);


            $maMonHoc= $dom->createElement('maMonHoc',$maMon);
            $tenMonHoc= $dom->createElement('tenMonHoc', $tenMon);
            $soTCLT= $dom->createElement('soTCLT', $tclt);
            $soTCTH= $dom->createElement('soTCTH', $tcth );

            $monHoc->appendChild($maMonHoc);
            $monHoc->appendChild($tenMonHoc);
            $monHoc->appendChild($soTCLT);
            $monHoc->appendChild($soTCTH);

            $dom->formatOutput = false;
            $dom->save('./xml/monhoc.xml');

            return true;
        } else {
            return false;
        }
    }

    public function delSubjectXML()
    {
        $delID = $_POST['delID'];
        
        $dom = new DOMDocument();
        $dom->load('./xml/monhoc.xml');
        
        $monHocs = $dom->getElementsByTagName('monHoc');
        
        foreach ($monHocs as $monHoc) {
            if ($monHoc->getElementsByTagName('maMonHoc')->item(0)->nodeValue == $delID) {
                $monHoc->parentNode->removeChild($monHoc);
            }
        }
        
        $dom->save('./xml/monhoc.xml');
    }

    public function updateSubjectXML()
    {
        $updateID = $_POST['updateID'];
        $maMon = $_POST['subjectID'];
        $tenMon = $_POST['subjectName'];
        $TCLT = $_POST['TCLT'];
        $TCTH = $_POST['TCTH'];

        // echo $updateID;
        // echo $maMon;

        // var_dump($this->selectXML('monhoc', 'monHoc', 'maMonHoc', $maMon));

        if($this->selectXML('monhoc', 'monHoc', 'maMonHoc', $maMon) || $updateID == $maMon)
        {
            $dom = new DOMDocument();
            $dom->load('./xml/monhoc.xml');
            
            $monHocs = $dom->getElementsByTagName('monHoc');

            foreach ($monHocs as $monHoc) {
                if ($monHoc->getElementsByTagName('maMonHoc')->item(0)->nodeValue == $updateID) {
                    $monHoc->getElementsByTagName('maMonHoc')->item(0)->nodeValue = $maMon;
                    $monHoc->getElementsByTagName('tenMonHoc')->item(0)->nodeValue = $tenMon;
                    $monHoc->getElementsByTagName('soTCLT')->item(0)->nodeValue = $TCLT;
                    $monHoc->getElementsByTagName('soTCTH')->item(0)->nodeValue = $TCTH;
                }
            }

            $dom->save('./xml/monhoc.xml');
            return true;
        } else {
            return false;
        }
    }
}
