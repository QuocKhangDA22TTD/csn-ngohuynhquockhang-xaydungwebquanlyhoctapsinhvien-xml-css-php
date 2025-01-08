<?php

class BaseModel extends Database {

    public function selectXML($XMLpath, $child, $tagName, $tagValue)
    {
        $dom = new DOMDocument('1.0', 'UTF-8');

        $dom->load("./xml/${XMLpath}.xml");

        $childs = $dom->getElementsByTagName($child);

        foreach ($childs as $children) {
            if ($children->getElementsByTagName($tagName)->item(0)->nodeValue == $tagValue) {
                return false;
            }
        }
        return true;
    }

    public function showError($errorText)
    {
        echo '<script>';
        echo 'alert("'. $errorText .'")';
        echo '</script>';
    }

    public function selectOneByIdXML($path, $child, $idtag, $idvalue, $tagname)
    {
        $dom = new DOMDocument('1.0', 'UTF-8');

        $dom->load("./xml/${path}.xml");

        $childs = $dom->getElementsByTagName($child);

        foreach ($childs as $children) {
            if ($children->getElementsByTagName($idtag)->item(0)->nodeValue == $idvalue) {
                return $children->getElementsByTagName($tagname)->item(0)->nodeValue;
            }
        }
    }

    public function insertOneByXML($path, $childid, $child, $XMLTag, $XMLValue)
    {
    }

    // protected $connect;

    // public function __construct()
    // {
    //     $this->connect = $this->connect();
    // }

    // public function getAll($table, $select)
    // {
    //     $column = implode(',', $select);
    //     $sql = "SELECT ${column} FROM ${table}";
    //     $query = $this->_query($sql);

    //     $data = array();

    //     while($row = mysqli_fetch_assoc($query))
    //     {
    //         array_push($data, $row);
    //     }

    //     return $data;
    // }

    // private function _query($sql)
    // {
    //     return mysqli_query($this->connect, $sql);
    // }

    // public function check($name, $pass)
    // {
    //     $name = $_REQUEST["${name}"];
    //     $pass = $_REQUEST["${pass}"];

    //     $sql = "SELECT ma_so, ten FROM sinh_vien WHERE ma_so = ${pass} AND ten = '${name}'";

    //     $query = $this->_query($sql);

    //     if($query->num_rows != 0)
    //     {
    //         $data = array();

    //         while($row = mysqli_fetch_assoc($query))
    //         {
    //             array_push($data, $row);
    //         }
            
    //         var_dump($data);

    //     } else {
    //         echo "Tài khoản đăng nhập không tồn tại";
    //     }
    // }
}