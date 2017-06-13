<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
<style>
	/* webkit solution */
	::-webkit-input-placeholder { text-align:right; }
	/* mozilla solution */
	input:-moz-placeholder { text-align:right; }
</style>
<script>
	$(function(){
		$("#transdt").datepicker(
			{
				minDate: new Date("<?php echo date('Y', strtotime("-5 days"));?>,<?php echo date('m', strtotime("-5 days"));?>,<?php echo date('d', strtotime("-5 days"));?>"),
				maxDate: new Date("<?php echo date('Y'); ?>,<?php echo date('m'); ?>,<?php echo date('d'); ?>"),
				dateFormat: 'dd-mm-yy'
			}
		);
		
		$("#transdt").change(
			function(){
				var dat = $("#transdt").val().split('-');
				var convdate = dat[2] + '-' + dat[1] + '-' + dat[0] + ' 00:00:00';
				$("#transdte").val(convdate);
			}
		);
	});
</script>
<script>
	function modify_data(e){
		var element = e.attr('id');
		var element2 = $("#" + element).val();
		$.ajax({
			url:"<?php echo base_url();?>index.php/apps/add_qty_cart_salesman/",
			cache:false,
			data:{
				id:element,
				qty:element2
			},
			type: "POST",
			dataType: 'json'
			
		});
	}
</script>
<script>
	$(function(){
		$("#outlet_name").alphanum({
			allow              : 'àâäæ',
			disallow           : '',
			allowSpace         : true,
			allowNumeric       : true,
			allowUpper         : true,
			allowLower         : true,
			allowCaseless      : true,
			allowLatin         : true,
			allowOtherCharSets : true,
			forceUpper         : false,
			forceLower         : false,
			maxLength          : NaN
		});
	})
</script>
<script>
	function delete_data(e){
		//alert('a');
		var elementa = e.attr('class');
		$.ajax({
			url:"<?php echo base_url();?>index.php/apps/delete_qty_cart_salesman/",
			cache:false,
			data:{
				id:elementa
			},
			type: "POST",
			dataType: 'json',
			success:function(data){
				window.location.reload();
			}
		});
	}
</script>

<div class="container">
	<div class="header-dashboard" style="height:54px !important; min-height:54px !important;">
		<div style="width:100%;position:absolute;z-index:99999;">
			<div class="content">
				<a href="<?php echo base_url();?>index.php/apps/home_salesman/" style="float;">
					<div style="border:2px solid transparent;border-radius:5px;padding:5px;float:left;margin-top:10px"><i class="fa fa-arrow-left color-white"></i></div>
				</a>
				<div style="color:#fff;font-family:'Quicksand-Bold'!important;padding-top:15px;width:80%;text-align:center;float:left;">Transaksi Penjualan</div>
				<!--<div style="padding:5px;float:right;margin-top:10px">-->
					<input id="check-menu" type="checkbox"/>
					<label for="check-menu" style="width:30px;cursor:pointer;padding:5px;float:right;margin-top:10px;text-align:center;"><i class="fa fa-ellipsis-v fa-2x color-white"></i></label> 
				<!--</div>-->
				<div class="nav" id="menu">
					<ul>
						<li><a href="<?php echo base_url();?>index.php/apps/recent_salesman/">Riwayat Transaksi</a></li>
					</ul>
				</div>
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
					<?php echo $this->session->flashdata('cart_result')?>
					<?php echo form_open('apps/checkout_salesman/'.$this->uri->segment(3));?>
					<div style="padding: 1% 5%;">					
						<div style="margin-top:13px;">
							<label style="width:100%;margin-bottom:0px;font-family:'Quicksand-Bold' !important">Tanggal Transaksi</label>
							<input name="t_date" id="transdt" type="text" style="margin-top:0px !important;color:#46b7bf;font-size:13px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input" value="<?php 
							if($this->uri->segment(4) != ''){ 
								echo date('d-m-Y', strtotime(urldecode($this->uri->segment(4))));
							}else{ 
								echo date('d-m-Y'); 
							}?>" readonly/>
							<input name="trans_date" id="transdte" type="hidden" style="margin-top:0px !important;color:#46b7bf;font-size:13px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input" value="<?php 
							date_default_timezone_set('Asia/Jakarta'); 
							if($this->uri->segment(5) != ''){ 
								echo date('Y-m-d', strtotime(urldecode($this->uri->segment(5))));
							}else{ 
								echo date('Y-m-d'); 
							}?>" readonly/>
						</div>
						<div>
							<label style="width:100%;margin-bottom:0px;font-family:'Quicksand-Bold' !important">Nama Salesman</label>
							<input name="salesman_name" type="text" style="margin-top:0px !important;color:#46b7bf;font-size:13px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input" value="<?php echo $nama_salesman;?>" readonly/>
						</div>
						<div>
							<label style="width:100%;margin-bottom:0px;font-family:'Quicksand-Bold' !important">Nama Distributor</label>
							<input name="distributor_name" type="text" style="margin-top:0px !important;color:#46b7bf;font-size:13px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input" value="<?php echo $nama_distributor;?>" readonly/>
							<input name="id_distributor" type="hidden" style="margin-top:0px !important;color:#46b7bf;font-size:13px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input" value="<?php echo $id_distributor;?>" readonly/>
						</div>
						<div>
							<label style="width:100%;margin-bottom:0px;font-family:'Quicksand-Bold' !important">Nama Toko</label>
							<div style="color:#ff8f00 !important;font-size:12px;"><?php echo form_error('outlet_name'); ?></div>
							<input name="outlet_name" id="outlet_name" type="text" style="margin-top:0px !important;color:#46b7bf;font-size:13px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input" value="<?php echo ($this->uri->segment(3) == '' or $this->uri->segment(3) == 'none')?'':urldecode($this->uri->segment(3));?>"/>
							<input name="id_area" type="hidden" style="margin-top:0px !important;color:#46b7bf;font-size:13px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input" value="<?php echo $id_area;?>" readonly/>
						</div>
						<div>
							<a id="list-prod" style="background-color:#ff8f00;color:#fff !important;float:Left;text-align:center;border-radius:3px;width:100% !important;padding:10px;">Tambah Produk</a>
						</div>
						<div id="products">
							<div>
								<label style="margin-top:20px;">Daftar Produk</label>
							</div>
							<?php 
								if($query_cart->num_rows() < 1){
							?>
							<div style="text-align:center;font-family:'Quicksand-Bold' !important;padding:20px;">Data Produk Kosong</div>
							<?php
								}else{
							?>
								<div style="margin-top:13px;">
									<label style="width:100%;margin-bottom:0px;font-family:'Quicksand-Bold' !important;text-align:right;">Cari Produk  <i class="fa fa-exclamation-circle" style="color:#ff8f00;font-size:15px;" data-toggle="tooltip" data-placement="left" title="Isilah kolom di bawah ini untuk mempermudah dalam pencarian produk"></i></label>
									<input type="text" placeholder="cari" style="margin-top:0px !important;color:#46b7bf;font-size:14px !important;font-family:'Lato-Regular' !important;padding:10px 0px !important;" class="form-input search"/>
								</div>
								<div class="list">
							<?php
									foreach( $query_cart->result() as $cart) {
										$query1 = $this->db->query("select * from Ms_PRODUCT, Ms_PRODUCT_CATEGORY WHERE Ms_PRODUCT_CATEGORY.ID_TIPE_PRODUCT = Ms_PRODUCT.ID_TIPE_PRODUCT and Ms_PRODUCT.ID_PRODUCT = '".$cart->ID_PRODUCT."'");
										foreach($query1->result() as $prd){
							?>
										<div style="border-bottom:1px solid #e1e1e1;padding:10px 0px;">
											<a onclick='delete_data($(this))' class="<?php echo $prd->ID_PRODUCT; ?>" style="float:right;cursor:pointer;"><i class="fa fa-trash-o" style="font-size:18px;;"></i> Hapus</a>
											<input type="hidden" name="list_product[]" value="<?php echo $prd->ID_PRODUCT; ?>"/>
											<input type="hidden" name="nama_product[]" value="<?php echo $prd->NAMA_PRODUCT; ?>"/>
											<input type="hidden" name="kode_product[]" value="<?php echo $prd->PRODUCT_KODE_PRINCIPLE; ?>"/>
											<input type="hidden" name="desc_product[]" value="<?php echo $prd->DESCRIPTION_PRINCIPLE; ?>"/>
											<span class="nama" style="font-family:'Quicksand-Bold';"><?php echo $prd->NAMA_PRODUCT?></span>
											<div>Volume : <?php echo $prd->VOLUME?></div>
											<div>Kode Produk : <?php echo $prd->PRODUCT_KODE_PRINCIPLE?></div>
											<div class="tipe">Tipe Produk : <?php echo $prd->NAMA_TIPE_PRODUCT?></div>
											<div style="color:#46b7bf;font-size:12px !important;">Qty &nbsp;<input type="number" name="qty[]" onchange='modify_data($(this))' id="<?php echo $prd->ID_PRODUCT; ?>" value="<?php echo $cart->Qty;?>" required style="margin:5px 0px;padding:5px !important;width:80px;"/></div>
										</div>
							<?php
										}
									}									
								}
							?>
							</div>
						</div>
						<div>
							<button type="submit" style="font-family:'Quicksand-Bold'!important;border:none;background-color:#29b37e !important;color:#fff !important;float:Left;text-align:center;border-radius:3px;width:100% !important;padding:10px;">Kirim Transaksi</button>
						</div>
					</div>
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var options = {
	  valueNames: [ 'nama' , 'tipe' ]
	};

	var userList = new List('products', options);
</script>
<script>
/*$(document).ready(function(){
	var outlet = $("#outlet_name").val();
	if(outlet == ''){
		var nama_outlet = 'none';
	}else{
		var nama_outlet = outlet;
	}
	var transdt = $("#transdt").val();
	var transdte = $("#transdte").val();
	$("#list-prod").attr("href", "http://192.168.171.116/SG_mobile/index.php/apps/list_product_salesman/" + nama_outlet + "/" + transdt+ "/" + transdte);
});*/
</script>
<script>
$(document).ready(function(){
	/*$("#outlet_name").change(function(){
		var outlet = $("#outlet_name").val();
		if(outlet == ''){
			var nama_outlet = 'none';
		}else{
			var nama_outlet = outlet;
		}
		var transdt = $("#transdt").val();
		var transdte = $("#transdte").val();
		$("#list-prod").attr("href", "http://192.168.171.116/SG_mobile/index.php/apps/list_product_salesman/" + str.trim(nama_outlet) + "/" + transdt+ "/" + transdte);
	});*/
	
	$("#list-prod").click(
		function(){
			var outlet = $("#outlet_name").val();
			if(outlet == ''){
				var nama_outlet = 'none';
			}else{
				var nama_outlet = outlet;
			}
			var transdt = $("#transdt").val();
			var transdte = $("#transdte").val();
			window.location.href = "http://112.78.137.253/GSI/index.php/apps/list_product_salesman/" + $.trim(nama_outlet) + "/" + transdt+ "/" + transdte;
		}
	);
	
	/*$("#transdt").change(function(){
		var outlet = $("#outlet_name").val();
		if(outlet == ''){
			var nama_outlet = 'none';
		}else{
			var nama_outlet = outlet;
		}
		var transdt = $("#transdt").val();
		var transdte = $("#transdte").val();
		$("#list-prod").attr("href", "http://192.168.171.116/SG_mobile/index.php/apps/list_product_salesman/" + str.trim(nama_outlet) + "/" + transdt+ "/" + transdte);
	});
	
	$("#transdte").change(function(){
		var outlet = $("#outlet_name").val();
		if(outlet == ''){
			var nama_outlet = 'none';
		}else{
			var nama_outlet = outlet;
		}
		var transdt = $("#transdt").val();
		var transdte = $("#transdte").val();
		$("#list-prod").attr("href", "http://192.168.171.116/SG_mobile/index.php/apps/list_product_salesman/" + str.trim(nama_outlet) + "/" + transdt+ "/" + transdte);
	});*/
});
</script>
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