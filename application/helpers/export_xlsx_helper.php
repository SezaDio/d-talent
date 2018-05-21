<?php
function do_export_xlsx($listPendaftar, $nama_event, $jenis_event/*, $simpulan, $hasil, $tanggal*/) {
	$CI =& get_instance();
	
	// load the excel library
	$CI->load->library('excel');
	
	define('IDX_COL_HOME', 2);	// Kolom dimulai pada kolom ke 3 (index 2)
	define('IDX_ROW_START', 1); // Dimulai dari baris 1
	define('TABLE_COLS', 19);	// Tabel ada 8 kolom
	
	$jmlHasil = count($listPendaftar);
	
	$exportFileName = "Data Peserta Event ".$nama_event.".xlsx";
	$columnWidths = array(
			2,	// [A] Padding
			2,	// [B] Padding
			10,	// [C] Kolom Nomor
			18,	// [D] Kolom Nomor Registrasi
			40,	// [E] Kolom Nama pendaftar
			25,	// [F] Kolom Email
			25, // [G] Kolom Telepon
			70,	// [H] Kolom Alamat
			25, // [J] Kolom Harga Total
			18	// [I] Kolom Status Bayar
	);
	$styleHeader = array(
			'alignment' => array(
					'horizontal'	=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'		=> PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'font'  => array(
					'bold'  => true
			)
	);
	$styleGrayBg = array(
			'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'EEEEEE')
			)
	);
	$styleBorderAll = array(
			'borders' => array(
					'allborders'	=> array(
							'style'		=> PHPExcel_Style_Border::BORDER_THIN
					)
			)
	);
	$styleAlignCenterTop = array(
			'alignment' => array(
					'horizontal'	=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'		=> PHPExcel_Style_Alignment::VERTICAL_TOP,
					'wrap'			=> true
			),
	);
	$styleAPDown = array(
			'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'F9BBBC')
			)
	);
	
	// Generate excel....
	try {
		$objPHPExcel = new PHPExcel();
		$worksheetReport = $objPHPExcel->getActiveSheet();
		$worksheetReport->setTitle('Data Pendaftaran Peserta');
		
		// Set default alignment ke kiri atas...
		$objPHPExcel->getDefaultStyle()
			->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
		
		// Set up kolom -----------------------------------
		foreach ($columnWidths as $colIdx => $colWidth) {
			$worksheetReport->getColumnDimensionByColumn($colIdx)->setWidth($colWidth);
		}
		
		// Judul worksheet pada bagian atas
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, IDX_ROW_START,
				IDX_COL_HOME+TABLE_COLS-13, IDX_ROW_START)
				->setCellValueByColumnAndRow(IDX_COL_HOME, IDX_ROW_START, "Data Pendaftar Event ".$nama_event);
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, IDX_ROW_START+1,
				IDX_COL_HOME+TABLE_COLS-13, IDX_ROW_START+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME, IDX_ROW_START+1, "(Tanggal Rekapitulasi: ".date("d M Y, H:i").")");
		
		$worksheetReport->getStyleByColumnAndRow(IDX_COL_HOME, IDX_ROW_START)
			->applyFromArray($styleHeader); // Set style
		$worksheetReport->getStyleByColumnAndRow(IDX_COL_HOME, IDX_ROW_START+1)
			->applyFromArray($styleHeader); // Set style
		$worksheetReport->getStyleByColumnAndRow(IDX_COL_HOME, IDX_ROW_START)
			->getFont()->setSize(18);
		
		$rowBaseTable	= IDX_ROW_START+4;
		
		// Baris judul
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, $rowBaseTable-1,
				IDX_COL_HOME+TABLE_COLS-1, $rowBaseTable-1)
				->setCellValueByColumnAndRow(IDX_COL_HOME, $rowBaseTable-1,
						"Jumlah Peserta : ".$jmlHasil);
		
		/*$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, $rowBaseTable,
				IDX_COL_HOME+TABLE_COLS-1, $rowBaseTable)
				->setCellValueByColumnAndRow(IDX_COL_HOME, $rowBaseTable,
						date("d m Y, H:i"));*/
		
		// Baris header tabel
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, $rowBaseTable+1,
				IDX_COL_HOME, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME,$rowBaseTable+1,'Nomor');
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+1, $rowBaseTable+1,
				IDX_COL_HOME+1, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+1,$rowBaseTable+1,'Nomor Registrasi');
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+2, $rowBaseTable+1,
				IDX_COL_HOME+2, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+2,$rowBaseTable+1,'Nama Pendaftar');
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+3, $rowBaseTable+1,
				IDX_COL_HOME+3, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+3,$rowBaseTable+1,'Email');
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+4, $rowBaseTable+1,
				IDX_COL_HOME+4, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+4,$rowBaseTable+1,'Telepon');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+5, $rowBaseTable+1,
				IDX_COL_HOME+5, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+5,$rowBaseTable+1,'Alamat');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+6, $rowBaseTable+1,
				IDX_COL_HOME+6, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+6,$rowBaseTable+1,'Total Harga');

		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+7, $rowBaseTable+1,
				IDX_COL_HOME+7, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+7,$rowBaseTable+1,'Status Bayar');				
		
		// Set border header
		$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME,$rowBaseTable+1,
				IDX_COL_HOME+TABLE_COLS-12,$rowBaseTable+2)
				->applyFromArray($styleHeader)
				->applyFromArray($styleBorderAll)
				->applyFromArray($styleGrayBg);
		
		// Isi body tabel
		$counterItem	= 0;
		$currentRow		= $rowBaseTable + 3;

		foreach ($listPendaftar as $itemResult) {
			$counterItem++;
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME, $currentRow, $counterItem);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+1, $currentRow, $itemResult['no_pendaftar']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+2, $currentRow, $itemResult['nama_pendaftar']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+3, $currentRow, $itemResult['email']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+4, $currentRow, $itemResult['telepon']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+5, $currentRow, $itemResult['alamat']);

			$basket = $itemResult['basket'];
		    $data_basket = explode(",", $basket);
		    $item = $data_basket[0];
		    $harga_satuan = $data_basket[1];
		    $jumlah = $data_basket[2];
		    $total_harga = $data_basket[3];
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+6, $currentRow, $total_harga);
			
			if ($jenis_event == 1)
			{
				$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+7, $currentRow, 'FREE');
			}
			else
			{
				//Deklarasi variabel tanggal untuk status expired
				$tanggal_daftar_event = strtotime($itemResult['payment_date_time']);
				$tanggal_expired = date ('Y-m-d H:i:s', strtotime($tanggal_daftar_event.'+3 hours'));
				$status_pendaftar = $item['status_bayar'];

				if ($itemResult['status_bayar'] == "1")
				{
					$FontColor = new PHPExcel_Style_Color();
					$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+7, $currentRow, 'Sudah Bayar');

					$worksheetReport->getStyleByColumnAndRow(
						IDX_COL_HOME+7, $currentRow)->getFont()->getColor()->setArgb($FontColor::COLOR_GREEN);
				}
				elseif ($itemResult['status_bayar'] == "0")
				{
					if($status_pendaftar == "0")
    				{ 
    					if ($tanggal_daftar_event > $tanggal_expired)
						{
							$FontColor = new PHPExcel_Style_Color();
							$worksheetReport->setCellValueByColumnAndRow(
							IDX_COL_HOME+7, $currentRow, 'Expired');
							
							$worksheetReport->getStyleByColumnAndRow(
								IDX_COL_HOME+7, $currentRow)->getFont()->getColor()->setArgb($FontColor::COLOR_BLACK);
				  		} 
				  		else
				  		{  
						  	$FontColor = new PHPExcel_Style_Color();
							$worksheetReport->setCellValueByColumnAndRow(
							IDX_COL_HOME+7, $currentRow, 'Belum Bayar');
							
							$worksheetReport->getStyleByColumnAndRow(
								IDX_COL_HOME+7, $currentRow)->getFont()->getColor()->setArgb($FontColor::COLOR_BLACK); 
				  		}
				  	}
					
				}
				elseif ($itemResult['status_bayar'] == "5511")
				{
					if ($tanggal_daftar_event > $tanggal_expired)
					{
						$FontColor = new PHPExcel_Style_Color();
						$worksheetReport->setCellValueByColumnAndRow(
						IDX_COL_HOME+7, $currentRow, 'Expired');
						
						$worksheetReport->getStyleByColumnAndRow(
							IDX_COL_HOME+7, $currentRow)->getFont()->getColor()->setArgb($FontColor::COLOR_BLACK);
			  		} 
			  		else
			  		{  
					  	$FontColor = new PHPExcel_Style_Color();
						$worksheetReport->setCellValueByColumnAndRow(
						IDX_COL_HOME+7, $currentRow, 'Menunggu Pembayaran');
						
						$worksheetReport->getStyleByColumnAndRow(
						IDX_COL_HOME+7, $currentRow)->getFont()->getColor()->setArgb($FontColor::COLOR_GRAY); 
			  		}

					
				}
				else
				{
					$FontColor = new PHPExcel_Style_Color();
					$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+7, $currentRow, 'Cancel');
					
					$worksheetReport->getStyleByColumnAndRow(
						IDX_COL_HOME+7, $currentRow)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
				}
				
			}
			
			$currentRow++;
		}
		
		// Setting font color red
		$FontColor = new PHPExcel_Style_Color();
		
		$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME,$currentRow,
				IDX_COL_HOME+TABLE_COLS-12,$currentRow)
				->applyFromArray($styleHeader)
				->applyFromArray($styleBorderAll)
				->applyFromArray($styleGrayBg);
		
		/*$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, $currentRow,
				IDX_COL_HOME+TABLE_COLS-15, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME,$currentRow,'Nilai Rata-Rata Setiap Pertanyaan:');
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+5, $currentRow,
				IDX_COL_HOME+5, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+5, $currentRow, $hasil['prosedur']);
		if($hasil['prosedur'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+5, $currentRow,
				IDX_COL_HOME+5, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		} 
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+6, $currentRow,
				IDX_COL_HOME+6, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+6, $currentRow, $hasil['persyaratan']);
		if($hasil['persyaratan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+6, $currentRow,
				IDX_COL_HOME+6, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+7, $currentRow,
				IDX_COL_HOME+7, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+7, $currentRow, $hasil['kejelasan']);
		if($hasil['kejelasan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+7, $currentRow,
				IDX_COL_HOME+7, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+8, $currentRow,
				IDX_COL_HOME+8, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+8, $currentRow, $hasil['kedisiplinan']);
		if($hasil['kedisiplinan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+8, $currentRow,
				IDX_COL_HOME+8, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+9, $currentRow,
				IDX_COL_HOME+9, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+9, $currentRow, $hasil['tanggungjawab']);
		if($hasil['tanggungjawab'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+9, $currentRow,
				IDX_COL_HOME+9, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+10, $currentRow,
				IDX_COL_HOME+10, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+10, $currentRow, $hasil['kemampuan']);			
		if($hasil['kemampuan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+10, $currentRow,
				IDX_COL_HOME+10, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+11, $currentRow,
				IDX_COL_HOME+11, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+11, $currentRow, $hasil['kecepatan']);			
		if($hasil['kecepatan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+11, $currentRow,
				IDX_COL_HOME+11, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+12, $currentRow,
				IDX_COL_HOME+12, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+12, $currentRow, $hasil['keadilan']);
		if($hasil['keadilan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+12, $currentRow,
				IDX_COL_HOME+12, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+13, $currentRow,
				IDX_COL_HOME+13, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+13, $currentRow, $hasil['kesopanan']);
		if($hasil['kesopanan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+13, $currentRow,
				IDX_COL_HOME+13, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+14, $currentRow,
				IDX_COL_HOME+14, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+14, $currentRow, $hasil['kewajaranBiaya']);	
		if($hasil['kewajaranBiaya'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+14, $currentRow,
				IDX_COL_HOME+14, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+15, $currentRow,
				IDX_COL_HOME+15, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+15, $currentRow, $hasil['kepastianBiaya']);
		if($hasil['kepastianBiaya'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+15, $currentRow,
				IDX_COL_HOME+15, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+16, $currentRow,
				IDX_COL_HOME+16, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+16, $currentRow, $hasil['kepastianJadwal']);
		if($hasil['kepastianJadwal'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+16, $currentRow,
				IDX_COL_HOME+16, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+17, $currentRow,
				IDX_COL_HOME+17, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+17, $currentRow, $hasil['kenyamanan']);
		if($hasil['kenyamanan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+17, $currentRow,
				IDX_COL_HOME+17, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+18, $currentRow,
				IDX_COL_HOME+18, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+18, $currentRow, $hasil['keamanan']);
		if($hasil['keamanan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+18, $currentRow,
				IDX_COL_HOME+18, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		} 			
		
		$worksheetReport->setCellValueByColumnAndRow(IDX_COL_HOME, $currentRow + 4, 
			"Kesimpulan Kuisioner: ");
			
		$worksheetReport->setCellValueByColumnAndRow(IDX_COL_HOME, $currentRow + 5, 
			"    Kualitas Pelayanan '".$simpulan['kinerja']."' dengan nilai ".$simpulan['konversi']." ( ".$simpulan['mutu']." )"); */
		
		
		// Set border untuk seluruh cell
		$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME,$rowBaseTable+1,
				IDX_COL_HOME+TABLE_COLS-12,$currentRow-1)
				->applyFromArray($styleBorderAll);
		
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$exportFileName.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	} catch (Exception $e) {
		die('[PHPExcel error] '.$e->getMessage()."<br> Trace:<br>".$e->getTraceAsString());
	}
}