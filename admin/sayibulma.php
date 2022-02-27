<?php require_once('baglan.php'); ?>

<form method="post">
    <!-- <input type="text" name="sayi" placeholder="Lütfen 4 Rakamlı Sayı Giriniz"><br><br> -->
    <input type="submit" value="Üret">
</form>

<?php 

$min = 5;
    $max = 20;
    
    echo '1.Rasgele sayı：'.rand($min, $max).'<br>'; // 20
    
    echo '2.Rasgele sayı：'.rand($min, $max).'<br>'; // 11
    
    echo '3.Rasgele：'.rand($min, $max); // 10

if($_POST){

    $min = 5;
    $max = 20;
    
    echo '1.Rasgele sayı：'.rand($min, $max).'<br>'; // 20
    
    echo '2.Rasgele sayı：'.rand($min, $max).'<br>'; // 11
    
    echo '3.Rasgele：'.rand($min, $max); // 10

    // $sayi = $_POST['sayi'];

    // if($sayi == '2323'){
    //     echo '<div class="alert alert-success">Doğru Tahmin Ettiniz.</div>';
    // }else {
    //     echo '<div class="alert alert-danger">Yanlış Cevap.</div>';
    // }
}

?>
