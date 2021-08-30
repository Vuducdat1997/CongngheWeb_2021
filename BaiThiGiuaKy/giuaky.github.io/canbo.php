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
    
    <h1>Danh Sách Cán Bộ</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Họ Tên</th>
            <th>Chức vụ</th>
            <th>Điện thoại Cơ Quan</th>
            <th>Email</th>
            <th>Điện Thoại Cá nhân</th>
            <th>Bộ Môn</th>
        </tr>
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
                    echo    ' <td><a href="edit.php?canboid='.$row['id_canbo'].'">Edit</a></td>';
                    echo    '<td><a href="delete.php?canboid='.$row['id_canbo'].'">Delete</a></td>';
                    echo '</tr>';
                }
            }
        ?> 
    </table><br>
    <div class="button">
        <button class="btn btn-success"><a href="add.php?canbo">ADD</a></button><br>
    </div>
</body>

</html>