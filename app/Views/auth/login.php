<div class="card-body p-sm-5">
    <h2 class="fs-20 fw-bolder mb-4">Login</h2>
    <h4 class="fs-13 fw-bold mb-2">Login to your account</h4>

    <?php if (!empty($error)) : ?>
        <div style="color:red"><?= $error ?></div>
    <?php endif; ?>

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
            <input type="email" class="form-control" name="email" placeholder="Email or Username">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                    <label class="custom-control-label c-pointer" for="rememberMe">Remember Me</label>
                </div>
            </div>
            <div>
                <a href="auth-reset-minimal.html" class="fs-11 text-primary">Forget password?</a>
            </div>
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-lg btn-primary w-100">Login</button>
        </div>
    </form>
    <div class="mt-5 text-muted">
        <span> Don't have an account?</span>
        <a href="/php/mini-ecommerce/public/register" class="fw-bold">Create an Account</a>
    </div>
</div>
