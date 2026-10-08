<h3>Sub Kriteria - <?php echo $kriteria['nama_kriteria'] ?></h3>
<hr style="margin-bottom: 30px">

<a href="<?php echo base_url('admin/kriteria/subkriteria/add/' . $kriteria['id_kriteria']) ?>" class="btn btn-primary mb-3"><i class="fa fa-plus-square"></i> Tambah Sub Kriteria</a>
<a href="<?php echo base_url('admin/kriteria') ?>" class="btn btn-secondary mb-3">Kembali</a>

<?php echo $this->session->flashdata('message'); ?>

<div class="table-responsive">
   <table class="table table-bordered col-md-8" width="100%" cellspacing="0">
      <thead class="thead-light">
         <tr>
            <th class="text-center" width="8%">No</th>
            <th width="55%">Sub Kriteria</th>
            <th class="text-center" width="15%">Bobot</th>
            <th class="text-center" width="22%">Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php if (empty($data)) { ?>
            <tr>
               <td colspan="4" class="text-center">Belum ada sub kriteria untuk kriteria ini.</td>
            </tr>
         <?php } else { ?>
            <?php $no = 1; ?>
            <?php foreach ($data as $item) : ?>
               <tr>
                  <td class="text-center"><?php echo $no++ ?></td>
                  <td><?php echo $item['nama_sub_kriteria'] ?></td>
                  <td class="text-center"><?php echo $item['bobot_sub_kriteria'] ?></td>
                  <td class="text-center">
                     <a href="<?php echo base_url('admin/kriteria/subkriteria/edit/' . $kriteria['id_kriteria'] . '/' . $item['id_sub_kriteria']) ?>" class="btn btn-success btn-sm">Ubah</a>
                     <a href="<?php echo base_url('admin/kriteria/subkriteria/delete/' . $kriteria['id_kriteria'] . '/' . $item['id_sub_kriteria']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah sub kriteria ini ingin dihapus?')">Hapus</a>
                  </td>
               </tr>
            <?php endforeach; ?>
         <?php } ?>
      </tbody>
   </table>
</div>
