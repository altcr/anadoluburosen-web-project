/* Add here all your JS customizations */

(function($) {
	'use strict';
	var datatableInit = function() {
		$('#datatable-default').dataTable();
	};
	$(function() {
		datatableInit();
	});
}).apply(this, [jQuery]);

$(document).ready(function()
{
	var sayiuret = Math.floor((Math.random() * 10000) + 1);
	$(".metinduzenle").after('<textarea name="'+$(".metinduzenle").data("text-name")+'" class="editorclass'+sayiuret+' hidden" cols="30" rows="10">'+$(".metinduzenle").text()+'</textarea>');

	$(".metinduzenle").summernote
	({
		height: "20em",
		callbacks: {
			onChange: function (contents, $editable) {
				var code = $(this).summernote("code");
				$(".editorclass"+sayiuret).val(code);
			}
		}
	});
});


/*ADMİN PANELİ SOSYAL MEDYA EKLEME BÖLÜMÜ*/
$("#socialkaydetbutton").click(function(){
		var name = $("#socialadi").val();
		var link = $("#sociallink").val();
		var icon = $("#socialicon").val();
		if(name == "" || link == "" || icon == "")
		{
			alert("Tüm Alanları Doldurunuz.")
		}
		else{
			var satir = '<div class="form-group"><label class="col-md-2 control-label" for="'+name+'">'+name+':</label><div class="col-md-4"><input type="text" name="social['+name+'][url]" class="form-control" id="'+name+'" value="'+link+'"></div><div class="col-md-1"><i class="fa fa-'+icon+'"></i><input type="hidden" name="social['+name+'][icon]" value="'+icon+'"></div><div class="col-md-1"><a href="#" class="variant-item-sil btn btn-xs btn-danger mt-xs"><i class="fa fa-remove"></i></a></div></div>';
			$("#socialmedyalar").append(satir);
			$("#socialadi").val("");
			$("#sociallink").val("");
			$("select#socialicon").prop('selectedIndex', 0);
		}
		return false;
});

$("a#socialsilbutton").click(function(){
		var indis=$("a#socialsilbutton").index(this);
		$("a#socialsilbutton").eq(indis).parent().parent().remove();
});

$("button#slider-update").click(function(){
		$(".form-horizontal.form-bordered").get(0).reset();
		var id = $(this).data("id");
		var resim = $(this).data("resim");

		$("input#baslik").val($(this).closest(".row").find(".col-sm-12 tbody tr td:eq(0)").text());
		$("input#link").val($(this).closest(".row").find(".col-sm-12 tbody tr td:eq(2)").text());
		$("textarea#aciklama").val($(this).closest(".row").find(".col-sm-12 tbody tr td:eq(1)").text());
		$("#efekt option[value=\""+$(this).closest(".row").find(".col-sm-12 tbody tr td:eq(3)").text()+"\"]").prop('selected',true);
		$("input#resim").val(resim);

		if($(this).closest(".row").find(".col-sm-12 tbody tr td:eq(4)").data("durum") == 1)
		{
			$("#durum").prop('checked','checked');
			$('.ios-switch').removeClass('off').addClass("on");
		}
		else
		{
			$("#durum").removeAttr('checked');
			$('.ios-switch').removeClass('on').addClass("off");
		}


		$("div#slider-islem").slideDown();
		$("input#islem").val("1");
		$("input#id").val(id);
		sayfakay($("div#slider-islem").offset().top-80);
	});

	$("button#slider-insert").click(function(){
		$("div#slider-islem").slideDown();
		$(".form-horizontal.form-bordered").get(0).reset();
		$("input#islem").val("2");
		sayfakay($("div#slider-islem").offset().top-80);
	});
