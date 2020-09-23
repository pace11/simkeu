<?php 

include "connection.php";

$data       = $_REQUEST['data'];
$status     = substr($data, 0, 1);
$id         = substr($data, 1);
$deleted_at = $status != 'Y' ? date('Y-m-d H:i:s') : '';

$update = mysqli_query($conn, "UPDATE auth_login SET
                  auth_login_active  = NULLIF('$deleted_at', '')
                  WHERE id           = '$id'") or die (mysqli_error($conn));

if ($update) {
    echo 200;
}

?>