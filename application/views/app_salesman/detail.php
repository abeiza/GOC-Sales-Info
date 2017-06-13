<div style="position:fixed;bottom:20px;right:25px;z-index:99999;">
	<a href="<?php echo base_url();?>index.php/apps/cart_salesman/" style="text-align:center;padding:12px 13px;cursor:pointer;box-shadow:0 2px 2px 0 rgba(0,0,0,.5), 0 3px 1px -2px rgba(0,0,0,.08), 0 1px 5px 0 rgba(0,0,0,.08);background:#ff8f00;color:#fff;border-radius:100%;float:left;opacity:0.8;font-family:'Quicksand-Bold' !important;"><span style="color:#fff;font-size:14px !important;">Transaksi<br/>Penjualan</span><br/><i class="fa fa-share fa-2x color-white"></i></a>
</div>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
<div class="container">
	<div class="header-dashboard" style="height:54px !important; min-height:54px !important;">
		<div style="width:100%;position:absolute;z-index:99999;">
			<div class="content">
				<a href="<?php echo base_url();?>index.php/apps/recent_salesman/">
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
	<div class="content-dashboard">
		<div class="content flex">
			<div style="width:100%;">
				<div class="box-flat">
					<div style="padding: 1% 5%;">					
						<div style="margin-top:13px;">
							<label style="width:100%;margin-bottom:0px;">Tanggal Transaksi</label>
							<input name="t_date" id="transdt" type="text" style="margin-top:0px !important;color:#46b7bf;font-size:13px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input" value="<?php echo date('d-m-Y', strtotime($transdt));?>" readonly/>
						</div>
						<div>
							<label style="width:100%;margin-bottom:0px;">Nama Salesman</label>
							<input name="ba_name" type="text" style="margin-top:0px !important;color:#46b7bf;font-size:13px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input" value="<?php echo $nama_salesman;?>" readonly/>
						</div>
						<div>
							<label style="width:100%;margin-bottom:0px;">Nama Distributor</label>
							<input name="ba_name" type="text" style="margin-top:0px !important;color:#46b7bf;font-size:13px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input" value="<?php echo $nama_distributor;?>" readonly/>
						</div>
						<div>
							<label style="width:100%;margin-bottom:0px;">Nama Toko</label>
							<input name="outlet_name" type="text" style="margin-top:0px !important;color:#46b7bf;font-size:13px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input" value="<?php echo $nama_outlet;?>" readonly/>
						</div>
						
						<div>
							<div>
								<label style="margin-top:20px;">List Produk</label>
							</div>
							<?php 
								if($query2->num_rows() < 1){
							?>
							<div style="text-align:center;font-family:'Quicksand-Bold' !important;padding:20px;">Data Produk Kosong</div>
							<?php
								}else{
									foreach( $query2->result() as $cart) {
							?>
										<div style="border-bottom:1px solid #e1e1e1;padding:10px 0px;">
											<input type="hidden" value="<?php echo $cart->ID_PRODUCT; ?>" readonly/>
											<input type="hidden" value="<?php echo $cart->NAMA_PRODUCT; ?>" readonly/>
											<input type="hidden" value="<?php echo $cart->PRODUCT_KODE_PRINCIPLE; ?>" readonly/>
											<input type="hidden" value="<?php echo $cart->DESCRIPTION_PRINCIPLE; ?>" readonly/>
											<span style="font-family:'Quicksand-Bold';"><?php echo $cart->NAMA_PRODUCT?></span>
											<div>Volume : <?php echo $cart->VOLUME?></div>
											<div>Kode Produk : <?php echo $cart->PRODUCT_KODE_PRINCIPLE?></div>
											<div style="color:#46b7bf;font-size:12px !important;">Qty &nbsp;<input type="number" id="<?php echo $cart->ID_PRODUCT; ?>" value="<?php echo $cart->Qty;?>" style="margin:5px 0px;padding:5px !important;width:80px;" readonly/></div>
										</div>
							<?php
									}									
								}
							?>
						</div>
					</div>
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