<?php
// Tạo đối tượng DOMDocument
$dom = new DOMDocument('1.0', 'UTF-8');

// Tạo phần tử gốc
$root = $dom->createElement('ketqua');
$dom->appendChild($root);

// Tạo phần tử con
$kqht = $dom->createElement('kqht');

// Tạo phần tử con
$mssv= $dom->createElement('mssv','110120001');
$monhoc= $dom->createElement('monhoc','220236');
$diemlan1= $dom->createElement('diemlan1','7');
$diemlan2= $dom->createElement('diemlan2','9');
$giangvien= $dom->createElement('giangvien','00246');

$kqht->appendChild($mssv);
$kqht->appendChild($monhoc);
$kqht->appendChild($diemlan1);
$kqht->appendChild($diemlan2);
$kqht->appendChild($giangvien);

$root->appendChild($kqht);

// Thêm thuộc tính cho phần tử con
//$child->setAttribute('id', '1');

// Ghi file XML vào hệ thống
$dom->formatOutput = true; // Để file XML đẹp hơn
$dom->save('test_kqht.xml');

echo "Dữ liệu đã được ghi vào file.xml";
?>
