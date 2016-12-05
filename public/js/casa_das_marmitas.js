function loadPage(page, pageNumber) {
	query = $("#query").val();
	//console.log('getting clientes for page = ' + pageNumber + ', query = ' + query);	
	
	$.get('/ajax/' + page + '/pagination?page=' + pageNumber + '&q=' + query, function(data, state){
        //console.log(data);
		$('.content').html(data);
		location.hash = pageNumber;
   	});			
}