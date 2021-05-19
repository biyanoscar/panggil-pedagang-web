<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Merchants</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/admin/merchants">Merchants</a></li>
                </ol>
            </div>
        </div>
    </div> <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Merchant</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/admin/merchants/insert" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="merchant_name">Merchant name</label>
                                <input type="text" class="form-control <?= ($validation->hasError('merchant_name')) ? 'is-invalid' : ''; ?>" id="merchant_name" name="merchant_name" placeholder="Enter name" value="<?= old('merchant_name'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('merchant_name'); ?>
                                </div>
                            </div>

                            <!-- select -->
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control <?= ($validation->hasError('category_id')) ? 'is-invalid' : ''; ?>">
                                    <?php foreach ($categories_list as $category) : ?>
                                        <option value="<?= $category['category_id']; ?>"><?= $category['category_name']; ?></option>
                                    <?php endforeach; ?>

                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('category_id'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="merchant_address">Address</label>
                                <input type="text" class="form-control" id="merchant_address" name="merchant_address" placeholder="Enter address" value="<?= old('merchant_address'); ?>">
                            </div>

                            <div class="form-group">
                                <label for="merchant_phone">Phone</label>
                                <input type="text" class="form-control" id="merchant_phone" name="merchant_phone" placeholder="Enter phone" value="<?= old('merchant_phone'); ?>">
                            </div>

                            <div class="form-group">
                                <label for="merchant_email">Email</label>
                                <input type="email" class="form-control" id="merchant_email" name="merchant_email" placeholder="Enter phone" value="<?= old('merchant_email'); ?>">
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?= ($validation->hasError('merchant_img')) ? 'is-invalid' : ''; ?>" id="merchant_img" name="merchant_img" onchange="previewImg()">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('merchant_img'); ?>
                                            </div>
                                            <label class="custom-file-label" for="merchant_img">Choose File</label>
                                        </div>
                                        <p><?= $validation->getError('merchant_img'); ?></p>


                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <img src="/images/listings/default.jpg" class="img-thumbnail img-preview">
                                </div>

                            </div>

                        </div>
                        <!-- /.card-body -->


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->



            </div>
        </div>



    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script_content'); ?>
<script>
    function previewImg() {
        const gbr = document.querySelector('#merchant_img');
        const gbrLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        gbrLabel.textContent = gbr.files[0].name;

        const fileGbr = new FileReader();
        fileGbr.readAsDataURL(gbr.files[0]);

        fileGbr.onload = function(e) {
            imgPreview.src = e.target.result;
        }

    }
</script>
<?= $this->endSection(); ?>