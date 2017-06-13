<script>
	$(function(){
		$("#pass_lama").alphanum({
			allow              : 'àâäæ',
			disallow           : '',
			allowSpace         : false,
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
		
		$("#pass_baru").alphanum({
			allow              : 'àâäæ',
			disallow           : '',
			allowSpace         : false,
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
		
		$("#pass_konf").alphanum({
			allow              : 'àâäæ',
			disallow           : '',
			allowSpace         : false,
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
<div class="container">
	<div class="header-dashboard" style="height:54px !important; min-height:54px !important;">
		<div style="width:100%;position:absolute;z-index:99999;">
			<div class="content">
				<a href="<?php echo base_url();?>index.php/apps/profile_salesman/">
					<div style="border:2px solid transparent;border-radius:5px;padding:5px;float:left;margin-top:10px"><i class="fa fa-arrow-left color-white"></i></div>
				</a>
				<div style="color:#fff;font-family:'Quicksand-Bold' !important;padding-top:17px;text-align:center;width:90%;float:left;">Ubah Password</div>
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
						<?php echo form_open('apps/act_change_password_salesman/');?>
						<div style="margin-top:13px;">
							<label style="width:100%;margin-bottom:0px;font-family:'Quicksand-Bold'!important">Password Lama  <i class="fa fa-exclamation-circle" style="color:#ff8f00;font-size:15px;" data-toggle="tooltip" data-placement="right" title="Isilah Kolom Password Lama Anda Sebanyak 6 Karakter"></i></label>
							<div style="color:#ff8f00 !important;font-size:12px;"><?php echo form_error('pass_lama'); ?></div>
							<input type="password" name="pass_lama" id="pass_lama" style="margin-top:0px !important;color:#46b7bf;font-size:12px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input"/>
						</div>
						<div>
							<label style="width:100%;margin-bottom:0px;font-family:'Quicksand-Bold'!important">Password Baru <i class="fa fa-exclamation-circle" style="color:#ff8f00;font-size:15px;" data-toggle="tooltip" data-placement="right" title="Isilah Kolom Password Baru Anda Sebanyak 6 Karakter"></i></label>
							<div style="color:#ff8f00 !important;font-size:12px;"><?php echo form_error('pass_baru'); ?></div>
							<input type="password" name="pass_baru" id="pass_baru" style="margin-top:0px !important;color:#46b7bf;font-size:12px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input"/>
						</div>
						<div>
							<label style="width:100%;margin-bottom:0px;font-family:'Quicksand-Bold'!important">Konfirmasi Password Baru  <i class="fa fa-exclamation-circle" style="color:#ff8f00;font-size:15px;" data-toggle="tooltip" data-placement="right" title="Isilah Kolom Konfirmasi Password Baru Anda Sebanyak 6 Karakter"></i></label>
							<div style="color:#ff8f00 !important;font-size:12px;"><?php echo form_error('pass_konf'); ?></div>
							<input type="password" name="pass_konf" id="pass_konf" style="margin-top:0px !important;color:#46b7bf;font-size:12px !important;font-family:'Lato-Regular' !important;padding-bottom:19px !important;" class="form-input"/>
						</div>
						<div>
							<button type="submit" style="border:none;background-color:#ff8f00;color:#fff !important;float:Left;text-align:center;border-radius:3px;width:100% !important;padding:10px;">Simpan</button>
						</div>
						<?php echo form_close();?>
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