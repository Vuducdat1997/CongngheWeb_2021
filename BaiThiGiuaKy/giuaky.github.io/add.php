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
        include ('connect.php');
        if(isset($_REQUEST['khoa'])){
            echo '<form method="POST" class="form">';
            echo '<h2>Khoa</h2>';
            echo '<label>Name: <input type="text" name="name"></label>';
            echo '<input type="submit" value="Thêm khoa" name="add_khoa">';
            if (isset($_POST['add_khoa'])){
                $name=$_POST['name'];
                include ('connect.php');
                $sql = "INSERT INTO `khoa`( `ten_khoa`) VALUES ('$name');";
                if ($connect->query($sql) === TRUE) {
                    echo "Thêm thành công";
                    header("Location: quantri.php");
                } else {
                    echo "lỗi: " . $connect->error;
                }
                $connect->close();
            }
        echo '</form>';
        }

        if(isset($_REQUEST['bomon'])){
            $sql = "SELECT * FROM khoa";
            $result = mysqli_query($connect, $sql);
            echo '<form method="POST" class="form">';
            echo '<h2>Bộ Môn</h2>';
            echo '<label>Bộ môn: <input type="text" name="name"></label><br />';
            if(mysqli_num_rows($result) > 0) {
                echo '<lable>Khoa: <lable>';
                echo '<select name="khoa">';
                while ( $row = mysqli_fetch_assoc($result) ) {
                    echo '<option value="'.$row['id_khoa'].'">'.$row['ten_khoa'].'</option>';
                }
                echo '</select></br>';
            }
            echo '<input type="submit" value="Thêm bộ môn" name="add_bomon">';
            if (isset($_POST['add_bomon'])){
                $name=$_POST['name'];
                $khoaid=$_POST['khoa'];

                include ('connect.php');

                $sql = "INSERT INTO `bomon`( `ten_bomon`, `id_khoa`) VALUES ('$name','$khoaid');";
                if ($connect->query($sql) === TRUE) {
                    echo "Thêm thành công";
                    header("Location: quantri.php");
                } else {
                    echo "lỗi: " . $connect->error;
                }

                $connect->close();
            }
        echo '</form>';
        }

        if(isset($_REQUEST['canbo'])){
            $sql = "SELECT * FROM bomon";
            $result = mysqli_query($connect, $sql);
            
            echo '<form method="POST" class="form">';
            echo '<h2>Sửa tên bộ môn</h2>';
            echo '<label>Tên: <input type="text"  name="hoten"></label><br/><br/>';
            echo '<label>Chức vụ: <input type="text" name="chucvu"></label><br/><br/>';
            echo '<label>Điện thoại cơ quan: <input type="text" name="dtcoquan"></label><br/><br/>';
            echo '<label>Email: <input type="text" name="email"></label><br/><br/>';
            echo '<label>Điện thoại cá nhân: <input type="text" name="dtdidong"></label><br/><br/>';
            if(mysqli_num_rows($result) > 0) {
                echo '<lable>Bộ Môn: <lable>';
                echo '<select name="bomon">';
                while ( $row = mysqli_fetch_assoc($result) ) {
                    echo '<option value="'.$row['id_bomon'].'">'.$row['ten_bomon'].'</option>';
                }
                echo '</select></br><br/>';
            }
            echo '<input type="submit" value="ADD" name="add_canbo">';
            if (isset($_POST['add_canbo'])){
                $hoten=$_POST['hoten'];
                $chucvu=$_POST['chucvu'];
                $dtcoquan=$_POST['dtcoquan'];
                $email=$_POST['email'];
                $dtdidong=$_POST['dtdidong'];
                $bomon=$_POST['bomon'];
                include ('connect.php');
                $sql = "INSERT INTO `can_bo`(`ho_ten`, `chuc_vu`, `dt_coquan`, `email`, `dt_canhan`, `id_bomon`) VALUES ('$hoten','$chucvu','$dtcoquan','$email','$dtdidong','$bomon')";

                if ($connect->query($sql) === TRUE) {
                    echo "Thêm thành công";
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