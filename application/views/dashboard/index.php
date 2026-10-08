<h3>Dashboard</h3>
<hr style="margin-bottom: 20px">

<?php if ($this->session->userdata('role') == 1) { ?>
   <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
         <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
               <div class="card-body-icon">
                  <i class="fas fa-fw fa-server"></i>
               </div>
               <div class="mr-5"><?php echo getNumKriteria() ?> Kriteria</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/kriteria') ?>">
               <span class="float-left">Lihat Detail</span>
               <span class="float-right">
                  <i class="fas fa-angle-right"></i>
               </span>
            </a>
         </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
         <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
               <div class="card-body-icon">
                  <i class="fas fa-fw fa-database"></i>
               </div>
               <div class="mr-5"><?php echo getNumAlternatif() ?> Alternatif</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/alternatif') ?>">
               <span class="float-left">Lihat Detail</span>
               <span class="float-right">
                  <i class="fas fa-angle-right"></i>
               </span>
            </a>
         </div>
      </div>
   </div>

   <div class="card">
      <h5 class="card-header">Tata Cara Penggunaan Sistem :</h5>
      <div class="card-body">
         <p class="card-text">1. Masukkan dan kelola kriteria penilaian kepuasan pelanggan pada menu <strong>Kriteria</strong>, seperti kualitas layanan, kecepatan pelayanan, harga, fasilitas, dan pelayanan pelanggan.</p>
         <p class="card-text">2. Input data pelanggan atau konsumen yang akan dinilai pada menu <strong>Alternatif</strong> sesuai dengan sistem penilaian kepuasan pelanggan Dimas Motor.</p>
         <p class="card-text">3. Lakukan <strong>Perbandingan Kriteria</strong> untuk menentukan bobot kepentingan setiap kriteria.</p>
         <p class="card-text">4. Lakukan <strong>Perbandingan Alternatif</strong> untuk membandingkan setiap pelanggan berdasarkan kriteria yang telah ditetapkan.</p>
         <p class="card-text">5. Pastikan seluruh penilaian pada setiap kriteria sudah terisi agar hasil analisis AHP valid dan konsisten.</p>
         <p class="card-text">6. Buka menu <strong>Hasil</strong> untuk melihat perangkingan pelanggan terbaik dan gunakan fitur <strong>Export PDF</strong> untuk laporan.</p>
      </div>
   </div>

<?php } else { ?>
   <p>Test</p>
<?php } ?>

<div style="margin-bottom: 160px"></div>
