<div class="auth-form-light text-left p-5">
    <h1> LOGIN BLOG </h1>
    <form action="<?= base_url('/auth/loginRequest') ?>" method="POST">
        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
        <div class="form-group">
            <input type="email" class="form-control form-control-lg" value="<?=set_value('email')?>" name="email" placeholder="Username">
            <sub class="text-danger"><?= form_error('email') ?></sub>
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
            <sub class="text-danger"><?= form_error('password') ?></sub>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
        </div>
        <div class="my-2 d-flex justify-content-between align-items-center">
            <a href="#" class="auth-link text-black">Forgot password?</a>
        </div>
        <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="<?= base_url('auth/register') ?>" class="text-primary">Create</a>
        </div>
    </form>
</div>