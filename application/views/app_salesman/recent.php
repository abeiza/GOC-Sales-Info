<div style="position:fixed;bottom:20px;right:25px;z-index:99999;">
	<a href="<?php echo base_url();?>index.php/apps/cart_salesman/" style="text-align:center;padding:12px 13px;cursor:pointer;box-shadow:0 2px 2px 0 rgba(0,0,0,.5), 0 3px 1px -2px rgba(0,0,0,.08), 0 1px 5px 0 rgba(0,0,0,.08);background:#ff8f00;color:#fff;border-radius:100%;float:left;opacity:0.8;font-family:'Quicksand-Bold' !important;"><span style="color:#fff;font-size:14px !important;">Transaksi<br/>Penjualan</span><br/><i class="fa fa-share fa-2x color-white"></i></a>
</div>
<div class="container" style="background-color:#f9f9f9 !important;">
	<div class="header-dashboard" style="height:54px !important; min-height:54px !important;">
		<div style="width:100%;position:absolute;z-index:99999;">
			<div class="content">
				<a href="<?php echo base_url();?>index.php/apps/home_salesman/">
					<div style="border:2px solid transparent;border-radius:5px;padding:5px;float:left;margin-top:10px"><i class="fa fa-arrow-left color-white"></i></div>
				</a>
				<div style="color:#fff;font-family:'Quicksand-Bold' !important;padding-top:17px;text-align:center;width:90%;float:left;">Transaksi Penjualan</div>
				<!--<div style="padding:5px;float:right;margin-top:10px">--
					<input id="check-menu" type="checkbox"/>
					<label for="check-menu" style="width:30px;cursor:pointer;padding:5px;float:right;margin-top:10px;text-align:center;"><i class="fa fa-ellipsis-v fa-2x color-white"></i></label> 
				<!--</div>--
				<div class="nav" id="menu">
					<ul>
						<li><a href="<?php echo base_url();?>index.php/apps/profile/">Profile<a/></li>
						<li><a href="<?php echo base_url();?>index.php/apps/list_report/">Report</a></li>
						<li><a href="<?php echo base_url();?>index.php/apps/help/">Help</a></li>
					</ul>
				</div>-->
			</div>
		</div>
	</div>
	<!--<div class="container flex" style="height:100px !important; min-height:100px !important;background-color:#f9f9f9">
		<div class="content">
			<div>
				<img src="<?php //echo base_url();?>assets/img/user.png" style="width:87px;opacity:0.8;border:3px solid #fff;border-radius:100%;"/>
				<i class="fa fa-camera" style="background:#fff;padding:5px;color:#666;border-radius:100%;opacity:0.7;position:absolute;margin-top:60px;margin-left:-30px;"></i>
				<div style="display:inline-block;">
					<h4 style="width:auto !important;font-size:13px;margin-top:0px;margin-bottom:0px;">Evan Abeiza</h4>
					<span style="width:auto !important;font-size:18px;color:#46b7bf">Kode BA : BA001</span>
				</div>
			</div>
		</div>
	</div>-->
	<style>
		ul li{
			list-style:none;
			background-color:#fff;
			margin:5px;
		}
		
		ul li div, ul li div a{
			width:100%;
		}
		
		ul li div a{
			display:inline-block;
			padding:15px;
			font-family:'Quicksand-Bold' !important;
		}
		
		ul li div p, ul li div span{
			padding:15px;
		}
		
		ul{
			margin:0;
			padding:0;
		}
	</style>
	<div class="content-dashboard" style="background-color:#f9f9f9 !important;">
	<?php echo $this->session->flashdata('outlet_result')?>
		<div class="content flex">
			<div style="width:100%;">
				<h4 style="margin-bottom:0px;font-family:'Quicksand-Bold'!important">Transaksi Sebelumnya :</h4>
				<span style="font-size:12px;color:#46b7bf;">(Transaksi yang telah diinput hari ini)</span>
				<div class="box-flat">	
						<ul>
							<?php 
								if($query1->num_rows() < 1){
							?>
									<li>
										<div>
											<a href="#">Data Transaksi Anda Masih Kosong</a>
											<p>Mohon input transaksi untuk pelaporan penjualan hari ini.</p>
										</div>
									</li>
							<?php
								}else{
									foreach($query1->result() as $outlet){
										?>
										<li>
											<div style="padding:10px 0;">
												<a href="#"><?php echo $outlet->ID_OUTLET;?></a><a href="<?php echo base_url().'index.php/apps/detail_salesman/'.$outlet->ObjectID.'/'.$outlet->ReceiveDt;?>" style='background:#ff8f00;width:auto !important;padding:10px !important;color:#fff !important;font-size:12px !important;'><span class='fa fa-tv' style='margin-right:5px;padding:0;'></span>Detail</a>
												
												<span style="font-size:12px;color:#46b7bf;"><?php echo 'Tanggal Transaksi  : '.date('d M Y', strtotime($outlet->TransDt));?></span>
											</div>
										</li>
										<?php
									}
									
								}
							?>
						</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
	$("#notif").click(function(){
		$("#notif").fadeOut();
	});
	
	$("#notif1").click(function(){
		$("#notif1").fadeOut();
	});
});
</script>