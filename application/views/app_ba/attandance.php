<script>
	function currencyFormat(num) {
		var c = parseFloat(num);
		var a = String(c);
		return "IDR " + a.toString(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
	}
	
	function numberFormat(num) {
		var c = parseFloat(num);
		var a = String(c);
		return a.toString(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
	}
	
	function pad(n) {
		return (n < 10) ? ("0" + n) : n;
	}
</script>

<script>
function loadDetailAbsensi(){
	var id_data = '<?php echo $this->session->userdata('id');?>';
	$.ajax({
		url:"<?php echo base_url();?>index.php/apps/get_detail_absensi/",
		cache:false,
		data:"id_data="+id_data,
		type: "POST",
		dataType: 'json',
		success:function(result){
				$("#data-absensi #list-absensi").remove();
				//$("#kode").append('<option value="" selected disabled> -- Select Distributor -- </option>');
				
				
				$.each(result, function(i, data){
					if(data.Tgl == null){
						$('#data-absensi').append("<div id='list-absensi'>Data Absensi Kosong</div>");
					}else{
						var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
						  "Juli", "Agustus", "September", "Oktober", "November", "Desember"
						];
		
						var d = new Date();
						$('#data-absensi').append("<div id='list-absensi' class='panel-group' style='margin-bottom:5px;'><div class='panel panel-default' style='border:none;box-shadow:none;'><div id='sales_all' class='panel panel-heading' style='background-color:#fff;border:none;box-shadow:none;'><h4 class='panel-title'><a data-toggle='collapse' style='font-family:Quicksand-bold !important;' href='#data"+data.Tgl+"'>"+ pad(data.Tgl) + "-" + ("0" + (d.getMonth() + 1)).slice(-2) + "-" +d.getFullYear()+ "</a><a id='all_sales_amount' data-toggle='collapse' style='font-family:Quicksand-bold !important;' href='#data"+data.Tgl+"' class='pull-right'><i class='fa fa-check'></i></a></h4></div><div id='data"+data.Tgl+"' class='panel-collapse collapse in'><ul id='sales_detail' class='list-group' style='border:none !important;'><li class='list-group-item' style='border-bottom:none;border-top:1px dashed #ddd;'><span>Nominal Penjualan :</span><span class='pull-right'>"+numberFormat(data.Value)+"</span></li></ul></div></div></div>");
					}
				});
		}
	});
}

function loadAllAbsensi(){
	var id_data = '<?php echo $this->session->userdata('id');?>';
	$.ajax({
		url:"<?php echo base_url();?>index.php/apps/get_all_absensi/",
		cache:false,
		data:"id_data="+id_data,
		type: "POST",
		dataType: 'json',
		success:function(result){
				$("#data-total #total-abs").remove();
				//$("#kode").append('<option value="" selected disabled> -- Select Distributor -- </option>');
				$('#data-total').append("<h4 id='total-abs' style='float:right;'>"+numberFormat(result.abs)+"</h4>");
		}
	});
}

function loadSearch1(){
	var id_data = '<?php echo $this->session->userdata('id');?>';
	var month = $("#month").val();
	var year = $("#year").val();
	$.ajax({
		url:"<?php echo base_url();?>index.php/apps/get_search_absensi1/",
		cache:false,
		data: {
				"id_data": id_data, 
				"month": month,
				"year": year
			  },
		type: "POST",
		dataType: 'json',
		success:function(result){
			$("#data-total #total-abs").remove();
			$('#data-total').append("<h4 id='total-abs' style='float:right;'>"+numberFormat(result.abs)+"</h4>");
		}
	});
}

function loadSearch2(){
	var id_data = '<?php echo $this->session->userdata('id');?>';
	var month = $("#month").val();
	var year = $("#year").val();
	$.ajax({
		url:"<?php echo base_url();?>index.php/apps/get_search_absensi2/",
		cache:false,
		data: {
				"id_data": id_data, 
				"month": month,
				"year":year
			  },
		type: "POST",
		dataType: 'json',
		success:function(result){
			$("#data-absensi #list-absensi").remove();				
			$.each(result, function(i, data){
				if(data.TransDt == null){
					$('#data-absensi').append("<div id='list-absensi'>Data Absensi Kosong</div>");
				}else{
					var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
					  "Juli", "Agustus", "September", "Oktober", "November", "Desember"
					];
	
					var d = new Date();
					$('#data-absensi').append("<div id='list-absensi' class='panel-group' style='margin-bottom:5px;'><div class='panel panel-default' style='border:none;box-shadow:none;'><div id='sales_all' class='panel panel-heading' style='background-color:#fff;border:none;box-shadow:none;'><h4 class='panel-title'><a data-toggle='collapse' style='font-family:Quicksand-bold !important;' href='#data"+data.Tgl+"'>"+ pad(data.Tgl) + "-" + ("0" + (data.Bulan)).slice(-2) + "-" +data.Tahun+ "</a><a id='all_sales_amount' data-toggle='collapse' style='font-family:Quicksand-bold !important;' href='#data"+data.Tgl+"' class='pull-right'><i class='fa fa-check'></i></a></h4></div><div id='data"+data.Tgl+"' class='panel-collapse collapse in'><ul id='sales_detail' class='list-group' style='border:none !important;'><li class='list-group-item' style='border-bottom:none;border-top:1px dashed #ddd;'><span>Nominal Penjualan :</span><span class='pull-right'>"+numberFormat(data.Value)+"</span></li></ul></div></div></div>");
				}
			});
		}
	});
}
</script>
<script>
$(function(){
	$(function(){
		var id_data = '<?php echo $this->session->userdata('id');?>';
			$.ajax({
				url:"<?php echo base_url();?>index.php/apps/get_detail_absensi/",
				cache:false,
				data:"id_data="+id_data,
				type: "POST",
				dataType: 'json',
				success:function(result){
						$("#data-absensi #list-absensi").remove();
						//$("#kode").append('<option value="" selected disabled> -- Select Distributor -- </option>');
						
						
						$.each(result, function(i, data){
							if(data.Tgl == null){
								$('#data-absensi').append("<div id='list-absensi'>Data Absensi Kosong</div>");
							}else{
								var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
								  "Juli", "Agustus", "September", "Oktober", "November", "Desember"
								];
				
								var d = new Date();
								$('#data-absensi').append("<div id='list-absensi' class='panel-group' style='margin-bottom:5px;'><div class='panel panel-default' style='border:none;box-shadow:none;'><div id='sales_all' class='panel panel-heading' style='background-color:#fff;border:none;box-shadow:none;'><h4 class='panel-title'><a data-toggle='collapse' style='font-family:Quicksand-bold !important;' href='#data"+data.Tgl+"'>"+ pad(data.Tgl) + "-" + pad(data.Bulan) + "-" + pad(data.Tahun) + "</a><a id='all_sales_amount' data-toggle='collapse' style='font-family:Quicksand-bold !important;' href='#data"+data.Tgl+"' class='pull-right'><i class='fa fa-check'></i></a></h4></div><div id='data"+data.Tgl+"' class='panel-collapse collapse in'><ul id='sales_detail' class='list-group' style='border:none !important;'><li class='list-group-item' style='border-bottom:none;border-top:1px dashed #ddd;'><span>Nominal Penjualan :</span><span class='pull-right'>"+numberFormat(data.Value)+"</span></li></ul></div></div></div>");
							}
						});
				}
			});
	});
	
	//setInterval(function(){loadDetailAbsensi()}, 300000);
	
	$(function(){
		var id_data = '<?php echo $this->session->userdata('id');?>';
		$.ajax({
			url:"<?php echo base_url();?>index.php/apps/get_all_absensi/",
			cache:false,
			data:"id_data="+id_data,
			type: "POST",
			dataType: 'json',
			success:function(result){
					$("#data-total #total-abs").remove();
					//$("#kode").append('<option value="" selected disabled> -- Select Distributor -- </option>');
					$('#data-total').append("<h4 id='total-abs' style='float:right;'>"+numberFormat(result.abs)+"</h4>");
			}
		});
	});
	
	//setInterval(function(){loadAllAbsensi()}, 300000);
	$("#search-btn").click(function(){
		$(document).ajaxStart(function () {
			$("#loader").css("display","flex");
		}).ajaxStop(function () {
			$("#loader").css("display","none");
		});
		loadSearch1();
		loadSearch2();
	});
	
	$("#month").change(function(){
		var m = $("#month").val();
		var y = $("#year").val();
		if(m == 1){
			var d = 31;
		}else if(m == 2){
			var d = 28;
		}else if(m == 3){
			var d = 31;
		}else if(m == 4){
			var d = 30;
		}else if(m == 5){
			var d = 31;
		}else if(m == 6){
			var d = 30;
		}else if(m == 7){
			var d = 31;
		}else if(m == 8){
			var d = 31;
		}else if(m == 9){
			var d = 30;
		}else if(m == 10){
			var d = 31;
		}else if(m == 11){
			var d = 30;
		}else if(m == 12){
			var d = 31;
		}
		$("#period span").remove();
		$("#period").append("<span style='color:#46b7bf;font-size:12px;'>Tanggal : "+ '01' + "-" + m + "-" + y + " s/d "+ d + "-" + m + "-" + y + "</span>");
	});
	
	$("#year").change(function(){
		var m = $("#month").val();
		var y = $("#year").val();
		if(m == 1){
			var d = 31;
		}else if(m == 2){
			var d = 28;
		}else if(m == 3){
			var d = 31;
		}else if(m == 4){
			var d = 30;
		}else if(m == 5){
			var d = 31;
		}else if(m == 6){
			var d = 30;
		}else if(m == 7){
			var d = 31;
		}else if(m == 8){
			var d = 31;
		}else if(m == 9){
			var d = 30;
		}else if(m == 10){
			var d = 31;
		}else if(m == 11){
			var d = 30;
		}else if(m == 12){
			var d = 31;
		}
		$("#period span").remove();
		$("#period").append("<span style='color:#46b7bf;font-size:12px;'>Periode : "+ '01' + "-" + m + "-" + y + " s/d "+ d + "-" + m + "-" + y + "</span>");
	});
	
});
</script>
<div id="loader" style="position:fixed;left:0;top:0;z-index:99999;background-color:rgba(255,255,255,0.1);width:100%;height:100%;color:#666;">
	<div style="width:200px;margin:auto;text-align:center;background-color:#fff;border-radius:3px;padding:5px;box-shadow:0 2px 2px 0 rgba(0,0,0,.05), 0 3px 1px -2px rgba(0,0,0,.08), 0 1px 5px 0 rgba(0,0,0,.08);">
		<span class="fa fa-spinner fa-spin"></span> Loading
	</div>
</div>
<div class="container" style="background-color:#f9f9f9 !important;">
	<div class="header-dashboard" style="height:54px !important; min-height:54px !important;">
		<div style="width:100%;position:absolute;z-index:99999;">
			<div class="content">
				<a href="<?php echo base_url();?>index.php/apps/report/">
					<div style="border:2px solid transparent;border-radius:5px;padding:5px;float:left;margin-top:10px"><i class="fa fa-arrow-left color-white"></i></div>
				</a>
				<div style="color:#fff;font-family:'Quicksand-Bold' !important;padding-top:17px;text-align:center;width:90%;float:left;">Absensi</div>
			</div>
		</div>
	</div>
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
		<div class="content flex">
			<div style="width:100%;">
				<div class="box-flat">
					<div id="period" style="padding:5%;padding-bottom:10px;">
						<h4 style="font-family:'Quicksand-bold' !important">Data Absensi</h4>
						<span style="color:#46b7bf;font-size:12px;">Tanggal : <?php echo date('01-m-Y');?> s/d <?php echo date('d-m-Y');?></span>
					</div>
				</div>
				<div class="box-flat">
					<div style="padding:5%;padding-bottom:10px;padding-top:0;">
						<label style="float:Left;width:20%;padding:15px 0;">Bulan : </label>
						<select class="form-input" id="month" style="float:left;background-color:transparent;width:20% !important;">
							<?php 
								$i = 1;
								for($i;$i <= 12; $i++){
									if($i == 12){
								?>
								<option value="<?php echo str_pad($i,2,'0', STR_PAD_LEFT);?>" <?php echo $i == date("m")?'selected':'';?>><?php echo str_pad($i,2,'0', STR_PAD_LEFT);?></option>
								<?php 
									break;
									}else{
								?>
								<option value="<?php echo str_pad($i,2,'0', STR_PAD_LEFT);?>" <?php echo $i == date("m")?'selected':'';?>><?php echo str_pad($i,2,'0', STR_PAD_LEFT);?></option>
								<?php 
									}
								}
							?>
						</select>
						<label style="float:Left;width:20%;padding:15px 0;">Tahun : </label>
						<select  class="form-input" id="year" style="float:left;background-color:transparent;width:20% !important;">
							<option value="<?php echo date("Y");?>" selected><?php echo date("Y");?></option>
						</select>
						<button id="search-btn" style="margin-left:1%;border:none;background-color: #ff8f00;color: #fff !important;float: Left;text-align: center;border-radius: 3px;width: 19% !important;padding: 10px;">Filter</button>
					</div>
				</div>
				<hr style="width:100%;float:Left"/>
				<div class="box-flat">
					<div style="padding: 1% 5%;padding-bottom:20%;">
						<div id="data-total" style="display:inline-block;width:100%;">
							<h4 style="display:inline-block">Total Kehadiran</h4>
							<h4 id="total-abs" style="float:right;font-size:14px;"><span style="color:#fff;background-color:#ff8f00;padding:5px;border-radius:3px;"><i class="fa fa-spinner fa-spin" style="margin-right:5px;"></i>Memuat</span></h4>
						</div>
						<div id='data-absensi'>
								<div id="list-absensi" style="margin:auto;text-align:center;">
									<i class="fa fa-spinner fa-spin"></i>
									<h4>Memuat Data Absensi</h4>
								</div>
						</div>
						<div>
							<a href="<?php echo base_url();?>index.php/apps/home/" style="border:none;background-color:#29b37e !important;color:#fff !important;float:Left;text-align:center;border-radius:3px;width:100% !important;padding:10px;">Kembali ke beranda</a>
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
});
</script>