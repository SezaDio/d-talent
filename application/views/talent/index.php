<div class="container">

	<div class="bg-talent">
		<figure class="image-bg"></figure>
	</div>

	<div class="profile">
		<div class="img-talent">
			<figure class="image-bg"></figure>
		</div>

		<div class="card">
			<div class="text-center">
				Ahmad | 23 tahun | Semarang
			</div>
			<br>
			<div>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
			<div class="text-center job-interest">
				<span class="label label-success">Web Developer</span>
				<span class="label label-success">Design UI/UX</span>
			</div>
		</div>

		<!-- kontak -->
		<div class="card contact-talent">
			<div class="text-center">
				<i class="fa fa-envelope"> ahmad@gmail.com</i>
				<i class="fa fa-phone"> 081533222000</i>
				<i class="fa fa-home"> Semarang</i>
			</div>
		</div>

		<!-- konten -->
		<div class="content">
			<div class="cv-selection">
				<div class="center-block fit-content">
					<div class="dropdown">
					  <button id="cv" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    CV Section
					    <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" aria-labelledby="cv">
					    <li><a href="#!">Ringkasan</a></li>
					    <li><a href="<?php echo site_url('talent/cv-work-experience/create');?>">Pengalaman Kerja</a></li>
					    <li><a href="#!">Pendidikan</a></li>
					    <li><a href="#!">Prestasi</a></li>
					    <li><a href="#!">Pelatihan</a></li>
					  </ul>
					</div>
				</div>
			</div>
			<br>
			<br>

			<?php
				$this->load->helper('custom');
			?>

			<div class="cv">
				<?php
					if($cv_works != null) {
				?>
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Pengalaman Kerja</h3>
				  </div>
				  <div class="panel-body">
				    <table class="table">
				    	<?php foreach ($cv_works as $cv_work):?>
					    	<tr>
					    		<td class="periode">
					    			<?php echo displayCVWorkDate($cv_work->work_start, $cv_work->work_end); ?>
					    		</td>
					    		<td>
					    			<?php echo $cv_work->position; ?>
					    			di
					    			<?php echo $cv_work->company; ?>
					    		</td>
					    		<td class="action">
					    			<a href="<?php echo site_url('talent/cv-work-experience/edit/') . $cv_work->id_talent_cv_work;?>" class="text-primary"><i class="fa fa-edit"></i></a>
					    			<a href="" class="text-danger"><i class="fa fa-trash"></i></a>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>
			</div>
		</div>
	</div>

</div>

<div class="container">
	<br>
	<br>
	<a href="http://preview.uideck.com/items/mate/" target="_blank">http://preview.uideck.com/items/mate/</a>
</div>