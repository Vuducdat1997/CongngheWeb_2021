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
<h1>Khoa</h1>
    
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Bộ môn</th>
            <th>Khoa</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
            include('connect.php');
            $sql = "SELECT bomon.id_bomon,bomon.ten_bomon,khoa.ten_khoa FROM bomon JOIN  khoa ON khoa.id_khoa = bomon.id_khoa";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    echo '<tr>';
                    echo    '<td>'.$row['id_bomon'].'</td>';
                    echo    '<td>'.$row['ten_bomon'].'</td>';
                    echo    '<td>'.$row['ten_khoa'].'</td>';
                    echo    ' <td><a href="edit.php?bomonid='.$row['id_bomon'].'">Edit</a></td>';
                    echo    '<td><a href="delete.php?bomonid='.$row['id_bomon'].'">Delete</a></td>';
                    echo '</tr>';
            }
        }

        ?>
    </table><br>
    <div class="button">
        <button class="btn btn-success"><a href="add.php?bomon">ADD</a></button><br>
    </div>
</body>

</html>