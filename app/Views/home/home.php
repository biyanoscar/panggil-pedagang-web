<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section>
    <div>
        <div class="home-head" style="
            background-image: linear-gradient(
                rgba(0, 0, 0, 0.3),
                rgba(0, 0, 0, 0.3)
              ),
              url(images/background_fish.jpg);
          ">
            <div class="home-top">
                <div class="container">
                    <div class="row">
                        <nav class="navbar navbar-expand-lg navbar-dark col-12">
                            <a class="navbar-brand" href="/">Panggil Pedagang</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Category
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <?php foreach ($categories_list as $category) : ?>
                                                <a class="dropdown-item" href="/listing/<?= $category['category_slug']; ?>"><?= $category['category_name']; ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    </li>
                                </ul>

                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/admin">Login</a>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="ban-tit">
                        <h1>
                            <b>Temukan Pedagang</b> Tukang sayur, tukang servis, makanan, dll
                        </h1>
                    </div>
                    <div class="ban-search col-md-8 col-sm-12">
                        <nav class="navbar navbar-dark">
                            <form class="form-inline col-12" action="/listing/search" method="post">
                                <input class="form-control mr-sm-2 col-8" type="search" placeholder="Search" aria-label="Search" name="keyword" />
                                <button class="btn btn-primary btn-block my-2 my-sm-0 col-3" type="submit">Cari
                                </button>
                            </form>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- START -->
<section>
    <div class="str">
        <div class="container">
            <div class="row">
                <!--<div class="home-tit">
                  <h2><span>Top Services</span> Cras nulla nulla, pulvinar sit amet nunc at, lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla.</h2>
              </div>-->
                <div class="home-tit">
                    <h2><span>Pedagang</span> dekat Anda</h2>
                </div>
                <div class="land-pack">
                    <ul>
                        <?php foreach ($categories_list as $category) : ?>
                            <li>
                                <div class="land-pack-grid">
                                    <div class="land-pack-grid-img">
                                        <img src="images\categories\<?= $category['category_img']; ?>" alt="" />
                                    </div>
                                    <div class="land-pack-grid-text">
                                        <h4><?= $category['category_name']; ?></h4>
                                        <a href="/listing/<?= $category['category_slug']; ?>" class="land-pack-grid-btn"></a>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                    <!-- <a href="all-category.html" class="more">View all services</a> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END -->
<?= $this->endSection(); ?>