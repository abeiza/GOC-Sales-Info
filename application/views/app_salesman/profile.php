<div style="position:fixed;bottom:20px;right:25px;z-index:99999;">
	<a href="<?php echo base_url();?>index.php/apps/cart_salesman/" style="text-align:center;padding:12px 13px;cursor:pointer;box-shadow:0 2px 2px 0 rgba(0,0,0,.5), 0 3px 1px -2px rgba(0,0,0,.08), 0 1px 5px 0 rgba(0,0,0,.08);background:#ff8f00;color:#fff;border-radius:100%;float:left;opacity:0.8;font-family:'Quicksand-Bold' !important;"><span style="color:#fff;font-size:14px !important;">Transaksi<br/>Penjualan</span><br/><i class="fa fa-share fa-2x color-white"></i></a>
</div>
<div class="container">
	<div class="header-dashboard" style="height:54px !important; min-height:54px !important;">
		<div style="width:100%;position:absolute;z-index:99999;">
			<div class="content">
				<a href="<?php echo base_url();?>index.php/apps/home_salesman/">
					<div style="border:2px solid transparent;border-radius:5px;padding:5px;float:left;margin-top:10px"><i class="fa fa-arrow-left color-white"></i></div>
				</a>
				<!--<div style="padding:5px;float:right;margin-top:10px">-->
					<input id="check-menu" type="checkbox"/>
					<label for="check-menu" style="width:30px;cursor:pointer;padding:5px;float:right;margin-top:10px;text-align:center;"><i class="fa fa-ellipsis-v fa-2x color-white"></i></label> 
				<!--</div>-->
				<div class="nav" id="menu">
					<ul>
						<li><a href="<?php echo base_url();?>index.php/apps/change_salesman/">Ubah Password</a></li>
						<li><a href="<?php echo base_url();?>index.php/apps/help_salesman/">Bantuan</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container flex" style="height:100px !important; min-height:100px !important;background-color:#f9f9f9">
		<div class="content">
			<div>
				<form name="photo" style="display:inline-block" id="imageUploadForm" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/apps/act_change_pict_salesman/" method="post">
					<label for="ImageBrowse" style="width:100px;margin:0;cursor:pointer;">
						
						
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
					</label>
					<input id="ImageBrowse" type="file" name="pict" style="display: none;"/>
					<input type="submit" name="upload" value="Upload" style="display:none;"/>
				</form>
				<div style="display:inline-block;">
					<h4 style="width:auto !important;font-size:13px;margin-top:0px;margin-bottom:0px;"><?php echo $nama_salesman;?></h4>
					<span style="width:auto !important;font-size:18px;color:#46b7bf">Kode Salesman : <?php echo $kode_salesman;?></span>
				</div>
			</div>
		</div>
	</div>
	<div class="content-dashboard">
		<div class="content flex">
			<div style="width:100%;">
				<div class="box-flat">
					<div style="padding:5%;">
						<h4 style="font-family:'Quicksand-Bold'!important">Informasi Akun</h4>
					</div>
				</div>
				<?php echo $this->session->flashdata('change_result')?>
				<?php echo $error;?>
				<div class="box-flat">
					<?php //echo form_open('apps/act_change_profile/');?>
					<div style="padding: 1% 5%;">					
						<div>
							<label style="width:100%;margin-bottom:0px;font-family:'Quicksand-Bold'!important">Kode Salesman</label>
							<input type="text" style="margin-top:0px !important;color:#46b7bf;font-size:12px !important;font-family:'Quicksand-Bold'!important;padding-bottom:19px !important;" class="form-input" value="<?php echo $kode_salesman;?>" readonly/>
						</div>
						<div>
							<label style="width:100%;margin-bottom:0px;font-family:'Quicksand-Bold'!important">Nama Salesman  <!--<i class="fa fa-exclamation-circle" style="color:#ff8f00;font-size:15px;" data-toggle="tooltip" data-placement="right" title="Isilah / Ubahlah Nama BA Sesuai Nama Anda"></i>--></label>
							<div style="color:#ff8f00 !important;font-size:12px;"><?php echo form_error('nama_salesman'); ?></div>
							<input type="text" readonly name="nama_ba" style="margin-top:0px !important;color:#46b7bf;font-size:12px !important;font-family:'Quicksand-Bold'!important;padding-bottom:19px !important;" class="form-input" value="<?php echo $nama_salesman;?>"/>
						</div>
						<div>
							<label style="width:100%;margin-bottom:0px;font-family:'Quicksand-Bold'!important">Nama Distributor</label>
							<input type="text" style="margin-top:0px !important;color:#46b7bf;font-size:12px !important;font-family:'Quicksand-Bold'!important;padding-bottom:19px !important;" class="form-input" value="<?php echo $nama_distributor;?>" readonly/>
						</div>
					</div>
					<?php //echo form_close();?>
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


$("#ImageBrowse").on("change", function() {
	$("#imageUploadForm").submit();
});
/*$(document).ready(function (e) {
    $('#imageUploadForm').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log("success");
                console.log(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

    
});*/
</script>