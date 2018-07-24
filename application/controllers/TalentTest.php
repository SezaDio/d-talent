<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TalentTest extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// check user auth
		$id_talent = $this->session->userdata('id_talent');
		if ($id_talent == "") {
			redirect( site_url('talent/login') );
		}

		$this->load->library('form_validation');
	}

	public function showCharacter()
	{
		$this->load->model('test_models/TestCharacterModel');
		$data['test_character'] = $this->TestCharacterModel->get_all();
		$data['total_records'] = count($data['test_character']);

		$this->load->view('skin/talent/test_header');
		$this->load->view('talent/test/character', $data);
		$this->load->view('skin/talent/test_footer');
	}

	public function submitCharacter()
	{
		$id_talent = $this->session->userdata('id_talent');

		$this->form_validation->set_rules('answer[]', '', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('msg_error', 'Terdapat pertanyaan yang belum dijawab');
			// redirect to function
			$this->showCharacter();
		}
		else {
			// get test's result
			$answers = $this->input->post('answer[]');

			$test_result = $this->calculateCharacterResult($answers);

			// insert data to db
			$insert_data = array(
				'id_talent' => $id_talent,
				'result'    => $test_result
			);
			$query = $this->db->insert('result_character', $insert_data);

			if($query) {
				$response = $this->detailCharacterResult($test_result);
	  			$data['result'] = $test_result;
	  			$data['sub_title'] = $response['sub_title'];
				// get result detail
	  			$data['result_detail'] = $response['result_detail'];

				// add success message to session
				$this->session->set_flashdata('msg_success', 'Kirim tes berhasil');
			}
			else {
				// add failed message to session
				$this->session->set_flashdata('msg_error', 'Kirim tes gagal');
			}

			// redirect to index ...
			$this->load->view('skin/talent/test_header');
			$this->load->view('talent/test/character_result', $data);
			$this->load->view('skin/talent/test_footer');
			// redirect('talent/test-character/result');
		}
	}

	// calculate character test's result
	private function calculateCharacterResult($answers)
	{
		$no = 0;
		// character test's score
		$E_score = 0;
		$I_score = 0;
		$S_score = 0;
		$N_score = 0;
		$T_score = 0;
		$F_score = 0;
		$J_score = 0;
		$P_score = 0;

		foreach ($answers as $key => $value) {
			$no = $key + 1;
			// count E & I
			if ($no % 7 == 1) {
				if ($value == "a") {
					$E_score++;
				}
				else{
					$I_score++;
				}
			}
			// count S & N
			elseif ($no % 7 == 2 || $no % 7 == 3) {
				if ($value == "a") {
					$S_score++;
				}
				else{
					$N_score++;
				}
			}
			// count T & F
			elseif ($no % 7 == 4 || $no % 7 == 5) {
				if ($value == "a") {
					$T_score++;
				}
				else{
					$F_score++;
				}
			}
			// count J & P
			elseif ($no % 7 == 6 || $no % 7 == 0) {
				if ($value == "a") {
					$J_score++;
				}
				else{
					$P_score++;
				}
			}
		}

		if ($E_score > $I_score) {
			$result = "E";
		}
		else{
			$result = "I";
		}

		if ($S_score > $N_score) {
			$result = $result . "S";
		}
		else{
			$result = $result . "N";
		}

		if ($T_score > $F_score) {
			$result = $result . "T";
		}
		else{
			$result = $result . "F";
		}

		if ($J_score > $P_score) {
			$result = $result . "J";
		}
		else{
			$result = $result . "P";
		}

		return $result;
	}

	// get character test's result detail
	private function detailCharacterResult($test_result)
	{
		switch ($test_result) {
			case 'ISTJ':
				$sub_title = "Pengawas";
				$result_detail = '“Melakukan apa yang seharusnya dilakukan”<br>
				<p>Organisator yang baik – kompulsif – prifasi – dapat dipercaya – praktis – memegang aturan</p>
				<b>Paling bertanggung jawab</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Serius, pendiam, berhasil menyelesaikan pekerjaan dengan konsentrasi dan ketelitian, praktis, teratur, tidak berbelit-belit, logis, realistis, dan dapat diandalkan. Membuat keputusan sendiri, seperti dalam menentukan apa yang ingin dicapai, dan gigih berusaha mencapai tujuan tersebut, tanpa menghiraukan pandangan dan gangguan dari orang lain.';
			break;
				
			case 'ISFJ':
				$sub_title = "Penjaga";
				$result_detail = '“Tanggung jawab pada tugas”<br>
				<p>Bekerja di belakang layar – siap berkorban – bertanggung jawab – lebih menyukai tindakan – ramah dan cepat menyesuaikan diri dengan aturan yang berlaku</p>
				<b>Paling Loyal</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Pendiam, ramah, bertanggung jawab, berhati-hati dalam bertindak. Bekerja dengan tekun untuk memenuhi kewajiban dan menyenangkan teman dan sekolah. Teliti, bersungguh-sungguh, akurat. Membutuhkan waktu untuk mendalami hal-hal teknis karena lebih berminat pada hal non teknis. Sabar dengan hal-hal detail dan rutin, setia, penuh perhatian, peduli pada perasaan orang lain.';
			break;
				
			case 'ESTJ':
				$sub_title = "Supervisor";
				$result_detail = '“Administrator kehidupan”<br>
				<p>Teratur dan terstruktur - tradisional - pandai bergaul - orientasi hasil - produser</p>
				<b>Paling Sulit Digerakkan</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Praktis, realistis, tidak berbelit-belit, berbakat dalam bidang bisnis atau mekanis, busa melakukan aktivitas yang tidak disukai jika perlu. Suka mengorganisir dan menjalankan aktivitas. Bisa melakukan pekerjaan administratif dengan baik. Peduli pada perasaan dan pandangan orang lain.
				<br>
				<br>
				<b>Karir yang sesuai:</b>
				<br>
				Petugas bank, manajer proyek, database manajer, kepala bagian layanan informasi, kepala bagian logistik dan penyedia barang, konsultan, makelar saham, analis komputer, agen asuransi, kontraktor, pengawas pabrik';
			break;

			case 'ESFJ':
				$sub_title = "Penyedia";
				$result_detail = '“Pelayan bagi dunia”<br>
				<p>Terampil bergaul - penuh pemikiran - ingin menyenangkan orang lain - ramah - pada tempatnya</p>
				<b>Penyelaras</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Ramah, hangat, banyak bicara, populer, teliti, mampu bekerja sama dengan baik, aktif sebagai anggota komunitas. Butuh keharmonisan dan mampu mewujudkannya, selalu melakukan sesuatu yang baik dan menyenangkan untuk orang lain. Bekerja lebih baik jika diberi dorongan dan pujian. Tidak terlalu tertarik dengan pemikiran abstra dan bidang teknis. Tertarik pada hal-hal yang mempengaruhi kehidupan manusia.
				<br>
				<br>
				<b>Karir yang sesuai:</b>
				<br>
				Kepala bagian humas, personel banker, bagian penjualan, konsultan SDM, pengusaha, makelar perumahan meway, kepala bagian pemasaran, penerjemah, telemarketer, manajer perkantoran, konsultan kredit, akuntan.';
			break;

			case 'ESTP':
				$sub_title = "Promotor";
				$result_detail = '“Realis”<br>
				<p>Pendekatan yang "tidak biasa" - lucu - hidup untuk saat ini dan disini - pemecah masalah</p>
				<b>Paling Spontan</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Tidak berbelit-belit, bukan pencemas atau selalu terburu-buru, menikmati apapun yang terjadi. Cenderung menyukai hal-hal mekanis dan olahraga dengan teman-teman. Mungkin agak terlalu terus terang dan tidak sensitif. Jika merasa perlu sanggup melakukan pekerjaan yang berhubungan dengan matematika dan ilmu pengetauan. Tidak menyukai penjelasan yang panjang lebar. Lebih ahli jika berhadapan dengan hal-hal yang nyata yang bisa dikerjakan, ditangani, dipecahkan bagian-bagiannya atau disatukan.';
			break;

			case 'ISTP':
				$sub_title = "Perajin";
				$result_detail = '“Selalu siap mencoba hal baru”<br>
				<p>Pengamat - bertindak pada hal-hal yang praktis - selalu siap dengan apapun yang akan terjadi - sederhana - menyendiri dan dingin</p>
				<b>Paling Pragmatis</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Kalem, suka mengamati orang-orag da lingkungan sekitar. Pendiam, mempelajari dan menganalisa kehidupan dengan keingintahuan objektf dan humor orisinal yang tidak disangka-sangka. Biasanya tertarik pada prinsip yang bersifat luas, hubungan sebab akibat, bagaimana dan mengapa hal mekanis bekerja. Bersungguh-sungguh hanya jija dianggap perlu, bekerja dengan efisien, membuang-buang tenaga dalam bekerja sangat tidak efisien.';
			break;

			case 'ESFP':
				$sub_title = "Penampil";
				$result_detail = '“Berprinsip hidup hanya sekali”<br>
				<p>Spontan - pandai bergaul - suka kejutan - penyulap situasi</p>
				<b>Paling Murah Hati</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Ramah, santai, menerima apa yang ada di depannya, mudah bergaul, menikmati segalanya dan cara menikmatinya membuat segalanya lebih menyenangkan untuk orang lain. Menyukai olahraga dan membuat sesuatu. Tahu apa yang sedang terjadi dan ikut serta dengan penuh semangat. Mengingat fakta lebih mudah daripada mengingat teori. Sangat sesuai jika dihadapkan dengan situasi yang membutuhkan akal sehat, pikiran yang jernih, dan kemampuan praktis dalam menghadapi orang maupun benda.';
			break;

			case 'ISFP':
				$sub_title = "Composer";
				$result_detail = '“Tahu banyak tapi membagikan ilmu secukupnya”<br>
				<p>Hangat - sensitif - tidak cepat berasumsi - perencana jangka pendek - anggota tim yang baik - peduli dengan hidup dan dirinya</p>
				<b>Paling Narsistik</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Pemalu, pendiam tapi ramah. Sensitif, baik, rendah hati mengenai kemampuan sendiri. Menghindari perselisihan, tidak memaksakan pendapat, tidai mau menjadi pemimpin, lebih suka menjadi anggota tim. Tidak buru-buru dalam melakukan sesuatu karena menikmati waktu bekerja dan berusaha mengeluarkan tenaga secukupnya.';
			break;

			case 'ENFJ':
				$sub_title = "Guru";
				$result_detail = '“Ahli persuasi”<br>
				<p>Karismatik - idealis - penuh belas kasihan membukakan kemungkinan bagi orang lain - toleransi ketidaknyamanan</p>
				<b>Persuasif</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Cepat tanggap dan bertanggung jawab, pada umumnya sangat memperhatikan apa yang orang lain pikirkan dan inginkan, dan berusaha melakukan sesuatu sehubungan dengan menghormati perasaan orang lain. Dapat menyuguhkan proposal atau meimpin suatu kelompok diskusi dengan tenang dan bijaksana. Midah bersosialisasi, populer, ak5if falam kegiatan sekolah, tapi mampu membagi waktu dengan pelajaran sehingga tetap bisa menjalaninya dengan baik.';
			break;

			case 'INFJ':
				$sub_title = "Konselor";
				$result_detail = '“Sumber inspirasi orang lain”<br>
				<p>Reflektif/instropektif - peduli pada orang lain - kreatif - memiliki bakat dalam berbahasa - psychic</p>
				<b>Paling kontemplatif</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Sukses dengan ketekunan, orisinalitas, dan keinginan untuk melakukan apa yang perlu dan ingin dilakukan. Melakukan  yang terbaik dalam bekerja. Diam-diam menghayutkan, berhati-hati dalam bertindak, peduli pada orang lan. Dihormati karena memegang teguh prinsip. Sering dihirmati dan dijadikan panutan karena pendiruan yang jelas. Seperti dalam mencari cara yang tepat untuk memberikan hasil baik bagi semua orang.';
			break;

			case 'ENFP':
				$sub_title = "Pembela";
				$result_detail = '“Memberi makna lebih pada hidup”<br>
				<p>Orientasi pada orang - kreatif - mengusahakan keselarasan - memulai tanpa menyelesaikan - menikmati hidup</p>
				<b>Paling Optimis</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Sangat antusias, bersemangat, berbakat, mempunyai daya imajinasi. Mampu melakukan hampir segala sesuatu yang menarik. Cepat menemukan penyelesaian atas masalah apapun dan siap membantu siapa saja yang mempunyai masalah. Sering mengandalkan kemampuan untuk berimprovisasi daripada membuat persiapan di awal. Biasanya dapat menemukan alasan yang memaksa demi mendapatkan apa yang diinginkan.';
			break;

			case 'INFP':
				$sub_title = "Penyembuh";
				$result_detail = '“Melayani sebaik mungkin demi komunitas”<br>
				<p>Memegang teguh nilai-nilai pribadi - kreatif - tidak directive - mencari ketenangan/keteraturan diri - hati-hati</p>
				<b>Paling Idealis</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Penuh dengan antusiasme dan kesetiaan, tapi jarang menampilkan dan membicarakan hal ini sampai benar-benar mengenal orang lain. Peduli terhadap proses belajar, ide-ide, bahasa, dan proyek mandiri. Cenderung sangat menyepelekan pekerjaan, tapi kemudian bisa menyelesaikannya. Mudah beeteman, tapi sering kali terlalu bersemangat dalam usaha bersosialisasi. Kurang peduli pada harta dan barang miliknya dan keadaan sekeliling.';
			break;

			case 'INTP':
				$sub_title = "Arsitek";
				$result_detail = '“Jago dalam memecahkan masalah”<br>
				<p>Memamcing orang lain untuk berpikir - mengejar kompetensi - pemikir ulung yanh sering "absen" - hati-hati dalam hubungan</p>
				<b>Paling Konseptual</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Pendiam, brilian dalam menyelesaikan ujian-ujian terutama bidang teoritis dan ilmiah. Berpikiran sangat logis bahkan pada hal kecil. Biasanya tertarik pada ide dan pemikiran, dan tidak terlalu menyukai pesta dan basa-basi. Cenderung untuk memiliki arah minat yang jrlas. Perlu memilih karir dimana minat yang kuat bisa digunakan dan berguna.';
			break;

			case 'INTJ':
				$sub_title = "Perencana";
				$result_detail = '“Semua hal bisa berkembang”<br>
				<p>Mengagungkan kompetensi - melakukan dengan cara sendiri - berbasis teori - skeptis - melihat kemungkinan</p>
				<b>Paling Mandiri</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Biasanya mempunyai pemikiran orisinil dan dirongan yang kuat untuk mewujudkan ide da tujuan. Memiliki kemampuan yang hebat dalam mengorganisir pekerjaan dalam bidang yang disukau dan dapat menyelesaikan pekerjaan dengan atau tanpa bantuan. Skeptis, kritis, mandiri, tekun, sering kali keras kepala. Harus belajar mengalah pada hal yang kurang penting agar dapat mengerjaan hal yang lebih penting.';
			break;

			case 'ENTJ':
				$sub_title = "Pemimpin Komando";
				$result_detail = '“Pemimpin kehidupan”<br>
				<p>Argumentatif - suka berkelompok - visioner - perencana - penggerak - benci ketidakberdayaan</p>
				<b>Paling Komando</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Bersungguh-sungguh, suka berterus terang, mampu dalam pelajaran, pemimpin dalam aktivitas. Mampu bekerja dengan baik terutama pada pekerjaan yang menuntut kemmapuan berbicara yang cerdas dan penuh pemikiran, seperti bicara dimuka umum. Biasanya mempunyai pengetahuan yang luas dan senang menambah koleksi pengetahuan. Terkadang lebih positif dan percaya diri daripada pengalaman sendiri diarea yang sama.';
			break;

			case 'ENTP':
				$sub_title = "Penemu";
				$result_detail = '“Selalu ada yang menantang”<br>
				<p>Antusias - ide-ide baru - melihat dari sudut pandang yang lengkap - melihat batas kekuatan</p>
				<b>Paling Senang Mencaritahu</b>
				<br>
				<br>
				<b>Ciri kepribadian:</b>
				<br>
				Cepat, berbakat, bisa melakukan banyak hal dengan baik. Teman yang mampu membangkitkan semangat, selalu waspada, dan suka berterus terang. Sering berdebat hanya untuk mendapatkan kesenangan berada pada sisi yang berlawanan. Mampu menyelesaikan masalah yang baru dan menantang, tapi bisa tidak memperdulikan tugas rutin. Mudah berpindah dari satu hal ke hal yang menarik perhatiannya. Ahli dalan menemukan alasan yang logis dalam mewujudkan keinginan.';
			break;
		}

		$response['sub_title'] = $sub_title;
		$response['result_detail'] = $result_detail;

		return $response;
	}

}
