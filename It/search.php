<?php
    include 'header.php';
    include 'conn.php';
?>
<form method="get">
  <label for="search">Search:</label>
  <input type="text" name="search" id="search" placeholder="search" value="<?php 
  if (isset($_GET['search'])) {
    // $search_term = mysqli_real_escape_string($conn, $_GET['search']);
    $data = trim($_GET['search']);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    echo $data;
    } ?>
    ">
    <p> Click Enter To Search</p>
</form>
<br>
<?php
  


  // Check if the search form was submitted
  if (isset($_GET['search'])) {
    // Get the search term from the form input
    $search_term = mysqli_real_escape_string($conn, $_GET['search']);

    $query = "SELECT * FROM notes WHERE title LIKE '%$search_term%'";

    
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      // Display the results on an HTML table
      while ($row = mysqli_fetch_assoc($result)) {
        echo  "Title: " . $row["title"] . "<br>";
        echo "Content: " . $row["content"] . "<br>";
         "<hr>";
      }
    } else {
      // Display a message if no results were found
      echo '<p>Error nothing found.</p>';
      echo "Error: " . $row . "<br>" . mysqli_error($conn);
    }

    }
?>
</body>
</html>
