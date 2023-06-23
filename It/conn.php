<?php
$server = "localhost";
$username ="root";
$password = "";
$database = "application";



$conn = mysqli_connect($server,$username,$password,$database);
if($conn){
   // echo "connected sucessfully";
}
else{
    echo "failed";
}
if(isset($_POST['submit'])){
    if(!isset($_POST["hidden"])){
    // echo "yay";
        //collecting data from the form
        $title = $_POST['title'];
        $content = $_POST['content'];

        //inserting data into database
        $insert = "INSERT INTO notes (title,content) VALUES ('$title','$content')";
        $process = mysqli_query($conn,$insert);
        if($process){
        // echo "Sucessfully inserted into database";
        header("location: index.php");
        }
        else{
           // echo "error";
            echo "Error: " . $process . "<br>" . mysqli_error($conn);
        }
   }
}

if(isset($_GET['id'])){
    $id= $_GET['id'];
    //echo "hmm";
    $remove = "DELETE  FROM notes WHERE id=$id";
    $check = mysqli_query($conn, $remove);
    if($check){
        //echo "You deleted a note";
        header("location: index.php");
    }
    else{
        
        echo "Error: " . $check . "<br>" . mysqli_error($conn);

    }
}


?>