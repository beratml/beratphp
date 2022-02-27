<?php require_once('header.php'); ?>

<?php
$katadi = $_GET['katadi'];
$sorgu_kategori = $db->prepare('select * from yazilar where kategori=?');
$sorgu_kategori->execute(array($katadi));

?>

<!-- Kategori Banner Section Start -->
<section id="banner" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">Kategori: <?php echo $katadi; ?> </h1>
            </div>
        </div>
    </div>
</section>
<!-- Kategori Banner Section End -->

<!-- Kategori List Section Start -->
<section id="kategorilist">
    <div class="container">
        <div class="row">
            <div class="col-md-9"></div>
            <main>
                <?php
                if ($sorgu_kategori->rowCount()) {
                    foreach ($sorgu_kategori as $satir_katyazi) {
                ?>
                        <div class="row">
                            <div class="colm-md-4">

                            <a href="sample.php?id="><img src="<?php echo substr($satir_katyazi['foto'],3) ?>" alt="" class="img-fluid"></a>
                            <img src="<?php echo substr($satir_katyazi['foto'],3) ?>" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-8 my-auto"></div>
                            <div class="colm-md-8">
                                <h2 style="font-size:20px;"><a href="sample.php?id=<?php echo $satir_katyazi['id'];?>" class="text-decoration-none text-dark"><?php echo $satir_katyazi['baslik'];?></a></h2>
                                <small><?php echo $satir_katyazi['tarih']; ?></small> <br>
                                <?php echo substr($satir_katyazi['icerik'],0,200); ?>
                            </div>
                        </div>


                <?php

                    }
                }
                ?>


            </main>
            <?php require_once('sidebar.php'); ?>
        </div>
    </div>
</section>
<!-- Kategori List Section End -->

<?php require_once('footer.php'); ?>
