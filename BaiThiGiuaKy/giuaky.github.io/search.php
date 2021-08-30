<?php
    if (isset($_REQUEST['search'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['searchhome']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $sql = "SELECT can_bo.id_canbo,can_bo.ho_ten,can_bo.chuc_vu,can_bo.dt_coquan,can_bo.email,can_bo.dt_canhan,bomon.ten_bomon  
                FROM can_bo JOIN bomon ON bomon.id_bomon = can_bo.id_bomon where ho_ten like '%$search%'";
 
                // Kết nối sql
                include('connect.php');
                
                // Thực thi câu truy vấn
                $result = mysqli_query($connect, $sql);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($result);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "Có $num kết quả trả về với từ khóa:<b>$search</b>";
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    echo '<table border="1" cellspacing="0" cellpadding="10">';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo    '<td>'.$row['id_canbo'].'</td>';
                        echo    '<td>'.$row['ho_ten'].'</td>';
                        echo    '<td>'.$row['chuc_vu'].'</td>';
                        echo    '<td>'.$row['dt_coquan'].'</td>';
                        echo    '<td>'.$row['email'].'</td>';
                        echo    '<td>'.$row['dt_canhan'].'</td>';
                        echo    '<td>'.$row['ten_bomon'].'</td>';
                        
                    }
                    echo '</table>';
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
            }
        }

        if (isset($_REQUEST['search2'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['searchquantri']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $sql = "SELECT can_bo.id_canbo,can_bo.ho_ten,can_bo.chuc_vu,can_bo.dt_coquan,can_bo.email,can_bo.dt_canhan,bomon.ten_bomon  
                FROM can_bo JOIN bomon ON bomon.id_bomon = can_bo.id_bomon where ho_ten like '%$search%'";
 
                // Kết nối sql
                include('connect.php');
                
                // Thực thi câu truy vấn
                $result = mysqli_query($connect, $sql);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($result);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "Có $num kết quả trả về với từ khóa:<b>$search</b>";
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    echo '<table border="1" cellspacing="0" cellpadding="10">';
                    while ($row = mysqli_fetch_assoc($result)) {
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
                    }
                    echo '</table>';
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
            }
        }
    
        if(isset($_REQUEST['locbomon'])){
            include('connect.php');
            $selected = $_GET['selectbomon'];
            $sql = "SELECT can_bo.id_canbo,can_bo.ho_ten,can_bo.chuc_vu,can_bo.dt_coquan,can_bo.email,can_bo.dt_canhan,bomon.ten_bomon  
            FROM can_bo JOIN bomon ON bomon.id_bomon = can_bo.id_bomon where can_bo.id_bomon = '$selected'";

            // Thực thi câu truy vấn
            $result = mysqli_query($connect, $sql);

            // Đếm số đong trả về trong sql.
            $num = mysqli_num_rows($result);

            // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
            if ($num > 0) 
            {
                // Dùng $num để đếm số dòng trả về.
                echo "$num Kết quả trả về";

                // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo    '<td>'.$row['ho_ten'].'</td>';
                    echo    '<td>'.$row['chuc_vu'].'</td>';
                    echo    '<td>'.$row['dt_coquan'].'</td>';
                    echo    '<td>'.$row['email'].'</td>';
                    echo    '<td>'.$row['dt_canhan'].'</td>';
                    echo    '<td>'.$row['ten_bomon'].'</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } 
            else {
            echo 'Please select the value.';
            }
        }

        

        
?>