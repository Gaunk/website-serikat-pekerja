
       <style>
        /* Gaya tambahan untuk mempercantik tampilan file input */
.custom-file-input:lang(en) ~ .custom-file-label::after {
    content: "Pilih gambar";
    color: #007bff;
    font-weight: bold;
}

/* Mengubah ikon jika file dipilih */
.custom-file-input:lang(en):valid ~ .custom-file-label {
    color: #28a745;
    font-weight: bold;
}
/* Mengubah ukuran font dan gaya font pada label */
.custom-file-label {
    font-size: 10px; /* Ukuran font */
    font-family: 'Arial', sans-serif; /* Jenis font */
    font-weight: bold; /* Berat font */
    font-style: italic; /* Gaya font */
    color: #007bff; /* Warna font */
    padding-left: 30px;
}

/* Jika ingin merubah gaya font pada input file (yang tidak terlihat) */
.custom-file-input {
    font-size: 16px; /* Ukuran font pada input file */
    font-family: 'Arial', sans-serif; /* Jenis font pada input */
    font-weight: normal; /* Berat font */
}
/* Menambahkan padding dan border radius */
.custom-file-label i {
    margin-right: 10px;
    color: #007bff;
}

/* Menyesuaikan gaya untuk responsivitas */
@media (max-width: 576px) {
    .custom-file-label {
        font-size: 14px;
    }
}

        </style>
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
                                            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">seo</li>
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
                <!-- Logo Website -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Profil Website</h5>
                        <div class="card-body">
                                    <form action="<?= base_url('admin/insert_website') ?>" method="post" enctype="multipart/form-data" data-parsley-validate>
                                    <div class="form-group">
                                        <label for="site_name">Nama Website</label>
                                        <input 
                                            type="text" 
                                            id="site_name" 
                                            name="site_name" 
                                            class="form-control" 
                                            required 
                                            autocomplete="off" 
                                            value="<?= isset($profile['site_name']) ? htmlspecialchars($profile['site_name']) : '' ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="site_desc">Deskripsi Website</label>
                                        <textarea 
                                            id="site_desc" 
                                            name="site_desc" 
                                            rows="3" 
                                            class="form-control" 
                                            required><?= isset($profile['site_desc']) ? htmlspecialchars($profile['site_desc']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="keyword_website">Nama Website</label>
                                        <input 
                                            type="text" 
                                            id="keyword_website" 
                                            name="keyword_website" 
                                            class="form-control" 
                                            required 
                                            autocomplete="off" 
                                            value="<?= isset($profile['keyword_website']) ? htmlspecialchars($profile['keyword_website']) : '' ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_email">Email Kontak</label>
                                        <input 
                                            type="email" 
                                            id="contact_email" 
                                            name="contact_email" 
                                            class="form-control" 
                                            required 
                                            autocomplete="off" 
                                            value="<?= isset($profile['contact_email']) ? htmlspecialchars($profile['contact_email']) : '' ?>">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>


                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- basic form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-2 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?= base_url('admin/save_logo') ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_logo" value="<?= $logo->id ?>">
                                    
                                    <div class="form-group">
                                        <!-- Preview gambar lama -->
                                        <?php if (!empty($logo->image)): ?>
                                            <div id="image-preview-container" class="mb-3 text-center">
                                                <img id="image-preview" src="<?= base_url($logo->image) ?>" alt="Logo" class="img-fluid"/>
                                            </div>
                                        <?php else: ?>
                                            <!-- Container preview jika belum ada gambar lama -->
                                            <div id="image-preview-container" class="mb-3 text-center">
                                                <img id="image-preview" src="#" alt="Image Preview" class="img-fluid"/>
                                            </div>
                                        <?php endif; ?>

                                        <!-- Upload gambar baru -->
                                        <div class="input-group custom-file mb-2">
                                            <input type="file" name="image" class="custom-file-input" id="image" accept="image/*" style="text-align: center;">
                                            <label class="custom-file-label" for="image">
                                                <i class="fas fa-upload mr-2"></i> Pilih logo...
                                            </label>
                                        </div>
                                        <!-- Hidden untuk image lama -->
                                        <input type="hidden" name="old_image" value="<?= $logo->image ?>">
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>


                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end Logo Website -->
                        <!-- ============================================================== -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const imageInput = document.getElementById("image");
        const previewContainer = document.getElementById("image-preview-container");
        const previewImage = document.getElementById("image-preview");

        if (imageInput && previewContainer && previewImage) {
            imageInput.addEventListener("change", function (event) {
                const file = event.target.files[0];

                if (file && file.type.startsWith("image/")) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                        previewContainer.style.display = "flex";
                    };

                    reader.readAsDataURL(file);
                } else {
                    previewContainer.style.display = "none";
                    previewImage.src = "#";
                }
            });
        }
    });
</script>
 
<script>
    document.getElementById('image').addEventListener('change', function (e) {
        const file = e.target.files[0];
        const preview = document.getElementById('image-preview');
        const container = document.getElementById('image-preview-container');

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                container.style.display = 'flex';
            };
            reader.readAsDataURL(file);
        } else {
            container.style.display = 'none';
        }
    });
</script>
