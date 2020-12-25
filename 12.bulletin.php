<?php
    error_reporting(0);
    session_start();
    if (!isset($_SESSION["id"])){//防止直接登入網址
        echo "請登入系統";
        echo "<meta http-equiv='refresh' content='3; url='login.html'>";
    }else{
        echo "歡迎 {$_SESSION['id']} 登入 [<a href=logout.php>登出</a>]<p>[<a href=bulletin_add_form.php>新增佈告</a>]<p>";//登入
        $conn=mysqli_connect("localhost","root","", "mydb");//連結資料庫
        $result=mysqli_query($conn, "select * from bulletin");//連結bulletin
        echo "<table border=2><tr><td>佈告操作</td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";//表格
        while ($row=mysqli_fetch_array($result)){//資料庫的值
            echo "<tr><td>";
            echo "<a href=bulletin_edit_form.php?bid='$row[bid]'>修改</a> <a href=delete.php?bid={$row[bid]}>刪除</a>";
            echo "</td><td>";
            echo $row[bid];
            echo "</td><td>";
            echo $row[type];
            echo "</td><td>"; 
            echo $row[title];
            echo "</td><td>";
            echo $row[content]; 
            echo "</td><td>";
            echo $row[time];
            echo "</td></tr>";
        }
        echo "</table>";
    }
?>
