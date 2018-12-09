<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Car Inventory |</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php' ? 'nav-item active' : 'nav-item') ?>" >
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'add-manufacturer.php' ? 'nav-item active' : 'nav-item') ?>">
                <a class="nav-link" href="add-manufacturer.php">Add Manufacturer</a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'add-model.php' ? 'nav-item active' : 'nav-item') ?>">
                <a class="nav-link" href="add-model.php">Add Model</a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'view-inventory.php' ? 'nav-item active' : 'nav-item') ?>">
                <a class="nav-link" href="view-inventory.php">View Inventory</a>
            </li>
        </ul>
    </div>
</nav>