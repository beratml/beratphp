<?php require_once('header.php'); ?>

<!-- Yazılar Liste Section Start -->
<section id="yazilarList">
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <h2>Yazılar</h2>
            </div>
            <div class="col-md-3 ml-5">
                <a href="yaziekle.php"><button class="btn btn-info">Yazı Ekle</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped" style="font-size:13px;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th width="110">Foto</th>
                            <th width="170">Başlık</th>
                            <th>Durum</th>
                            <th>Kategori</th>
                            <th>Tarih</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    <tbody>

                        <?php

                        $sorgu = $db->prepare('select * from yazilar order by id desc');
                        $sorgu->execute();

                        if ($sorgu->rowCount()) {
                            foreach ($sorgu as $satir) {
                                $id = $satir['id'];
                                $foto = $satir['foto'];
                                $baslik = $satir['baslik'];
                                $durum = $satir['durum'];
                                $kategori = $satir['kategori'];
                                $tarih = $satir['tarih'];
                        ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><img src="<?php echo $foto; ?>" class="w-100"></td>
                                    <td><?php echo $baslik; ?></td>
                                    <td><?php echo $durum; ?></td>
                                    <td><?php echo $kategori; ?></td>
                                    <td><?php echo $tarih; ?></td>
                                    <td>
                                        <a href="yaziduzenle.php?id=<?php echo $id; ?>">
                                            <button class="btn btn-warning">Düzenle</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="yazisil.php?id=<?php echo $id; ?>">
                                            <button class="btn btn-danger">Sil</button>
                                        </a>
                                    </td>
                                </tr>

                        <?php
                            }
                        }
                        ?>

                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Yazılar Liste Section End -->

<?php require_once('footer.php'); ?>