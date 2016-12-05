function loadPage(page, pageNumber) {
	query = $("#query").val();
	//console.log('getting clientes for page = ' + pageNumber + ', query = ' + query);	

	$.ajax({
		url: '/ajax/' + page + '/pagination?page=' + pageNumber + '&q=' + query
	}).done(function(data){
		//console.log(data);
		$('.content').html(data);
		location.hash = pageNumber;
	});			
}