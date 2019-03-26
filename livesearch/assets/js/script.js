// tanda jquery dengen tanda $ atau JQuery

$(document).ready(function(){


	// event ketika keyword ditulis
	$('#keyword').on('keyup', function(){
		$('#container').load('')
	})
});