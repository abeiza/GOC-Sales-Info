<!--<script>
	$(function(){
		var values = [];
		$.ajax({
			url:"<?php //echo base_url();?>index.php/apps/get_cart/",
			cache:false,
			type: "POST",
			dataType: 'json',
			//jsonp:"mycallback",
			success:function(result){
				$.each(result, function(i, data){
					values.push(data.ID_PRODUCT);
				});
				
				$(".list").find('[value=' + values.join('], [value=') + ']').prop("checked", true);
			}
		});
	});
</script>-->
<script>
	function modify_data(e){
		var element = e.attr('id');
		if($("#" + element).is(':checked')){
			//alert('check');
			$.ajax({
				url:"<?php echo base_url();?>index.php/apps/add_cart_salesman/<?php echo $this->uri->segment(3);?>",
				cache:false,
				data:{
					id:element
				},
				type: "POST",
				dataType: 'json'
				
			});
		}else{
			//alert('uncheck');
			$.ajax({
				url:"<?php echo base_url();?>index.php/apps/delete_cart_salesman/<?php echo $this->uri->segment(3);?>",
				cache:false,
				data:{
					id:element
				},
				type: "POST",
				dataType: 'json'
			});
		}
	}
</script>
<div class="container">
	<div class="header-dashboard" style="height:54px !important; min-height:54px !important;">
		<div style="width:100%;position:absolute;z-index:99999;">
			<div class="content">
				<a href="<?php echo base_url();?>index.php/apps/cart_salesman/<?php echo $this->uri->segment(3);?>">
					<div style="border:2px solid transparent;border-radius:5px;padding:5px;float:left;margin-top:10px"><i class="fa fa-arrow-left color-white"></i></div>
				</a>
				<div style="color:#fff;font-family:'Quicksand-Bold' !important;padding-top:17px;text-align:center;">Daftar Produk</div>
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
			border-bottom:1px solid #e1e1e1;
			padding:15px 0px;
		}
		
		ul{
			margin:0;
			padding:0;
		}
	</style>
	<div class="content-dashboard">
		<div class="content flex">
			<div style="width:100%;">
				<div class="box-flat" id="products">
					<div style="padding: 1% 5%;">					
						<div style="margin-top:13px;">
							<label style="width:100%;margin-bottom:0px;">Cari Produk  <i class="fa fa-exclamation-circle" style="color:#ff8f00;font-size:15px;" data-toggle="tooltip" data-placement="right" title="Isilah kolom di bawah ini untuk mempermudah dalam pencarian produk"></i></label>
							<input type="text" placeholder="cari" style="margin-top:0px !important;color:#46b7bf;font-size:14px !important;font-family:'Lato-Regular' !important;padding:10px 0px !important;" class="form-input search"/>
						</div>
						<div>
							<div>
								<label style="padding-top:10px;">Daftar Produk</label>
							</div>
							<div style="width:100%;float:Left;">
								<a class="sort" data-sort="nama" style="background-color:#ff8f00;color:#fff !important;cursor:pointer;float:Left;margin:1.6px;text-align:center;border-radius:3px;width:48% !important;padding:10px;">Nama</a>
								<a class="sort" data-sort="tipe" style="background-color:#ff8f00;color:#fff !important;cursor:pointer;float:Left;margin:1.6px;text-align:center;border-radius:3px;width:48% !important;padding:10px;">Tipe</a>
							</div>
							<div>
								<ul class="list">
									<?php 
										if($query1->num_rows() < 1){
									?>
										<li>
											<div>
												<a href="#">Data Outlet Anda Masih Kosong</a>
												<p>Mohon hubungi TL / KBA / Admin BA untuk mendapatkan keterangan mengenai data outlet yang akan Anda tangani.</p>
											</div>
										</li>
									<?php
										}else{
											$value = array();
											if($query_cart->num_rows() > 0){
												foreach($query_cart->result() as $crt){
													array_push($value,$crt->ID_PRODUCT);
												}
											}
											
											foreach($query1->result() as $prd){
									?>
												<li>
													<div>
														<input id="<?php echo $prd->ID_PRODUCT;?>" class="prd" name="list_product[]" type="checkbox" onchange='modify_data($(this))' style="display:inline-block;margin:5px 10px;" value="<?php echo $prd->ID_PRODUCT;?>"
															<?php 
																if (in_array($prd->ID_PRODUCT, $value)){
																	echo "checked";
																}
															?>
														/>
														<label for="<?php echo $prd->ID_PRODUCT;?>" style="width:80%;">
															<h2 style="margin-top:5px;font-family:'Quicksand-Bold' !important;font-size:14px !important;" class="nama"><?php echo $prd->NAMA_PRODUCT;?></h2>
															<span style="font-size:12px;" class="volume">Volume : <?php echo $prd->VOLUME;?></span>
															<div style="font-size:12px !important;" class="principle">Kode Principle : <?php echo $prd->PRODUCT_KODE_PRINCIPLE;?></div>
															<div style="font-size:12px !important;" class="tipe">Tipe : <?php echo $prd->NAMA_TIPE_PRODUCT;?></div>
														</label>
													</div>
												</li>
									<?php
											}
										}
									?>
								</ul>
							</div>
							<div style="position:fixed;bottom:20px;right:25px;z-index:99999;">
								<a href="<?php echo base_url();?>index.php/apps/cart_salesman/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5);?>" name="add_cart" style="border:none;padding:16px 15px;text-align:center;cursor:pointer;box-shadow:0 2px 2px 0 rgba(0,0,0,.5), 0 3px 1px -2px rgba(0,0,0,.08), 0 1px 5px 0 rgba(0,0,0,.08);background:#ff8f00;color:#fff;border-radius:100%;float:left;opacity:0.8;"><i class="fa fa-check fa-2x color-white"></i><br/><span style="color:#fff;font-size:12px !important;">Lanjutkan</span></a>
							</div>
							<?php echo $this->session->flashdata('select_result')?>
						</div>
						<!--<div>
							<a style="background-color:#29b37e !important;color:#fff !important;float:Left;text-align:center;border-radius:3px;width:100% !important;padding:10px;">Pilih</a>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var options = {
	  valueNames: [ 'nama','volume','tipe','principle' ]
	};

	var userList = new List('products', options);
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
	$("#notif").click(function(){
		$("#notif").fadeOut();
	});
});
</script>