<?php
  $yorum="";
  $bilgi="";

  $id=(int)get("id");
  if(get("d")==="sil"){
    if(get("d")==="sil" and is_numeric($id) and $id){
      $kontrol=$db->select("haber_yorumlar")->where("id",$id)->limit(1)->run(true);
      if($kontrol){
        $sil=$db->delete("haber_yorumlar")->where("id",$id)->done();
        $bilgi='<div class="alert alert-success"><strong><i class="fa fa-check"></i> Yorum silindi.</strong></div>';
        header("refresh:1; url=".aurl.'/index.php?s=haberyorumislemleri');
      }
      else exit(header("location:".aurl.'/index.php?s=haberyorumislemleri'));
    }
    else exit(header("location:".aurl.'/index.php?s=haberyorumislemleri'));
  }

  $yorumlar=$db->select("haber_yorumlar")->from("haber_yorumlar.*, haber.selflink")->join("haber","%s.id=%s.itemid","left")->orderby("tarih")->run(); 
  if ($yorumlar) {
    foreach ($yorumlar as $value) {
      $yorum .='<tr>
                <td class="col-md-8">'.$value["mesaj"].'</td>
                <td style="vertical-align:middle;" class="col-md-2">'.$value["adsoyad"].'</td>
                <td style="vertical-align:middle;" class="col-md-1"><a href="'.url.'/haber-detay/'.$value["selflink"].'" target="_blank">Haberi Görüntüle</a></td>
                <td style="vertical-align:middle;" class="center col-md-1">
                  <a href="'.aurl.'/index.php?s=haberyorumislemleri&d=sil&id='.$value["id"].'" class="btn btn-xs btn-danger"><i class="fa fa-close"></i></a>
                </td>
              </tr>';
    }
  }
  else{
    $yorum='<tr><td colspan="4"><div class="alert alert-warning mb-none"><strong><i class="fa fa-info"></i> Yorum bulunmamaktadır.</strong></div></td></tr>';
  }
?>
<?=$bilgi?>
<section class="panel">
  <header class="panel-heading">
    <h2 class="panel-title">Yorumlar</h2>
  </header>
  <div class="panel-body">
    <table class="table table-bordered table-striped mb-none">
      <thead>
        <tr>
          <th class="col-md-8">Yorum</th>
          <th class="col-md-2">Üye</th>
          <th class="col-md-1">Ürün</th>
          <th class="col-md-1">İşlem</th>
        </tr>
      </thead>
      <tbody>
        <?=$yorum?>
      </tbody>
    </table>
  </div>
</section>
