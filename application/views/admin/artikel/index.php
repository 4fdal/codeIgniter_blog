<a href="home/create" class="btn btn-xs btn-success"> + Buat Arikel Baru </a>
<table class="table">
    <thead>
        <tr>
            <th style="width: 90%;"> JUDUL </th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($artikel as $key => $value) { ?>
            <tr>
                <td class="text-capitalize"> <?= $value->artikel_judul ?> </td>
                <th>
                    <a href="home/update/<?= $value->id ?>" class="btn btn-xs btn-primary"> Edit | View </a>
                    <a href="" class="btn btn-xs btn-danger " onclick="
                            var cfm = confirm('Yakin Akan Menghapus ?');
                            if(cfm){
                            event.preventDefault();
                            document.getElementById('<?= $value->id ?>').submit();
                            }
                        "> Delete</a>
                    </div>
                    <form id='<?= $value->id ?>' action="home/deleteRequest/<?= $value->id ?>" style="display:none;" method="post">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                    </form>
                </th>
            </tr>
        <?php } ?>
    </tbody>
</table>