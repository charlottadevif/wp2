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
            foreach ($buku as $k) {
                $kategori = $k['id_kategori'];
                $this->db->select('kategori');
                $this->db->where('id', $kategori);
                $this->db->from('kategori');
                $query = $this->db->get()->row();
                $nama_kategori = $query->kategori;

            ?>
                <form action="<?= base_url('buku/ubahBuku'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" value="<?php echo $k['judul_buku'] ?>">
                        </div>
                        <div class="form-group">
                            <select name="id_kategori" class="form-control form-control-user">
                                <option value="<?php echo $k['id_kategori'] ?>"><?php echo $nama_kategori ?></option>
                                <?php
                                foreach ($kategori as $k) { ?>
                                    <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <?php
                        foreach ($buku as $k) {
                        ?>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="pengarang" name="pengarang" placeholder="Masukkan nama pengarang" value="<?php echo $k['pengarang'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit" value="<?php echo $k['penerbit'] ?>">
                            </div>
                            <div class="form-group">
                                <select name="tahun" class="form-control form-control-user">
                                    <option value="<?php echo $k['tahun_terbit'] ?>"><?php echo $k['tahun_terbit'] ?></option>
                                    <?php
                                    for ($i = date('Y'); $i > 1000; $i--) {
                                    ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="isbn" name="isbn" placeholder="Masukkan ISBN" value="<?php echo $k['isbn'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok" value="<?php echo $k['stok'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control form-control-user" id="image" name="image">
                            </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
                <?php } ?>
                </form>
            <?php } ?>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->