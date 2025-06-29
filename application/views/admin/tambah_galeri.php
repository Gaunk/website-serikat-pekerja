<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header">
                        <h2 class="pageheader-title"><?= $judul; ?></h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/galeri') ?>" class="breadcrumb-link">Galeri</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Galeri</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Tambah Galeri -->
            <div class="row">
                <div class="col-xl-12 col-lg-8 col-md-12 col-sm-12">
                    <div class="card">
                        <h5 class="card-header">Form Tambah Galeri</h5>
                        <div class="card-body">
                            <form action="<?= base_url('admin/tambah_galeri') ?>" method="POST" enctype="multipart/form-data">
                                <!-- Judul -->
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required placeholder="Masukkan judul galeri">
                                </div>

                                <!-- Deskripsi -->
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required placeholder="Deskripsi singkat..."></textarea>
                                </div>

                                <!-- Upload Gambar -->
                                <div class="form-group">
                                    <label for="image">Upload Gambar</label>
                                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                                </div>

                                <!-- Tombol -->
                                <div class="form-group text-right">
                                    <a href="<?= base_url('admin/galeri') ?>" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Preview gambar bisa ditambahkan jika diinginkan -->
