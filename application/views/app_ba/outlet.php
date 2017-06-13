<div class="container" style="background-color:#f9f9f9 !important;">
	<div class="header-dashboard" style="height:54px !important; min-height:54px !important;">
		<div style="width:100%;position:absolute;z-index:99999;">
			<div class="content">
				<a href="<?php echo base_url();?>index.php/apps/home/">
					<div style="border:2px solid transparent;border-radius:5px;padding:5px;float:left;margin-top:10px"><i class="fa fa-arrow-left color-white"></i></div>
				</a>
				<div style="color:#fff;font-family:'Quicksand-Bold' !important;padding-top:17px;text-align:center;width:90%;float:left;">Pilih Toko</div>
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
				<div class="box-flat">	
						<ul>
							<?php 
								if($query1->num_rows() < 1){
							?>
									<li>
										<div>
											<a href="#">Data Toko Anda Masih Kosong</a>
											<p>Mohon hubungi TL / KBA / Admin BA untuk mendapatkan keterangan mengenai data toko yang akan Anda tangani.</p>
										</div>
									</li>
							<?php
								}else{
									foreach($query1->result() as $outlet){
										?>
										<li>
											<div style="padding:10px 0;">
												<?php 
													$query_check = $this->db->query("select Top 1 ObjectID, ID_OUTLET, TransDt from NewHeader where ID_BA='".$this->session->userdata('id')."' and ID_OUTLET='".$outlet->ID_OUTLET."' and ((month(TransDt)='".date('m', strtotime("-1 days"))."' and day(TransDt)='".date('d', strtotime("-1 days"))."' and year(TransDt)='".date('Y', strtotime("-1 days"))."') or (month(TransDt)='".date('m')."' and day(TransDt)='".date('d')."' and year(TransDt)='".date('Y')."')) order by TransDt desc");
													if($query_check->num_rows() > 0){
														foreach($query_check->result() as $chk){
															echo "<div style='float:left;width:auto !important;padding:10px;color:#fff;background-color:#29b37e !important;font-size:12px !important'><i class='fa fa-check' style='margin-right:5px;'></i>".date('d-M-Y',strtotime($chk->TransDt))."</div><a href='".base_url()."index.php/apps/detail/".$chk->ID_OUTLET."/".$chk->TransDt."' style='float:left;background:#ff8f00;width:auto !important;padding:10px !important;color:#fff !important;font-size:12px !important;'><span class='fa fa-tv' style='margin-right:5px;padding:0;'></span>Detail</a>";
														}
													}
												?>
												<a href="<?php echo base_url();?>index.php/apps/cart/<?php echo $outlet->ID_OUTLET;?>"><?php echo $outlet->NAMA_OUTLET;?></a>
												<span style="font-size:12px;color:#46b7bf;"><?php echo 'Kode Toko : '.$outlet->ID_OUTLET;?></span>
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