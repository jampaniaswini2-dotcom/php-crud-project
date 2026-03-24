<?php include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>PHP CRUD</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

<h2>All Posts</h2>

<a href="create.php" class="btn btn-primary mb-3">Add Post</a>

<!-- SEARCH -->
<form method="GET" class="mb-3">
  <input type="text" name="search" class="form-control" placeholder="Search title...">
</form>

<?php

$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

if(isset($_GET['search']) && $_GET['search'] != ""){
  $search = $_GET['search'];

  $result = $conn->query("SELECT * FROM posts WHERE title LIKE '%$search%' LIMIT $limit OFFSET $offset");

  $total_result = $conn->query("SELECT COUNT(*) as count FROM posts WHERE title LIKE '%$search%'")->fetch_assoc();
} else {
  $result = $conn->query("SELECT * FROM posts LIMIT $limit OFFSET $offset");

  $total_result = $conn->query("SELECT COUNT(*) as count FROM posts")->fetch_assoc();
}

$total = $total_result['count'];
$pages = ceil($total / $limit);

while($row = $result->fetch_assoc()){
?>

<div class="card mb-3">
  <div class="card-body">
    <h5><?= $row['title'] ?></h5>
    <p><?= $row['content'] ?></p>

    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
  </div>
</div>

<?php } ?>

<!-- PAGINATION -->
<nav>
<ul class="pagination">

<?php for($i=1; $i<=$pages; $i++){ ?>

<li class="page-item">
  <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
</li>

<?php } ?>

</ul>
</nav>

</div>

</body>
</html>