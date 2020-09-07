<?php 

include "connection.php";

$data = explode('_',$_REQUEST['id']);
$month = $data[0];
$year = $data[1];
$arr = array (1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni','Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');


$product1 = mysqli_num_rows(mysqli_query($conn, "SELECT product_id FROM invoices WHERE MONTH(invoice_date)='$month' AND YEAR(invoice_date)='$year' AND product_id='PRODUCT001'"));
$product2 = mysqli_num_rows(mysqli_query($conn, "SELECT product_id FROM invoices WHERE MONTH(invoice_date)='$month' AND YEAR(invoice_date)='$year' AND product_id='PRODUCT002'"));
$product3 = mysqli_num_rows(mysqli_query($conn, "SELECT product_id FROM invoices WHERE MONTH(invoice_date)='$month' AND YEAR(invoice_date)='$year' AND product_id='PRODUCT003'"));
$product4 = mysqli_num_rows(mysqli_query($conn, "SELECT product_id FROM invoices WHERE MONTH(invoice_date)='$month' AND YEAR(invoice_date)='$year' AND product_id='PRODUCT004'"));

$db_data = [
   [
        "label" => $arr[$month],
        "value" => [$product1, $product2, $product3, $product4]
   ],
];

echo json_encode($db_data);

?>