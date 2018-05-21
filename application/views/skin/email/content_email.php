<table style="padding: 10px; width: 100%;">
							<tr>
								<td style="width: 130px;">Transaction ID</td>
								<td>:</td>
								<td><?php echo $data_payment_doku['transidmerchant']; ?></td>
							</tr>
							<tr>
								<td>Name</td>
								<td>:</td>
								<td><?php echo $data_payment_doku['name']; ?></td>
							</tr>
							<tr>
								<td>E-Mail</td>
								<td>:</td>
								<td><?php echo $data_payment_doku['email']; ?></td>
							</tr>
							<tr>
								<td colspan="3"><hr style="border: solid 1px #f44a56;"></td>
							</tr>
							<?php
                                $basket = $data_payment_doku['basket'];
                                $data_basket = explode(",", $basket);
                                $item = $data_basket[0];
                                $harga_satuan = $data_basket[1];
                                $jumlah = $data_basket[2];
                                $total_harga = $data_basket[3];
                              ?>
							<tr>
								<td>Item</td>
								<td>:</td>
								<td><?php echo $item; ?></td>
							</tr>
							<tr>
								<td>Amount</td>
								<td>:</td>
								<td><?php echo "Rp ".$harga_satuan; ?></td>
							</tr>
							<tr>
								<td>Quantity</td>
								<td>:</td>
								<td><?php echo $jumlah; ?></td>
							</tr>
							<tr>
								<td colspan="3"><hr style="border: solid 1px #f44a56;"></td>
							</tr>
							<tr>
								<td>Total Amount</td>
								<td>:</td>
								<td><?php echo "Rp ".$total_harga; ?></td>
							</tr>
						</table>