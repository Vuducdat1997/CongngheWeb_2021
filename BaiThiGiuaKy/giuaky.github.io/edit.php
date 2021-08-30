<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        
        include 'connect.php';

        if (isset($_REQUEST['khoaid'])){
            $id1=$_GET['khoaid'];
            $query1=mysqli_query($connect,"select * from khoa where id_khoa='$id1'");
            $row1=mysqli_fetch_assoc($query1);
        }
        if (isset($_REQUEST['bomonid'])){
            $id2=$_GET['bomonid'];
            $query2=mysqli_query($connect,"select * from bomon where id_bomon='$id2'");
            $row2=mysqli_fetch_assoc($query2);
        }
        if (isset($_REQUEST['canboid'])){
            $id3=$_GET['canboid'];
            $query3=mysqli_query($connect,"select * from can_bo where id_canbo='$id3'");
            $row3=mysqli_fetch_assoc($query3);
        }

    ?>
    <?php
       if (isset($_REQUEST['khoaid'])){
        echo '<form method="POST" class="form">';
        echo '<h1>Khoa</h1>';
        echo '<label>Name: <input type="text" value="'.$row1['ten_khoa'].'" name="name"></label><br />';
        echo '<input type="submit" value="Update" name="update_name">';
            if (isset($_POST['update_name'])){
                $id=$_GET['khoaid'];
                $name=$_POST['name'];

                include_once('connect.php');

                $sql = "UPDATE `khoa` SET `ten_khoa`='$name' WHERE `id_khoa`='$id'";

                if ($connect->query($sql) === TRUE) {
                    header("Location: quantri.php");
                    echo "Sửa thành công";
                } else {
                    echo "lỗi: " . $connect->error;
                }

                $connect->close();
            }
        echo '</form>';
       }


       if (isset($_REQUEST['bomonid'])){
        echo '<form method="POST" class="form">';
        echo '<h1>Bộ môn</h1>';
        echo '<label>Name: <input type="text" value="'.$row2['ten_bomon'].'" name="name"></label><br />';
        echo '<input type="submit" value="Update" name="update_name">';
            if (isset($_POST['update_name'])){
                $id=$_GET['bomonid'];
                $name=$_POST['name'];

                include_once('connect.php');

                $sql = "UPDATE `bomon` SET ten_bomon='$name' WHERE id_bomon='$id'";

                if ($connect->query($sql) === TRUE) { 
                    header("Location: quantri.php");
                    echo "Sửa thành công";
                } else {
                    echo "lỗi: " . $connect->error;
                }

                $connect->close();
            }
        echo '</form>';
       }

       if (isset($_REQUEST['canboid'])){
        echo '<form method="POST" class="form">';
        echo '<h1>Cán Bộ</h1>';
        echo '<label>Tên: <input type="text" value="'.$row3['ho_ten'].'" name="hoten"></label><br />';
        echo '<label>Chức vụ: <input type="text" value="'.$row3['chuc_vu'].'" name="chucvu"></label><br />';
        echo '<label>Điện thoại cơ quan: <input type="text" value="'.$row3['dt_coquan'].'" name="dtcoquan"></label><br />';
        echo '<label>Email: <input type="text" value="'.$row3['email'].'" name="email"></label><br />';
        echo '<label>Điện thoại di động: <input type="text" value="'.$row3['dt_canhan'].'" name="dtdidong"></label><br />';
        echo '<input type="submit" value="Update" name="update_name">';
            if (isset($_POST['update_name'])){
                $id=$_GET['canboid'];
                $hoten=$_POST['hoten'];
                $chucvu=$_POST['chucvu'];
                $dtcoquan=$_POST['dtcoquan'];
                $email=$_POST['email'];
                $dtdidong=$_POST['dtdidong'];

                include_once('connect.php');

                $sql = "UPDATE `can_bo` SET ho_ten='$hoten', chuc_vu='$chucvu', dt_coquan='$dtcoquan', email='$email', dt_canhan='$dtdidong' WHERE id_canbo='$id'";

                if ($connect->query($sql) === TRUE) {
                    echo "Sửa thành công";
                    header("Location: quantri.php");
                } else {
                    echo "lỗi: " . $connect->error;
                }

                $connect->close();
            }
        echo '</form>';
       }
    ?>




</body>

</html>