<div class="container flex">
	<div class="content">
		<div class="header">
				<h2 class="center" style="font-family:'Quicksand-Bold' !important">Lupa Password?</h2>
			</div>
		<?php echo $this->session->flashdata('forget_result')?>
		<?php echo form_open('apps/act_forget/');?>
			<label for='id_ba' style="font-family:'Quicksand-Bold'!important">Kode BA <i class="fa fa-exclamation-circle" style="color:#ff8f00;font-size:15px;" data-toggle="tooltip" data-placement="right" title="Masukkan Kode BA anda sebanyak 5 karakter"></i></label>
			<div style="color:#ff8f00 !important;font-size:12px;"><?php echo form_error('id_ba'); ?></div>
			<input name="id_ba" type="text" maxlength="5" class="form-input"/>
	
			<div class="button" style="padding-bottom:20px;">
				<button type="submit" class="circle-style big" style="border:none;" title="Login"><span style="color:#fff;font-family:'Quicksand-Bold'!important">Kirim</span><br/><i class="fa fa-send"></i></button>
			</div>
		<?php echo form_close();?>
		<div>
			<div class="center"><a href="<?php echo base_url();?>index.php/apps/" class="quiksand-upper-regular" style="color:blue !important;font-family:'Quicksand-Bold' !important">kembali login</a></div>
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