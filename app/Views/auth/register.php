<div class="card-body p-sm-5">
    <h2 class="fs-20 fw-bolder mb-4">Register</h2>
    
    <?php if (!empty($success)) : ?>
        <div style="color:green"><?= $success ?></div>
    <?php endif; ?>

    <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $e): ?>
            <div style="color:red"><?= $e ?></div>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <form action="" method="POST" class="w-100 mt-4 pt-2">

        <div class="mb-4">
            <input type="text" name="name" class="form-control" placeholder="Full Name">
        </div>
        <div class="mb-4">
            <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <!-- <div class="mb-4">
            <input type="tel" class="form-control" placeholder="Username" required>
        </div> -->
        <div class="mb-4">
            <input type="password" name="password" class="form-control password" placeholder="Password">
        </div>
        <!-- <div class="mb-4">
            <input type="password" class="form-control" placeholder="Password again" required>
        </div> -->
        <div class="mt-5">
            <button type="submit" class="btn btn-lg btn-primary w-100">Create Account</button>
        </div>
    </form>
    <div class="mt-5 text-muted">
        <span>Already have an account?</span>
        <a href="/php/mini-ecommerce/public/login" class="fw-bold">Login</a>
    </div>
</div>
