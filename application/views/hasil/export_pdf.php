<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="utf-8">
   <title>Laporan Hasil AHP Dimas Motor</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         color: #222;
         margin: 30px;
      }
      h2, h3, h4 {
         margin-bottom: 12px;
      }
      table {
         width: 100%;
         border-collapse: collapse;
         margin-top: 15px;
         margin-bottom: 20px;
      }
      th, td {
         border: 1px solid #333;
         padding: 8px 10px;
         text-align: left;
      }
      th {
         background: #f2f2f2;
      }
      .text-center {
         text-align: center;
      }
      .text-right {
         text-align: right;
      }
      .small {
         font-size: 12px;
      }
      @media print {
         body {
            margin: 0;
         }
         .no-print {
            display: none !important;
         }
      }
   </style>
</head>
<body>
   <h2>Laporan Hasil AHP</h2>
   <h3>Sistem Pendukung Keputusan Penilaian Kepuasan Pelanggan Pada Dimas Motor</h3>

   <?php if (getNumKriteriaPV() == 0) : ?>
      <p>Data bobot kriteria belum tersedia.</p>
   <?php elseif (getNumAlternatifPV() == 0) : ?>
      <p>Data bobot alternatif belum tersedia.</p>
   <?php else : ?>
      <?php
      $nilai = array();
      for ($x = 0; $x <= ($jumlah_alternatif - 1); $x++) {
         $nilai[$x] = 0;
         for ($y = 0; $y <= ($jumlah_kriteria - 1); $y++) {
            $id_alternatif = getAlternatifId($x);
            $id_kriteria = getKriteriaId($y);

            $pv_alternatif = getAlternatifPV($id_alternatif, $id_kriteria);
            $pv_kriteria = getKriteriaPV($id_kriteria);

            $nilai[$x] += ($pv_alternatif * $pv_kriteria);
         }
      }

      for ($i = 0; $i <= ($jumlah_alternatif - 1); $i++) {
         $id_alternatif = getAlternatifId($i);
         insertRanking($id_alternatif, $nilai[$i]);
      }
      ?>

      <h4>Prioritas Kriteria</h4>
      <?php
      $kriteriaRanking = array();
      for ($i = 0; $i <= ($jumlah_kriteria - 1); $i++) {
         $kriteriaRanking[] = array(
            'id_kriteria' => getKriteriaId($i),
            'nama_kriteria' => getKriteriaNama($i),
            'nilai' => getKriteriaPV(getKriteriaId($i))
         );
      }
      usort($kriteriaRanking, function ($a, $b) {
         return $b['nilai'] <=> $a['nilai'];
      });
      ?>
      <table>
         <thead>
            <tr>
               <th class="text-center">Peringkat</th>
               <th>Kriteria</th>
               <th class="text-center">Bobot</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1; foreach ($kriteriaRanking as $item) : ?>
               <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td><?php echo $item['nama_kriteria']; ?></td>
                  <td class="text-center"><?php echo number_format((float) $item['nilai'], 5, ',', '.'); ?></td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>

      <h4>Perangkingan Alternatif</h4>
      <table>
         <thead>
            <tr>
               <th class="text-center">Peringkat</th>
               <th>Alternatif</th>
               <th class="text-center">Nilai</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1; foreach ($ranking as $value) : ?>
               <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td><?php echo $value['nama_usaha']; ?></td>
                  <td class="text-center"><?php echo number_format((float) $value['nilai'], 5, ',', '.'); ?></td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   <?php endif; ?>

   <div class="no-print" style="margin-top: 20px;">
      <button type="button" onclick="window.print()">Print / Simpan sebagai PDF</button>
   </div>
   <script>
      window.onload = function() {
         window.print();
      };
   </script>
</body>
</html>
