<?php 

include "connection.php";

$data       = $_REQUEST['data'];
$status     = substr($data, 0, 1);
$id         = substr($data, 1);
$time       = date('Y-m-d H:i:s');

mysqli_query($conn, "UPDATE invoices SET
                     invoice_log_status = '$status',
                     updated_at         = '$time'
                     WHERE id           = '$id'") or die (mysqli_error($conn));

echo 200;

?>