<?php 

include "connection.php";

$data = explode('_',$_REQUEST['id']);
$month = $data[0];
$year = $data[1];
$arr = array (1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni','Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');


$get1 = mysqli_query($conn, "SELECT product_id, invoice_amount FROM invoices WHERE MONTH(invoice_date)='$month' AND YEAR(invoice_date)='$year' AND product_id='PRODUCT001'");
$jum1 = 0;
while($data1 = mysqli_fetch_array($get1)) {
   $jum1 = $jum1 + $data1['invoice_amount'];
}

$get2 = mysqli_query($conn, "SELECT product_id, invoice_amount FROM invoices WHERE MONTH(invoice_date)='$month' AND YEAR(invoice_date)='$year' AND product_id='PRODUCT002'");
$jum2 = 0;
while($data2 = mysqli_fetch_array($get2)) {
   $jum2 = $jum2 + $data2['invoice_amount'];
}

$get3 = mysqli_query($conn, "SELECT product_id, invoice_amount FROM invoices WHERE MONTH(invoice_date)='$month' AND YEAR(invoice_date)='$year' AND product_id='PRODUCT003'");
$jum3 = 0;
while($data3 = mysqli_fetch_array($get3)) {
   $jum3 = $jum3 + $data3['invoice_amount'];
}

$get4 = mysqli_query($conn, "SELECT product_id, invoice_amount FROM invoices WHERE MONTH(invoice_date)='$month' AND YEAR(invoice_date)='$year' AND product_id='PRODUCT004'");
$jum4 = 0;
while($data4 = mysqli_fetch_array($get4)) {
   $jum4 = $jum4 + $data4['invoice_amount'];
}

$db_data = [
   [
      "label" => $arr[$month],
      "value" => [$jum1, $jum2, $jum3, $jum4],
   ],
];

echo json_encode($db_data);

?>