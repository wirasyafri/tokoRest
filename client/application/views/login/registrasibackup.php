<?php $this->load->view('login/header'); ?>
<div class="container">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?php echo form_open('login/register'); ?>
		<div class="form-group">
			
			<legend>registrasi</legend>
		</div>
		<?php echo validation_errors(); ?>
		<div class="form-group">
		<label for="">Username</label
		>
		<input type="text" class="form-control" id="username" name="username" placeholder="input field">
			
		</div>

		<div class="form-group">
		<label for="">Password</label
		>
		<input type="password" class="form-control" id="password" name="password" placeholder="input field">
			
		</div>
		<div class="form-group">
			
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		</form>
	</div>

</div>
<?php $this->load->view('login/footer');?>