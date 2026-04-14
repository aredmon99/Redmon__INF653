<footer>
    <hr>
    <nav>
        <ul>
            <?php if (basename($_SERVER['PHP_SELF']) != "index.php") : ?>
                <li><a href="index.php">View Full Inventory</a></li>
            <?php endif; ?>

            <?php if (basename($_SERVER['PHP_SELF']) != "add_vehicle_form.php" && strpos($_SERVER['REQUEST_URI'], 'action=show_add_form') === false) : ?>
                <li><a href="?action=show_add_form">Click here to add a vehicle</a></li>
            <?php endif; ?>

            <?php if (basename($_SERVER['PHP_SELF']) != "makes.php") : ?>
                <li><a href="makes.php">View/Edit Vehicle Makes</a></li>
            <?php endif; ?>

            <?php if (basename($_SERVER['PHP_SELF']) != "types.php") : ?>
                <li><a href="types.php">View/Edit Vehicle Types</a></li>
            <?php endif; ?>

            <?php if (basename($_SERVER['PHP_SELF']) != "classes.php") : ?>
                <li><a href="classes.php">View/Edit Vehicle Classes</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</footer>