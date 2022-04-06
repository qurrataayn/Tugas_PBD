<?= $this -> session -> flashdata('pesan') ?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?= $subjudul ?></h3>
    </div>
    <div class="card-body">
        <a href="<?= site_url('baju/add')?>" class="btn btn-success">Tambah Data</a>
        <hr>
        <!-- fitur pencarian Data -->
        <form>
            <div class="input-group input-group-md col-md-6">
                <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Baju">
                <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">Cari</button>
                    <?php if ($this -> input -> get('judul')) {?>
                        <a href="<?= site_url('baju') ?>" class="btn btn-danger btn-flat">Reset</a> }
                    <?php } ?>
                </span>
            </div>
        </form>

        <hr>
        <table class = "table table-striped">
    <tr>
        <thead>
            <th>Kode Baju</th>
            <th>Judul</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </thead>
    </tr>
    
    <tbody>
        <?php foreach ($databaju as $key){ ?>
            <tr>
                <td> <?= $key -> KodeBaju ?> </td>
                <td> <?= $key -> Judul ?> </td>
                <td> <?= $key -> Harga ?> </td>
                <td><img src="<?= base_url('./uploads/'.$key -> Gambar)?>" class="img-rounded" width="70px"></td>
                <td>
                <a href="<?= site_url('baju/formupload/'.$key -> KodeBaju)?>" class = "btn btn-warning"><i class="fa fa-camera"></i></a>
                    <a href="<?= site_url('baju/detail/'.$key -> KodeBaju)?>" class = "btn btn-primary"><i class="fa fa-list"></i></a>
                    <a href="<?= site_url('baju/edit/'.$key -> KodeBaju)?>" class = "btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="<?= site_url('baju/delete/'.$key -> KodeBaju)?>" class = "btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
    </tbody>
</table>
        </div>
        </div>