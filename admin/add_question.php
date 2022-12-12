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
            <div class="small text-center">
               <h2 class="text-muted">Add New Quiz</h2>
               <hr>
            </div>
            <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="save.php" method="POST">
                      <div class="form-group">
                          <label for="question">Question</label>
                          <input type="text" name="question" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="option1">Option1</label>
                          <input type="text" name="option1" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="option2">Option2</label>
                          <input type="text" name="option2" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="option3">Option3</label>
                          <input type="text" name="option3" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="option4">Option4</label>
                          <input type="text" name="option4" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="correct">Correct</label>
                          <input type="text" name="correct" class="form-control" autocomplete="off" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
        </div>
        </main>


<?php
    include('inc/footer.php');
?>