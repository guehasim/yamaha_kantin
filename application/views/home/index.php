<div class="auth-2-outer row align-items-center h-p100 m-0">
	<div class="auth-2" style="overflow: hidden !important;">

	  <div class="auth-logo font-size-30">
	    <img src="<?=base_url('assets/images/logo.png')?>" alt="" height="100">
	  </div>
	  <!-- /.login-logo -->
	  <div class="auth-body">
	    <p class="auth-msg">Please Complete Form To Signin</p>

	    <form action="<?=site_url('home/login')?>" method="post" class="form-element">
	      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	      <div class="form-group has-feedback">
	        <input type="text" class="form-control" placeholder="Enter your username" name="username">
	        <span class="ion ion-email form-control-feedback"></span>
	      </div>
	      <div class="form-group has-feedback">
	        <input type="password" class="form-control" placeholder="Enter your password" name="pwd">
	        <span class="ion ion-locked form-control-feedback"></span>
	      </div>
	      <div class="row">
	        <!-- /.col -->
	        <div class="col-12 text-center">
	          <button type="submit" class="btn btn-block mt-10 text-white bg-danger-gradient">SIGN IN</button>
	        </div>
	        <!-- /.col -->
	      </div>
	    </form>
	  </div>
	</div>
</div>