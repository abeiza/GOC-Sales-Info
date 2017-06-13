<div class="container flex">
	<div class="content">
		<div class="header">
			<h1 class="center" style="margin-bottom:0;">Verifikasi Akun</h1>
		</div>
		<?php echo form_open();?>
			<label for='id_ba'>Kode BA  <i class="fa fa-exclamation-circle" style="color:#ff8f00;font-size:15px;" data-toggle="tooltip" data-placement="right" title="Isilah kolom Kode BA anda sebanyak 5 karakter"></i></label>
			<input name="id_ba" type="text" class="form-input"/>
			
			
			<div>
				<a style="background-color:#ff8f00;color:#fff !important;float:Left;text-align:center;border-radius:3px;width:100% !important;padding:10px;"><i class="fa fa-search"></i></a>
			</div>
			
			<label for='id_ba' style="padding-top:10px;">Password  <i class="fa fa-exclamation-circle" style="color:#ff8f00;font-size:15px;" data-toggle="tooltip" data-placement="right" title="Isilah kolom password sebanyak 5 karakter"></i></label>
			<input name="id_ba" type="text" class="form-input"/>
			
			<label for='id_ba'>Konfirmasi Password  <i class="fa fa-exclamation-circle" style="color:#ff8f00;font-size:15px;" data-toggle="tooltip" data-placement="right" title="Isilah kolom konfirmasi password anda kembali sebanyak 5 karakter"></i></label>
			<input name="id_ba" type="text" class="form-input"/>
			
			<div class="button">
				<button class="circle-style big" title="Submit"><i class="fa fa-arrow-right"></i></button>
			</div>
		<?php echo form_close();?>
		<div>
			<div class="center"><a href="<?php echo base_url();?>" class="quiksand-upper-regular">Kembali LOGIN</a></div>
			<div class="center"><a href="#" class="quiksand-upper-regular">LUPA PASSWORD</a></div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>