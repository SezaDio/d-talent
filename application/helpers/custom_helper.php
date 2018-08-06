<?php

function displayDate($date)
{
    if ($date != null && $date != '' && $date != '0000-00-00') {
        return date('d F Y', strtotime($date));
    }
    else{
        return "-";
    }
}

function displayMonthYear($date)
{
    if ($date != null && $date != '' && $date != '0000-00-00') {
        return date('Y-m', strtotime($date));
    }
    else{
        return "";
    }
}

function displayMonthName($month)
{
    if ($month != null && $month != '') {
        // return date('M', strtotime($date));
        switch ($month) {
            case 1:
                return "January";
                break;
            case 2:
                return "February";
                break;
            case 3:
                return "March";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "May";
                break;
            case 6:
                return "June";
                break;
            case 7:
                return "July";
                break;
            case 8:
                return "August";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "October";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "December";
                break;
        }
    }
    else{
        return "";
    }
}

function displayCVWorkDate($work_start, $work_end)
{
    if ($work_start != '' && $work_end != '') {
        return date('F Y', strtotime($work_start)) . " - " . date('F Y', strtotime($work_end));
    }
    elseif ($work_start != '' && $work_end == ''){
        return date('F Y', strtotime($work_start)) . " - ...";
    }
    elseif ($work_start == '' && $work_end != ''){
        return ' - ' . date('F Y', strtotime($work_end));
    }
    else{
        return "-";
    }
}

/*function displayMonth($date)
{
    if ($date != null && $date != '' && $date != '0000-00-00') {
        return date('m', strtotime($date));
    }
    else{
        return "";
    }
}*/

function displayYear($date)
{
    if ($date != null && $date != '' && $date != '0000-00-00') {
        return date('Y', strtotime($date));
    }
    else{
        return "";
    }
}

/*function displayCVEducationDate($start_date, $end_date)
{
    if ($start_date != '0000-00-00' && $end_date != '0000-00-00') {
        return date('Y', strtotime($start_date)) . " - " . date('Y', strtotime($end_date));
    }
    elseif ($start_date != '0000-00-00' && $end_date == '0000-00-00'){
        return date('Y', strtotime($start_date)) . " - ...";
    }
    else{
        return "-";
    }
}*/

function capitalizeEachWord($string)
{
    $string = strtolower($string);
    $string = ucwords($string);
    return $string;
}

function countAge($birthday)
{
    $from = new DateTime($birthday);
    $to   = new DateTime('today');
    return $from->diff($to)->y;
}

function displaySkills($string)
{
    if ($string == "") {
        return "";
    }

    $array = explode(',', $string);
    foreach ($array as $key => $value) {
        echo '<span class="label">'. $value .'</span> ';
    }
}

function displayGender($gender)
{
    if ($gender == 0) {
        return "Perempuan";
    }
    else{
        return "Laki-laki";
    }
}

function displayMaritalStatus($status)
{
    if ($status == 0) {
        return "Belum menikah";
    }
    else{
        return "Sudah menikah";
    }
}

function displayCompanyUpdateStatus($status)
{
    if ($status == 0) {
        return "Konsep";
    }
    else{
        return "Terbit";
    }
}

/* Company Job Vacancy */
function displayApplyDate($start_date, $end_date)
{
    if ($start_date != null && $start_date != '' && $start_date != '0000-00-00') {
        return date('d M', strtotime($start_date)) . ' - ' . date('d M Y', strtotime($end_date));
    }
    else{
        return "-";
    }
}

function displayRequiredSkills($string)
{
    if ($string == "") {
        return "";
    }

    $array = explode(',', $string);
    foreach ($array as $key => $value) {
        echo "<li>". $value ."</li>";
    }
}

/* Company Job Notification */
function displayNotificatioonStatus($status)
{
    //  1 accept, 2 decline, 3 expired, 0 menunggu
    switch ($status) {
        case 0:           
            return '<span class="label label-info">Menunggu</span>';
            break;
        case 1:           
            return '<span class="label label-success">Menerima</span>';
            break;
        case 2:           
            return '<span class="label label-danger">Menolak</span>';
            break;
        case 3:           
            return '<span class="label label-warning">Kadaluarsa</span>';
            break;
        
        default:
            return '';
            break;
    }
}

/* Online Test - Admin */
function displaySoftskillCategory($category)
{
    // 1: intrapersonal, 2: interpersonal
    switch ($category) {
        case 1:
            return "Intrapersonal";
            break;
        case 2:
            return "Interpersonal";
            break;
        
        default:
            return "";
            break;
    }
}

/* Online Test - Talent */
// get passion test's detail
function detailPassionResult($test_result)
{
    switch ($test_result) {
        case 'Realistis':
            return '<p><b>Realistis</b></p>
                Orang dengan tipe realistis sangat hebat mengerjakan hal-hal mekanis atau pekerjaan yang ketahanan fisik. Pekerjaan yang cocok untuk tipe ini:
                <br>
                <ol>
                <li>Agrikultur</li>
                <li>Tenaga kesehatan</li>
                <li>Ahli computer atau programmer</li>
                <li>Ahli konstruksi</li>
                <li>Mekanik</li>
                <li>Ahli mesin (Engineering)</li>
                <li>Ahli pengolahan makanan dan perhotelan</li>
                </ol>';
            break;

        case 'Investigasi':
            return '<p><b>Investigasi</b></p>
                Orang dengan tipe investigasi menyukai kegiatan mengamati, belajar, menganalisa dan menyelesaikan masalah. Pekerjaan yang cocok untuk tipe ini:
                <br>
                <ol>
                <li>Ahli biologi laut</li>
                <li>Dokter</li>
                <li>Ahli kimia</li>
                <li>Ahli mesin</li>
                <li>Psikolog dan psikiater</li>
                <li>Ekonom</li>
                <li>Human Resource Development (HRD)</li>
                </ol>';
            break;

        case 'Artistik':
            return '<p><b>Artistik</b></p>
                Orang dengan tipe artistik menyukai pekerjaan yang membutuhkan kreativitas, situasi pekerjaan yang bebas, dan bisa bekerja sendiri. Pekerjaan yang cocok untuk tipe ini:
                <br>
                <ol>
                <li>Pelobi</li>
                <li>Wartawan</li>
                <li>Arsitektur</li>
                <li>Desainer interior</li>
                <li>Fotografer</li>
                <li>Ahli tata rias</li>
                <li>Seniman</li>
                </ol>';
            break;

        case 'Sosial':
            return '<p><b>Sosial</b></p>
                Orang dengan tipe sosial menyukai pekerjaan yang selalu berinteraksi dengan konsumen dan partner kerja. Pekerjaan yang cocok untuk tipe ini:
                <br>
                <ol>
                <li>Perawat</li>
                <li>Konselor</li>
                <li>Terapis</li>
                <li>Pemandu wisata</li>
                <li>Ahli dibidang iklan</li>
                <li>Guru</li>
                <li>Ahli public relation</li>
                </ol>';
            break;

        case 'Enterpreuner':
            return '<p><b>Enterpreuner</b></p>
                Orang dengan tipe entrepeuner lebih optimal bekerja dalam tim dan senang dengan kegiatan persuasi dan memamerkan produk atau jasa. Pekerjaan yang cocok untuk tipe ini:
                <br>
                <ol>
                <li>Perancang pakaian</li>
                <li>Agen real estate</li>
                <li>Marketer atau sales</li>
                <li>Pengacara</li>
                <li>Politikus</li>
                <li>Banker</li>
                <li>Pembisnis</li>
                </ol>';
            break;

        case 'Konvensional':
            return '<p><b>Konvensional</b></p>
                Orang dengan tipe konvensional menyukai pekerjaan mengolah data, pekerjaan yang membutuhkan ketelitian dan pengaturan. Pekerjaan yang cocok untuk tipe ini:
                <br>
                <ol>
                <li>Akuntan</li>
                <li>Appraisal asuransi</li>
                <li>Administrator</li>
                <li>Banker</li>
                <li>Pengolah data</li>
                <li>Peneliti</li>
                <li>Petugas rekam medis</li>
                </ol>';
            break;
    }
}

// get character test's detail
function detailCharacterResult($test_result)
{
    switch ($test_result) {
        case 'ISTJ':
            $sub_title = "Pengawas";
            $result_detail = '“Melakukan apa yang seharusnya dilakukan”<br>
            <p>Organisator yang baik – kompulsif – prifasi – dapat dipercaya – praktis – memegang aturan</p>
            <p><b>Paling bertanggung jawab</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Serius, pendiam, berhasil menyelesaikan pekerjaan dengan konsentrasi dan ketelitian, praktis, teratur, tidak berbelit-belit, logis, realistis, dan dapat diandalkan. Membuat keputusan sendiri, seperti dalam menentukan apa yang ingin dicapai, dan gigih berusaha mencapai tujuan tersebut, tanpa menghiraukan pandangan dan gangguan dari orang lain.
            </p>';
        break;
            
        case 'ISFJ':
            $sub_title = "Penjaga";
            $result_detail = '“Tanggung jawab pada tugas”<br>
            <p>Bekerja di belakang layar – siap berkorban – bertanggung jawab – lebih menyukai tindakan – ramah dan cepat menyesuaikan diri dengan aturan yang berlaku</p>
            <p><b>Paling Loyal</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Pendiam, ramah, bertanggung jawab, berhati-hati dalam bertindak. Bekerja dengan tekun untuk memenuhi kewajiban dan menyenangkan teman dan sekolah. Teliti, bersungguh-sungguh, akurat. Membutuhkan waktu untuk mendalami hal-hal teknis karena lebih berminat pada hal non teknis. Sabar dengan hal-hal detail dan rutin, setia, penuh perhatian, peduli pada perasaan orang lain.
            </p>';
        break;
            
        case 'ESTJ':
            $sub_title = "Supervisor";
            $result_detail = '“Administrator kehidupan”<br>
            <p>Teratur dan terstruktur - tradisional - pandai bergaul - orientasi hasil - produser</p>
            <p><b>Paling Sulit Digerakkan</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Praktis, realistis, tidak berbelit-belit, berbakat dalam bidang bisnis atau mekanis, busa melakukan aktivitas yang tidak disukai jika perlu. Suka mengorganisir dan menjalankan aktivitas. Bisa melakukan pekerjaan administratif dengan baik. Peduli pada perasaan dan pandangan orang lain.
            </p>
            <b>Karir yang sesuai:</b>
            <p>
            Petugas bank, manajer proyek, database manajer, kepala bagian layanan informasi, kepala bagian logistik dan penyedia barang, konsultan, makelar saham, analis komputer, agen asuransi, kontraktor, pengawas pabrik
            </p>';
        break;

        case 'ESFJ':
            $sub_title = "Penyedia";
            $result_detail = '“Pelayan bagi dunia”<br>
            <p>Terampil bergaul - penuh pemikiran - ingin menyenangkan orang lain - ramah - pada tempatnya</p>
            <p><b>Penyelaras</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Ramah, hangat, banyak bicara, populer, teliti, mampu bekerja sama dengan baik, aktif sebagai anggota komunitas. Butuh keharmonisan dan mampu mewujudkannya, selalu melakukan sesuatu yang baik dan menyenangkan untuk orang lain. Bekerja lebih baik jika diberi dorongan dan pujian. Tidak terlalu tertarik dengan pemikiran abstra dan bidang teknis. Tertarik pada hal-hal yang mempengaruhi kehidupan manusia.
            </p>
            <b>Karir yang sesuai:</b>
            <p>
            Kepala bagian humas, personel banker, bagian penjualan, konsultan SDM, pengusaha, makelar perumahan meway, kepala bagian pemasaran, penerjemah, telemarketer, manajer perkantoran, konsultan kredit, akuntan.
            </p>';
        break;

        case 'ESTP':
            $sub_title = "Promotor";
            $result_detail = '“Realis”<br>
            <p>Pendekatan yang "tidak biasa" - lucu - hidup untuk saat ini dan disini - pemecah masalah</p>
            <p><b>Paling Spontan</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Tidak berbelit-belit, bukan pencemas atau selalu terburu-buru, menikmati apapun yang terjadi. Cenderung menyukai hal-hal mekanis dan olahraga dengan teman-teman. Mungkin agak terlalu terus terang dan tidak sensitif. Jika merasa perlu sanggup melakukan pekerjaan yang berhubungan dengan matematika dan ilmu pengetauan. Tidak menyukai penjelasan yang panjang lebar. Lebih ahli jika berhadapan dengan hal-hal yang nyata yang bisa dikerjakan, ditangani, dipecahkan bagian-bagiannya atau disatukan.
            </p>';
        break;

        case 'ISTP':
            $sub_title = "Perajin";
            $result_detail = '“Selalu siap mencoba hal baru”<br>
            <p>Pengamat - bertindak pada hal-hal yang praktis - selalu siap dengan apapun yang akan terjadi - sederhana - menyendiri dan dingin</p>
            <p><b>Paling Pragmatis</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Kalem, suka mengamati orang-orag da lingkungan sekitar. Pendiam, mempelajari dan menganalisa kehidupan dengan keingintahuan objektf dan humor orisinal yang tidak disangka-sangka. Biasanya tertarik pada prinsip yang bersifat luas, hubungan sebab akibat, bagaimana dan mengapa hal mekanis bekerja. Bersungguh-sungguh hanya jija dianggap perlu, bekerja dengan efisien, membuang-buang tenaga dalam bekerja sangat tidak efisien.
            </p>';
        break;

        case 'ESFP':
            $sub_title = "Penampil";
            $result_detail = '“Berprinsip hidup hanya sekali”<br>
            <p>Spontan - pandai bergaul - suka kejutan - penyulap situasi</p>
            <p><b>Paling Murah Hati</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Ramah, santai, menerima apa yang ada di depannya, mudah bergaul, menikmati segalanya dan cara menikmatinya membuat segalanya lebih menyenangkan untuk orang lain. Menyukai olahraga dan membuat sesuatu. Tahu apa yang sedang terjadi dan ikut serta dengan penuh semangat. Mengingat fakta lebih mudah daripada mengingat teori. Sangat sesuai jika dihadapkan dengan situasi yang membutuhkan akal sehat, pikiran yang jernih, dan kemampuan praktis dalam menghadapi orang maupun benda.
            </p>';
        break;

        case 'ISFP':
            $sub_title = "Composer";
            $result_detail = '“Tahu banyak tapi membagikan ilmu secukupnya”<br>
            <p>Hangat - sensitif - tidak cepat berasumsi - perencana jangka pendek - anggota tim yang baik - peduli dengan hidup dan dirinya</p>
            <p><b>Paling Narsistik</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Pemalu, pendiam tapi ramah. Sensitif, baik, rendah hati mengenai kemampuan sendiri. Menghindari perselisihan, tidak memaksakan pendapat, tidai mau menjadi pemimpin, lebih suka menjadi anggota tim. Tidak buru-buru dalam melakukan sesuatu karena menikmati waktu bekerja dan berusaha mengeluarkan tenaga secukupnya.
            </p>';
        break;

        case 'ENFJ':
            $sub_title = "Guru";
            $result_detail = '“Ahli persuasi”<br>
            <p>Karismatik - idealis - penuh belas kasihan membukakan kemungkinan bagi orang lain - toleransi ketidaknyamanan</p>
            <p><b>Persuasif</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Cepat tanggap dan bertanggung jawab, pada umumnya sangat memperhatikan apa yang orang lain pikirkan dan inginkan, dan berusaha melakukan sesuatu sehubungan dengan menghormati perasaan orang lain. Dapat menyuguhkan proposal atau meimpin suatu kelompok diskusi dengan tenang dan bijaksana. Midah bersosialisasi, populer, ak5if falam kegiatan sekolah, tapi mampu membagi waktu dengan pelajaran sehingga tetap bisa menjalaninya dengan baik.
            </p>';
        break;

        case 'INFJ':
            $sub_title = "Konselor";
            $result_detail = '“Sumber inspirasi orang lain”<br>
            <p>Reflektif/instropektif - peduli pada orang lain - kreatif - memiliki bakat dalam berbahasa - psychic</p>
            <p><b>Paling kontemplatif</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Sukses dengan ketekunan, orisinalitas, dan keinginan untuk melakukan apa yang perlu dan ingin dilakukan. Melakukan  yang terbaik dalam bekerja. Diam-diam menghayutkan, berhati-hati dalam bertindak, peduli pada orang lan. Dihormati karena memegang teguh prinsip. Sering dihirmati dan dijadikan panutan karena pendiruan yang jelas. Seperti dalam mencari cara yang tepat untuk memberikan hasil baik bagi semua orang.
            </p>';
        break;

        case 'ENFP':
            $sub_title = "Pembela";
            $result_detail = '“Memberi makna lebih pada hidup”<br>
            <p>Orientasi pada orang - kreatif - mengusahakan keselarasan - memulai tanpa menyelesaikan - menikmati hidup</p>
            <p><b>Paling Optimis</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Sangat antusias, bersemangat, berbakat, mempunyai daya imajinasi. Mampu melakukan hampir segala sesuatu yang menarik. Cepat menemukan penyelesaian atas masalah apapun dan siap membantu siapa saja yang mempunyai masalah. Sering mengandalkan kemampuan untuk berimprovisasi daripada membuat persiapan di awal. Biasanya dapat menemukan alasan yang memaksa demi mendapatkan apa yang diinginkan.
            </p>';
        break;

        case 'INFP':
            $sub_title = "Penyembuh";
            $result_detail = '“Melayani sebaik mungkin demi komunitas”<br>
            <p>Memegang teguh nilai-nilai pribadi - kreatif - tidak directive - mencari ketenangan/keteraturan diri - hati-hati</p>
            <p><b>Paling Idealis</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Penuh dengan antusiasme dan kesetiaan, tapi jarang menampilkan dan membicarakan hal ini sampai benar-benar mengenal orang lain. Peduli terhadap proses belajar, ide-ide, bahasa, dan proyek mandiri. Cenderung sangat menyepelekan pekerjaan, tapi kemudian bisa menyelesaikannya. Mudah beeteman, tapi sering kali terlalu bersemangat dalam usaha bersosialisasi. Kurang peduli pada harta dan barang miliknya dan keadaan sekeliling.
            </p>';
        break;

        case 'INTP':
            $sub_title = "Arsitek";
            $result_detail = '“Jago dalam memecahkan masalah”<br>
            <p>Memamcing orang lain untuk berpikir - mengejar kompetensi - pemikir ulung yanh sering "absen" - hati-hati dalam hubungan</p>
            <p><b>Paling Konseptual</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Pendiam, brilian dalam menyelesaikan ujian-ujian terutama bidang teoritis dan ilmiah. Berpikiran sangat logis bahkan pada hal kecil. Biasanya tertarik pada ide dan pemikiran, dan tidak terlalu menyukai pesta dan basa-basi. Cenderung untuk memiliki arah minat yang jrlas. Perlu memilih karir dimana minat yang kuat bisa digunakan dan berguna.
            </p>';
        break;

        case 'INTJ':
            $sub_title = "Perencana";
            $result_detail = '“Semua hal bisa berkembang”<br>
            <p>Mengagungkan kompetensi - melakukan dengan cara sendiri - berbasis teori - skeptis - melihat kemungkinan</p>
            <p><b>Paling Mandiri</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Biasanya mempunyai pemikiran orisinil dan dirongan yang kuat untuk mewujudkan ide da tujuan. Memiliki kemampuan yang hebat dalam mengorganisir pekerjaan dalam bidang yang disukau dan dapat menyelesaikan pekerjaan dengan atau tanpa bantuan. Skeptis, kritis, mandiri, tekun, sering kali keras kepala. Harus belajar mengalah pada hal yang kurang penting agar dapat mengerjaan hal yang lebih penting.
            </p>';
        break;

        case 'ENTJ':
            $sub_title = "Pemimpin Komando";
            $result_detail = '“Pemimpin kehidupan”<br>
            <p>Argumentatif - suka berkelompok - visioner - perencana - penggerak - benci ketidakberdayaan</p>
            <p><b>Paling Komando</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Bersungguh-sungguh, suka berterus terang, mampu dalam pelajaran, pemimpin dalam aktivitas. Mampu bekerja dengan baik terutama pada pekerjaan yang menuntut kemmapuan berbicara yang cerdas dan penuh pemikiran, seperti bicara dimuka umum. Biasanya mempunyai pengetahuan yang luas dan senang menambah koleksi pengetahuan. Terkadang lebih positif dan percaya diri daripada pengalaman sendiri diarea yang sama.
            </p>';
        break;

        case 'ENTP':
            $sub_title = "Penemu";
            $result_detail = '“Selalu ada yang menantang”<br>
            <p>Antusias - ide-ide baru - melihat dari sudut pandang yang lengkap - melihat batas kekuatan</p>
            <p><b>Paling Senang Mencaritahu</b></p>
            <b>Ciri kepribadian:</b>
            <p>
            Cepat, berbakat, bisa melakukan banyak hal dengan baik. Teman yang mampu membangkitkan semangat, selalu waspada, dan suka berterus terang. Sering berdebat hanya untuk mendapatkan kesenangan berada pada sisi yang berlawanan. Mampu menyelesaikan masalah yang baru dan menantang, tapi bisa tidak memperdulikan tugas rutin. Mudah berpindah dari satu hal ke hal yang menarik perhatiannya. Ahli dalan menemukan alasan yang logis dalam mewujudkan keinginan.
            </p>';
        break;
    }

    $response['sub_title'] = $sub_title;
    $response['result_detail'] = $result_detail;

    return $response;
}

// get work attitude test's detail
function detailWorkAttitudeResult($test_result)
{
    
    switch ($test_result) {
        case 'Rendah':
            $sub_title = '"Sikap Kerja Rendah"';
            $result_detail = "<p>Orang dengan sikap kerja rendah cenderung tidak peduli pada perusahaanya karena kurangnya kepuasan kerja secara materil dan imateril yang didapat di perusahaan. Dia merasa tidak perlu berkomitmen apapun di perusahaan karena dia merasa bisa mendapatkan pekerjaan dan jabatan yang lebih baik di perusahaan lain. Dia juga kurang terlibat aktif di semua kegiatan perusahaan dan kurang bertanggung jawab dalam menyelesaikan tugas kantor.</p>";
        break;
            
        case 'Sedang':
            $sub_title = '"Sikap Kerja Sedang"';
            $result_detail = "<p>Orang dengan sikap kerja sedang bekerja dengan baik di perusahaan karena merasa kebutuhan dasar secara materil dan imateril tercukupi di perusahaan. Peserta berusaha mencari pekerjaan, jabatan, dan gaji yang lebih baik di perusahaan lain. Peserta menyelesaikan tugas dengan baik, menjalin hubungan kerja yang personal dan professional dengan rekan kerja, dan aktif berdiskusi dengan rekan kerja maupun atasan.</p>";
        break;
            
        case 'Baik':
            $sub_title = '"Sikap Kerja Baik"';
            $result_detail = "<p>Orang dengan sikap kerja baik cenderung loyal pada perusahaan, sehingga dia tidak mencari pekerjaan di perusahaan lain, dan dia juga akan bekerja sampai pensiun. Orang ini melihat perusahaan memberikan fasilitas dan kesempatan karier yang bagus untuk pengembangan keterampilannya, sehingga dia bersedia berkontribusi penuh di setiap aktivitas kantor. Dia aktif memberi saran, gagasan, dan kritik untuk pengembangan perusahaan, buat dia ketika perusahaan sukses dia juga merasa ikut sukses.</p>";
        break;
    }

    $response['sub_title'] = $sub_title;
    $response['result_detail'] = $result_detail;

    return $response;
}

// get work attitude test's detail
function detailSoftSkillResult($test_result)
{
    //looping
    foreach ($test_result as $key => $value) 
    {
        if ($key == 1) 
        {
            switch ($value) 
            {
                case 'Dasar':
                    $sub_title[$key] = 'Keterampilan Pengambilan Keputusan';
                    $result_detail[$key] = "<p>Peserta meminta bantuan orang lain untuk membuat keputusan dan tidak berani mengambil keputusan sendiri, karena teralu takut menanggung resiko dan konsekuensinya.</p>";
                break;
                    
                case 'Menengah':
                    $sub_title[$key] = 'Keterampilan Pengambilan Keputusan';
                    $result_detail[$key] = "<p>Peserta bisa mengambil keputusan sendiri tetapi tetap meminta pendapat oranglain sebelum mengambil keputusan. Peserta bersedia menanggung konsekuensi dari keputusannya.</p>";
                break;
                    
                case 'Tinggi':
                    $sub_title[$key] = 'Keterampilan Pengambilan Keputusan';
                    $result_detail[$key] = "<p>Peserta mampu mengambil keputusan sendiri tanpa meminta pendapat dan bantuan dari oranglain, terkadang peserta mengambil keputusan yang beresiko tinggi. Peserta bersedia menanggung konsekuensi dari keputusannya.</p>";
                break;
            }
        }
        elseif ($key == 2) 
        {
            switch ($value) 
            {
                case 'Dasar':
                    $sub_title[$key] = 'Tanggung Jawab';
                    $result_detail[$key] = "<p>Peserta memahami tugas dan target tugas kerja tetapi kesulitan menyelesaikan tugasnya, atau terkadang menyepelekan target kerja, dan menyelesaikan pekerjaan seadanya.</p>";
                break;
                    
                case 'Menengah':
                    $sub_title[$key] = 'Tanggung Jawab';
                    $result_detail[$key] = "<p>Peserta memahami tugas dan target tugas kerja dan dapat menyelesaikan tugasnya sesuai batas waktu</p>";
                break;
                    
                case 'Tinggi':
                    $sub_title[$key] = 'Tanggung Jawab';
                    $result_detail[$key] = "<p>Peserta memahami tugas dan target tugas kerja dan dapat menyelesaikan tugasnya sesuai batas waktu dengan sempurna.</p>";
                break;
            }
        }
        elseif ($key == 3) 
        {
            switch ($value) 
            {
                case 'Dasar':
                    $sub_title[$key] = 'Integritas';
                    $result_detail[$key] = "<p>Peserta sering berubah-ubah dalam hal nilai-nilai dan budaya yang dianut. Peserta belum memiliki standar personel bagi diri sendiri yang terkait dengan kejujuran, tanggung jawab, menghormati orang lain, dan berlaku adil.</p>";
                break;
                    
                case 'Menengah':
                    $sub_title[$key] = 'Integritas';
                    $result_detail[$key] = "<p>Peserta konsisten dan berkomitmen dalam hal nilai-nilai dan budaya yang dianut. Peserta memiliki standar personel bagi diri sendiri yang terkait dengan kejujuran, tanggung jawab, menghormati orang lain, dan berlaku adil.</p>";
                break;
                    
                case 'Tinggi':
                    $sub_title[$key] = 'Integritas';
                    $result_detail[$key] = "<p>Peserta konsisten dan berkomitmen dalam hal nilai-nilai dan budaya yang dianut. Peserta memiliki standar personel yang tinggi bagi diri sendiri yang terkait dengan kejujuran, tanggung jawab, menghormati orang lain, dan berlaku adil.</p>";
                break;
            }
        }
        elseif ($key == 4) 
        {
            switch ($value) 
            {
                case 'Dasar':
                    $sub_title[$key] = 'Resiliensi';
                    $result_detail[$key] = "<p>Peserta kesulitan bertahan atau mengatasi kesulitan dari persitiwa tidak menyenangkan dan kesulitan beradaptasi dengan perubahan dan ketidakpastian. Peserta juga cenderung memiliki emosi yang labil dan temperamental, dan menolak berkontribusi di tim kerja.</p>";
                break;
                    
                case 'Menengah':
                    $sub_title[$key] = 'Resiliensi';
                    $result_detail[$key] = "<p>Peserta dapat bertahan atau mengatasi kesulitan dari persitiwa tidak menyenangkan dan kesulitan beradaptasi dengan perubahan dan ketidakpastian. Peserta memiliki emosi yang stabil dan bersedia berkontribusi di tim kerja.</p>";
                break;
                    
                case 'Tinggi':
                    $sub_title[$key] = 'Resiliensi';
                    $result_detail[$key] = "<p>Peserta dapat bertahan atau mengatasi kesulitan dari persitiwa tidak menyenangkan dan kesulitan beradaptasi dengan perubahan dan ketidakpastian. Peserta memiliki emosi yang stabil dan bersedia berkontribusi di tim kerja.</p>";
                break;
            }
        }
        elseif ($key == 5) 
        {
            switch ($value) 
            {
                case 'Dasar':
                    $sub_title[$key] = 'Keinginan Untuk Belajar';
                    $result_detail[$key] = "<p>Peserta kurang memiliki minat untuk terus menambah pengetahuan dan melatih keterampilan baik hardskill maupun softskill.</p>";
                break;
                    
                case 'Menengah':
                    $sub_title[$key] = 'Keinginan Untuk Belajar';
                    $result_detail[$key] = "<p>Peserta memiliki minat untuk terus menambah pengetahuan dan melatih keterampilan baik hardskill maupun softskill.</p>";
                break;
                    
                case 'Tinggi':
                    $sub_title[$key] = 'Keinginan Untuk Belajar';
                    $result_detail[$key] = "<p>Peserta memiliki minat yang tinggi untuk terus menambah pengetahuan dan melatih keterampilan baik hardskill maupun softskill. Peserta aktif mengikuti seminar atau pelatihan untuk memperdalam ilmu atau kegiatan yang ditekuni.</p>";
                break;
            }
        }
        elseif ($key == 6) 
        {
            switch ($value) 
            {
                case 'Dasar':
                    $sub_title[$key] = 'Komunikasi';
                    $result_detail[$key] = "<p>Peserta kesulitan menyampaikan ide, saran, gagasan ke rekan kerja dan atasan. Peserta juga kesulitan memahami instruksi atasan dengan baik, dan tidak menanyakan instruksi lebih lanjut ke atasan.</p>";
                break;
                    
                case 'Menengah':
                    $sub_title[$key] = 'Komunikasi';
                    $result_detail[$key] = "<p>Peserta mampu menyampaikan ide, saran, gagasan ke rekan kerja dan atasan. Peserta juga mampu memahami instruksi atasan dengan baik.</p>";
                break;
                    
                case 'Tinggi':
                    $sub_title[$key] = 'Komunikasi';
                    $result_detail[$key] = "<p>Peserta mampu menyampaikan ide, saran, gagasan ke rekan kerja dan atasan dengan bahasa yang mudah dipahami oranglain. Peserta juga mampu memahami instruksi atasan dengan baik, dan mampu menyampaikan instruksi ke teman kerja dengan baik.</p>";
                break;
            }
        }
        elseif ($key == 7) 
        {
            switch ($value) 
            {
                case 'Dasar':
                    $sub_title[$key] = 'Sikap Positif';
                    $result_detail[$key] = "<p>Peserta menolak menerima informasi ataupun saran dan kritik seputar kinerja karyawan. Tidak merespon, tidak memberikan jawaban apabila ditanya, mengerjakan dan menyelesaikan tugas yang diberikan; kurang menghargai, mengajak orang lain untuk mengerjakan atau mendiskusikan suatu masalah.</p>";
                break;
                    
                case 'Menengah':
                    $sub_title[$key] = 'Sikap Positif';
                    $result_detail[$key] = "<p>Peserta bersedia menerima informasi ataupun saran dan kritik seputar kinerja karyawan. Merespon dengan memberikan jawaban apabila ditanya, mengerjakan dan menyelesaikan tugas yang diberikan. Peserta menghargai, mengajak orang lain untuk mengerjakan atau mendiskusikan suatu masalah.</p>";
                break;
                    
                case 'Tinggi':
                    $sub_title[$key] = 'Sikap Positif';
                    $result_detail[$key] = "<p>Peserta bersedia menerima informasi ataupun saran dan kritik seputar kinerja karyawan. Merespon dengan memberikan jawaban apabila ditanya, mengerjakan dan menyelesaikan tugas yang diberikan. Peserta menghargai, mengajak orang lain untuk mengerjakan atau mendiskusikan suatu masalah.</p>";
                break;
            }
        }
        elseif ($key == 8) 
        {
            switch ($value) 
            {
                case 'Dasar':
                    $sub_title[$key] = 'Antusiasme';
                    $result_detail[$key] = "<p>Peserta kurang berminat melibatkan diri secara penuh dalam kegiatan perusahaan baik dalam hal tugas kerja maupun acara perusahaan.</p>";
                break;
                    
                case 'Menengah':
                    $sub_title[$key] = 'Antusiasme';
                    $result_detail[$key] = "<p>Peserta berminat melibatkan diri secara penuh dalam kegiatan perusahaan baik dalam hal tugas kerja maupun acara perusahaan.</p>";
                break;
                    
                case 'Tinggi':
                    $sub_title[$key] = 'Antusiasme';
                    $result_detail[$key] = "<p>Peserta berminat melibatkan diri secara penuh dalam kegiatan perusahaan baik dalam hal tugas kerja maupun acara perusahaan. Peserta juga mengajukan diri untuk menjadi pemimpin proyek di perusahaan.</p>";
                break;
            }
        }
        elseif ($key == 9) 
        {
            switch ($value) 
            {
                case 'Dasar':
                    $sub_title[$key] = 'Kerja Tim';
                    $result_detail[$key] = "<p>Peserta lebih nyaman dan bisa bekerja optimal jika bekerja sendiri dengan caranya sendiri.</p>";
                break;
                    
                case 'Menengah':
                    $sub_title[$key] = 'Kerja Tim';
                    $result_detail[$key] = "<p>Peserta dapat bekerja dalam tim dan dapat bekerja sendiri.</p>";
                break;
                    
                case 'Tinggi':
                    $sub_title[$key] = 'Kerja Tim';
                    $result_detail[$key] = "<p>Peserta dapat bekerja dengan optimal jika didukung oleh tim kerja yang solid.</p>";
                break;
            }
        }
        elseif ($key == 10) 
        {
            switch ($value) 
            {
                case 'Dasar':
                    $sub_title[$key] = 'Penyelesaian Masalah';
                    $result_detail[$key] = "<p>Peserta kesulitan memahami masalah, merencanakan pemecahan masalah, melaksanakan rencana, dan mengevaluasi rencana.</p>";
                break;
                    
                case 'Menengah':
                    $sub_title[$key] = 'Penyelesaian Masalah';
                    $result_detail[$key] = "<p>Peserta mampu memahami masalah, merencanakan pemecahan masalah, melaksanakan rencana, dan mengevaluasi rencana.</p>";
                break;
                    
                case 'Tinggi':
                    $sub_title[$key] = 'Penyelesaian Masalah';
                    $result_detail[$key] = "<p>Peserta mampu memahami masalah, merencanakan pemecahan masalah dengan detail, melaksanakan rencana, dan mengevaluasi rencana secara berkala.</p>";
                break;
            }
        }
    }

    $response['sub_title'] = $sub_title;
    $response['result_detail'] = $result_detail;

    return $response;
}