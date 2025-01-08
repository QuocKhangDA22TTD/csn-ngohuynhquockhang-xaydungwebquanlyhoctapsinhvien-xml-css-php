<?php

$maMon = $_POST["subject_id"];
$tenMon = $_POST["subject_name"];
$tclt = $_POST["TCLT"];
$tcth = $_POST["TCTH"];

$dom = new DOMDocument('1.0', 'UTF-8');

$dom->load("monhoc.xml");

$mon = $dom->documentElement;


//$dom->appendChild($mon);

// tạo nút monHoc 

$monHoc = $dom->createElement('monHoc');
$firstChild = $mon->firstChild;

// Insert the new node before the first child
$mon->insertBefore($monHoc, $firstChild);


//$mon->appendChild($monHoc);

// tạo các nút con của monHoc

$maMonHoc= $dom->createElement('maMonHoc',$maMon);
$tenMonHoc= $dom->createElement('tenMonHoc', $tenMon);
$soTCLT= $dom->createElement('soTCLT', $tclt);
$soTCTH= $dom->createElement('soTCTH', $tcth );

$monHoc->appendChild($maMonHoc);
$monHoc->appendChild($tenMonHoc);
$monHoc->appendChild($soTCLT);
$monHoc->appendChild($soTCTH);

$dom->formatOutput = false;
$dom->save('monhoc.xml');

echo "Dữ liệu đã được ghi vào kqht.xml";

header("location: ./Views/subjects/index.php");