<?= $this -> session -> flashdata('pesan') ?>

<?= form_open_multipart('baju/formupload/'. $databaju -> KodeBaju) ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?= $subjudul ?></h3>
    </div>
    <div class="card-body">
        
        <div class="form-group">
            <label>Kode Baju</label>
            <h3><?= $databaju->KodeBaju ?></h3>
        </div>
        <div class="form-group">
            <label>Judul</label>
            <h3><?= $databaju->Judul ?></h3>
        </div>
        <div class="form-group">
        <img src="<?= base_url('./uploads/'.$databaju -> Gambar)?>" class="img-rounded" width="100px">
        </div>
        <div class="form-group">
            <label>Pilih Gambar</label>
            <input type="file" class="form-control" name="gambar">
        </div>
        
    </div>
    <div class="card-footer">
    
    <a href="<?= site_url('baju')?>" class="btn btn-danger">Kembali</a>
    <input type="submit" class="btn btn-primary" name="proses" value="Proses Data">
    </div>
</div>
<?= form_close() ?>