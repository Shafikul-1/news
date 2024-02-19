<?php
include "config.php";
include "header.php";
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $date = mysqli_real_escape_string($connection, $_POST['date']);

    if (isset($_FILES['files'])) {
        $errors = array();
        $file_name = $_FILES['files']['name'];
        $file_size = $_FILES['files']['size'];
        $file_tmp = $_FILES['files']['tmp_name'];
        $file_type = $_FILES['files']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['files']['name'])));

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "Your File extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../upload/" . $file_name);
            echo "Success";
        } else {
            print_r($errors);
        }
    }
    $author = $_SESSION['id'];

    // echo $title . "<br>";
    // echo $category . "<br>";
    // echo $description . "<br>";
    // echo $file_name . "<br>";
    // echo $file_tmp . "<br>";
    // echo $file_ext . "<br>";
    // echo $date . "<br>";

    $query = "INSERT INTO post (title, category, description, post_date, author, post_img ) VALUES ('{$title}',{$category},'{$description}','{$date}',{$author},'{$file_name}');";
    $query .= "UPDATE category SET post = post + 1 WHERE category_id={$category}";
    // $result =  or die("Post Insert Query Failed");
//     echo "<br>".$query."<br>";
// die();
    if (mysqli_multi_query($connection, $query)) {
        echo "Query Success";
        header("location: {$mainUrl}admin/post.php");
    } else {
        echo "Query FAiled";
    }
    

} else {
    header("location: {$mainUrl}admin/add-post.php?msg=ifailed");
}
