<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <title>Document</title>
</head>

<body>
    <?php 
        session_start();
        if (!isset($_SESSION['username'])){
            die('bạn chưa đăng nhập');
        }
    ?>
    <h1>Quản Trị</h1>
    <p><a href="khoa.php">Khoa</a></p>
    <p><a href="bomon.php">Bộ Môn</a></p>
    <p><a href="canbo.php">Cán Bộ</a></p>

    <form action="search.php" method="get">
        Search: <input type="text" name="searchquantri" />
        <input type="submit" name="search2" value="search" /> 

        Chọn khoa: <select name="selectkhoa">
            <option value="" disabled selected>Choose option</option>
            <?php
            include('connect.php');
            
            $sql = "SELECT * from khoa";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0) {
                while ( $row = mysqli_fetch_assoc($result) ) {
            ?>
            <option value="<?=$row["id_khoa"];?>"><?=$row["ten_khoa"];?></option>
            <?php       
                }
            }
            ?>
        </select>   
        <input type="submit" name="lockhoa" value="Lọc" /> 

        Chọn bộ môn:<select name="selectbomon">
            <option value="" disabled selected>Choose option</option>
            <?php
            include('connect.php');
            $sql = "SELECT * from bomon ";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    echo '<option value="'.$row["id_bomon"].'">'.$row["ten_bomon"].'</option>';
                }
            }
            ?>
        </select>
        <input type="submit" name="locbomon" value="Lọc"/> 
        
    </form>
</body>

</html>