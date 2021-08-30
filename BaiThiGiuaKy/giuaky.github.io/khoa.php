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
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
            include('connect.php');
            $sql = "SELECT * FROM khoa";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    echo '<tr>';
                    echo    '<td>'.$row['id_khoa'].'</td>';
                    echo    '<td>'.$row['ten_khoa'].'</td>';
                    echo    ' <td><a href="edit.php?khoaid='.$row['id_khoa'].'">Edit</a></td>';
                    echo    '<td><a href="delete.php?khoaid='.$row['id_khoa'].'">Delete</a></td>';
                    echo '</tr>';
            }
        }

        ?>
    </table><br>
    <div class="button">
        <button class="btn btn-success"><a href="add.php?khoa">ADD</a></button><br>
    </div>
</body>

</html>