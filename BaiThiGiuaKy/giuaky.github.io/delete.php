<?php
    include_once('connect.php');
    if(isset($_REQUEST['khoaid']) and $_REQUEST['khoaid']!=""){
        $id=$_GET['khoaid'];
        $sql = "DELETE FROM khoa WHERE id_khoa='$id'";
        if ($connect->query($sql) === TRUE) {
            echo "Xoá thành công!";
        } else {
            echo "Error updating record: " . $connect->error;
        }

        $connect->close();
    }
    if(isset($_REQUEST['bomonid']) and $_REQUEST['bomonid']!=""){
        $id=$_GET['bomonid'];
        $sql = "DELETE FROM bomon WHERE id_bomon='$id'";
        if ($connect->query($sql) === TRUE) {
            echo "Xoá thành công!";
        } else {
            echo "Error updating record: " . $connect->error;
        }

        $connect->close();
    }
    if(isset($_REQUEST['canboid']) and $_REQUEST['canboid']!=""){
        $id=$_GET['canboid'];
        $sql = "DELETE FROM canbo WHERE id_canbo='$id'";
        if ($connect->query($sql) === TRUE) {
            echo "Xoá thành công!";
        } else {
            echo "Error updating record: " . $connect->error;
        }

        $connect->close();
    }
?>