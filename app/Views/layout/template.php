<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Other tags -->
    <meta name="dicoding:email" content="biyanoscar@gmail.com">
    <!-- Other tags -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>" />

    <title>Panggil Pedagang</title>
</head>

<body>
    <style></style>

    <?= $this->renderSection('content') ?>

    <section class="wed-hom-footer">
        <div class="container">
            <div class="row wed-foot-link">
                <div class="col-md-4 foot-tc-mar-t-o">
                    <h4>Top Category</h4>
                    <ul>
                        <?php foreach ($categories_list as $category) : ?>
                            <li>
                                <a href="/listing/<?= $category['category_slug']; ?>"><?= $category['category_name']; ?></a>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <h4>Get In Touch</h4>
                    <p>
                        Jl. Batik Kumeli No.50, Sukaluyu, Kec. Cibeunying Kaler, Kota
                        Bandung, Jawa Barat 40123
                    </p>
                    <p>Phone: <a href="tel:+6285770007571">+62857 7000 7571</a></p>
                    <p>
                        Email:
                        <a href="mailto:support@pedagang.id">support@pedagang.id</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>