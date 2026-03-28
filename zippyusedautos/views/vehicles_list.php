<!DOCTYPE html>
<html>
<head><title>Vehicles</title></head>
<body>
<h1>Vehicles</h1>

<form method="get">
    Sort by:
    <select name="sort">
        <option value="price" <?= ($sort=='price')?'selected':''?>>Price</option>
        <option value="year" <?= ($sort=='year')?'selected':''?>>Year</option>
    </select>

    Filter:
    <select name="make_id">
        <option value="">All Makes</option>
        <?php foreach($makes as $make): ?>
            <option value="<?= $make['make_id'] ?>" <?= ($make_id == $make['make_id']) ? 'selected' : '' ?>>
                <?= $make['make_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="type_id">
        <option value="">All Types</option>
        <?php foreach($types as $type): ?>
            <option value="<?= $type['type_id'] ?>" <?= ($type_id == $type['type_id']) ? 'selected' : '' ?>>
                <?= $type['type_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="class_id">
        <option value="">All Classes</option>
        <?php foreach($classes as $class): ?>
            <option value="<?= $class['class_id'] ?>" <?= ($class_id == $class['class_id']) ? 'selected' : '' ?>>
                <?= $class['class_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Go</button>
</form>

<table border="1">
<tr>
    <th>Year</th><th>Model</th><th>Price</th><th>Make</th><th>Type</th><th>Class</th>
    <?php if(strpos($_SERVER['REQUEST_URI'],'admin')!==false): ?><th>Delete</th><?php endif; ?>
</tr>

<?php foreach($vehicles as $v): ?>
<tr>
    <td><?= $v['year'] ?></td>
    <td><?= $v['model'] ?></td>
    <td>$<?= number_format($v['price'], 2) ?></td>
    <td><?= $v['make_name'] ?></td>
    <td><?= $v['type_name'] ?></td>
    <td><?= $v['class_name'] ?></td>
    <?php if(strpos($_SERVER['REQUEST_URI'],'admin')!==false): ?>
    <td>
        <a href="?action=delete&id=<?= $v['vehicle_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
    <?php endif; ?>
</tr>
<?php endforeach; ?>
</table>

<?php if(strpos($_SERVER['REQUEST_URI'],'admin')!==false): ?>
<br>
<a href="?action=add">Add Vehicle</a>
<?php endif; ?>

<p><a href="index.php">Back to Admin Panel</a></p>

</body>
</html>