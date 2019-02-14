<?php include('includes/header.php'); ?>

<body>
    <?php include('includes/navbar.php') ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('includes/sidebar_dashboard.php'); ?>
            <!--/span-->
            <?php include 'pages/' . $page . '.php'; ?>
        </div>

        <?php include('includes/footer.php'); ?>
</body>

</html>