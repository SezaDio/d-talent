<table style="padding: 10px; width: 100%; padding: 50px; padding-top: 10px;">
	<tr>
		<td style="width: 130px;">From</td>
		<td>:</td>
		<td><strong><?php echo $kirim_email['from']; ?></strong></td>
	</tr>
	<tr>
		<td colspan="3"><br></td>
	</tr>
	<tr>
		<td colspan="3">
			<?php echo $kirim_email['message']; ?>
		</td>
	</tr>
	<tr>
		<td><br></td>
	</tr>
	<tr>
		<td colspan="3" style="text-align: center;">
			<a href="<?php echo $link_confirm_decline; ?>" style="text-decoration-line: none;">
				<button style="background-color: white; color: black; width: 150px; height: 40px; border: solid 2px black; border-radius: 5px; font-size: 1em;"><strong>Decline</strong></button>
			</a>
		
			<a href="<?php echo $link_confirm_accept; ?>" style="text-decoration-line: none;">
				<button style="background-color: black; color: white; width: 150px; height: 40px; border: none;border-radius: 5px; font-size: 1em;"><strong>Accept</strong></button>
			</a>
		</td>
	</tr>
</table>