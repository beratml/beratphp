<?php require_once('header.php'); ?>

<!-- Blog Banner Section Start -->
<?php
$sorgu = $db -> prepare('select * from ayarlar order by id desc limit 1');
$sorgu -> execute();
$satir = $sorgu -> fetch();

if($sorgu -> rowCount()){
    $banner = $satir['blogbanner'];
} else {
    echo 'Görsel Bulunamadı';
}
?>

<section id="blogBanner" class="py-5" style="background-image: url('<?php echo substr($banner,3); ?>'); background-size:cover; background-repeat:no-repeat;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 lead text-white" style="visibility: hidden;">Blog</h1>
            </div>
        </div>
    </div>
</section>
<!-- Blog Banner Section End -->

<!-- İçerik Alanı Start -->
<section id="content">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-9">
                <main>
                <?php
                    $sorgu_blog = $db -> prepare('select * from yazilar order by id desc limit 5');
                    $sorgu_blog -> execute();

                    if($sorgu_blog -> rowCount()){
                        foreach($sorgu_blog as $satir_blog){
                ?>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <a href="sample.php?id=<?php echo $satir_blog['id']; ?>">
                                <img src="<?php echo substr($satir_blog['foto'],3); ?>" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <a href="sample.php?id=<?php echo $satir_blog['id']; ?>" class="text-decoration-none text-dark"> 
                                <h2 style="font-size:20px;"><?php echo $satir_blog['baslik']; ?></h2>
                            </a>
                            <small><?php echo $satir_blog['tarih']; ?></small><br>
                            <?php echo substr($satir_blog['icerik'],0,200); ?>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
                </main>
            </div>
            
            <?php require_once('sidebar.php'); ?>
        </div>
    </div>
</section>
<!-- İçerik Alanı End -->

<?php require_once('footer.php'); ?>