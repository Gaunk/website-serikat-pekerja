
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
            <form action="<?= base_url('admin/edit_galeri/' . $galeri->id) ?>" method="POST" enctype="multipart/form-data" id="basicform">

    <!-- ID Tersembunyi -->
    <input type="hidden" name="id" value="<?= $galeri->id; ?>">

    <!-- Judul -->
    <div class="form-group">
        <label for="judul">Judul</label>
        <input 
            type="text" 
            id="judul" 
            name="judul" 
            value="<?= set_value('judul', $galeri->judul) ?>" 
            required 
            class="form-control" 
            placeholder="Masukkan Judul Berita" 
            autocomplete="off"
        >
    </div>

    <!-- Deskripsi -->
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea 
            class="form-control" 
            name="deskripsi" 
            id="deskripsi" 
            rows="5" 
            required
        ><?= set_value('deskripsi', $galeri->deskripsi) ?></textarea>
    </div>

    <!-- Upload Gambar -->
    <div class="form-group">
        <label for="image">Gambar</label>
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

        <?php if ($galeri->image): ?>
            <p class="mt-2"><strong>Gambar saat ini:</strong></p>
            <img 
                id="current-image" 
                src="<?= base_url($galeri->image) ?>" 
                alt="Gambar Galeri" 
                class="img-fluid rounded" 
                style="max-width: 100%; max-height: 250px;"
            >
        <?php else: ?>
            <p class="mt-2 text-muted">Belum ada gambar.</p>
        <?php endif; ?>
    </div>

    <!-- Tombol Submit -->
    <div class="form-group text-right">
        <a href="<?= base_url('admin/galeri') ?>" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<!-- Script untuk preview gambar -->
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById('current-image');
            if (img) {
                img.src = e.target.result;
            } else {
                const newImg = document.createElement('img');
                newImg.id = 'current-image';
                newImg.src = e.target.result;
                newImg.style.maxWidth = '100%';
                newImg.style.maxHeight = '250px';
                newImg.classList.add('img-fluid', 'rounded');
                event.target.parentNode.appendChild(newImg);
            }
        }
        if (file) {
            reader.readAsDataURL(file);
        }
    }

    // Ubah label nama file
    document.querySelector('.custom-file-input').addEventListener('change', function(e){
        const fileName = e.target.files[0]?.name || 'Pilih Gambar';
        e.target.nextElementSibling.innerText = fileName;
    });
</script>


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
