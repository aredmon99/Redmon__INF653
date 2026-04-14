<!DOCTYPE html>
<html>
<head><title>Types</title></head>
<body>
<h1>Types</h1>

<ul>
<?php foreach($types as $m): ?>
    <li><?= $m['type_name'] ?> 
    <a href="?action=delete&id=<?= $m['type_id'] ?>">Delete</a>
</li>
<?php endforeach; ?>
</ul>

<form method="post" action="?action=add">
    <input type="text" name="name" required>
    <button type="submit">Add</button>
</form>
<?php include 'admin_footer.php'; ?>
</body>
</html>
