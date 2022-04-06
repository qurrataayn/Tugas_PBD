<?= form_open('baju/edit/'. $databaju -> KodeBaju) ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?= $subjudul ?></h3>
    </div>
    <div class="card-body">
        
        <div class="form-group">
            <label>Kode Baju</label>
            <input type="text" class="form-control" name="kd" value="<?= $databaju->KodeBaju ?>" disabled>
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="jdl" value="<?= $databaju->Judul ?>">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="ktgr" class="form-control">
                <option value="">Pilih Kategori</option>
                <?php foreach($datakategori as $key) {?>
                    <option value="<?= $key->IDKategori ?>" <?php if($key->IDKategori==$databaju->Kategori) {
                        echo "selected";
                    } ?>><?= $key->NamaKategori  ?></option>
                    <?php } ?>
            </select> 
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control" name="hrg" value="<?= $databaju->Harga ?>">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="desk" cols="30" rows="10" class="form-control"><?= $databaju->Deskripsi ?></textarea>
        </div>
        
    </div>
    <div class="card-footer">
        <a href="<?= site_url('baju')?>" class="btn btn-danger">Kembali</a>
        <input type="submit" class="btn btn-primary" name="ubah" value="Ubah Data">
    </div>
</div>
<?= form_close() ?>