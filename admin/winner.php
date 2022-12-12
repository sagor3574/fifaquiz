<?php
    ob_start();
    $currentpage = 'winner';
    include('inc/header.php');
    include('db.php');

?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">All Participation</h1>
        </div>
        <hr>
        <div class="container-fluid px-4">
            <div class="small text-center">
                <h2 class="text-muted">FIFA World Cup Quiz Correct List</h2>
                <hr>
            </div>
            <div class="small text-center">
            </div>
            <!--<div class="small text-center" style="display: flex;justify-content: space-between;">-->
            <!--   <h2 class="text-muted"></h2>-->
            <!--   <a class="add-new" href="all.php" style="background: #337ab7;color: white;font-size: 16px;padding: 13px;border-radius: 15px;height: 49px;">All Perticipate List</a>-->

            <!--</div>-->
            <br>
        </div>
        <?php 
              include "db.php";
              $limit = 15;
              if(isset($_GET['page'])){
                $page = $_GET['page'];
              }else{
                $page = 1;
              }
              $offset = ($page-1)*$limit;
              
              $sql = "SELECT * FROM quiz_count WHERE status='1' ORDER BY id DESC LIMIT {$offset}, {$limit}";
              
              $result = mysqli_query($conn,$sql) or die("Query Failed");
              if(mysqli_num_rows($result) > 0){
              ?>
        <table>
              <tr>
                <td>Sl</td>
                <th>Name</th>
                <th>Phone</th>
                <th>Date</th>
              </tr>
              <tbody>
                <?php 
                    while($row = mysqli_fetch_assoc($result)){
                  ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>0<?php echo $row['phone']; ?></td>
                <td><?php echo $row['perticipation_date']; ?></td>
              </tr>
              <?php 
                       }
                        }
                   ?>
              </tbody>
            </table>
            <?php 
                    $sql1 = "SELECT * FROM quiz_count";
                    $result1 = mysqli_query($conn,$sql1) or die("Query Failed");
                    if(mysqli_num_rows($result1) > 0){
                      $total_record = mysqli_num_rows($result1);
                      $total_page = ceil($total_record / $limit);
                      echo"<ul class='pagination admin-pagination' style='display: flex;justify-content: center;'>";
                      if($page>1){
                        echo'<li><a href="winner.php?page='.($page-1).'">Prev</a></li>';
                      }
                      for ($i=1; $i <= $total_page; $i++) { 
                        if($i==$page){
                          $active = 'active';
                        }else{
                          $active = '';
                        }
                        echo '<li class="'.$active.'"><a href="winner.php?page='.$i.'">'.$i.'</a></li>';
                      }
                      if($total_page>$page){
                        echo'<li><a href="winner.php?page='.($page+1).'">Next</a></li>';
                      }
                      echo"</ul>";
                    }
                  ?>
        </main>
        <?php
            include('inc/footer.php');
        ?>
        <script>
            function status_update(value,id){
                // alert(id);
                let url ="http://localhost/quiz/admin/winner.php";
                window.location.href=url+"?id="+id+"&status="+value;

            }
        </script>