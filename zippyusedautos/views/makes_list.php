<!DOCTYPE html>
<html>
<head><title>Makes</title></head>
<body>
<h1>Makes</h1>

<ul>
<?php foreach($makes as $m): ?>
    <li><?= $m['make_name'] ?> <a href="?action=delete&id=<?= $m['make_id'] ?>">Delete</a></li>
<?php endforeach; ?>
</ul>

<h2>Add Make</h2>
<form method="post" action="?action=add">
    <input type="text" name="name" placeholder="Make Name" required>
    <button type="submit">Add Make</button>
</form>

<?php include 'admin_footer.php'; ?>
</body>
</html>
