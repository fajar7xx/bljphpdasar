// tanda jquery dengen tanda $ atau JQuery

$(document).ready(function(){


	// hilangkan tombol cari
	$('#tombol-cari').hide();

	// event ketika keyword ditulis
	// $('#keyword').on('keyup', function(){
	// 	$('#container').load('/ajax/mahasiswa.php?keyword=' + $('#keyword').val());
	// });
	// 
	
	$('.loader').show();

	$.get('../../ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data){
		$('#container').html(data);
		$('.loader').hide();
	});
});