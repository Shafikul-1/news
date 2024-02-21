<?php
include "config.php";
include "header.php";

if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $date = mysqli_real_escape_string($connection, $_POST['date']);

    
    if (empty($_FILES['files']['name'])) {
        $file_name = $_POST['oldFiles'];
    } else {
        $errors = array();
        $file_name = $_FILES['files']['name'];
        $file_size = $_FILES['files']['size'];
        $file_tmp = $_FILES['files']['tmp_name'];
        $file_type = $_FILES['files']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['files']['name'])));

        $extensions = array("jpeg", "jpg", "png", "gif", "webp", "avif");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "Your File extension not allowed, please choose a jpeg jpg png gif webp avif file.";
        }

        if ($file_size > 6291456) {
            $errors[] = 'File size must be exactly 6 MB';
        }

        date_default_timezone_set('Asia/Dhaka');
        $dateCreate = date('d-m-y h_i_sA');

        if (file_exists("../upload/$file_name")) {
            if (empty($errors) == true) {
                if (!move_uploaded_file($file_tmp, "../upload/$dateCreate.$file_name")) {
                    echo "File Name Replace Failed";
                } else {
                    echo "success Rename File name";
                }
            } else {
                print_r($errors);
            }
        } else {
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "../upload/$file_name");
                echo "Success";
            } else {
                print_r($errors);
            }
        }
    }


    // echo "<br>";
    // echo $id . "<br>";
    // echo $title . "<br>";
    // echo $category . "<br>";
    // echo $description . "<br>";
    // echo $date . "<br>";
    // echo $file_name . "<br>";

    // die();
    $query = "UPDATE post SET title='{$title}', category={$category}, description='{$description}', post_date='{$date}', post_img='{$file_name}' WHERE post_id ={$id}";
    // $query = "UPDATE category SET post";
    $result = mysqli_query($connection, $query) or die("Query Failed");

    if($result){
        header("location: {$mainUrl}admin/post.php");
    } else{
        echo "Query Failed";
    }
} else {
    header("location: {$mainUrl}admin/add-post.php?msg=ifailed");
}
