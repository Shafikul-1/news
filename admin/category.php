<?php
include "config.php";
include "header.php";
if ($_SESSION['role'] == '3' || $_SESSION['role'] == '4') {
    header("location: {$mainUrl}admin/post.php");
}
include "navbar.php";

$query = "SELECT * FROM category";
$result = mysqli_query($connection, $query) or die("Query Failed");

?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <!-- <th scope="col">Author</th> -->
            <th scope="col">Category Name</th>
            <th scope="col">Post</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <th scope="row"><?php echo $row['category_id'] ?></th>
            <!-- <td>Shfikul</td> -->
            <td><?php echo ucwords($row['category_name']) ?></td>
            <td><?php echo $row['post'] ?></td>
        </tr>
        <?php 
            }
        }
        ?>
        
    </tbody>
</table>