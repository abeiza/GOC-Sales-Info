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
	.highcharts-contextbutton, .highcharts-credits{
		display:none !important;
	}
</style>
<script>
	$(function(){
		$(function(){
			var m = $("#month").val();
			var y = $("#year").val();
			$("#graph").attr("href","http://192.168.171.116/sg_mobile/index.php/apps/graphics_salesman/"+y+"/"+m);
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
			
			$("#graph").attr("href","http://192.168.171.116/sg_mobile/index.php/apps/graphics_salesman/"+y+"/"+m);
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
			$("#period").append("<span style='color:#46b7bf;font-size:12px;'>Tanggal : "+ '01' + "-" + m + "-" + y + " s/d "+ d + "-" + m + "-" + y + "</span>");
			
			$("#graph").attr("href","http://192.168.171.116/sg_mobile/index.php/apps/graphics_salesman/"+y+"/"+m);
		});
	});
</script>
<script type="text/javascript">
$(function () {
    $(document).ready(function () {
        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Grafik Penjualan Produk dalam Nominal</span>'
            },
            tooltip: {
                pointFormat: '{series.name}: (<b>{point.percentage:.1f}%</b>) Rp. {point.y},-'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [
					<?php 
						$query_value=$this->db->query("select NAMA_TIPE_PRODUCT, sum(VALUE) as Amount_Tipe_Product from View_EVAN_Qlik_SellOut_Salesman 
where ID_TIPE_PRODUCT NOT IN ('HSL','PRO') and ID_BA='".$id."' and Tahun='".$this->uri->segment(3)."' and Bulan='".$this->uri->segment(4)."' group by NAMA_TIPE_PRODUCT order by NAMA_TIPE_PRODUCT desc");
						foreach($query_value->result() as $value){
							echo "{
								name: '".$value->NAMA_TIPE_PRODUCT."',
								y:".$value->Amount_Tipe_Product."
							},";
						}
					?>]
            }]
        });
		
		
		
		
		
		$('#container1').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                 text: 'Grafik Penjualan Produk dalam Qty</span>'
            },
            tooltip: {
                pointFormat: '{series.name}: (<b>{point.percentage:.1f}%</b>) {point.y}'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [
					<?php 
						$query_value1=$this->db->query("select NAMA_TIPE_PRODUCT, sum(Qty) as Qty_Tipe_Product from View_EVAN_Qlik_SellOut_Salesman 
where ID_BA='".$id."' and Tahun='".$this->uri->segment(3)."' and Bulan='".$this->uri->segment(4)."' group by NAMA_TIPE_PRODUCT order by NAMA_TIPE_PRODUCT desc");
						foreach($query_value1->result() as $value){
							echo "{
								name: '".$value->NAMA_TIPE_PRODUCT."',
								y:".$value->Qty_Tipe_Product."
							},";
						}
					?>
				]
            }]
        });
    });
});
		</script>
<script src="<?php echo base_url();?>assets/js/highchart.js"></script>
<script src="<?php echo base_url();?>assets/js/exporting.js"></script>
<div class="container" style="background-color:#f9f9f9 !important;">
	<div class="header-dashboard" style="height:54px !important; min-height:54px !important;">
		<div style="width:100%;position:absolute;z-index:99999;">
			<div class="content">
				<a href="<?php echo base_url();?>index.php/apps/recapt_sales_salesman/">
					<div style="border:2px solid transparent;border-radius:5px;padding:5px;float:left;margin-top:10px"><i class="fa fa-arrow-left color-white"></i></div>
				</a>
				<div style="color:#fff;font-family:'Quicksand-Bold' !important;padding-top:17px;text-align:center;width:90%;float:left;">Grafik Penjualan</div>
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
	<div class="content-dashboard" style="background-color:#f9f9f9 !important;">
		<div class="content flex">
			<div style="width:100%;">
				<div class="box-flat">
					<div id="period" style="padding:5%;padding-bottom:10px;">
						<h4 style="font-family:'Quicksand-bold' !important">Informasi Penjualan (Grafik)</h4>
						<?php 
							if ($this->uri->segment(4) == date('m')){
						?>
							<span style="color:#46b7bf;font-size:12px;">Tanggal : <?php echo date('01-m-Y', strtotime($this->uri->segment(4)."/01/".$this->uri->segment(3))) .' s/d '.date('d-m-Y');?></span>
						<?php
							}else{
						?>		
							<span style="color:#46b7bf;font-size:12px;">Tanggal : <?php echo date('01-m-Y', strtotime($this->uri->segment(4)."/01/".$this->uri->segment(3))) .' s/d '.date('t-m-Y',strtotime($this->uri->segment(4)."/01/".$this->uri->segment(3)));?></span>
						<?php
							}
						?>
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
						<a id="graph" style="border:none;background-color: #ff8f00;color: #fff !important;float: Left;text-align: center;border-radius: 3px;width: auto !important;padding: 10px;">Filter</a>
					</div>
				</div>
				<hr style="width:100%;float:Left"/>
				<div class="box-flat" style="float:left;width:100%;">
					<div style="padding-bottom:20%;">
						<div style="width:100%;background-color:#fff;">
							<div id="container" style="margin:10px 0px !important;width: 95%; padding:5%;height: 400px; margin: 0 auto"></div>
						</div>
						<div style="width:100%;background-color:#fff;">
							<div id="container1" style="margin:10px 0px !important;width: 95%; padding:5%;height: 400px; margin: 0 auto"></div>
						</div>
						<div>
							<a href="<?php echo base_url();?>index.php/apps/home_salesman/" style="border:none;background-color:#29b37e !important;color:#fff !important;float:Left;text-align:center;border-radius:3px;width:100% !important;padding:10px;">Kembali ke Beranda</a>
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