<div class="row">
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>
            </div>
            <div class="card-body">
                <table class = "table table-striped">
                    <tr>
                        <td>Kode Baju</td>
                        <td>: <?= $databaju -> KodeBaju ?></td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td>: <?= $databaju -> Judul ?></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>: <?= $databaju -> NamaKategori ?></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>: <?= $databaju -> Harga ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>: <?= $databaju -> Deskripsi ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <a href="<?= site_url('baju')?>" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
    <div class="col-mod-3">
        <div class="card">
            <div class="card-body">
            <img src="<?= base_url('./uploads/'.$databaju -> Gambar)?>" class="img-rounded" width="200px">
        </div>
    </div>
</div>
</div>