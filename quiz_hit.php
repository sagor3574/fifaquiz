<?php
    session_start();
    include('db.php');
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $question1 = $_POST['question1'];
        $question2 = $_POST['question2'];
        $date = date("d M, Y");

        $phonecheck = "SELECT * FROM quiz_count where phone = '$phone' AND perticipation_date = '$date' ";
        $presult = mysqli_query($conn,$phonecheck);
        $pcount = mysqli_num_rows($presult);
        if($pcount>0){
            $_SESSION['error'] = "দুঃখিত! আপনি ইতিমধ্যে আজকে কুইজে অংশগ্রহণ করেছেন। আগামীকাল পুনরায় চেষ্টা করুন। ";
            header("Location: index.php");
        }
        else{
        $query = "INSERT INTO quiz_count (name,phone,question1,question2,perticipation_date) VALUES ('$name','$phone','$question1','$question2','$date')";
        $result = mysqli_query($conn,$query) or die(mysqli_error());
        if($result)
        {
            $_SESSION['success'] = "কুইজে অংশগ্রহণ করার জন্য আপনাকে ধন্যবাদ।";
            header("Location: index.php");
        } else{
            $_SESSION['error'] = "সঠিক তথ্য প্রদান করুন।";
            header("Location: index.php");
        }
        }

    }

?>