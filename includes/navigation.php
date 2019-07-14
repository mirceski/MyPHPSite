<nav class="navbar navbar-expand-lg navbar-static-top navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active' ?>" href="index.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'form.php') echo 'active' ?>" href="form.php">Task 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'meni.php') echo 'active' ?>" href="meni.php">Task 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'arrays.php') echo 'active' ?>" href="arrays.php">Task 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'vraboteni.php') echo 'active' ?>" href="vraboteni.php">Task 4</a>
            </li>
        </ul>
    </div>
</nav>
