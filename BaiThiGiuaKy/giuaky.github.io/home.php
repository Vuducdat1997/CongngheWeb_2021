<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <h1>Trang chủ</h1>
    <p><a href="login.php">Đăng nhập</a></p>
    <form action="search.php" method="get">
        Search: <input type="text" name="searchhome" />
        <input type="submit" name="search" value="search" /> 

        Chọn Khoa: <select name="selectkhoa">
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

        <select name="selectbomon">
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
    
    <h3>Danh sách cán bộ</h3>
    <table border="1" cellspacing="0" cellpadding="10">
    <?php 
            include('connect.php');
            $sql = "SELECT can_bo.id_canbo,can_bo.ho_ten,can_bo.chuc_vu,can_bo.dt_coquan,can_bo.email,can_bo.dt_canhan,bomon.ten_bomon  
            FROM can_bo JOIN bomon ON bomon.id_bomon = can_bo.id_bomon";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    echo '<tr>';
                    echo    '<td>'.$row['id_canbo'].'</td>';
                    echo    '<td>'.$row['ho_ten'].'</td>';
                    echo    '<td>'.$row['chuc_vu'].'</td>';
                    echo    '<td>'.$row['dt_coquan'].'</td>';
                    echo    '<td>'.$row['email'].'</td>';
                    echo    '<td>'.$row['dt_canhan'].'</td>';
                    echo    '<td>'.$row['ten_bomon'].'</td>';
                    echo '</tr>';
                }
            }
        ?> 
    </table><br>
</body>

</html>