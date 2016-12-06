Number.prototype.formatMoney = function(c, d, t){
    var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "," : d, 
    t = t == undefined ? "." : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
    return "R$" + (s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : ""));
};

function loadPage(page, pageNumber) {
	query = $("#query").val();
	//console.log('getting clientes for page = ' + pageNumber + ', query = ' + query);	
	
	$.get('/ajax/' + page + '/pagination?page=' + pageNumber + '&q=' + query, function(data, state){
        //console.log(data);
		$('.content').html(data);
		location.hash = pageNumber;
   	});			
}