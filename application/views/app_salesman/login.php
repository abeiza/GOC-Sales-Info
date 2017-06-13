<script>
	$(function(){
		$("#user_id").alphanum({
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
			maxLength          : 6
		});
		
		$("#password").alphanum({
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
			maxLength          : 6
		});
	})
</script>
<div class="container flex">
	<div class="content">
		<?php echo $this->session->flashdata('login_result')?>
		<?php 
		$attribute = array("style"=>"border:2px solid #29b37e;padding:20px;border-radius:3px;margin:20px 0;");
		echo form_open("apps/act_login_salesman/",$attribute);?>
			<div>
				<!--<div class="center"><a href="<?php //echo base_url();?>index.php/apps/verification/" class="quiksand-upper-regular">VERIFIKASI AKUN</a></div>-->
				<div style="text-align:right;"><a href="<?php echo base_url();?>" class="quiksand-upper-regular" style="color:#29b37e !important;font-family:'Quicksand-Bold' !important"><i class="fa fa-home" style="margin-right:5px;"></i>Kembali ke Beranda</a></div>
			</div>
			<div class="header">
				<h2 class="center" style="font-family:'Quicksand-Bold' !important">Login<br/>Salesman</h2>
			</div>
			<label for='id_salesman' style="font-family:'Quicksand-Bold' !important;">User ID <i class="fa fa-exclamation-circle" style="color:#ff8f00;font-size:15px;" data-toggle="tooltip" data-placement="right" title="Isilah kolom 'User ID' anda dengan kode Salesman terdiri dari 6 karakter"></i></label>
			<div style="color:#ff8f00 !important;font-size:12px;"><?php echo form_error('id_ba'); ?></div>
			<input name="id_salesman" type="text" maxlength="6" id="user_id" class="form-input"/>
			<label for='password' style="font-family:'Quicksand-Bold' !important;">Password <i class="fa fa-exclamation-circle" style="color:#ff8f00;font-size:15px;" data-toggle="tooltip" data-placement="right" title="Isilah kolom 'Password' anda dengan sandi yang merupakan kombinasi huruf dan angka sebanyak 6 karakter"></i></label>
			<div style="color:#ff8f00 !important;font-size:12px;"><?php echo form_error('password'); ?></div>
			<input name="password" type="password" maxlength="6" id="password" class="form-input"/>
			<div>
				<span style="color:#ff8f00;font-size:12px;font-style:italic;">Note : User ID dapat diperoleh melalui Admin Sales</span>
			</div>
			<div class="button" style="padding-bottom:20px;margin-top:35px !important">
				<button type="submit" class="circle-style big" title="Login"><span style="color:#fff;font-family:'Quicksand-Bold'!important">Login</span><br/><i class="fa fa-power-off"></i></button>
			</div>
			<div>
				<!--<div class="center"><a href="<?php //echo base_url();?>index.php/apps/verification/" class="quiksand-upper-regular">VERIFIKASI AKUN</a></div>-->
				<div style="text-align:right;"><a href="<?php echo base_url();?>index.php/apps/forget_salesman/" class="quiksand-upper-regular" style="color:#29b37e !important;font-family:'Quicksand-Bold' !important">LUPA PASSWORD?</a></div>
			</div>
		<?php echo form_close();?>
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