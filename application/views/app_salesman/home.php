<script>
	function currencyFormat (num) {
		var c = parseFloat(num);
		var a = String(c);
		return "IDR " + a.toString(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
	}
	
	function numberFormat (num) {
		var c = parseFloat(num);
		var a = String(c);
		return a.toString(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
	}
</script>
<script>
function loadBell(){
	var id_data = '<?php echo $this->session->userdata('id');?>';
	$.ajax({
		url:"<?php echo base_url();?>index.php/apps/get_bell_salesman/",
		cache:false,
		data:"id_data="+id_data,
		type: "POST",
		dataType: 'json',
		success:function(result){
				//$('#bell1 span').remove();
				$('#bell2 span').remove();
			
				//$('#bell1').append('<span style="padding:0px 4px;font-size:12px;color:#fff;background:#ff8f00;border-radius:100%;">'+numberFormat(result.bell1)+'</span>');
				$('#bell2').append('<span style="padding:0px 4px;font-size:12px;color:#fff;background:#ff8f00;border-radius:100%;">'+numberFormat(result.bell2)+'</span>');
		}
	});
}
</script>
<script>
$(function(){
	$(function(){
		var id_data = '<?php echo $this->session->userdata('id');?>';
		$.ajax({
			url:"<?php echo base_url();?>index.php/apps/get_bell_salesman/",
			cache:false,
			data:"id_data="+id_data,
			type: "POST",
			dataType: 'json',
			success:function(result){
					$('#bell1 span').remove();
					$('#bell2 span').remove();
				
					$('#bell1').append('<span style="padding:0px 4px;font-size:12px;color:#fff;background:#ff8f00;border-radius:100%;">'+numberFormat(result.bell1)+'</span>');
					$('#bell2').append('<span style="padding:0px 4px;font-size:12px;color:#fff;background:#ff8f00;border-radius:100%;">'+numberFormat(result.bell2)+'</span>');
			}
		});
	});
	
	setInterval(function(){loadBell()}, 2000);
});
</script>
<div class="container">
	<div class="header-dashboard" style="background-image:url('<?php echo base_url();?>assets/img/green.jpg');background-size:cover;background-repeat:no-repeat;">
		<div style="width:100%;position:absolute;z-index:99999;">
			<div class="content">
				<a href="<?php echo base_url();?>index.php/apps/act_logout_salesman/"><div style="border:2px solid #fff;border-radius:5px;padding:5px;float:left;margin-top:10px"><i class="fa fa-power-off color-white"></i> <span class="color-white">Logout</span></div></a>
				<!--<div style="padding:5px;float:right;margin-top:10px">-->
					<input id="check-menu" type="checkbox"/>
					<label for="check-menu" style="width:30px;cursor:pointer;padding:5px;float:right;margin-top:10px;text-align:center;"><i class="fa fa-ellipsis-v fa-2x color-white"></i></label> 
				<!--</div>-->
				<div class="nav" id="menu">
					<ul>
						<li><a href="<?php echo base_url();?>index.php/apps/profile_salesman/">Profil<a/></li>
						<li><a href="<?php echo base_url();?>index.php/apps/new_product_salesman/">Produk Baru<a/></li>
						<li><a href="<?php echo base_url();?>index.php/apps/report_salesman/">Kinerja</a></li>
						<li><a href="<?php echo base_url();?>index.php/apps/help_salesman/">Bantuan</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container flex">
			<div class="content center jarak-10">
				
				
				<div>
					<a href="<?php echo base_url();?>index.php/apps/profile_salesman/">
					<?php 
						if($pict == null or $pict == ''){
					?>
						<img src="<?php echo base_url();?>assets/img/boy.png" style="width:87px;opacity:0.8;border:3px solid #fff;border-radius:100%;"/>
					<?php
						}else{
					?>
						<img src="<?php echo base_url();?>uploads/account/thumb/<?php echo $pict;?>" style="width:87px;opacity:0.8;border:3px solid #fff;border-radius:15px;"/>
					<?php
						}
					?>
					<i class="fa fa-camera" style="background:#fff;padding:5px;color:#666;border-radius:100%;opacity:0.7;position:absolute;margin-top:60px;margin-left:-30px;"></i>
					</a>
				</div>
				<div><h2 class="color-white" style="margin-bottom:0px;margin-top:10px;"><?php echo $nama;?></h2></div>
				<div class="color-white">Salesman</div>
				<!--<div><h1 class="color-white" style="margin-top:5px;">Rp 1.000.000</h1></div>-->
				<div class="jarak-10" style="float:left;width:100%;">
					<label style="float:left;width:50%;padding:1.5%;cursor:pointer;" data-toggle="tooltip" data-placement="top" title="<?php echo $distributor;?>">
						<div style="width:100%;float:left;">
							<div>
								<span style="padding:1px 6px;font-size:12px;color:#fff;background:#ff8f00;border-radius:100%;"><i class="fa fa-info"></i></span>
							</div>
							<i class="fa fa-industry color-white" style="font-size:24px;"></i>
						</div>
						<div style="width:100%;float:left;font-family:'Quicksand-regular';margin-top:5px;" class="color-white">Distributor</div>
					</label>
					<input id="check-product" type="checkbox"/>
					<label style="float:left;width:50%;padding:1.5%;cursor:pointer;" for="check-product">
						<a href="<?php echo base_url();?>index.php/apps/new_product_salesman/">
						<div style="width:100%;float:left;">
							<div id="bell2">
								
							</div>
							<i class="fa fa-dropbox color-white" style="font-size:24px;"></i>
						</div>
						<div style="width:100%;float:left;font-family:'Quicksand-regular';margin-top:5px;" class="color-white">Produk Baru</div>
						</a>
					</label>
				</div>
				<div>
					<a style="background-color:#ff8f00;display:inline-block;margin-top:50px;padding:12px 13px;border-radius:100%;box-shadow:0 2px 2px 0 rgba(0,0,0,.5), 0 3px 1px -2px rgba(0,0,0,.08), 0 1px 5px 0 rgba(0,0,0,.08);" href="<?php echo base_url();?>index.php/apps/cart_salesman/"><span style="color:#fff;font-size:14px !important;font-family:'Quicksand-Bold' !important">Transaksi<br/>Penjualan</span><br/><i class="fa fa-share fa-2x color-white"></i></a>
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
});
</script>