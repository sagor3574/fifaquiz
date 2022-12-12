<?php
    $currentpage = 'quiz';
    include('inc/header.php');
    include('db.php');
?>


    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Quiz Question</h1>
        </div>
        <hr>
        <div class="container-fluid px-4">
            <div class="small text-center" style="display: flex;justify-content: space-between;">
               <h2 class="text-muted">FIFA World Cup Quiz 2022</h2>
               <a class="add-new" href="add_question.php" style="background: #337ab7;color: white;font-size: 16px;padding: 13px;border-radius: 15px;height: 49px;">Add Question</a>
            </div>
            <?php 
                  include "db.php";
                  $limit = 4;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page-1)*$limit;
                  
                  $sql = "SELECT * FROM question_list ORDER BY id DESC LIMIT {$offset}, {$limit}";
                  
                  $result = mysqli_query($conn,$sql) or die("Query Failed");
                  if(mysqli_num_rows($result) > 0){
                  ?>
            <table>
              <tr>
                <!-- <th>Sl</th> -->
                <th>Question</th>
                <th>Option1</th>
                <th>Option2</th>
                <th>Option3</th>
                <th>Option4</th>
                <th>Correct</th>
                <th>Date</th>
                <th>Edit</th>

              </tr>
              <tbody>
                  <?php 
                    while($row = mysqli_fetch_assoc($result)){
                  ?>
              <tr>
                <!-- <td><?php echo $row['id']; ?></td> -->
                <td style="text-align:left;"><?php echo $row['question']; ?></td>
                <td><?php echo $row['option1']; ?></td>
                <td><?php echo $row['option2']; ?></td>
                <td><?php echo $row['option3']; ?></td>
                <td><?php echo $row['option4']; ?></td>
                <td style="color:#28a745;font-weight: bold;"><?php echo $row['correct']; ?></td>
                <th><?php echo $row['qst_date']; ?></th>
               <td class='edit'><a href='update_question.php?id=<?php echo $row["id"] ?>'>Edit</a></td>

              </tr>
              <?php 
                       }
                   ?>
              </tbody>
                   
            </table>
            <?php 
                    }
                    $sql1 = "SELECT * FROM question_list";
                    $result1 = mysqli_query($conn,$sql1) or die("Query Failed");
                    if(mysqli_num_rows($result1) > 0){
                      $total_record = mysqli_num_rows($result1);
                      $total_page = ceil($total_record / $limit);
                      echo"<ul class='pagination admin-pagination' style='display: flex;justify-content: center;'>";
                      if($page>1){
                        echo'<li><a href="quiz.php?page='.($page-1).'">Prev</a></li>';
                      }
                      for ($i=1; $i <= $total_page; $i++) { 
                        if($i==$page){
                          $active = 'active';
                        }else{
                          $active = '';
                        }
                        echo '<li class="'.$active.'"><a href="quiz.php?page='.$i.'">'.$i.'</a></li>';
                      }
                      if($total_page>$page){
                        echo'<li><a href="quiz.php?page='.($page+1).'">Next</a></li>';
                      }
                      echo"</ul>";
                    }
                  ?>
        </div>
        </main>




<?php
    include('inc/footer.php');
?>