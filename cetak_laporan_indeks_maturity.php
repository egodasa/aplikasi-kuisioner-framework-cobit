<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/IndeksMaturity.php";
$indeks_maturity = new IndeksMaturity();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <title>Laporan Indeks Maturity</title>
  <?php includeTemplate("head.php"); ?>
  <style>
    .container {
      padding-right: 0;
      padding-left: 0;
    }
  </style>
</head>

<body>
    
    <!-- KONTEN AREA-->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                    <!-- BAGIAN ISI KONTEN -->
                    <div class="normal-table-list">
                      <h2 style="text-align: center;">Laporan Indeks Maturity <br>
Rekapitulasi Perhitungan Hasil Kuesioner Domain ME Terhadap Pengukuran Kualitas Rail Document System (RDS) Pada PT. KAI (Persero) Divre II Sumatera Barat</h2>
                      <div class="bsc-tbl-st">
                        <table style="width: 100%;"  class="table table-bordered table-stripped">
                          <thead>
                            <tr>
                              <th>Domain</th>
                              <th>Jumlah Pernyataan</th>
                              <th>Jumlah Responden</th>
                              <th>Pertanyaan x Responden</th>
                              <th>Jml. Nilai</th>
                              <th>Indeks Maturity</th>
                              <th>Ket.</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            // ambil data pernyataan
                            $data_indeks_maturity = $indeks_maturity->ambilData();
                            $total_indeks_maturity = 0;
                            // menampilkan data
                            foreach($data_indeks_maturity as $no => $im)
                            {
                            	$total_indeks_maturity += $im['indeks_maturity'];
                          ?>
                          
                            <tr>
                              <td><?=$im['domain_nama']?></td>
                              <td><?=$im['pernyataan_total']?></td>
                              <td><?=$im['responden_total']?></td>
                              <td><?=$im['responden_total']*$im['pernyataan_total']?></td>
                              <td><?=$im['nilai_total']?></td>
                              <td><?=$im['indeks_maturity']?></td>
                              <td><?=$im['keterangan']?></td>
                            </tr>
                          
                        <?php
                            }
                            $rata = $total_indeks_maturity / count($data_indeks_maturity);
                        ?>
                        <tr>
                        	<th colspan="5" style="text-align: center;">Total</th>
                        	<th><?php echo number_format($total_indeks_maturity,2); ?></th>
                        	<th>-</th>
                        </tr>
                        <tr>
                        	<th colspan="5" style="text-align: center;">Rata-rata Indeks</th>
                        	<th><?php echo number_format($rata, 2); ?></th>
                        	<th><?php echo keteranganIndeksMaturity($rata); ?></th>
                        </tr>
                        </tbody>
                        </table>
                        
                        <div style="text-align: center; float: right; width: 300px;margin-top: 50px;">
                      	Padang, <?php echo TanggalIndo(date('Y-m-d')); ?>
                      	<br>
                      	<br>
                      	<br>
                      	<br>
                      	<br>
                      	Nadia Machda Yuza
                      </div>
                      <div style="clear: both;"></div>
                        </div>
                  </div>
                  <!-- EOF BAGIAN ISI KONTEN -->
            </div>
            
        </div>
    </div>
    <!-- END KONTEN AREA-->
    
    <?php includeTemplate("script.php"); ?>
    <script>
      window.print();
    </script>
</body>

</html>

