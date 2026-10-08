<h3>Ubah Sub Kriteria</h3>
<hr style="margin-bottom: 30px">

<div class="col-md-8">
   <form action="<?php echo base_url('admin/kriteria/subkriteria/update') ?>" method="POST">
      <input type="hidden" name="id_kriteria" value="<?php echo $kriteria['id_kriteria'] ?>">
      <input type="hidden" name="id_sub_kriteria" value="<?php echo $data['id_sub_kriteria'] ?>">

      <div class="form-group row">
         <label for="nama_kriteria" class="col-sm-3 col-form-label">Kriteria</label>
         <div class="col-sm-9">
            <input type="text" class="form-control" value="<?php echo $kriteria['nama_kriteria'] ?>" readonly>
         </div>
      </div>

      <div class="form-group row">
         <label for="nama_sub_kriteria" class="col-sm-3 col-form-label">Nama Sub Kriteria</label>
         <div class="col-sm-9">
            <input type="text" name="nama_sub_kriteria" class="form-control" id="nama_sub_kriteria" value="<?php echo $data['nama_sub_kriteria'] ?>" required>
         </div>
      </div>

      <div class="form-group row">
         <label for="bobot_sub_kriteria" class="col-sm-3 col-form-label">Bobot</label>
         <div class="col-sm-9">
            <select name="bobot_sub_kriteria" id="bobot_sub_kriteria" class="form-control" required>
               <?php for ($i = 1; $i <= 5; $i++) { ?>
                  <option value="<?php echo $i ?>" <?php echo ($data['bobot_sub_kriteria'] == $i) ? 'selected' : '' ?>><?php echo $i ?></option>
               <?php } ?>
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
