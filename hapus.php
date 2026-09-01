<?php
require_once 'config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $sql = "DELETE FROM pegawai WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: pegawai.php?msg=deleted");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: pegawai.php");
}
?>
