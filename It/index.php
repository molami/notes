<?php
include 'header.php';

include 'conn.php';
//include 'edit.php';



?>
<div class="container"><h1>Notes world</h1></div>
<div class="container">
<form action="conn.php" method="POST">
  <div class="form-group md col-5 text-center">
    <label for="exampleInputTitle">Title</label>
    <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter the title of your note" required>
    <small id="titleHelp" class="form-text text-muted">This is a safe place.</small>
  </div>
  <div class="form-group md col-5">
    <label for="exampleInputContent">Content</label>
    <textarea class="form-control" name="content" id="exampleFormControlcontent" placeholder="Say your story" rows="3"></textarea>
  </div>
   <button name = "submit" type="submit" class="btn btn-primary">Add Note</button>
</form>


</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $id = 1;
    $select = "SELECT * FROM notes";
    $query = mysqli_query($conn,$select);
    
    while($present = mysqli_fetch_array($query)){ 
        
        ?>
    <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td><?php echo $present['title']; ?></td>
      <td><?php echo $present['content']; ?></td>
      <td> 
      <span><a class="btn btn-primary" href ="edit.php?id=<?php echo $present['id']; ?>">Edit</a> </span>
      <span><a class="btn btn-danger" href="conn.php?id=<?php echo $present['id']; ?>">Delete</a></span>
      </td>
    </tr>
    
     <?php 
    $id++; 
    }
       
    
    

    ?>
  </tbody>
</table>
</div>
