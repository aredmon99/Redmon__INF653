<!DOCTYPE html>
<html>
<head><title>Add Vehicle</title></head>
<body>
    <h1>Add Vehicle</h1>
    <form action="vehicles.php" method="post">
        <input type="hidden" name="action" value="add_vehicle">
        
        <label>Make:</label>
        <select name="make_id" required>
            <?php foreach ($makes as $make) : ?>
                <option value="<?= $make['make_id']; ?>"><?= $make['make_name']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Type:</label>
        <select name="type_id" required>
            <?php foreach ($types as $type) : ?>
                <option value="<?= $type['type_id']; ?>"><?= $type['type_name']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Class:</label>
        <select name="class_id" required>
            <?php foreach ($classes as $class) : ?>
                <option value="<?= $class['class_id']; ?>"><?= $class['class_name']; ?></option>
            <?php endforeach; ?>
        </select><br>

        Year: <input type="number" name="year" required><br>
        Model: <input type="text" name="model" required><br>
        Price: <input type="number" name="price" step="0.01" required><br>

        <button type="submit">Add Vehicle</button>
    </form>
    <?php include 'admin_footer.php'; ?>
</body>
</html>
