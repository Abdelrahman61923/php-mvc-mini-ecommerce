<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Product</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/php/mini-ecommerce/public/dashboard">Home</a></li>
                <li class="breadcrumb-item">Create</li>
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
                    <a href="javascript:void(0);" class="btn btn-light-brand" data-bs-toggle="offcanvas" data-bs-target="#proposalSent">
                        <i class="feather-layers me-2"></i>
                        <span>Save & Send</span>
                    </a>
                    <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                        <i class="feather-save me-2"></i>
                        <span>Save</span>
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
            <div class="col-xl-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">

                        <?php if (!empty($errors)) foreach($errors as $e) echo "<div style='color:red'>$e</div>"; ?>
                        <?php if (!empty($success)) echo "<div style='color:green'>$success</div>"; ?>

                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Product Name">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Category <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id" data-select2-selector="icon">
                                    <option value="">Select Category</option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">price <span class="text-danger">*</span></label>
                                <input type="number" name="price" class="form-control" placeholder="Price">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Product Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="feather-save me-2"></i>
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>