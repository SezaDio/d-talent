<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
    <!-- load bootsrap -->
    <link href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('asset/css/datepicker/datepicker3.css'); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('asset/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('asset/css/talent.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('asset/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css" />
    
    <!-- JS -->
    <script type="text/javascript" src="<?php echo base_url('asset/js/jquery.min.js?ver=b3.0'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js?ver=b2.0'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('asset/js/datepicker/bootstrap-datepicker.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('asset/js/bootstrap-select.min.js'); ?>"></script>

</head>
<body>
	<header>
		<div class="container">
			<h2><?php echo $page_title; ?></h2>
		</div>
	</header>

	<!-- Toast Message -->
	<?php
		$this->load->library('form_validation');
	?>
	<div class="toast">
		<!-- Cek error -->
		<?php
	    	if($this->session->has_userdata('msg_error')) {
		?>
		    <div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Error!</h4>
				<?php echo $this->session->msg_error; ?>
			</div>
	  	<?php
	  		}
		?>

		<!-- Cek success -->
		<?php
	    	if($this->session->has_userdata('msg_success')) {
	    ?>
	        <div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-check"></i> Success!</h4>
	            <?php echo $this->session->msg_success; ?> 
	        </div>
	  	<?php
	  		}
		?>
	</div>
	<!-- ./Toast Message -->

	<div class="talent-page">