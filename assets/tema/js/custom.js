$('audio,video').mediaelementplayer();

$(document).ready(function() {

	$("select#select-iller").on('change', function () {
		var istek = $(this).data("ajax-request-url");
		var val = $(this).val();

		$.post(ajax_url ,{"type": istek, "secil": val},function(sonuc){

			$("#ilceler").html('<option value="-1">İlçe Seçiniz</option>');

			$.each(sonuc.gelen, function(key, value){
				$("#ilceler").removeAttr("disabled")
				$("#ilceler").append('<option value="'+value.id+'">'+value.isim+'</option>');
			});
			if(val==-1){$("#ilceler").attr("disabled","");}

			return false;
		},"json");
	});
    $("div.hesabim-div").each(function(index) {
      $(this).css("display","none");
    });
    $("div#kisisel-change").slideDown();
    $("a#hesabim-list-a").eq(0).parent().addClass("hesabim-li-active")
    $("a#hesabim-list-a").click(function() {
      var indis = $("a#hesabim-list-a").index(this);
      var data_id = $(this).data("id");

      $("a#hesabim-list-a").parent().each(function(index) {
        $(this).removeClass('hesabim-li-active');
      });
      $("a#hesabim-list-a").eq(indis).parent().addClass("hesabim-li-active")

      $("div.hesabim-div").each(function(index) {
        $(this).css("display","none");
      });
      $("div#"+data_id).show();
    });
});
