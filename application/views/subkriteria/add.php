<h3>Tambah Sub Kriteria</h3>
<hr style="margin-bottom: 30px">

<div class="col-md-8">
   <form action="<?php echo base_url('admin/kriteria/subkriteria/add_data') ?>" method="POST">
      <input type="hidden" name="id_kriteria" value="<?php echo $kriteria['id_kriteria'] ?>">

      <div class="form-group row">
         <label for="nama_kriteria" class="col-sm-3 col-form-label">Kriteria</label>
         <div class="col-sm-9">
            <input type="text" class="form-control" value="<?php echo $kriteria['nama_kriteria'] ?>" readonly>
         </div>
      </div>

      <div class="form-group row">
         <label for="nama_sub_kriteria" class="col-sm-3 col-form-label">Nama Sub Kriteria</label>
         <div class="col-sm-9">
            <input type="text" name="nama_sub_kriteria" class="form-control" id="nama_sub_kriteria" placeholder="Nama Sub Kriteria" required>
         </div>
      </div>

      <div class="form-group row">
         <label for="bobot_sub_kriteria" class="col-sm-3 col-form-label">Bobot</label>
         <div class="col-sm-9">
            <select name="bobot_sub_kriteria" id="bobot_sub_kriteria" class="form-control" required>
               <option value="">- Pilih Bobot -</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
            </select>
         </div>
      </div>

      <div class="form-group row">
         <div class="col-sm-9 offset-sm-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url('admin/kriteria/subkriteria/' . $kriteria['id_kriteria']) ?>" class="btn btn-danger">Batal</a>
         </div>
      </div>
   </form>
</div>
