<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-lg-9">
            <?php if (validation_errors()) {
                $this->sessions->flashdata('pesan', '<div class="alert alert-danger" role="alert"><?= validation_errors();?></div>');
                redirect('buku/ubahKategori/' . $k['id']);
            } ?>

            <?php
            foreach ($kategori as $k) {
            ?>
                <form action="<?php base_url('buku/ubahKategori'); ?>" method="post">
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $k['id']; ?>" readonly>
                            <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $k['kategori']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <button class="btn btn-dark" onclick="window.history.go(-1)"> Kembali</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->