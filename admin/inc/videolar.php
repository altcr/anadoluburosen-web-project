<?php
  if(!empty(get("id"))){
    if(get("durum")=="1"){
      $guncelle=$db->update("video")->where("id",get("id"))->set(array(
                'durum'=>'0'
              ));
    }
    else{
      $guncelle=$db->update("video")->where("id",get("id"))->set(array(
                'durum'=>'1'
              ));
    }
  }

  if(!empty(get("sil"))){
    $sil=$db->delete("video")->where("id",get("sil"))->done();
  }

?>
<div class="row">
  <div class="col-lg-12">
    <!-- start: page -->
          <div class="row">
          <?php
            $video=$db->select("video")->orderby("id","Desc")->run();
            echo '<div class="col-md-12"><div class="alert alert-warning"><strong><i class="fa fa-newspaper-o"></i> Toplam '.count($video).' adet video var.</strong></div></div>';
            foreach($video as $val)
            {

              $baslik = mb_substr(trim(strip_tags($val["baslik"])), 0, 50,"UTF-8").(mb_strlen(strip_tags($val["baslik"]),"utf-8") > 28 ? "..." : null);

              $durum_icon= $val["durum"]=="1" ? "thumbs-o-up" : "thumbs-o-down";
              $durum_yazi= $val["durum"]=="1" ? "Aktif" : "Pasif";
              $renk= $val["durum"]=="1" ? "success" : "warning";

              echo '<div class="col-md-4">
                    <section class="panel">
                      <div class="panel-body panel-body-nopadding yesil">
                        <div class="item">
                        <iframe width="100%" height="280" src="https://www.youtube.com/embed/'.$val["link"].'?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <div class="p-md">
                          <h4 class="text-weight-semibold mt-none">'.$baslik.'</h4>
                        </div>
                      </div>
                      <div class="panel-footer panel-footer-btn-group">
                        <div class="">
                          <a href='.aurl.'/index.php?s=videolar&sil='.$val["id"].' class="btn btn-'.$renk.'" onclick="return confirm(\'Videoyu silmek istiyor musunuz?\');"><i class="fa fa-trash-o mr-xs"></i> Sil</a>
                          <a href='.aurl.'/index.php?s=videolar&durum='.$val["durum"].'&id='.$val["id"].' class="btn btn-'.$renk.'"><i class="fa fa-'.$durum_icon.' mr-xs"></i> '.$durum_yazi.'</a>
                        </div>
                      </div>
                    </section>
                  </div>';
            }
          ?>
          </div>
    <!-- end: page -->
  </div>
</div>
