<h3> Buat Artikel </h3>
<form class="pt-3" method="POST" action="createRequest">
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
    <div class="form-group">
        <input type="text" class="form-control form-control-xs" value='<?= set_value('artikel_judul') ?>' name="artikel_judul" placeholder="Nama">
        <sub class="text-danger"><?= form_error('artikel_judul') ?></sub>
    </div>
    <div class="form-group">
        <textarea class="form-control form-control-xs" rows="20" placeholder="Artikel" name="artikel_isi"><?= set_value('artikel_isi') ?></textarea>
        <sub class="text-danger"><?= form_error('artikel_isi') ?></sub>
    </div>
    <button type="submit" class="btn btn-sm btn-primary col-md-12"> Simpan </button>
</form>