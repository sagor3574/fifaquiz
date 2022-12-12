<?php 
 session_start();

 if(isset($_SESSION['email'])){
    header("Location: fifa/admin/dashboard.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/fav.png">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FIFA World Cup Quiz 2022 | Admin</title>
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-image:url(admin.png);background-repeat: no-repeat;background-size: 100%;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 pt-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Login</h3></div>
                                    <div class="card-body">
                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" autocomplete="off" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-4">
                                                <input type="submit" name="login" class="btn btn-lg btn-info btn-block text-white w-100" value="Login">
                                            </div>
                                        </form>

                                        <?php 
                                            if(isset($_POST['login'])){
                                                include('db.php');
                                                $email = mysqli_real_escape_string($conn, $_POST['email']);
                                                $password = $_POST['password'];
                                                $sql = "SELECT * FROM admin WHERE email ='{$email}' AND password = '{$password}'";
                                                $result = mysqli_query($conn,$sql) or die("Query Failed.");
                                                if(mysqli_num_rows($result) > 0){  
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            session_start();
                                                            $_SESSION['email'] = $row['email']; 
                                                            header("Location: dashboard.php");
                                                        }
                                                }else{
                                                    echo '<div class="alert alert-danger">Email and Password do not matched.</div>';
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="text-center small">
                            <div class="text-muted">Copyright &copy; RTV Digital 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
