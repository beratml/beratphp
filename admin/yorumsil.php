<?php require_once('header.php'); ?>

<?php
$id = $_GET['id'];

$sorgu = $db -> prepare('delete from yorumlar where id=?');
$sorgu -> execute(array($id));

if($sorgu -> rowCount()){
    echo '<meta http-equiv="refresh" content="0; url=yorumlar.php">';
} else{
    echo 'Hata Oluştu. Lütfen Tekrar Deneyin';
    echo '<div class="alert alert-danger">Hata Oluştu.</div> <meta http-equiv="refresh" content="2; url=yorumlar.php">';
    
}
?>

<?php require_once('footer.php'); ?>