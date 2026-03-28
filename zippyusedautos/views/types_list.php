<!DOCTYPE html>
<html>
<head><title>Types</title></head>
<body>
<h1>Types</h1>

<ul>
<?php foreach($types as $m): ?>
    <li><?= $m['name'] ?> <a href="?action=delete&id=<?= $m['id'] ?>">Delete</a></li>
<?php endforeach; ?>
</ul>

<form method="post" action="?action=add">
    <input type="text" name="name" required>
    <button type="submit">Add</button>
</form>

</body>
</html>