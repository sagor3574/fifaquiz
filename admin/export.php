<?php 
    include "db.php";
    $sql = "SELECT * FROM quiz_count";
    $result = mysqli_query($conn,$sql);
    $html = '<table><tr><td>Id</td><td>Name</td><td>Phone</td><td>Date</td></tr>';
    while($row = mysqli_fetch_assoc($result)){
        $html.='<tr><td>'.$row['id'].'</td><td>'.$row['name'].'</td><td>'.$row['phone'].'</td><td>'.$row['perticipation_date'].'</td></tr>';
    }
    $html.='</table>';
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename="Quiz_Data.xls"');
    echo $html;
?>