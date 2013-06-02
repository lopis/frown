/**
 *	This script is used in avatar creation
 * And requires jQuery
 */

var avatar = {};

function addListToAvatar(item_list) {
	console.log("list size: " + item_list.length);
	for (var i = 0; i < item_list.length; ++i) {
		id = item_list[i]['id'];
		layer = item_list[i]['layer'];
		addToAvatar(id, layer);
	}
}


function addToAvatar(item, layer) {
	if(layer in avatar && avatar[layer] == item) {
		delete avatar[layer];
	} else {
		avatar[layer] = item;
	}
	keys = Object.keys(avatar);
	keys.sort();
	console.log(keys);

	$("#layer-stack").empty();
	$("input#items").val('');
	itemString = '';
	url = base_url + "index.php/api/makeavatar?";
	for (var i = 0; i < keys.length; ++i) {
		url += "item" + (i+1) + "=" + avatar[keys[i]] + "&";
		$("#layer-stack").prepend("<div class='layer'>[" + i + "] " + $("div#"+avatar[keys[i]]+" svg").attr('id') + "</div>");
		itemString = itemString + avatar[keys[i]] + ',';
	}
	$.get(url,
		function(xml) {
	        $("#avatar > svg").replaceWith(xml);
			$("input#items").val(itemString);
	        $("input#svg").val(xml);
	    }
	    ,"text");
}


$('.slider-item')
	.css('cursor', 'pointer')
	.click(
		function() {
			addToAvatar(this.id, $(this).attr('layer'));
		}
	)
	.hover(
		function() {
			$(this).css('background', '#DDD');
		},
		function() {
			$(this).css('background', '');
		}
	);