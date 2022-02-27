<?php require_once('header.php'); ?>

<?php
$id = $_GET['id'];
$sorgu = $db->prepare('delete from sayfalar where id=?');
$sorgu->execute(array($id));

if ($sorgu->rowCount()) {
    echo '<div class="alert alert-success">Kayıt Silinmiştir</div>';
    echo '<meta http-equiv="refresh" content="2; url=sayfalar.php">';
} else {
    echo '<div class="alert alert-danger">Hata Oluştu. Tekrar Deneyin</div>';
    echo '<meta http-equiv="refresh" content="2; url=sayfalar.php">';
}
?>

<?php require_once('footer.php'); ?>