
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
<div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Edit Berita</h5>
        <div class="card-body">
            <form action="<?= base_url('admin/edit_berita/' . $berita['id']) ?>" method="POST" enctype="multipart/form-data" id="basicform" data-parsley-validate>
                <!-- ID Tersembunyi -->
                <input type="hidden" name="id" value="<?= $berita['id']; ?>">

                <!-- Judul -->
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input 
                        type="text" 
                        id="judul" 
                        name="judul" 
                        value="<?= set_value('judul', $berita['judul']) ?>" 
                        required 
                        class="form-control" 
                        placeholder="Masukkan Judul Berita" 
                        autocomplete="off"
                    >
                </div>

                <!-- Konten -->
                <div class="form-group">
                    <label for="konten">Konten Berita</label>
                    <textarea 
                        class="form-control" 
                        name="konten" 
                        id="konten" 
                        rows="5" 
                        required
                    ><?= set_value('konten', $berita['konten']) ?></textarea>
                </div>

                <!-- Meta Title -->
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <textarea 
                        class="form-control" 
                        id="meta_title" 
                        name="meta_title" 
                        rows="2" 
                        maxlength="60"
                        required
                        data-parsley-maxlength="60"
                    ><?= htmlspecialchars($berita['meta_title']) ?></textarea>
                    <small class="form-text text-muted">Maksimal 60 karakter</small>
                </div>

                <!-- Meta Description -->
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea 
                        class="form-control" 
                        id="meta_description" 
                        name="meta_description" 
                        rows="3" 
                        maxlength="160"
                        required
                        data-parsley-maxlength="160"
                    ><?= htmlspecialchars($berita['meta_description']) ?></textarea>
                    <small class="form-text text-muted">Maksimal 160 karakter</small>
                </div>

                <!-- Meta Keywords -->
                <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="meta_keywords" 
                        name="meta_keywords" 
                        placeholder="contoh: berita, politik, nasional"
                        value="<?= htmlspecialchars($berita['meta_keywords']) ?>"
                    >
                </div>

                <script>
                    var input = document.querySelector('#meta_keywords');
                    new Tagify(input);
                </script>

                <!-- Kategori -->
                <div class="form-group">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori_list as $kategori): ?>
                            <option value="<?= $kategori['id']; ?>" <?= ($selected_kategori == $kategori['id']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($kategori['nama_kategori']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Upload Gambar -->
                <div class="form-group">
                    <label for="image">Gambar Berita</label>
                    <div class="custom-file">
                        <input 
                            type="file" 
                            class="custom-file-input" 
                            id="image" 
                            name="image" 
                            accept="image/*" 
                            onchange="previewImage(event)"
                        >
                        <label class="custom-file-label" for="image">Pilih Gambar</label>
                    </div>

                    <!-- Tampilkan gambar lama -->
                    <?php if ($berita['image']): ?>
                        <p class="mt-2"><strong>Gambar saat ini:</strong></p>
                        <img 
                            id="current-image" 
                            src="<?= base_url($berita['image']) ?>" 
                            alt="Gambar Berita" 
                            class="img-fluid rounded" 
                            style="max-width: 100%; max-height: 250px;"
                        >
                    <?php else: ?>
                        <p class="mt-2 text-muted">Belum ada gambar.</p>
                    <?php endif; ?>
                </div>

                <!-- Tombol Submit -->
                <div class="form-group text-right">
                    <a href="<?= base_url('admin/berita') ?>" class="btn btn-secondary">Kembali ke Berita</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>


        </div>
    </div>
</div>

<!-- Script untuk preview image dan update nama file input -->
<script>
    // Preview gambar saat file dipilih
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('current-image');
            if(output) {
                output.src = reader.result;
            } else {
                // Jika gambar sebelumnya tidak ada, buat tag img baru
                const img = document.createElement('img');
                img.id = 'current-image';
                img.src = reader.result;
                img.style.maxWidth = '100%';
                img.style.maxHeight = '250px';
                img.classList.add('img-fluid', 'rounded');
                event.target.parentNode.parentNode.appendChild(img);
            }
        }
        if(event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }

    // Update nama file di label custom file input Bootstrap
    document.querySelector('.custom-file-input').addEventListener('change', function(e){
        let fileName = e.target.files[0]?.name || 'Pilih Gambar';
        e.target.nextElementSibling.innerText = fileName;
    });
</script>


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
