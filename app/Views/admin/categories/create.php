<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categories</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/admin/categories">Categories</a></li>
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
                        <h3 class="card-title">Create Category</h3>
                        <?php //dd($validation->getError('category_img'))
                        ?>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/admin/categories/insert" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category_name">Category name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter name" value="<?= old('category_name'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('category_name'); ?>
                                </div>
                            </div>

                            <div class="form-group row">


                                <div class="col-sm-9">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?= ($validation->hasError('category_img')) ? 'is-invalid' : ''; ?>" id="category_img" name="category_img" onchange="previewImg()">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('category_img'); ?>
                                            </div>
                                            <label class="custom-file-label" for="category_img">Choose File</label>
                                        </div>
                                        <p><?= $validation->getError('category_img'); ?></p>


                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <img src="/images/categories/default.jpg" class="img-thumbnail img-preview">
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
        const gbr = document.querySelector('#category_img');
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