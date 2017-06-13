<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
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
<style>
	.ui-datepicker-today a{
		background-color:#77D9D3 !important;
	}
</style>
<script>
	$(function(){
		$("#transdt").datepicker(
			{
				changeMonth: false,
				changeYear: false,
				//minDate: new Date("<?php echo date('Y', strtotime("-1 months"));?>,<?php echo date('m', strtotime("-1 days"));?>,<?php echo date('d', strtotime("-1 days"));?>"),
				//maxDate: new Date("<?php echo date('Y'); ?>,<?php echo date('m'); ?>,<?php echo date('d'); ?>"),
				setDate : new Date("<?php echo date('Y'); ?>,<?php echo date('m'); ?>,<?php echo date('d'); ?>"),
				dateFormat: 'dd-mm-yy',
				stepMonths: 0
			}
		);
		
		$("#transdt").change(
			function(){
				var dat = $("#transdt").val().split('-');
				var convdate = dat[2] + '-' + dat[1] + '-' + dat[0] + ' 00:00:00';
				$("#transdte").val(convdate);
				$('.ui-datepicker-current-day a')
						.css('background-color', '#77D9D3');
			}
		);
		
		$("#transdt").click(function(){
				$('.ui-datepicker-current-day a')
						.css('background-color', '#77D9D3');
		});
	});
</script>
<script>
function loadAllSales(){
	var id_data = '<?php echo $this->session->userdata('id');?>';
	$.ajax({
		url:"<?php echo base_url();?>index.php/apps/get_sales_all_salesman/",
		cache:false,
		data:"id_data="+id_data,
		type: "POST",
		dataType: 'json',
		success:function(result){
				$("#sales_all h4 #all_sales_amount").remove();
				//$("#kode").append('<option value="" selected disabled> -- Select Distributor -- </option>');
				
				
				$.each(result, function(i, data){
					if(data.amount_sales_all == null){
						$('#sales_all h4').append("<a id='all_sales_amount' data-toggle='collapse' style='font-family:Quicksand-bold !important;' href='#collapse1' class='pull-right'>0</a>");
					}else{
						$('#sales_all h4').append("<a id='all_sales_amount' data-toggle='collapse' style='font-family:Quicksand-bold !important;' href='#collapse1' class='pull-right'>"+numberFormat(data.amount_sales_all)+"</a>");
					}
				});
		}
	});
}

function loadDetailSales(){
	var id_data = '<?php echo $this->session->userdata('id');?>';
	$.ajax({
		url:"<?php echo base_url();?>index.php/apps/get_sales_detail_salesman/",
		cache:false,
		data:"id_data="+id_data,
		type: "POST",
		dataType: 'json',
		success:function(result){
				$("#sales_detail li").remove();
				//$("#kode").append('<option value="" selected disabled> -- Select Distributor -- </option>');
				
				
				$.each(result, function(i, data){
						$('#sales_detail').append(
						"<li class='list-group-item' style='border-bottom:none;border-top:1px dashed #ddd'><span>"+data.NAMA_TIPE_PRODUCT+"</span><span class='pull-right'>"+numberFormat(data.amount_sales_detail)+"</span></li>");
				});
		}
	});
}



function loadAllSalesSearch(){
	var id_data = '<?php echo $this->session->userdata('id');?>';
	var ymd = $("#transdte").val();
	$.ajax({
		url:"<?php echo base_url();?>index.php/apps/get_sales_all_salesman_search/",
		cache:false,
		data: {
				"id_data": id_data, 
				"ymd": ymd
			  },
		type: "POST",
		dataType: 'json',
		success:function(result){
				$("#sales_all h4 #all_sales_amount").remove();
				//$("#kode").append('<option value="" selected disabled> -- Select Distributor -- </option>');
				
				
				$.each(result, function(i, data){
					if(data.amount_sales_all == null){
						$('#sales_all h4').append("<a id='all_sales_amount' data-toggle='collapse' style='font-family:Quicksand-bold !important;' href='#collapse1' class='pull-right'>0</a>");
					}else{
						$('#sales_all h4').append("<a id='all_sales_amount' data-toggle='collapse' style='font-family:Quicksand-bold !important;' href='#collapse1' class='pull-right'>"+numberFormat(data.amount_sales_all)+"</a>");
					}
				});
		}
	});
}

function loadDetailSalesSearch(){
	var id_data = '<?php echo $this->session->userdata('id');?>';
	var ymd = $("#transdte").val();
	$.ajax({
		url:"<?php echo base_url();?>index.php/apps/get_sales_detail_salesman_search/",
		cache:false,
		data: {
				"id_data": id_data, 
				"ymd": ymd
			  },
		type: "POST",
		dataType: 'json',
		success:function(result){
				$("#sales_detail li").remove();
				//$("#kode").append('<option value="" selected disabled> -- Select Distributor -- </option>');
				
				
				$.each(result, function(i, data){
						$('#sales_detail').append(
						"<li class='list-group-item' style='border-bottom:none;border-top:1px dashed #ddd'><span>"+data.NAMA_TIPE_PRODUCT+"</span><span class='pull-right'>"+numberFormat(data.amount_sales_detail)+"</span></li>");
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
			url:"<?php echo base_url();?>index.php/apps/get_sales_all_salesman/",
			cache:false,
			data:"id_data="+id_data,
			type: "POST",
			dataType: 'json',
			success:function(result){
					$("#sales_all h4 #all_sales_amount").remove();
					//$("#kode").append('<option value="" selected disabled> -- Select Distributor -- </option>');
					
					
					$.each(result, function(i, data){
						if(data.amount_sales_all == null){
							$('#sales_all h4').append("<a id='all_sales_amount' data-toggle='collapse' style='font-family:Quicksand-bold !important;' href='#collapse1' class='pull-right'>0</a>");
						}else{
							$('#sales_all h4').append("<a id='all_sales_amount' data-toggle='collapse' style='font-family:Quicksand-bold !important;' href='#collapse1' class='pull-right'>"+numberFormat(data.amount_sales_all)+"</a>");
						}
					});
			}
		});
	});
	
	//setInterval(function(){loadAllSales()}, 300000);
	
	
	
	$(function(){
		var id_data = '<?php echo $this->session->userdata('id');?>';
		$.ajax({
			url:"<?php echo base_url();?>index.php/apps/get_sales_detail_salesman/",
			cache:false,
			data:"id_data="+id_data,
			type: "POST",
			dataType: 'json',
			success:function(result){
					$("#sales_detail li").remove();
					//$("#kode").append('<option value="" selected disabled> -- Select Distributor -- </option>');
					
					
					$.each(result, function(i, data){
						$('#sales_detail').append(
						"<li class='list-group-item' style='border-bottom:none;border-top:1px dashed #ddd'><span>"+data.NAMA_TIPE_PRODUCT+"</span><span class='pull-right'>"+numberFormat(data.amount_sales_detail)+"</span></li>");
					});
			}
		});
	});
	
	//setInterval(function(){loadDetailSales()}, 300000);

	$("#search-btn").click(function(){
		$(document).ajaxStart(function () {
			$("#loader").css("display","flex");
		}).ajaxStop(function () {
			$("#loader").css("display","none");
		});
		loadAllSalesSearch();
		loadDetailSalesSearch();
	});
	
	$("#transdt").change(function(){
		var dmy = $("#transdt").val();
		$("#period span").remove();
		$("#period").append("<span style='color:#46b7bf;font-size:12px;'>Tanggal Transaksi : "+ dmy + "</span>");
	});
	
});
</script>
<style>
	#loader{
		display:none;
	}
</style>
<div id="loader" style="position:fixed;left:0;top:0;z-index:99999;background-color:rgba(255,255,255,0.1);width:100%;height:100%;color:#666;">
	<div style="width:200px;margin:auto;text-align:center;background-color:#fff;border-radius:3px;padding:5px;box-shadow:0 2px 2px 0 rgba(0,0,0,.05), 0 3px 1px -2px rgba(0,0,0,.08), 0 1px 5px 0 rgba(0,0,0,.08);">
		<span class="fa fa-spinner fa-spin"></span> Loading
	</div>
</div>
<div class="container" style="background-color:#f9f9f9 !important;">
	<div class="header-dashboard" style="height:54px !important; min-height:54px !important;">
		<div style="width:100%;position:absolute;z-index:99999;">
			<div class="content">
				<a href="<?php echo base_url();?>index.php/apps/report_salesman/">
					<div style="border:2px solid transparent;border-radius:5px;padding:5px;float:left;margin-top:10px"><i class="fa fa-arrow-left color-white"></i></div>
				</a>
				<div style="color:#fff;font-family:'Quicksand-Bold' !important;padding-top:17px;text-align:center;width:90%;float:left;">Penjualan per Hari</div>
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
		<div class="content-dashboard">
		<div class="content flex">
			<div style="width:100%;">
				<div class="box-flat">
					<div id="period" style="padding:5%;padding-bottom:10px;">
						<h4 style="font-family:'Quicksand-bold' !important">Informasi Penjualan</h4>
						<span style="color:#46b7bf;font-size:12px;">Tanggal Transaksi : <?php echo date('d M Y', strtotime($date));?></span>
					</div>
				</div>
				<div class="box-flat" style="float:left;width:95%;padding:5%;">
					<label style="width:20%;float:left;">Tanggal : </label>
					<input name="t_date" id="transdt" type="text" style="width:60% !important;float:left;margin-top:0px !important;color:#46b7bf;font-size:13px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input" value="<?php 
							echo date('d-m-Y'); 
					?>" readonly/>
					<input name="trans_date" id="transdte" type="hidden" style="margin-top:0px !important;color:#46b7bf;font-size:13px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input" value="<?php 
						date_default_timezone_set('Asia/Jakarta'); 
							echo date('Y-m-d'); 
					?>" readonly/>
					<a id="search-btn" style="width:18%;margin:0;margin-left:2%;float:left;background-color:#ff8f00;color:#fff !important;border-radius:3px;padding:10px 0;text-align:center;"><span style="padding:10px;">Filter</span></a>
				</div>
				<div class="box-flat">
					<div style="padding: 1% 5%;padding-bottom:20%;">
						<div class="panel-group">
							<div class="panel panel-default" style="border:none;box-shadow:none;">
								<div id="sales_all" class="panel panel-heading" style="background-color:#fff;border:none;box-shadow:none;">
									<h4 class="panel-title">
										<a data-toggle="collapse" style="font-family:'Quicksand-bold' !important;" href="#collapse1">Total Penjualan</a>
										<a id='all_sales_amount' data-toggle="collapse" style="font-family:'Quicksand-bold' !important;" href="#collapse1" class="pull-right"><span style="color:#fff;background-color:#ff8f00;padding:5px;border-radius:3px;"><i class="fa fa-spinner fa-spin" style="margin-right:5px;"></i>Memuat</span></a>
									</h4>
								</div>
								<div id="collapse1" class="panel-collapse collapse in">
									<ul id="sales_detail" class="list-group" style="border:none !important;">
										<li class="list-group-item" style="border-bottom:none;border-top:1px dashed #ddd">
											<span>Non Make Up</span>
											<span class="pull-right"><span style="color:#fff;background-color:#ff8f00;padding:5px;border-radius:3px;"><i class="fa fa-spinner fa-spin" style="margin-right:5px;"></i>Memuat</span></span>
										</li>
										<li class="list-group-item" style="border-bottom:none;border-top:1px dashed #ddd">
											<span>Color Matte</span>
											<span class="pull-right"><span style="color:#fff;background-color:#ff8f00;padding:5px;border-radius:3px;"><i class="fa fa-spinner fa-spin" style="margin-right:5px;"></i>Memuat</span></span>
										</li>
									</ul>
								</div>
							</div>
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