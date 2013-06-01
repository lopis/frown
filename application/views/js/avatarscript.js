/**
 *	This script is used in avatar creation
 * And requires jQuery
 */

var avatar = [];


function addToAvatar(item){
	avatar.push(item);
	url = base_url + "index.php/api/makeavatar?";
	for (i = 0; i < avatar.length; ++i) {
		url += "item" + (i+1) + "=" + avatar[i] + "&";
	}
	$.get(url,
		function(xml) {
	        $("#avatar > svg").replaceWith(xml);
	        
	    }
	    ,"text");
}


$('.slider-item')
	.css('cursor', 'pointer')
	.click(
		function(){
			addToAvatar(this.id);
		}
	)
	.hover(
		function(){
			$(this).css('background', '#DDD');
		},
		function(){
			$(this).css('background', '');
		}
	);