<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Dashboard</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/php/mini-ecommerce/public/dashboard">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-xxl-3 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-gray-200">
                                    <i class="feather-briefcase"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark"><span class="counter"><?= $categoriesCount ?></span></div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Categories</h3>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="">
                                <i class="feather-more-vertical"></i>
                            </a>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Total Categories </a>
                                <div class="w-100 text-end">
                                    <span class="fs-12 text-dark"><?= $categoriesCount ?> Total</span>
                                    <span class="fs-11 text-muted">(100%)</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-gray-200">
                                    <i class="feather-cast"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark"><span class="counter"><?= $productsCount ?></span></div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Products</h3>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="">
                                <i class="feather-more-vertical"></i>
                            </a>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Total Products </a>
                                <div class="w-100 text-end">
                                    <span class="fs-12 text-dark"><?= $productsCount ?> Total</span>
                                    <span class="fs-11 text-muted">(100%)</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-gray-200">
                                    <i class="feather-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark"><span class="counter">10</span></div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Orders</h3>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="">
                                <i class="feather-more-vertical"></i>
                            </a>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Total Orders </a>
                                <div class="w-100 text-end">
                                    <span class="fs-12 text-dark">10 Total</span>
                                    <span class="fs-11 text-muted">(100%)</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-gray-200">
                                    <i class="feather-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark"><span class="counter">4</span>/<span class="counter">10</span></div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Order Completed</h3>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="">
                                <i class="feather-more-vertical"></i>
                            </a>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Order Completed </a>
                                <div class="w-100 text-end">
                                    <span class="fs-12 text-dark">4 Completed</span>
                                    <span class="fs-11 text-muted">(40%)</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>