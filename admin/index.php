<?php 
include "config.php";
include "header.php";

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = mysqli_real_escape_string($connection, md5($_POST['password']));
   
    $query = "SELECT username, password, role FROM users WHERE email='{$email}' AND password = '{$password}'";
    $result = mysqli_query($connection, $query) or die("Query Failed");

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['role'] = $row['role'];
         
            header("location: {$mainUrl}");
        }
    } else {
        header("location: {$mainUrl}admin?msg=failed");
    }
    
}


if(isset($_GET['msg']) == 'failed'){
    echo "<h4 style='color:red'>Email & Password Not Match</h4>";
}
if(isset($_GET['lo'])){
    echo "<h4 style='color:red'>Session Not Much Your Info</h4>";
}
?>

<div class="container h-100">
    <div class="row h-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Welcome Admin Panel</h1>
                    <p class="lead">Sign in to your account to continue</p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-4">
                            <div class="text-center">
                                <img src="../main_img/avatar6.png" alt="Andrew Jones" class="img-fluid rounded-circle" width="132" height="132">
                            </div>
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password">
                                </div>
                                <div class="text-center mt-3">
                                    <input type="submit" value="Sign in" name="submit" class="btn btn-lg btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
    body {
        background-color: #DCDCDC;
        margin-top: 20px;
    }

    .card {
        margin-bottom: 1.5rem;
        box-shadow: 0 1px 15px 1px rgba(52, 40, 104, .08);
    }

    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid #e5e9f2;
        border-radius: .2rem;
    }
</style>