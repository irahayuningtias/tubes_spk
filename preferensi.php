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
											<a class="nav-link" aria-current="page" href="jarakSolusiIdeal.php">Jarak Solusi Ideal
												Positif/Negatif</a>
										</li>
										<li class="nav-item">
											<a class="nav-link active" aria-current="page" href="preferensi.php">Nilai
												Preferensi</a>
										</li>
									</ul>
									<!-- Isi Matrisk -->
									<?php
									@session_start();
									include("config.php");

									/*
									 echo "<i>cek sessionn dplus</i>";    
									echo "<pre>";    
									print_r($_SESSION['dplus']);    
									echo "</pre>";  


									echo "<i>cek sessionn dmin</i>";    
									echo "<pre>";    
									print_r($_SESSION['dmin']);    
									echo "</pre>";  
									*/

									//print_r($_SESSION);
									

									if (!isset($_SESSION['ymax'])) {
										include('jarakSolusiIdeal.php');
									}


									?>
									<br>

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
													<center>V<sub>i</sub></center>
												</th>
											</tr>

										</thead>
										<tbody>
											<?php
											$i = 1;
											$a = mysqli_query($k21, "select * from alternatif order by id_alt asc;");
											echo "<tr>";
											$sortir = array();
											while ($da = mysqli_fetch_assoc($a)) {



												$idalt = $da['id_alt'];

												//ambil nilai
											
												$n = mysqli_query($k21, "select * from nilai where id_alt='$idalt' order by id_nilai ASC");

												$c = 0;
												$ymax = array();
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

													$v = round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot);

													$ymax[$c] = $v;
													$c;
													$mak = max($ymax);
													$min = min($ymax);

												}

												$i++;

											}




											foreach (@$_SESSION['dplus'] as $key => $dxmin) {
												#ubah ke nol hasil akhir
												$nilaid = 0;
												$nilaiPre = 0;
												$nilai = 0;

												$jarakm = $_SESSION['dmin'][$key];
												$id_alt = $_SESSION['id_alt'][$key];

												//nama alternatif
												$nama = mysqli_query($k21, "select * from alternatif where id_alt='$id_alt'");
												$nm = mysqli_fetch_assoc($nama);


												//echo $jarakm." / <br> ";	
//echo $dxmin." + ";	
//echo $jarakm."<br><br>";	
											


												$nilaiPre = $dxmin + $jarakm;

												$nilaid = $jarakm / $nilaiPre;


												$nilai = round($nilaid, 4);

												//simpan ke tabel nilai preferensi
												$nm = $nm['keterangan'];

												$sql2 = mysqli_query($k21, "insert into nilai_preferensi (keterangan,nilai) values('$nm','$nilai')");

												//echo "insert into nilai_preferensi (keterangan,nilai) values('$nm','$nilai')";
											

											}

											//ambil data sesuai dengan nilai tertinggi
											$i = 1;
											$sql3 = mysqli_query($k21, "select * from nilai_preferensi  order by nilai desc");
											while ($data3 = mysqli_fetch_assoc($sql3)) {
												echo "<tr>
		<td>" . $i . "</td>
		<td>$data3[keterangan]</td>
		<td>$data3[nilai]</td>
		</tr>";

												$i++;
											}


											//kosongkan tabel nilai preferensi
											$del = mysqli_query($k21, "delete from nilai_preferensi");

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