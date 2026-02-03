<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <meta name="author" content="flexilecode" />
    <title>Mine E-Commerce | <?= $title ?></title>
    <!--! Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="/php/mini-ecommerce/public/assets/images/favicon.ico" />
    <!--! Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="/php/mini-ecommerce/public/assets/css/bootstrap.min.css" />
    <!--! Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="/php/mini-ecommerce/public/assets/vendors/css/vendors.min.css" />
    <link rel="stylesheet" type="text/css" href="/php/mini-ecommerce/public/assets/vendors/css/daterangepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="/php/mini-ecommerce/public/assets/vendors/css/select2-theme.min.css">
    <!--! Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/php/mini-ecommerce/public/assets/css/theme.min.css" />
</head>

<body>
    <?php require_once __DIR__ . '/partials/nav.php'; ?>
    <!--! ================================================================ !-->
    <!--! [End]  Navigation Manu !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! [Start] Header !-->
    <!--! ================================================================ !-->
    <?php require_once __DIR__ . '/partials/header.php'; ?>
    <!--! ================================================================ !-->
    <!--! [End] Header !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <?= $content ?>
        <!-- [ Footer ] start -->
        <?php require_once __DIR__ . '/partials/footer.php'; ?>
        <!-- [ Footer ] end -->
    </main>
    <!--! BEGIN: Vendors JS !-->
    <script src="/php/mini-ecommerce/public/assets/vendors/js/vendors.min.js"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <script src="/php/mini-ecommerce/public/assets/vendors/js/daterangepicker.min.js"></script>
    <script src="/php/mini-ecommerce/public/assets/vendors/js/apexcharts.min.js"></script>
    <script src="/php/mini-ecommerce/public/assets/vendors/js/circle-progress.min.js"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="/php/mini-ecommerce/public/assets/js/common-init.min.js"></script>
    <script src="/php/mini-ecommerce/public/assets/js/dashboard-init.min.js"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="/php/mini-ecommerce/public/assets/js/theme-customizer-init.min.js"></script>
    <!--! END: Theme Customizer !-->
</body>

</html>