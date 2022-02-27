<!-- 
 Şu anki modülde giriş yetkisi kontrolü yok eğer eklenmezse 
parametre linkleme yöntemi ile datalar yetki dışı silinebilir.

Tavsiye: 
1: Session oturumunu burada tekrar eklemek çözüm üretir
2: Session oturumu baglan.php sayfasına eklenerek çözüm üretilir
3: Aşağıdaki Modül İlgili sil modülünün olduğu sayfada en sona yazılabilir

Not : Header ve footer'ı işlem öncesi hızlanması için çağırmadık
 -->

<?php


require_once('baglan.php'); 

$id = $_GET['id'];
$sorgu = $db -> prepare('delete from reklam where id=?');
$sorgu -> execute(array($id));

if($sorgu -> rowCount()){
    echo '<meta http-equiv="refresh" content="0; url=reklam.php">';
} else {
    echo '<meta http-equiv="refresh" content="0; url=reklam.php">';
}
?>
