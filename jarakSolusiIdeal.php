<?php
include 'config.php';
?>

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
						<a class="sidebar-link" href="createMatriks.php">
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
											<a class="nav-link" aria-current="page" href="perhitungan.php">Isi Matriks</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" aria-current="page" href="normalisasiBobot.php">Normalisasi
												Bobot</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" aria-current="page" href="normalisasiMatriks.php">Matriks
												Normalisasi</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" aria-current="page" href="normalisasiTerbobot.php">Matriks
												Normalisasi Terbobot</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" aria-current="page" href="solusiIdeal.php">Solusi Ideal
												Positif/Negatif</a>
										</li>
										<li class="nav-item">
											<a class="nav-link active" aria-current="page" href="jarakSolusiIdeal.php">Jarak Solusi
												Ideal Positif/Negatif</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" aria-current="page" href="preferensi.php">Nilai Preferensi</a>
										</li>
									</ul>
									<!-- Isi Matrisk -->
									<?php
									include("config.php");
									$s = mysqli_query($k21, "select * from kriteria");
									$h = mysqli_num_rows($s);


									?>

									<div class="box-header">
										<h3 class="box-title ">Jarak Solusi Ideal Positif (D<sup>+</sup>)</h3>
									</div>

									<table class="table table-bordered table-responsive">
										<thead>
											<tr>
												<th>
													<center>Nomor</center>
												</th>
												<th>
													<center>Keterangan</center>
												</th>
												<th>
													<center>D<sup>+</sup></center>
												</th>
											</tr>

										</thead>
										<tbody>
											<?php
											//buat array kolom
											
											$i2 = 1;
											$i3 = 0;
											$maxarray = array();
											$a2 = mysqli_query($k21, "select * from kriteria order by id_criteria asc;");
											echo "<tr>";
											while ($da2 = mysqli_fetch_assoc($a2)) {

												$idalt2 = $da2['id_criteria'];

												//ambil nilai
											
												$n2 = mysqli_query($k21, "select * from nilai where id_criteria='$idalt2'  order by id_nilai ASC");
												$jarakp2 = 0;
												$c2 = 0;
												$ymax2 = array();

												while ($dn2 = mysqli_fetch_assoc($n2)) {
													$idk2 = $dn2['id_criteria'];

													//nilai kuadrat
											
													$nilai_kuadrat2 = 0;
													$k2 = mysqli_query($k21, "select * from nilai where id_criteria='$idk2' order by id_nilai ASC ");
													while ($dkuadrat2 = mysqli_fetch_assoc($k2)) {
														$nilai_kuadrat2 = $nilai_kuadrat2 + ($dkuadrat2['nilai'] * $dkuadrat2['nilai']);
													}

													//hitung jml alternatif
													$jml_alternatif2 = mysqli_query($k21, "select * from alternatif");

													$jml_a2 = mysqli_num_rows($jml_alternatif2);
													//nilai bobot kriteria (rata")
													$bobot2 = 0;
													$tnilai2 = 0;

													$k22 = mysqli_query($k21, "select * from nilai where id_criteria='$idk2'  order by id_nilai ASC ");
													while ($dbobot2 = mysqli_fetch_assoc($k22)) {
														$tnilai2 = $tnilai2 + $dbobot2['nilai'];
													}
													$bobot2 = $tnilai2 / $jml_a2;

													//nilai bobot input
													$b2 = mysqli_query($k21, "select * from kriteria where id_criteria='$idk2'");
													$nbot2 = mysqli_fetch_assoc($b2);
													$bot2 = $nbot2['bobot'];


													$v2 = round(($dn2['nilai'] / sqrt($nilai_kuadrat2)) * $bot2, 4);

													$ymax2[$c2] = $v2;
													$c2++;

													#cek benefit atau cost  
													// echo $nbot2['tipe']." - ".$nbot2['Keterangan_kriteria']."<br>";
											

													if ($nbot2['tipe'] == 'Benefit') {
														$mak2 = max($ymax2);
													} else {
														$mak2 = min($ymax2);
													} #cek benefit atau cost
											
												}
												/*				
												echo "<i>ini ymax2</i>";    
												echo "<pre>";    
												print_r($ymax2);    
												echo "</pre>";  
												*/



												//echo $mak2."| ";    
												//hitung D+			
												foreach ($ymax2 as $nymax2) {

													$jarakp2 = $jarakp2 + pow($nymax2 - $mak2, 2);

												}

												//array max
												$maxarray[$i3] = $mak2;

												//print_r($maxarray);
												//print_r(max($ymax2));			
												$i2++;
												$i3++;
											}
											//session array ymax
											$_SESSION['ymax'] = $maxarray;




											/*    
											echo "<i>ini min  max</i>";    
											echo "<pre>";    
											print_r($maxarray);    
											echo "</pre>";    
											*/

											//array baris//////////////////////////////////////////////////
											$i = 1;
											$ii = 0;
											$dpreferensi = array();

											$a = mysqli_query($k21, "select * from alternatif order by id_alt asc;");
											echo "<tr>";
											while ($da = mysqli_fetch_assoc($a)) {

												$idalt = $da['id_alt'];

												//ambil nilai			
												$n = mysqli_query($k21, "select * from nilai where id_alt='$idalt' order by id_nilai ASC");
												$jarakp = 0;
												$c = 0;
												$ymax = array();
												$arraymaks = array();
												while ($dn = mysqli_fetch_assoc($n)) {
													$idk = $dn['id_criteria'];

													//nilai kuadrat			
													$nilai_kuadrat = 0;
													$k = mysqli_query($k21, "select * from nilai where id_criteria='$idk' order by id_nilai ASC ");
													while ($dkuadrat = mysqli_fetch_assoc($k)) {
														$nilai_kuadrat = $nilai_kuadrat + ($dkuadrat['nilai'] * $dkuadrat['nilai']);
													}

													//hitung jml alternatif
													$jml_alternatif = mysqli_query($k21, "select * from alternatif order by id_alt asc;");

													$jml_a = mysqli_num_rows($jml_alternatif);
													//nilai bobot kriteria (rata")
													$bobot = 0;
													$tnilai = 0;

													$k2 = mysqli_query($k21, "select * from nilai where id_criteria='$idk' order by id_nilai ASC ");
													while ($dbobot = mysqli_fetch_assoc($k2)) {
														$tnilai = $tnilai + $dbobot['nilai'];
													}
													$bobot = $tnilai / $jml_a;

													//nilai bobot input
													$b2 = mysqli_query($k21, "select * from kriteria where id_criteria='$idk'");
													$nbot = mysqli_fetch_assoc($b2);
													$bot = $nbot['bobot'];

													$v = round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot, 4);

													$ymax[$c] = $v;
													$c++;
													$mak = max($ymax);

												}


												/*    
												echo "<i>ini bobot normalisasi</i>";        
												echo "<pre>";    
												print_r($ymax);    
												echo "</pre>";   
												*/

												//hitung D+ 
												foreach ($ymax as $nymax => $value) {
													$maks = $_SESSION['ymax'][$nymax];
													//echo $maks." - ";
											
													//echo $value."| ";
											
													$final = sqrt($jarakp = $jarakp + pow($value - $maks, 2));
													//echo $jarakp." || ";
												}

												echo "<tr>
		<td>$i</td>
		<td>$da[keterangan]</td>
		<td>" . round($final, 4) . "</td>
		</tr>";
												$dpreferensi[$ii] = round($final, 4);
												$_SESSION['dplus'] = $dpreferensi;
												//print_r($ymax);
											
												$i++;
												$ii++;

											}

											echo "</tr>";

											?>

										</tbody>
									</table>

									<!-- tabel min ------------------------------------------------->

									<div class="box-header">
										<h3 class="box-title ">Jarak Solusi Ideal Negatif (D<sup>-</sup>)</h3>
									</div>

									<table class="table table-bordered table-responsive">
										<thead>
											<tr>
												<th>
													<center>Nomor</center>
												</th>
												<th>
													<center>Keterangan</center>
												</th>
												<th>
													<center>D<sup>-</sup></center>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											//buat array kolom
											
											$i2 = 1;
											$i3 = 0;
											$minarray = array();
											$a2 = mysqli_query($k21, "select * from kriteria order by id_criteria asc;");
											echo "<tr>";
											while ($da2 = mysqli_fetch_assoc($a2)) {

												$idalt2 = $da2['id_criteria'];

												//ambil nilai
											
												$n2 = mysqli_query($k21, "select * from nilai where id_criteria='$idalt2' order by id_nilai ASC");
												$jarakp2 = 0;
												$c2 = 0;
												$ymin2 = array();

												while ($dn2 = mysqli_fetch_assoc($n2)) {
													$idk2 = $dn2['id_criteria'];

													//nilai kuadrat
											
													$nilai_kuadrat2 = 0;
													$k2 = mysqli_query($k21, "select * from nilai where id_criteria='$idk2' order by id_nilai ASC ");
													while ($dkuadrat2 = mysqli_fetch_assoc($k2)) {
														$nilai_kuadrat2 = $nilai_kuadrat2 + ($dkuadrat2['nilai'] * $dkuadrat2['nilai']);
													}

													//hitung jml alternatif
													$jml_alternatif2 = mysqli_query($k21, "select * from alternatif order by id_alt asc;");

													$jml_a2 = mysqli_num_rows($jml_alternatif2);
													//nilai bobot kriteria (rata")
													$bobot2 = 0;
													$tnilai2 = 0;

													$k22 = mysqli_query($k21, "select * from nilai where id_criteria='$idk2' order by id_nilai ASC ");
													while ($dbobot2 = mysqli_fetch_assoc($k22)) {
														$tnilai2 = $tnilai2 + $dbobot2['nilai'];
													}
													$bobot2 = $tnilai2 / $jml_a2;

													//nilai bobot input
													$b2 = mysqli_query($k21, "select * from kriteria where id_criteria='$idk2'");
													$nbot2 = mysqli_fetch_assoc($b2);
													$bot2 = $nbot2['bobot'];

													$v2 = round(($dn2['nilai'] / sqrt($nilai_kuadrat2)) * $bot2, 4);

													$ymin2[$c2] = $v2;
													$c2++;

													#cek benefit atau cost
													if ($nbot2['tipe'] == 'Cost') {
														$min2 = max($ymin2);
													} else {
														$min2 = min($ymin2);
													} #cek benefit atau cost
											
													//$min2=min($ymin2);
											
												}

												//hitung D+
											
												foreach ($ymin2 as $nymin2) {

													$jarakp2 = $jarakp2 + pow($nymin2 - $min2, 2);
													//echo "--".$mak."---";
												}

												//array max
												$minarray[$i3] = $min2;

												//print_r($maxarray);
												//print_r(max($ymax2));
											
												$i2++;
												$i3++;
											}
											//session array ymax
											$_SESSION['ymin'] = $minarray;

											//array baris//////////////////////////////////////////////////
											$i = 1;
											$ii = 0;
											$id_alt = array();
											$a = mysqli_query($k21, "select * from alternatif order by id_alt asc;");
											echo "<tr>";
											while ($da = mysqli_fetch_assoc($a)) {

												$idalt = $da['id_alt'];

												//ambil nilai
											
												$n = mysqli_query($k21, "select * from nilai where id_alt='$idalt' order by id_nilai ASC");
												$jarakp = 0;
												$c = 0;
												$ymax = array();
												$arraymin = array();
												while ($dn = mysqli_fetch_assoc($n)) {
													$idk = $dn['id_criteria'];


													//nilai kuadrat
											
													$nilai_kuadrat = 0;
													$k = mysqli_query($k21, "select * from nilai where id_criteria='$idk' order by id_nilai ASC ");
													while ($dkuadrat = mysqli_fetch_assoc($k)) {
														$nilai_kuadrat = $nilai_kuadrat + ($dkuadrat['nilai'] * $dkuadrat['nilai']);
													}

													//hitung jml alternatif
													$jml_alternatif = mysqli_query($k21, "select * from alternatif order by id_alt asc;");

													$jml_a = mysqli_num_rows($jml_alternatif);
													//nilai bobot kriteria (rata")
													$bobot = 0;
													$tnilai = 0;

													$k2 = mysqli_query($k21, "select * from nilai where id_criteria='$idk' order by id_nilai ASC ");
													while ($dbobot = mysqli_fetch_assoc($k2)) {
														$tnilai = $tnilai + $dbobot['nilai'];
													}
													$bobot = $tnilai / $jml_a;

													//nilai bobot input
													$b2 = mysqli_query($k21, "select * from kriteria where id_criteria='$idk'");
													$nbot = mysqli_fetch_assoc($b2);
													$bot = $nbot['bobot'];

													$v = round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot, 4);

													$ymin[$c] = $v;
													$c++;
													$min = max($ymin);

												}
												//hitung D+
												foreach ($ymin as $nymin => $value) {
													$mins = $_SESSION['ymin'][$nymin];
													//	echo $mins." - ";
													$final = sqrt($jarakp = $jarakp + pow($value - $mins, 2));
													//	echo $jarakp." || ";
											
												}

												echo "<tr>
		<td>$i</td>
		<td>$da[keterangan]</td>
		<td>" . round($final, 4) . "</td>
		</tr>";
												//session min
												$dpreferensi[$ii] = round($final, 4);
												$_SESSION['dmin'] = $dpreferensi;
												// print_r($ymin);
											
												//ambil id alternatif
												$id_alt[$ii] = $da['id_alt'];
												$_SESSION['id_alt'] = $id_alt;

												$i++;
												$ii++;
											}

											echo "</tr>";


											?>

										</tbody>
									</table>

								</div>
							</div>
						</div>

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