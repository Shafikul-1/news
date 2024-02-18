<?php 
include "config.php";
include "header.php";
include "navbar.php";

$sql = "SELECT * FROM `users` ORDER BY username DESC";
$result = mysqli_query($connection, $sql) or die("Query Failed");

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="card-title text-uppercase mb-0">Manage Users</h5>
                    <a href="add-user.php" class="btn btn-outline-success btn-sm addUserBtnSm">Add User</a>
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap user-table mb-0">
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Name</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Occupation</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Added</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Role</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td class="pl-4"><?php echo $row['id'] ?></td>
                                <td>
                                    <h5 class="font-medium mb-0"><?php echo $row['username'] ?></h5>
                                    <span class="text-muted"><?php echo $row['gender'] ?></span>
                                </td>
                                <td>
                                    <span class="text-muted">Visual Designer</span><br>
                                    <span class="text-muted">Past : teacher</span>
                                </td>
                                <td>
                                    <span class="text-muted"><?php echo $row['email'] ?></span><br>
                                    <span class="text-muted">0<?php echo $row['number'] ?></span>
                                </td>
                                <td>
                                    <span class="text-muted"><?php echo $row['date'] ?></span><br>
                                    <span class="text-muted">10: 55 AM</span>
                                </td>
                                <td>
                                    <select class="form-control category-select" id="exampleFormControlSelect1">
                                        <?php 
                                            if($row['role'] == 2){
                                                echo "<option selected>Editor</option>";
                                            } else if ($row['role'] == 3) {
                                                echo "<option selected>Commentor</option>";
                                            } else if ($row['role'] == 4) {
                                                echo "<option selected>Viewer</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-key"></i> </button>
                                    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>
                                    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-edit"></i> </button>
                                    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-upload"></i> </button>
                                </td>
                            </tr>
                           <?php 
                                }
                            } else {
                                echo "Database Data Not Found";
                            }
                           ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>




<!-- Style Current Page -->
<style>
    body{
    background: #edf1f5;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: 0;
}
.btn-circle.btn-lg, .btn-group-lg>.btn-circle.btn {
    width: 50px;
    height: 50px;
    padding: 14px 15px;
    font-size: 18px;
    line-height: 23px;
}
.text-muted {
    color: #8898aa!important;
}
[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
}
.btn-circle {
    border-radius: 100%;
    width: 40px;
    height: 40px;
    padding: 10px;
}
.user-table tbody tr .category-select {
    max-width: 150px;
    border-radius: 20px;
}
</style>