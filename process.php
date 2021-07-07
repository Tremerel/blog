<?php

// print_r($_POST);
if(isset($_POST["submit"])){
    if(!empty($_POST["title"]) && !empty($_POST["description"])){
        $post = [
            'id' => uniqid(),
            'postTitle' => $_POST["title"],
            'postDescription' => $_POST["description"],
        ];
        $fileContent = file_get_contents('./db.json');

        $posts = json_decode($fileContent, true);

        array_push($posts, $post);

        file_put_contents('./db.json', json_encode($posts));

        header('Location:index.php?status=success');
    }else {
            header('Location:index.php?status=error');
        }
}else {
    header('Location:index.php');
}