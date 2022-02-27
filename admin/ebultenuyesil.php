<?php 

require_once('header.php'); 

$id = $_GET['id'];
$sorgu = $db -> prepare("delete from ebulten where id=$id");
$sorgu -> execute();
$satir = $sorgu -> fetch();

if($sorgu -> rowCount()){
    echo 'Kayıt Silindi <meta http-equiv="refresh" content="2; url=ebultenuye.php">';
} else {
    echo 'Hata Oluştu <meta http-equiv="refresh" content="2; url=ebultenuye.php">';
}


require_once('footer.php');

?>

