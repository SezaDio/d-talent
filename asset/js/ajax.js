function delete_produk_ajax(id_produk)
{
	if (confirm("Anda yakin ingin menghapus produk ini ?"))
	{
		$.ajax({
			url: 'delete_produk',
			type: 'POST',
			data: {id_produk:id_produk},
			success: function(){
						alert('Delete produk berhasil');
						location.reload();
					},
			error: function(){
						alert('Delete produk gagal');
					}
		});
	}
	else
	{
		alert(id_produk + "Gagal dihapus");
	}
}

function tolak_produk_ajax(id_produk)
{
	if (confirm("Anda yakin ingin menolak produk ini ?"))
	{
		$.ajax({
			url: 'tolak_produk',
			type: 'POST',
			data: {id_produk:id_produk},
			success: function(){
						alert('Tolak produk berhasil');
						location.reload();
					},
			error: function(){
						alert('Tolak produk gagal');
					}
		});
	}
	else
	{
		alert(id_produk + "Gagal ditolak");
	}
}

function setuju_produk_ajax(id_produk)
{
	if (confirm("Anda yakin ingin menyetujui produk ini ?"))
	{
		$.ajax({
			url: 'setuju_produk',
			type: 'POST',
			data: {id_produk:id_produk},
			success: function(){
						alert('Setuju produk berhasil');
						location.reload();
					},
			error: function(){
						alert('Setuju produk gagal');
					}
		});
	}
	else
	{
		alert(id_produk + "Gagal disetujui");
	}
}

function delete_testimoni_ajax(id_testimoni)
{
	if (confirm("Anda yakin ingin menghapus testimoni ini ?"))
	{
		$.ajax({
			url: 'KelolaTestimoni/delete_testimoni',
			type: 'POST',
			data: {id_testimoni:id_testimoni},
			success: function(){
						alert('Delete Testimoni berhasil');
						location.reload();
					},
			error: function(){
						alert('Delete Testimoni gagal');
					}
		});
	}
	else
	{
		alert(id_testimoni + "Gagal dihapus");
	}
}

function delete_coming_ajax(id_coming)
{
	if (confirm("Anda yakin ingin menghapus Event ini beserta data didalamnya ?"))
	{
		$.ajax({
			url: 'KelolaComing/delete_coming',
			type: 'POST',
			data: {id_coming:id_coming},
			success: function(){
						alert('Delete Event beserta data yang berkaitan berhasil');
						location.reload();
					},
			error: function(){
						alert('Delete Event gagal');
					}
		});
	}
	else
	{
		alert(id_coming + "Gagal dihapus");
	}
}



function tolak_coming_ajax(id_coming)
{
	if (confirm("Anda yakin ingin menolak Coming Soon ini ?"))
	{
		$.ajax({
			url: 'tolak_coming',
			type: 'POST',
			data: {id_coming:id_coming},
			success: function(){
						alert('Tolak Coming SOon berhasil');
						location.reload();
					},
			error: function(){
						alert('Tolak Coming Soon gagal');
					}
		});
	}
	else
	{
		alert(id_coming + "Gagal ditolak");
	}
}

function setuju_coming_ajax(id_coming)
{
	if (confirm("Anda yakin ingin menyetujui Coming Soon ini ?"))
	{
		$.ajax({
			url: 'setuju_coming',
			type: 'POST',
			data: {id_coming:id_coming},
			success: function(){
						alert('Setuju Coming Soon berhasil');
						location.reload();
					},
			error: function(){
						alert('Setuju Coming Soon gagal');
					}
		});
	}
	else
	{
		alert(id_coming + "Gagal disetujui");
	}
}

function delete_news_ajax(id_news)
{
	if (confirm("Anda yakin ingin menghapus Press Release News ini ?"))
	{
		$.ajax({
			url: '../delete_news',	
			type: 'POST',
			data: {id_news:id_news},
			success: function(){
						alert('Delete Press Release News berhasil');
						location.reload();
					},
			error: function(){
						alert('Delete Press Release News gagal');
					}
		});
	}
	else
	{
		alert(id_news + "Gagal dihapus");
	}
}

function delete_testimoni_ajax(id_testimoni)
{
	if (confirm("Anda yakin ingin menghapus Testimoni ini ?"))
	{
		$.ajax({
			url: '../delete_testimoni',
			type: 'POST',
			data: {id_testimoni:id_testimoni},
			success: function(){
						alert('Delete Testimoni berhasil');
						location.reload();
					},
			error: function(){
						alert('Delete Testimoni News gagal');
					}
		});
	}
}

function delete_komentar_ajax(id_komentar)
{
	if (confirm("Anda yakin ingin menghapus komentar ini ?"))
	{
		$.ajax({
			url: '../delete_komentar',
			type: 'POST',
			data: {id_komentar:id_komentar},
			success: function(){
						alert('Delete Komentar Artikel berhasil');
						location.reload();
					},
			error: function(){
						alert('Delete Komentar Artikel gagal');
					}
		});
	}
}

function tolak_news_ajax(id_news)
{
	if (confirm("Anda yakin ingin menolak News ini ?"))
	{
		$.ajax({
			url: 'tolak_news',
			type: 'POST',
			data: {id_news:id_news},
			success: function(){
						alert('Tolak News berhasil');
						location.reload();
					},
			error: function(){
						alert('Tolak News gagal');
					}
		});
	}
	else
	{
		alert(id_news + "Gagal ditolak");
	}
}

function setuju_news_ajax(id_news)
{
	if (confirm("Anda yakin ingin menyetujui News ini ?"))
	{
	
		$.ajax({
			url: 'setuju_news',
			type: 'POST',
			data: {id_news:id_news},
			success: function(){
						alert('Setuju News berhasil');
						location.reload();
					},
			error: function(){
						alert('Setuju News gagal');
					}
		});
	}
	else
	{
		alert(id_news + "Gagal disetujui");
	}
}

function delete_pepak_ajax(id_pepak)
{
	if (confirm("Anda yakin ingin menghapus kosakata ini ?"))
	{
		$.ajax({
			url: 'KelolaPepak/delete_pepak',
			type: 'POST',
			data: {id_pepak:id_pepak},
			success: function(){
						alert('Delete kosakata berhasil');
						location.reload();
					},
			error: function(){
						alert('Delete kosakata gagal');
					}
		});
	}
	else
	{
		alert(id_pepak + "Gagal dihapus");
	}
}

function tolak_pepak_ajax(id_pepak)
{
	if (confirm("Anda yakin ingin menolak kosakata ini ?"))
	{
		$.ajax({
			url: 'KelolaPepak/tolak_pepak',
			type: 'POST',
			data: {id_pepak:id_pepak},
			success: function(){
						alert('Tolak kosakata berhasil');
						location.reload();
					},
			error: function(){
						alert('Tolak kosakata gagal');
					}
		});
	}
	else
	{
		alert(id_pepak + "Gagal ditolak");
	}
}

function setuju_pepak_ajax(id_pepak)
{
	if (confirm("Anda yakin ingin menyetujui kosakata ini ?"))
	{
	
		$.ajax({
			url: 'KelolaPepak/setuju_pepak',
			type: 'POST',
			data: {id_pepak:id_pepak},
			success: function(){
						alert('Setuju kosakata berhasil');
						location.reload();
					},
			error: function(){
						alert('Setuju kosakata gagal');
					}
		});
	}
	else
	{
		alert(id_pepak + "Gagal disetujui");
	}
}

function update_like_ajax(id_event)
{
	$.ajax({
			url: '../FrontControl_Event/update_like/'+id_event,
			type: 'POST',
			data: {id_event:id_event},
			success: function(){
						var like = $('#like').html();
						like = parseInt(like)+1;
						$('#like').html(like);
					}
		});
}

function delete_artikel_ajax(id_artikel)
{
	if (confirm("Anda yakin ingin menghapus Artikel ini ?"))
	{
		$.ajax({
			url: 'KelolaArtikel/delete_artikel',
			type: 'POST',
			data: {id_artikel:id_artikel},
			success: function(){
						alert('Delete Artikel berhasil');
						location.reload();
					},
			error: function(){
						alert('Delete Artikel gagal');
					}
		});
	}
	else
	{
		alert(id_produk + "Gagal dihapus");
	}
}

function delete_faq_ajax(id_faq)
{
	if (confirm("Anda yakin ingin menghapus FAQ ini ?"))
	{
		$.ajax({
			url: 'KelolaFaq/delete_faq',
			type: 'POST',
			data: {id_faq:id_faq},
			success: function(){
						alert('Delete FAQ berhasil');
						location.reload();
					},
			error: function(){
						alert('Delete FAQ gagal');
					}
		});
	}
	else
	{
		alert(id_faq + "Gagal dihapus");
	}
}


    function parseXml(str) {
      if (window.ActiveXObject) {
        var doc = new ActiveXObject('Microsoft.XMLDOM');
        doc.loadXML(str);
        return doc;
      } else if (window.DOMParser) {
        return (new DOMParser).parseFromString(str, 'text/xml');
      }
    }

	function delete_member_ajax(id_member)
	{
		if (confirm("Anda yakin ingin menghapus data member ini ?"))
		{
			$.ajax({
				url: 'KelolaMember/delete_member',
				type: 'POST',
				data: {id_member:id_member},
				success: function(){
							alert('Delete data member berhasil');
							location.reload();
						},
				error: function(){
							alert('Delete data member gagal');
						}
			});
		}
	}
	
	function setuju_member_ajax(id_member)
	{
		if (confirm("Anda yakin ingin menyetujui data member ini ?"))
		{
			$.ajax({
				url: 'KelolaMember/setuju_member',
				type: 'POST',
				data: {id_member:id_member},
				success: function(){
							alert('Data member berhasil disetujui');
							location.reload();
						},
				error: function(){
							alert('Data member gagal disetujui');
						}
			});
		}
	}
/*function cariKata() {
        var kata=document.getElementById("kata_kunci").value;
		$.post('<?php echo site_url('KelolaPepak/cari_kata/'); ?>'+kata, function(dataKata){
		
			var xml = parseXml(dataKata);
			var getKata = xml.documentElement.getElementsByTagName("kata");
			
			if(getKata.length==0){
				alert("Kata kunci yang dicari tidak tersedia !");
			}
			else {
			for (var i = 0; i < getKata.length; i++) {
			  
			  var jawa = getKata[i].getAttribute("jawa");
			  var indonesia=getKata[i].getAttribute("indonesia");
			  var deskripsi_jawa=getKata[i].getAttribute("deskripsi_jawa");
			  
			  
			}
			}
		},"text");
}*/