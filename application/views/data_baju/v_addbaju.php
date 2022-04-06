<?= $this -> session -> flashdata('pesan') ?>

<?= form_open('baju/add') ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?= $subjudul ?></h3>
    </div>
    <div class="card-body">
   
        <div class="form-group">
            <label>Kode Baju</label>
            <input type="text" class="form-control" name="kd" value="">
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="jdl" value="">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="ktgr" class="form-control">
                <option value="">Pilih Kategori</option>
                <?php foreach($datakategori as $key) {?>
                    <option value="<?= $key->IDKategori ?>"><?= $key->NamaKategori  ?></option>
                    <?php } ?>
            </select> 
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control" name="hrg" value="">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="desk" cols="30" rows="10" class="form-control"></textarea>
        </div>
        
    </div>
    <div class="card-footer">
        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
        <a href="<?= site_url('baju')?>" class="btn btn-danger">Kembali</a>
    </div>
</div>
<?= form_close() ?>