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
                <?php if (session()->getFlashData('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashData('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <a href="/admin/categories/create" class="btn btn-primary mt-3">Add Category</a>
                        <!-- <h3 class="card-title">List Categories</h3> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="maintable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories_list as $category) : ?>
                                    <tr>
                                        <td><?= $category['category_name']; ?>
                                        </td>
                                        <td><?= $category['category_slug']; ?></td>
                                        <td><img src="/images/categories/<?= $category['category_img']; ?>" style="max-width: 150px;" alt="" class="sampul"></td>
                                        <td><a href="/admin/categories/edit/<?= $category['category_id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>

                                            <a onclick="deleteConfirm('<?php echo site_url('admin/categories/delete/' . $category['category_id']) ?>')" href="#!" class="btn btn btn-danger"><i class="fas fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->



            </div>
        </div>



    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


<!-- delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script_content'); ?>
<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>
<?= $this->endSection(); ?>