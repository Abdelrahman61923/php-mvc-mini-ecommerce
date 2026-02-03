<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="theme_ocean">
    <title>Mine E-Commerce | <?= $title ?></title>
    <!--! Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="/php/mini-ecommerce/public/assets/images/favicon.ico">
    <!--! Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="/php/mini-ecommerce/public/assets/css/bootstrap.min.css">
    <!--! Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="/php/mini-ecommerce/public/assets/vendors/css/vendors.min.css">
    <!--! Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/php/mini-ecommerce/public/assets/css/theme.min.css">
</head>

<body>
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="/php/mini-ecommerce/public/assets/images/logo-abbr.png" alt="" class="img-fluid">
                    </div>
                    <?= $content ?>
                </div>
            </div>
        </div>
    </main>
    <!-- Vendors JS -->
    <script src="/php/mini-ecommerce/public/assets/vendors/js/vendors.min.js"></script>
    <!--! Apps Init  !-->
    <script src="/php/mini-ecommerce/public/assets/js/common-init.min.js"></script>
    <!--! Theme Customizer  !-->
    <script src="./php/mini-ecommerce/public/assets/js/theme-customizer-init.min.js"></script>
</body>

</html>