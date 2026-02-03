<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Products</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/php/mini-ecommerce/public/dashboard">Home</a></li>
                <li class="breadcrumb-item">Products</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back</span>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        <i class="feather-bar-chart"></i>
                    </a>
                    <a href="/php/mini-ecommerce/public/dashboard/products/create" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Add Product</span>
                    </a>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body p-0">
                        <form method="GET" class="row g-3 mb-4 mt-4 ms-3">
                            <!-- Search -->
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="Search product name..." value="<?= $_GET['search'] ?? '' ?>" >
                            </div>

                            <!-- Category Filter -->
                            <div class="col-md-4">
                                <select name="category" class="form-control">
                                    <option value="">All Categories</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category['id'] ?>" <?= (($_GET['category'] ?? '') == $category['id']) ? 'selected' : '' ?> >
                                            <?= $category['name'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-primary w-100">Filter</button>
                            </div>
                        </form>

                        <?php if (!empty($success)) : ?>
                            <div style="color:green"><?= $success ?></div>
                        <?php endif; ?>

                        <div class="table-responsive">
                            <table class="table table-hover" id="proposalList">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category Name</th>
                                        <th>price</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($products)) : ?>
                                        <?php foreach ($products as $product): ?>
                                            <tr class="single-item">
                                                <td><a href="javascript:void(0);" class="fw-bold"><?= $product['id'] ?></a></td>
                                                <td>
                                                    <a href="javascript:void(0)" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md">
                                                            <img src="/php/mini-ecommerce/public/uploads/products/<?= $product['image'] ?>" alt="" class="img-fluid">
                                                        </div>
                                                        <div>
                                                            <span class="text-truncate-1-line"><?= $product['name'] ?></span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td><?= $product['category_name'] ?></td>
                                                <td>$<?= $product['price'] ?></td>
                                                <td><?= $product['description'] ?></td>
                                                <td><?= $product['created_at'] ?></td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="javascript:void(0);" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <a class="avatar-text avatar-md" href="/php/mini-ecommerce/public/dashboard/products/edit?id=<?= $product['id'] ?>">
                                                            <i class="feather feather-edit-3"></i>
                                                        </a>
                                                        <a class="avatar-text avatar-md" href="/php/mini-ecommerce/public/dashboard/products/delete?id=<?= $product['id'] ?>">
                                                            <i class="feather feather-trash-2"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr class="single-item">
                                            <td colspan="7" class="text-center">No Products Defined</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <nav>
                                <ul class="pagination mt-4 ms-3">
                                    <?php if ($page > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?= $page - 1 ?>&search=<?= $_GET['search'] ?? '' ?>&category=<?= $_GET['category'] ?? '' ?>">Previous</a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if ($page > 1 || $page < $pages): ?>
                                        <?php for ($i = 1; $i <= $pages; $i++): ?>
                                            <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                                                <a class="page-link"
                                                href="?page=<?= $i ?>&search=<?= $_GET['search'] ?? '' ?>&category=<?= $_GET['category'] ?? '' ?>">
                                                    <?= $i ?>
                                                </a>
                                            </li>
                                        <?php endfor; ?>
                                    <?php endif; ?>

                                    <?php if ($page < $pages): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?= $page + 1 ?>&search=<?= $_GET['search'] ?? '' ?>&category=<?= $_GET['category'] ?? '' ?>">Next</a>
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>