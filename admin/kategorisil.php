<?php require_once('header.php'); ?>

<?php
$id = $_GET['id'];

$sorgu = $db -> prepare('delete from kategoriler where id=?');
$sorgu -> execute(array($id));

if($sorgu -> rowCount()){
    echo 'Kategori Silinmiştir. Lütfen Bekleyin.';
    echo '<meta http-equiv="refresh" content="2; url=kategori.php">';
} else{
    echo 'Hata Oluştu. Lütfen Tekrar Deneyin';
    echo '<meta http-equiv="refresh" content="2; url=kategori.php">';
}
?>

<?php require_once('footer.php'); ?>