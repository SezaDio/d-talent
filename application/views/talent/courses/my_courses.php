<?php
/*
 * views/talent/courses/my_courses.php
 * --------------------------------------
 * Talent course list
 * 
 */

?>
<div class="container">
	<div class="row">
		<div class="cv col-md-10 col-md-offset-1">
		<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
			<h3 class="page-title" style="margin-bottom: unset; text-align: center; padding-top: 20px;">
				My Courses
			</h3>
			<hr style="margin-bottom: 15px; border: solid 1px black;">

<div class="web_min300" style="padding: 10px 15px;">
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>Materi</th>
				<th>Tanggal Enrol</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
<?php
	if (!empty($enrolledCourses)) {
		foreach ($enrolledCourses as $itemCourse) { ?>
	<tr><td><?php echo htmlspecialchars($itemCourse->name); ?></td>
		<td><?php echo $this->tanggal_indonesia(strtotime($itemCourse->date_assigned), false, true); ?></td>
		<td><?php
	if ($itemCourse->enroll_status == 99) {
		echo '<span class="label label-default">Menunggu Pembayaran</span>';
	} else if ($itemCourse->enroll_status == 1) {
		echo '<span class="label label-success">Aktif</span>';
	} else {
		echo '<span class="label label-danger">Batal</span>';
	}
		?></td>
		<td><?php
		if (!empty($itemCourse->id_invoice)) {
			echo '<a target="_blank" href="'.site_url('/members/talent/courses/invoice/'.$itemCourse->id_course).
				'"><i class="fa fa-file"></i> Lihat Invoice</a>';
		} ?></td>
	</tr>
<?php 	} // End foreach
	}
?>
		</tbody>
	</table>
<?php
	if (empty($enrolledCourses)) {
		echo '<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Anda belum terdaftar pada pelatihan apapun.</div>';
	}
	echo '<a href="'.site_url('/course').'" class="btn btn-default"><i class="fa fa-search"></i> Cari Materi Pelatihan</a>';
?>	
</div>

		</div>
	</div>
</div>