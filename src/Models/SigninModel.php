<?php

class SigninModel extends BaseModel {

    public function checkSignin($path, $child, $tagname_1, $tagname_2, $ma ,$matkhau)
    {
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->load("./xml/${path}.xml");

        $childrens = $dom->getElementsByTagName($child);

        foreach ($childrens as $children) {
            if ($children->getElementsByTagName($tagname_1)->item(0)->nodeValue == $ma) {
                if($children->getElementsByTagName($tagname_2)->item(0)->nodeValue == $matkhau)
                {
                    return true;
                    exit;
                }
            }
        }
        $dom->save("./xml/${path}.xml");
        return false;
    }

    // const TABLE = 'student';

    // public function getAllStudent($select = array('*'))
    // {
    //     return $this->getAll(self::TABLE, $select);
    // }

    // if($this->selectXML($path, $child, $tagname_1, $ma) == false && $this->selectXML($path, $child, $tagname_2, $matkhau) == false)
    // {
    //     var_dump($this->selectXML($path, $child, $tagname_1, $ma));
    //     var_dump($this->selectXML($path, $child, $tagname_2, $matkhau));
    //     return true;
    // }
    // else
    // {
    //     var_dump($this->selectXML($path, $child, $tagname_1, $ma));
    //     var_dump($this->selectXML($path, $child, $tagname_2, $matkhau));
    //     var_dump($this->selectXML($path, $child, $tagname_1, $ma) && $this->selectXML($path, $child, $tagname_2, $matkhau));
    //     return false;
    // }
}