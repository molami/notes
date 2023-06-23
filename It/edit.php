<?php
include 'header.php';


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

if(isset($_POST['hidden'])){
  $title= $_POST['edittitle'];
  $content= $_POST['editcontent'];
  $id = $_POST['hidden'];
  $sql = "UPDATE `notes` SET `id`='$id',`title`='4title',`content`='$content' WHERE 'id'=$id";
  $res = mysqli_query($conn, $sql);
  //else{
      
      //echo "Error: " . $check . "<br>" . mysqli_error($conn);

 // }
}


?>
        
      <form action="conn.php" method="POST">
        <input type="hidden" name="hidden" id="hidden" >
        <div class="form-group md col-5 text-center">
          <label for="exampleInputTitle">Title</label>
          <input type="text" name="edittitle" class="form-control" id="edittitle" aria-describedby="titleHelp" placeholder="Enter the title of your note" required>
          <small id="titleHelp" class="form-text text-muted">This is a safe place.</small>
        </div>
        <div class="form-group md col-5">
          <label for="exampleInputContent">Content</label>
          <textarea class="form-control" name="editcontent" id="editcontent" placeholder="Change your story" rows="3"></textarea>
        </div>
         <button name = "update" type="submit" class="btn btn-primary">Update Note</button>
         
        </form>
      </div>
      


