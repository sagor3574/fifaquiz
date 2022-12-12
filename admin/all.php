<?php
    ob_start();
    $currentpage = 'all';
    include('inc/header.php');
    include('db.php');

?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">All Participation</h1>
        </div>
        <hr>
        <div class="container-fluid px-4">
            <div class="small text-center" style="display: flex;justify-content: space-between;">
                <h2 class="text-muted">FIFA World Cup Quiz Perticipate List</h2>
                <a class="add-new" href="export.php" style="background: #337ab7;color: white;font-size: 16px;padding: 13px;border-radius: 5px;height: 49px;">Export Data</a>
            </div>
            <div class="small text-center">
            </div>
        </div>
        <?php 
              include "db.php";
              if(isset($_GET['id']) && isset($_GET['status'])){
                $id = $_GET['id'];
                $status = $_GET['status'];
                mysqli_query($conn,"UPDATE quiz_count set status= '$status' WHERE id= '$id'");
                header("Location:{$hostname}/all.php");
                ob_end_flush();
              }
              $limit = 3500;
              if(isset($_GET['page'])){
                $page = $_GET['page'];
              }else{
                $page = 1;
              }
              $offset = ($page-1)*$limit;
              
              $sql = "SELECT * FROM quiz_count ORDER BY id DESC LIMIT {$offset}, {$limit}";
              
              $result = mysqli_query($conn,$sql) or die("Query Failed");
              if(mysqli_num_rows($result) > 0){
              ?>
        <table>
              <tr>
                <td>Sl</td>
                <th>Name</th>
                <th>Phone</th>
                <th>Question1</th>
                <th>Question2</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
              <tbody>
                <?php 
                    while($row = mysqli_fetch_assoc($result)){
                  ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>0<?php echo $row['phone']; ?></td>
                <td><?php echo $row['question1']; ?></td>
                <td><?php echo $row['question2']; ?></td>
                <td><?php echo $row['perticipation_date']; ?></td>
                <td>
                    <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['id']; ?>')">
                <?php 
                if($row['status']==0){
                  echo "<option style='background-color: #dee130;color:#fff;' value='0' selected>Pending</option>
                        <option value='1'>Correct</option>
                        <option value='2'>Wrong</option>";
                }

                elseif($row['status']==1){
                  echo "<option value='0'>Pending</option>
                        <option style='background-color: #038b43;color:#fff;' value='1' selected>Correct</option>
                        <option value='2' >Wrong</option>";
                }
                elseif($row['status']==2){
                  echo"<option value='0'>Pending</option>
                       <option value='1'>Correct</option>
                       <option style='background-color: #e73e3e;color:#fff;' value='2' selected>Wrong</option>";
                }
                ?>
                </select>
                </td>
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
                        echo'<li><a href="all.php?page='.($page-1).'">Prev</a></li>';
                      }
                      for ($i=1; $i <= $total_page; $i++) { 
                        if($i==$page){
                          $active = 'active';
                        }else{
                          $active = '';
                        }
                        echo '<li class="'.$active.'"><a href="all.php?page='.$i.'">'.$i.'</a></li>';
                      }
                      if($total_page>$page){
                        echo'<li><a href="all.php?page='.($page+1).'">Next</a></li>';
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
                let url ="https://localhost/fifa/admin/all.php";
                window.location.href=url+"?id="+id+"&status="+value;

            }
        </script>