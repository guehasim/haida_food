<?php error_reporting(0); ?>
<html>
<head>
<title>Check In Canteen / 入住食堂</title>
 <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Estate Register Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
	
	<!-- css files -->
	<link href="<?php echo base_url() ?>assets/user/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo base_url() ?>assets/user/css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<!-- //css files -->

	
	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900" rel="stylesheet">
	<!-- //google fonts -->
	
	
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

	<!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>

<style>
.table_desain{
	width: 70%;
	height: 70px;
}
tr{
	width: 10px;
}
td{
	padding: 0px 10px 10px 10px;
}
.box{
	background-color: white;
	width: 150px;
	height: 200px;
	border: 2px solid white;
	/*margin: 10px;*/
}
</style>

<div class="signupform">
	<h1>Check In Canteen / 入住食堂</h1>
		<div class="container" style="padding: 0px 0px 0px 150px;">
			<!-- main content -->
			<div class="agile_info">

				<div class="w3_info" style="-webkit-flex-basis: 50%;padding: 0em 0em;">
					<p style="font-size:30px;text-align: center;font-weight: bold;">
						Data Karyawan
						<br>
						员工数据
					</p>
					<div class="input-group" style="padding: 0px 0px 0px 150px;">
						<div class="box">
							<?php foreach ($identitas->result() as $ad): ?>
								<?php $id = $ad->ID_Trans;?>
							<?php endforeach ?>
								<?php if ($id != NULL): ?>
									<?php foreach ($identitas->result() as $ad): ?>
										<?php $img = $ad->ImageUser;?>
										<?php if ($img != NULL): ?>
											<?php foreach ($identitas->result() as $ad): ?>
												<img class="img-responsive avatar-view" src="<?=base_url()?>assets/upload/images/<?php echo $ad->ImageUser;?>" style="width:150px; height:200px; display: block;">
											<?php endforeach ?>	
										<?php else: ?>
											<img class="img-responsive avatar-view" src="<?=base_url()?>assets/upload/images/no_image.png" style="width:120px; height:200px; display: block;">
										<?php endif ?>
									<?php endforeach ?>
																	
								<?php else: ?>
									<img class="img-responsive avatar-view" src="<?=base_url()?>assets/upload/images/no_image.png" style="width:120px; height:200px; display: block;">
								<?php endif ?>
						</div>
					</div>
					<div class="input-group">
						<div style="padding: 0px 0px 0px 30px">

							<table class="table_desain" style="color:#FFFFFF;width: 100%;font-weight: bold;">
								<?php foreach ($identitas->result() as $ad): ?>
									<?php $id = $ad->ID_Trans;?>
								<?php endforeach ?>

								<?php if ($id != NULL): ?>
									<tr>
										<td>Nama / 姓名</td>
										<td>:</td>
										<td>
											<?php echo $ad->NamaUser;?>
										</td>
									</tr>
									<tr>
										<td>Department / 部</td>
										<td>:</td>
										<td>
											<?php echo $ad->DeptUser;?>
										</td>
									</tr>
									<tr>
										<td>Jabatan / 位置</td>
										<td>:</td>
										<td>
											<?php echo $ad->NamaJabatan;?>
										</td>
									</tr>
								<?php else: ?>
									<tr>
										<td>Nama / 姓名</td>
										<td>:</td>
										<td>
											<?php echo "-";?>
										</td>
									</tr>
									<tr>
										<td>Department / 部门</td>
										<td>:</td>
										<td>
											<?php echo "-";?>
										</td>
									</tr>
								<?php endif ?>								

								
							</table>
						</div>
					</div>   
				</div>
				<div class="w3l_form" style="-webkit-flex-basis: 40%;padding: 0em 0em;">
					<p style="font-size:30px;color: black;text-align: center;font-weight: bold;">
						Data Bulan Ini
						<br>
						本月数据
					</p>
					<div style="text-align:center;font-weight: bold;">
						<?php foreach ($identitas->result() as $ad): ?>
							<?php $id = $ad->ID_User;?>
						<?php endforeach ?>
						<label style="font-size:200px;color: #000000;text-align:center;">

						<?php
						$bulan_tahun 	= date('Y-m');
						$period_awal 	= $bulan_tahun.'-01';
						$period_akhir 	= date('Y-m-t');

						 ?>
						<?php $query = $this->db->query("SELECT	COUNT(tbl_transaksi.ID_User) AS total
															FROM 
																tbl_transaksi
															WHERE
																tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir' AND tbl_transaksi.ID_User = '$id' ");
						foreach ($query->result() as $as) {
							echo $as->total;
						}

						?>

						</label>
						<div style="padding: 20px 0px 0px 60px">
							<table class="table_desain" style="color:black;width: 90%;font-weight: bold;">
								<?php foreach ($identitas->result() as $ad): ?>
									<?php $id = $ad->ID_Trans;?>
								<?php endforeach ?>

								<?php if ($id != NULL): ?>
									<tr>
										<td>Tanggal / 日期</td>
										<td>:</td>
										<td>
											<?php echo date('d M y',strtotime($ad->TglTrans));?>
										</td>
									</tr>
									<tr>
										<td>Jam / 点钟</td>
										<td>:</td>
										<td>
											<?php echo date('H : i : s',strtotime($ad->JamTrans));?>
										</td>
									</tr>
								<?php else: ?>
									<tr>
										<td>Tanggal / 日期</td>
										<td>:</td>
										<td>
											<?php echo "-";?>
										</td>
									</tr>
									<tr>
										<td>Jam / 点钟</td>
										<td>:</td>
										<td>
											<?php echo "-" ?>
										</td>
									</tr>
								<?php endif ?>								
							</table>							
						</div>
						<div style="padding-top: 3px;">
							<?php
							foreach ($identitas->result() as $ad) {
								$idnya = $ad->ID_User;
							}

							$period_awal = date('Y-m',strtotime('-1 months'))."-01";
							$period_akhir = date('Y-m-t',strtotime('-1 months'));
							$query = $this->db->query("SELECT
															COUNT(tbl_transaksi.ID_User) AS total
														FROM
															tbl_transaksi
														WHERE
															tbl_transaksi.ID_User = '$idnya' AND
															tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir'");
							foreach ($query->result() as $as) {
								$totalnya = $as->total;
							}
							 ?>

							<table style="font-size: 18px; border: 1px solid white;background-color: #0000FF; color: white;" width="100%" height="10%">
								<tr style="text-align:center;">
									<td style="text-align:center;vertical-align: middle;border: 1px solid white;">Total Bulan Lalu</td>
									<td style="text-align:center;vertical-align: middle;border: 1px solid white;"><?php echo $totalnya;?> Record</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- //main content -->
		</div>
		<form action="<?php echo base_url() ?>Home/simpan" method="post">
			<input type="text" name="no_kartu" width="50px" style="color: #000000; opacity: 0.5;" autocomplete="off" autofocus>
			<input type="submit" style="height: 0px; width: 0px; border: none; padding: 0px;" hidefocus="true" />
		</form>
</div>




    <script type="text/javascript">
	    <?php if($this->session->flashdata('success')){ ?>
	        toastr.success("<?php echo $this->session->flashdata('success'); ?>");
	    <?php }else if($this->session->flashdata('error')){  ?>
	        toastr.error("<?php echo $this->session->flashdata('error'); ?>");
	    <?php }else if($this->session->flashdata('warning')){  ?>
	        toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
	    <?php }else if($this->session->flashdata('info')){  ?>
	        toastr.info("<?php echo $this->session->flashdata('info'); ?>");
	    <?php } ?>
	</script>
	
</body>
</html>