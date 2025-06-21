<style>
    /* Ensure that all images in the table are responsive */
img.img-responsive {
    max-width: 100%; /* Prevent images from exceeding the cell width */
    height: auto;    /* Maintain aspect ratio */
    display: block;  /* Remove unwanted inline spacing */
    margin: 0 auto;  /* Center the image if it is smaller than the available space */
}

/* Set a maximum width for the image container */
table td {
    max-width: 150px; /* Adjust the max width of the table cell */
    overflow: hidden; /* Hide any overflow content */
    text-align: center; /* Center the image in the cell */
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
                                <h2 class="pageheader-title"><?= $judul; ?></h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Berita</li>
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
                      
                            <!-- ============================================================== -->
                                <!-- recent orders  -->
                                <!-- ============================================================== -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <!-- Button to Open Modal for Adding New Berita with Icon -->
                                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahModal">
                                        <i class="fas fa-plus"></i> Tambah Berita
                                    </button>
                                    <div class="card">
                                        <h5 class="card-header">Biodata Serikat Pekerja</h5>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered second" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Judul</th>
                                                            <th>Slug</th>
                                                            <th>Konten</th>
                                                            <th>Gambar</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($berita as $b) : ?>
                                                            <tr>
                                                                <td><?= $b['id'] ?></td>
                                                                <td><?= $b['judul'] ?></td>
                                                                <td><a href="<?= site_url('admin/berita/detail/' . $b['slug']) ?>"><?= $b['slug'] ?></a></td>
                                                                <td><?= $b['konten'] ?></td>
                                                                <td>
                                                                    <?php if ($b['image']): ?>
                                                                        <img src="<?= base_url($b['image']) ?>" alt="Gambar Berita" class="img-responsive" />
                                                                    <?php else: ?>
                                                                        <span>No Image</span>
                                                                    <?php endif; ?>
                                                                </td>

                                                                <td>
                                                                <!-- Edit Button with Icon -->
                                                                <a href="<?= base_url('admin/edit_berita/' . $b['id']) ?>" class="btn btn-success btn-sm">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>

                                                                <!-- Delete Button with Icon -->
                                                                <a href="<?= base_url('admin/hapus_berita/' . $b['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">
                                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                                </a>
                                                            </td>

                                                            </tr>

                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->
                            <!-- ============================================================== -->
                          
                        </div>
                        </div>
                        

                        <!-- BAWAHNYA FOOTER -->
<!-- Modal for Tambah/Edit Berita -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambah_berita') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="form-mode" name="mode" value="add"> <!-- Default mode is 'add' -->

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten</label>
                        <textarea class="form-control" id="konten" name="konten" rows="5" required></textarea>
                    </div>
                    <div class="form-group" id="image-upload-section">
                        <label for="image">Gambar</label>
                        <!-- Custom file input wrapper -->
                        <div class="file-input-wrapper">
                            <input type="file" class="file-input" id="image" name="image" accept="image/*">
                            <label for="image" class="file-input-label">Pilih Gambar</label>
                            <span id="file-name" class="file-name">No file chosen</span>
                        </div>
                    </div>

                    <!-- Display existing image in edit mode -->
                    <div id="existing-image" class="existing-image" style="display: none;">
                        <img src="" alt="Existing Image" style="max-width: 100%; margin-top: 10px;">
                        <p>Gambar sebelumnya</p>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

