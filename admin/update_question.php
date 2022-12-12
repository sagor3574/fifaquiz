<?php
    ob_start();
    $currentpage = 'quiz';
    include('inc/header.php');
?>
<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Quiz Question</h1>
        </div>
        <hr>
        <div class="container-fluid px-4">
            <div class="small text-center">
               <h2 class="text-muted">Update Quiz</h2>
               <hr>
            </div>
            <?php 
                include "db.php";
                if(isset($_POST['submit'])){
                $qstid = mysqli_real_escape_string($conn,$_POST['id']);
                $question = mysqli_real_escape_string($conn,$_POST['question']);
                $option1 = mysqli_real_escape_string($conn,$_POST['option1']);
                $option2 = mysqli_real_escape_string($conn,$_POST['option2']);
                $option3 = mysqli_real_escape_string($conn,$_POST['option3']);
                $option4 = mysqli_real_escape_string($conn,$_POST['option4']);
                $correct = mysqli_real_escape_string($conn,$_POST['correct']);
                $date = date("d M, Y");

                $sql = "UPDATE question_list SET question = '{$question}',option1 = '{$option1}',option2 = '{$option2}',option3 = '{$option3}',option4 = '{$option4}',correct = '{$correct}' WHERE id = '{$qstid}'";
                if(mysqli_query($conn,$sql)){
                    header("Location: {$hostname}/quiz.php");
                    ob_end_flush();
                }
                }
                $id = $_GET['id'];
                $sql = "SELECT * FROM question_list WHERE id = {$id}";
                $result = mysqli_query($conn,$sql) or die("Query Failed");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group">
                          <input type="hidden" name="id"  class="form-control" value="<?php echo $row['id']; ?>" placeholder="" >
                      </div>
                      <div class="form-group">
                          <label for="question">Question</label>
                          <input type="text" name="question" class="form-control" value="<?php echo $row['question']; ?>" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="option1">Option1</label>
                          <input type="text" name="option1" class="form-control" value="<?php echo $row['option1']; ?>" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="option2">Option2</label>
                          <input type="text" name="option2" class="form-control" value="<?php echo $row['option2']; ?>" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="option3">Option3</label>
                          <input type="text" name="option3" class="form-control" value="<?php echo $row['option3']; ?>" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="option4">Option4</label>
                          <input type="text" name="option4" class="form-control" value="<?php echo $row['option4']; ?>" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="correct">Correct</label>
                          <input type="text" name="correct" class="form-control" value="<?php echo $row['correct']; ?>" autocomplete="off" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php 
                }
              }
              ?>
<!--/Form -->
              </div>
        </div>
    </main>
<?php
    include('inc/footer.php');
?>