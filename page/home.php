<?
include('koneksi.php');
?>

<div class="col-sm-12">
	<div class="panel panel-body">
	<div class="container-fluid">
		<h1 class="h2 mb-4 text-black-800">Dashboard</h1>
		<hr>
		<div class="row">
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Paket Modul</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM paketmodul")); ?> Paket Modul</div>
							</div>
							<div class="col-auto">
								<i class="fa fa-tasks fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Murid</div>
								<div class="row no-gutters align-items-center">
									<div class="col-auto">
										<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
										<?= mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM user"));?> Murid</div>
									</div>
								</div>
							</div>
							<div class="col-auto">
								<i class="fa fa-users fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Transaksi</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?= mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM transaksi")) ?> Transaksi</div>
							</div>
							<div class="col-auto">
								<i class="fa fa-shopping-cart fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pengajar</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pengajar")); ?> Pengajar</div>
							</div>
							<div class="col-auto">
								<i class="fa fa-briefcase fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>				
	</div>
	<!-- /.container-fluid -->
	</div>
</div>



	<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
	</a>
