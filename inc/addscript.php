<?php
require('config/config.php');
require('config/db.php');


//adding a new table to the db
if(isset($_POST['submitCon'])){

    $newTable = mysqli_real_escape_string($conn, $_POST['containerNew']);

    $queryTable ="CREATE TABLE `$newTable`(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        tagTitle VARCHAR(50),
        tag VARCHAR(50),
        comment VARCHAR(255)
    )";



    if(mysqli_query($conn, $queryTable)){
        header('Location:' .ACTION_URL. '');
    }else{
        echo 'ERROR: '. mysqli_error($conn);}

}

// Adding new content to a table
if(isset($_POST['submitTag'])){
    $table = mysqli_real_escape_string($conn, $_POST['container']);
    $tagTitle = mysqli_real_escape_string($conn, $_POST['tagTitle']);
    $tag = mysqli_real_escape_string($conn, $_POST['tag']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

  
  

    $queryTag = "INSERT INTO `$table`(tagTitle, tag, comment) VALUES('$tagTitle','$tag','$comment') ";

    if(mysqli_query($conn, $queryTag)){
       header('Location:' .ACTION_URL. '');
    }else{
        echo 'ERROR: '. mysqli_error($conn);}
}