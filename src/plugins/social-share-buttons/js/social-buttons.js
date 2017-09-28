jQuery(document).ready(function($){

	function openWindow(url){
		var winWidth = 520;
        var winHeight = 350;
		var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);

        window.open(url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
	}
	
	$("a.social-share").on('click', function(e){
		e.preventDefault();
		var link = encodeURIComponent($(this).attr("href"));
		var network = $(this).data("rrss");
		var title = encodeURIComponent($(this).data("title"));
		var url = "";
		switch(network){
			case 'facebook':
				url = 'http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[url]=' + link;
				break;
			case 'twitter':
				url = 'https://twitter.com/intent/tweet?text=' + title + '&url=' + link;
				break;
		}
		openWindow(url);
	});
});