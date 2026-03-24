<?php include "config.php"; ?>

<h2>Add Post</h2>

<form method="POST">
  Title: <input type="text" name="title"><br><br>
  Content: <textarea name="content"></textarea><br><br>
  <button name="submit">Add Post</button>
</form>

<?php
if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $content = $_POST['content'];

  $conn->query("INSERT INTO posts (title, content) VALUES ('$title','$content')");
  echo "Post Added Successfully!";
}
?>