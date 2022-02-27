<?php require_once('header.php'); ?>

<!-- Gelen Mesajlar Section Start -->
<section id="mesajlar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Gelen Mesajlar</h2>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ad Soyad</th>
                            <th>Email</th>
                            <th>Konu</th>
                            <th>Mesaj</th>
                            <th>Tümünü Oku</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sorgu = $db->prepare('select * from mesajlar order by id desc');
                        $sorgu->execute();

                        if ($sorgu->rowCount()) {
                            foreach ($sorgu as $satir) {
                        ?>
                                <tr>
                                    <td><?php echo $satir['id']; ?></td>
                                    <td><?php echo $satir['adiniz'] . ' ' . $satir['soyadiniz']; ?></td>
                                    <td><?php echo $satir['email']; ?></td>
                                    <td><?php echo $satir['konu']; ?></td>
                                    <td><?php echo substr($satir['mesaj'], 0, 150); ?></td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <a href="#?id='<?php echo $satir['id']; ?>'">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mesaj<?php echo $satir['id']; ?>">
                                                Oku
                                            </button>
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="mesaj<?php echo $satir['id']; ?>" tabindex="-1" aria-labelledby="mesaj<?php echo $satir['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mesaj<?php echo $satir['id']; ?>"><?php echo $satir['adiniz'] . ' isimli kullanıcıdan gelen mesaj'; ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo $satir['mesaj']; ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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
<!-- Gelen Mesajlar Section End -->


<?php require_once('footer.php'); ?>