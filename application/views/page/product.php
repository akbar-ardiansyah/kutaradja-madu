<div class="container">
    <div class="notif" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-md-7 col-sm-12">
            <div class="card card-custom card-stretch gutter-b p-5">
                <div class="card-title">
                    <div class="text-capitalize h2" id="header-title">
                        tambah produk
                    </div>
                </div>
                <form action="<?= base_url('admin/upload_product'); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <!-- <form id="form_product" method="POST" enctype="multipart/form-data"> -->
                    <div class="form-group pt-2">
                        <label>Nama produk</label>
                        <input type="text" class="form-control" name="namaproduk" id="namaproduk" placeholder="Nama produk" autocomplete="off" required>
                    </div>
                    <div class="form-group pt-2">
                        <label>Harga produk</label>
                        <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga produk" autocomplete="off" required>
                    </div>
                    <div class="form-group pt-2">
                        <label>Deskripsi produk</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi produk" rows="3" required></textarea>
                    </div>
                    <div class="col p-2">
                        <div id="image-wrapper" class="d-none mx-auto" style="background-size:contain; background-position:center; background-repeat:no-repeat; height:180px; width:150px; object-fit:cover;">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" id="image" name="image[]" class="custom-file-input" multiple>
                            <label class="custom-file-label">Pilih Gambar</label>
                        </div>
                    </div>
                    <div><?= $this->session->flashdata('image'); ?></div>
                    <div class="text-right pt-3">
                        <!-- <a class="btn btn-primary save">Simpan</a> -->
                        <button class="btn btn-primary" value="submit">Simpan</button>
                        <button class="btn btn-secondary" type="reset" value="Reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5 col-sm-12">
            <div class="card card-custom card-stretch gutter-b p-3">
                <div class="card-title">
                    <div class="text-capitalize h2">
                        produk
                    </div>
                </div>
                <?php foreach ($product as $val) : ?>
                    <div class="d-flex align-items-center mb-10">
                        <div class="symbol symbol-70 symbol-light-primary mr-5" style="min-width: 100px;">
                            <img src="<?= base_url(); ?>assets/upload/product/<?= $val['image']; ?>" alt="" style=" object-fit:cover; background-color:#f1f1f1;">
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                            <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg"><?= $val['name']; ?></a>
                            <span class="text-muted"><?= $val['price']; ?></span>
                        </div>
                        <div class="col text-right">
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="#" data-id="<?= $val['id_product']; ?>" class="btn btn-outline-secondary btn-icon edit_product" data-toggle="tooltip" data-theme="dark" title="Edit data <?= $val['name']; ?>"><i class="la la-edit"></i></a>
                                <a href="<?= base_url('') ?>admin/deleted_product/<?= $val['id_product']; ?>" type="button" class="btn btn-outline-secondary btn-icon deleted"><i class="la la-minus-circle" data-toggle="tooltip" data-theme="dark" title="Hapus data <?= $val['name']; ?>"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group pt-2">
                        <label>Nama produk</label>
                        <input type="text" class="form-control" name="namaproduk" id="namaproduk" placeholder="Nama produk" autocomplete="off" required>
                    </div>
                    <div class="form-group pt-2">
                        <label>Harga produk</label>
                        <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga produk" autocomplete="off" required>
                    </div>
                    <div class="form-group pt-2">
                        <label>Deskripsi produk</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi produk" rows="3" required></textarea>
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" id="image" name="image[]" class="custom-file-input" multiple>
                            <label class="custom-file-label">Pilih Gambar</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary update"></button>
            </div>
        </div>
    </div>
</div> -->