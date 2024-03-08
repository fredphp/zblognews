</div>

<script>
    layui.use(['form','slider','carousel','upload','laydate'], function(){
        var form = layui.form ,
		slider =  layui.slider,
		carousel = layui.carousel,
		upload = layui.upload,
		laydate = layui.laydate,
		element = layui.element,
		colorpicker = layui.colorpicker;
		form.on('switch(submit)', function(data){
		    $(this).parents("form").submit();
		});
		form.on('primary(submit)', function(data){
		    $(this).parents("form").submit();
		});
		form.on('select(filter)', function(data){
			var input = $(data.elem).parent().parent().find('.value');
			$(input).val(data.value);
		});
		$('.slider').each(function (){
		  let $input = parseInt($(this).parent().find('input').attr('value'));
		  let $min = parseInt($(this).attr('data-min'));
		  let $max = parseInt($(this).attr('data-max'));
		  let $e = $(this);
		  slider.render({
			  elem: this
			  ,input: true
			  ,value: $input
			  ,min: $min
			  ,max: $max
			  ,change: function(value){
				  $e.parent().find('input').attr('value',value);
			   }
			});
		});
		upload.render({
			elem: '.layui-upload'
			,url: ajaxurl+'TztCardVip_upload'
			,method: 'post'
			, exts: 'jpg|png|gif|bmp|jpeg|ico'
			,done: function(res, index, upload) {
				let $obj = this.item;
				object = $($obj).parent().parent().find('.upload-input');
				objectimg = $($obj).parent().parent().find('.layui-word-aux');
				object.attr("value", res.url);
				objectimg.html('<img style="max-width: 220px;" src="'+res.url+'" />');
			}
		});
		carousel.render({
		    elem: '#slide'
		    ,arrow: 'always'
		});
		laydate.render({
    		elem: '#laydate'
  		});
		$('.set-color').each(function (){
			let $input = $(this).parent().parent().find('input').attr('value');
			let $e = $(this);
			colorpicker.render({
				elem: this
				,color: $input
				,done: function(color){
					$e.parent().parent().find('input').attr('value',color);
				}
			});
		});
		$('.set-color2').each(function (){
			let $input = $(this).parent().parent().find('input').attr('value');
			let $e = $(this);
			colorpicker.render({
				elem: this
				,color: $input
				,format: 'rgb'
				,done: function(color){
					$e.parent().parent().find('input').attr('value',color);
				}
			});
		});
    });

	$(document).keydown(function(event){
		if(event.ctrlKey == true && event.keyCode == "83"){
			event.returnvalue = false;
			$('[type=submit]').click();
			return false;
		}
	});

	$('.post-submit').click(function(){
		let $_this = $(this);
		let $form = $_this.parents('form');
		let $action = $form.attr("action");
		layer.msg("正在保存...", {time:3000000});
		$.post($action,$form.serialize(),function(res){
			layer.msg("保存成功", {time:1000});
		});
		return false;
	});

	$(".layui-nav li a").each(function() {
		if(this.href==document.location.toString().split("#")[0]){$(this).parent("li").addClass("layui-this");return false;}
	});

	$('.arrange').arrangeable();
	
</script>

<?php /* EL PSY CONGROO */
require $blogpath . 'zb_system/admin/admin_footer.php';     	  				
RunTime();    	  				 
?>
