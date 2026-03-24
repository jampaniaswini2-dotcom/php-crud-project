<?php include "config.php"; ?>

<?php
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();
?>

<h2>Edit Post</h2>

<form method="POST">
  Title: <input type="text" name="title" value="<?= $data['title'] ?>"><br><br>
  Content: <textarea name="content"><?= $data['content'] ?></textarea><br><br>
  <button name="update">Update</button>
</form>

<?php
if(isset($_POST['update'])){
  $title = $_POST['title'];
  $content = $_POST['content'];

  $conn->query("UPDATE posts SET title='$title', content='$content' WHERE id=$id");

  header("Location: index.php");
}
?>