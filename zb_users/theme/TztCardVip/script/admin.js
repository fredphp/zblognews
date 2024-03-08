var container = document.createElement('script');
$(container).attr('type','text/plain').attr('id','new_editor');
$("body").append(container);
_editor = UE.getEditor('new_editor');
_editor.ready(function () {
	_editor.hide();
	$(".btn-uplod_img").click(function(){		
		object = $(this).parent().find('.uplod_img');
		_editor.getDialog("insertimage").open();
		_editor.addListener('beforeInsertImage', function (t, arg) {
			object.attr("value", arg[0].src);
		});
	});
	$(".btn-uplod_file").click(function(){		
		object = $(this).parent().find('.uplod_file');
		_editor.getDialog("attachment").open();
		_editor.addListener('afterUpfile', function (t, arg) {
			object.attr("value", arg[0].url);
		});
	});
	$(".btn-uplod_video").click(function(){		
		object = $(this).parent().find('.uplod_video');
		_editor.getDialog("insertvideo").open();
		_editor.addListener('beforeinsertvideo', function (t, arg) {
			object.attr("value", arg[0].url);
		});
	});
}); 