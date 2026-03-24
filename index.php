<?php include "config.php"; ?>

<h2>All Posts</h2>
<a href="create.php">Add New Post</a><br><br>

<?php
$result = $conn->query("SELECT * FROM posts");

while($row = $result->fetch_assoc()){
  echo "<b>".$row['title']."</b><br>";
  echo $row['content']."<br>";

  echo "<a href='edit.php?id=".$row['id']."'>Edit</a> | ";
  echo "<a href='delete.php?id=".$row['id']."'>Delete</a>";

  echo "<hr>";
}
?>