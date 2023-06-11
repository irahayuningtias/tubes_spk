<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
   <meta name="author" content="AdminKit">
   <meta name="keywords"
      content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link rel="shortcut icon" href="adminkit-dev/static/img/icons/icon-48x48.png" />

   <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

   <title>Matriks Alternatif</title>

   <link href="adminkit-dev/static/css/app.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
   <div class="wrapper">
      <nav id="sidebar" class="sidebar js-sidebar">
         <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.php">
               <span class="align-middle">SPK</span>
            </a>
            <ul class="sidebar-nav">
               <li class="sidebar-header">
                  Metode SMART-TOPSIS
               </li>
               <li class="sidebar-item">
                  <a class="sidebar-link" href="alternatif.php">
                     <i class="align-middle" data-feather="check-square"></i> <span
                        class="align-middle">Alternatif</span>
                  </a>
               </li>
               <li class="sidebar-item">
                  <a class="sidebar-link" href="kriteria.php">
                     <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Kriteria</span>
                  </a>
               </li>
               <li>
                  <a class="sidebar-link" href="tambah-matriks.php">
                     <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Tambah
                        Matriks</span>
                  </a>
               </li>
               <li class="sidebar-item">
                  <a class="sidebar-link" href="perhitungan.php">
                     <i class="align-middle" data-feather="check-square"></i> <span
                        class="align-middle">Perhitungan</span>
                  </a>
               </li>
               <li class="sidebar-item">
                  <a class="sidebar-link" href="logout.php">
                     <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Logout</span>
                  </a>
               </li>
            </ul>
         </div>
      </nav>

      <div class="main">
         <main class="content">
            <div class="container-fluid p-0">
               <h1 class="h3 mb-3"><strong>Matriks</strong> Alternatif</h1>
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <!-- Matriks -->
                           <ul class="nav nav-tabs">
                           <li class="nav-item">
											<a class="nav-link " aria-current="page" href="perhitungan.php">Isi Matriks</a>
										</li>
                              			<li class="nav-item">
											<a class="nav-link" aria-current="page" href="normalisasiBobot.php">Normalisasi Bobot</a>
										</li>
										<li class="nav-item">
											<a class="nav-link active" aria-current="page" href="normalisasiMatriks.php">Matriks Normalisasi</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" aria-current="page" href="normalisasiTerbobot.php">Matriks Normalisasi Terbobot</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" aria-current="page" href="solusiIdeal.php">Solusi Ideal Positif/Negatif</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" aria-current="page" href="jarakSolusiIdeal.php">Jarak Solusi Ideal Positif/Negatif</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" aria-current="page" href="preferensi.php">Nilai Preferensi</a>
										</li>
                           </ul>
                           <!-- Isi Matrisk -->
                           <?php
                           include("config.php");
                           $s = mysqli_query($connect, "select * from kriteria");
                           $h = mysqli_num_rows($s);
                           ?>

                           <br>

                           <table class="table table-bordered table-responsive">
                              <thead>
                                 <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Keterangan</th>
                                    <th colspan="<?php echo $h; ?>">Kriteria</th>
                                 </tr>
                                 <tr>
                                    <?php
                                    for ($n = 1; $n <= $h; $n++) {
                                       echo "<th>C{$n}</th>";
                                    }
                                    ?>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 $i = 0;
                                 $a = mysqli_query($k21, "select * from alternatif order by id_alt asc");



                                 while ($da = mysqli_fetch_assoc($a)) {


                                    echo "<tr>
		<td>" . (++$i) . "</td>
		<td>$da[keterangan]</td>";
                                    $idalt = $da['id_alt'];

                                    //ambil nilai
                                 
                                    $n = mysqli_query($k21, "select * from nilai where id_alt='$idalt' order by id_nilai asc");

                                    while ($dn = mysqli_fetch_assoc($n)) {
                                       $idk = $dn['id_criteria'];

                                       //nilai kuadrat
                                 
                                       $nilai_kuadrat = 0;
                                       $k = mysqli_query($k21, "select * from nilai where id_criteria='$idk' ");
                                       while ($dkuadrat = mysqli_fetch_assoc($k)) {
                                          $nilai_kuadrat = $nilai_kuadrat + ($dkuadrat['nilai'] * $dkuadrat['nilai']);
                                       }

                                       echo "<td align='center'>" . round(($dn['nilai'] / sqrt($nilai_kuadrat)), 6) . "</td>";

                                    }
                                    echo "</tr>\n";
                                 }
                                 ?>
                              </tbody>
                           </table>
                        </div>
         </main>

         <footer class="footer">
            <div class="container-fluid">
               <div class="row text-muted">
                  <div class="col-6 text-start">
                     <p class="mb-0">
                        <a class="text-muted" href="" target="_blank"><strong>Sistem Pendukung Keputusan</strong></a> -
                        <a class="text-muted" href="" target="_blank"><strong>Kelompok 6 SIB 3D</strong></a> &copy;
                     </p>
                  </div>
               </div>
            </div>
         </footer>
      </div>
   </div>

   <script src="js/app.js"></script>

   <!-- matrik -->

</body>

</html>