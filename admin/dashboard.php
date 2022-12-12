<?php
    $currentpage = 'dashboard';
    include('inc/header.php');
    include('db.php');

?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
        <hr>
        <div class="container-fluid px-4">
            <div class="small text-center">
                <h2 class="text-muted">FIFA World Cup Quiz 2022</h2>
            </div>
            <hr>
            <div class="small text-center" style="display: flex;justify-content: space-around;align-items: center;">
                <h3 class="text-muted" style="background: #0f6e84;padding: 50px;color: white !important;border-radius: 10px;">Total Perticipet: <span><br>
                    <?php 
                        $query = "SELECT * FROM quiz_count where id";
                        $result = mysqli_query($conn,$query);
                        $row = mysqli_num_rows($result);
                        echo $row;
                    ?>
                </span></h3>
                <h3 class="text-muted" style="background: #40b70b;padding: 50px;color: white !important;border-radius: 10px;">Total Correct: <span><br>
                    <?php 
                        $query1 = "SELECT * FROM quiz_count WHERE status='1'";
                        $result1 = mysqli_query($conn,$query1);
                        $row1 = mysqli_num_rows($result1);
                        echo $row1;
                    ?>
                </span></h3>
                <h3 class="text-muted" style="background: #d51b35;padding: 50px;color: white !important;border-radius: 10px;">Total Wrong: <span><br>
                    <?php 
                        $query2 = "SELECT * FROM quiz_count WHERE status='2'";
                        $result2 = mysqli_query($conn,$query2);
                        $row2 = mysqli_num_rows($result2);
                        echo $row2;
                    ?>
                </span></h3>
                <h3 class="text-muted" style="background: #84840f;padding: 50px;color: white !important;border-radius: 10px;">Total Pending: <span><br>
                    <?php 
                        $query3 = "SELECT * FROM quiz_count WHERE status='0'";
                        $result3 = mysqli_query($conn,$query3);
                        $row3 = mysqli_num_rows($result3);
                        echo $row3;
                    ?>
                </span></h3>
            </div>
        </div>
        </main>
<?php
    include('inc/footer.php');
?>