<div class="auth-form-light text-left p-5">
    <h1>REGISTER BLOG</h1>
    <?php
    validation_errors()
    ?>
    <form class="pt-3" method="POST" action="<?= base_url('auth/registerRequest') ?>">
        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
        <div class="form-group">
            <input type="text" class="form-control form-control-lg" value='<?= set_value('nama_user') ?>' name="nama_user" placeholder="Nama">
            <sub class="text-danger"><?= form_error('nama_user') ?></sub>
        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-lg" value="<?= set_value('email') ?>" name="email" placeholder="Email">
            <sub class="text-danger"><?= form_error('email') ?></sub>
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg" value="<?= set_value('password') ?>" name="password" placeholder="Password">
            <sub class="text-danger"><?= form_error('password') ?></sub>
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Password Confirmation">
            <sub class="text-danger"><?= form_error('password_confirmation') ?></sub>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="">SIGN UP</button>
        </div>
        <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="<?= base_url('auth/login') ?>" class="text-primary">Login</a>
        </div>
    </form>
</div>