/**
 *	This script is used in avatar creation
 * And requires jQuery
 */

var avatar = {};


function addToAvatar(item, layer){
	avatar[layer] = item;
	keys = Object.keys(avatar);
	keys.sort();

	url = base_url + "index.php/api/makeavatar?";
	for (i = 0; i < keys.length; ++i) {
		url += "item" + (i+1) + "=" + avatar[keys[i]] + "&";
	}
	$.get(url,
		function(xml) {
	        $("#avatar > svg").replaceWith(xml);
	        $("input#svg").val(xml);
	        console.log($("#svg_form").val());
	    }
	    ,"text");
}


$('.slider-item')
	.css('cursor', 'pointer')
	.click(
		function(){
			addToAvatar(this.id, $(this).attr('layer'));
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