<?php require_once('header.php'); ?>

<!-- Ebülten Üye Listesi Section Start -->

<section id="ebultenuye">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>E-Bülten Üyeleri</h2>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>E-Mail</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sorgu = $db->prepare('select * from ebulten order by id desc');
                        $sorgu->execute();

                        if ($sorgu->rowCount()) {
                            foreach ($sorgu as $satir) {
                        ?>
                                <tr>
                                    <td><?php echo $satir['id']; ?></td>
                                    <td><?php echo $satir['ebulten']; ?></td>
                                    <td><a href="ebultenuyeduzenle.php?id=<?php echo $satir['id']; ?>"><button class="btn btn-warning">Düzenle</button></a></td>
                                    <td><a href="ebultenuyesil.php?id=<?php echo $satir['id']; ?>"><button class="btn btn-danger">Sil</button></a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Ebülten Üye Listesi Section End -->


<?php require_once('footer.php'); ?>