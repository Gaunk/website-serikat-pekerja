
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title"><?= $judul ?> </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                            <!-- ============================================================== -->
<!-- basic form -->
<!-- ============================================================== -->
<div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Basic Form</h5>
        <div class="card-body">
            <form action="<?= base_url('admin/edit_berita/' . $berita['id']) ?>" method="POST" enctype="multipart/form-data" id="basicform" data-parsley-validate="">

                <!-- Judul -->
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input id="judul" name="judul" value="<?= set_value('judul', $berita['judul']) ?>" 
                        data-parsley-trigger="change" required placeholder="Enter user name" autocomplete="off" class="form-control">
                </div>

                <!-- Konten -->
                <div class="form-group">
                    <label for="konten">Konten Berita</label>
                    <textarea class="form-control" name="konten" id="konten" rows="3"><?= set_value('konten', $berita['konten']) ?></textarea>
                </div>

                <!-- Gambar Berita -->
                <div class="form-group">
                    <label for="image">Gambar Berita</label>

                    <!-- Custom file input wrapper -->
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                        <label class="custom-file-label" for="image">Pilih Gambar</label>
                    </div>

                    <!-- Current image display -->
                    <?php if ($berita['image']): ?>
                        <p><strong>Gambar saat ini:</strong></p>
                        <img id="current-image" src="<?= base_url($berita['image']) ?>" alt="Gambar Berita" class="img-fluid rounded" style="max-width: 100%; max-height: 250px;">
                    <?php else: ?>
                        <p>Belum ada gambar.</p>
                    <?php endif; ?>

                </div>

                <!-- Buttons -->
                <div class="col-sm-6 pl-0">
                    <p class="text-right">
                        <a href="<?= base_url('admin/berita') ?>" class="btn btn-space btn-secondary">Kembali ke Berita</a>

                        <a href="<?= base_url('admin/berita') ?>" class="btn btn-space btn-primary">Submit</a>
                    </p>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Script JavaScript untuk Preview Gambar -->
<script>
    // Function to preview the selected image and replace the current image
    function previewImage(event) {
        const currentImage = document.getElementById('current-image');  // ID gambar yang sudah ada

        // Mendapatkan file gambar yang dipilih
        const file = event.target.files[0];

        // Jika file ada
        if (file && currentImage) {
            const reader = new FileReader();

            // Ketika file selesai dibaca
            reader.onload = function(e) {
                // Mengganti sumber gambar lama dengan gambar baru
                currentImage.src = e.target.result; // Gambar lama langsung ditimpa dengan gambar baru
            };

            // Membaca file gambar sebagai data URL (base64)
            reader.readAsDataURL(file);
        }
    }
</script>
