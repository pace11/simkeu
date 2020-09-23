<?php 

include "connection.php";

$data       = $_REQUEST['data'];
$status     = substr($data, 0, 1);
$id         = substr($data, 1);
$q          = mysqli_query($conn, "SELECT * FROM invoices_log WHERE invoice_id='$id' AND invoice_log_status='T' ORDER BY id DESC LIMIT 1");
$data       = mysqli_fetch_array($q);
$updated_at = date('Y-m-d H:i:s');

if ($data['invoice_log_status'] == 'T') {
   mysqli_query($conn, "UPDATE invoices_log SET
                        invoice_log_status = '$status',
                        updated_at         = '$updated_at'
                        WHERE id           = '$data[id]'") or die (mysqli_error($conn));
}

echo 200;

?>