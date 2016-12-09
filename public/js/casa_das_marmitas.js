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

function loadPage(list, page) {
	query = $("#query").val();
    query = query != undefined ? query : ''; 
	//console.log('getting ' + list + ' for page = ' + page + ' and query = ' + query);	
	
	$.get('/pagination/' + list + '?page=' + page + '&q=' + query, data => {
        //console.log(data);
		$('.content').html(data);
		location.hash = page;
   	});			
}