<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<style>
    #navBreadCrumb {
        background-color: transparent;
    }

    .light-font .breadcrumb-item+.breadcrumb-item::before {
        color: #fff;
    }
</style>

<section>
    <div>
        <div>
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
        </div>
    </div>
</section>

<!-- START -->
<section>
    <div class="all-list-bre light-font">
        <div class="container sec-all-list-bre">
            <div class="row">
                <h1><?= $category_name; ?></h1>
                <nav aria-label="breadcrumb bg-transparent">
                    <ol class="breadcrumb" id="navBreadCrumb">
                        <li class="breadcrumb-item">
                            <a class="text-white" href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            <?= $category_name; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END -->

<!-- START -->
<section>
    <div class="all-listing">
        <!--FILTER ON MOBILE VIEW-->
        <div class="container">
            <div class="row">
                <div class="col-md-3 fil-mob-view">
                    <div class="all-filt">

                        <!--START-->
                        <div class="filt-com lhs-cate">
                            <h4>Categories</h4>
                            <div class="dropdown">

                                <select onchange="document.location.href=this.options[this.selectedIndex].value;" class="cat_check" name="cat_check" id="cat_check" class="chosen-select">
                                    <option value="">Select Category</option>
                                    ?>
                                    <?php foreach ($categories_list as $category) : ?>
                                        <?php $selected = ($category['category_name'] == $category_name) ? 'selected' : ''; ?>
                                        <option value="/listing/<?= $category['category_slug']; ?>" <?= $selected; ?>><?= $category['category_name']; ?></option>
                                    <?php endforeach; ?>


                                </select>
                            </div>
                        </div>
                        <!--END-->


                    </div>
                </div>
                <div class="col-md-9">
                    <div class="all-list-lapak all-listing-total">
                        <ul>
                            <?php foreach ($merchants as $merchant) : ?>
                                <li>
                                    <div class="eve-box row">
                                        <!---LISTING IMAGE--->
                                        <div class="al-img col-md-4 col-sm-12">
                                            <img src="\images\listings\<?= $merchant['merchant_img']; ?>" />
                                        </div>
                                        <!---END LISTING IMAGE--->

                                        <!---LISTING NAME--->
                                        <div class="col-md-8 col-sm-12">
                                            <h4>
                                                <a><?= $merchant['merchant_name']; ?></a>
                                            </h4>
                                            <?php if ($merchant['merchant_address']) { ?>
                                                <span class="addr"><?= $merchant['merchant_address']; ?></span>
                                            <?php } ?>

                                            <span class="pho"><?= $merchant['merchant_phone']; ?> </span>

                                            <?php if ($merchant['merchant_email']) { ?>
                                                <span class="mail"><?= $merchant['merchant_email']; ?> </span>
                                            <?php } ?>

                                            <div class="links">
                                                <a href="https://api.whatsapp.com/send?phone=<?= $merchant['merchant_phone']; ?>">Send Whatsapp</a>
                                                <!-- <a href="listing\testbag.html">View more</a> -->
                                                <a href="Tel:+<?= $merchant['merchant_phone']; ?>">Call Now</a>
                                                <!-- <span id="qvvLIST354" class="qvv qvvLIST354">Quick view</span> -->
                                            </div>
                                        </div>
                                        <!---END LISTING NAME--->
                                    </div>
                                </li>
                            <?php endforeach; ?>


                        </ul>

                    </div>
                    <div class="mb-4">
                        <?= $pager->links('merchants', 'listing_pagination') ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- END -->
<?= $this->endSection(); ?>