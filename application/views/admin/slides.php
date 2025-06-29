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

/* Mengatur gambar pada carousel */
#carouselExampleIndicators .carousel-inner .carousel-item img {
    width: 100%;             /* Mengisi lebar kontainer */
    height: auto;            /* Menjaga proporsi gambar */
    max-height: 600px;       /* Mengatur tinggi maksimal untuk gambar */
    object-fit: contain;     /* Mengatur gambar agar tidak terpotong */
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
                                            <li class="breadcrumb-item active" aria-current="page">Galeri</li>
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
                                    <!-- Button to Open Modal for Adding New Galeri with Icon -->
                                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahModal">
                                        <i class="fas fa-plus"></i> Tambah Slides
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
                                                            <th>Deskripsi</th>
                                                            <th>Gambar</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        <?php foreach ($slides as $b) : ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $b['judul']?></td>
                                                                <td><?= $b['deskripsi'] ?></td>
                                                                <!-- kolom lainnya -->
                                                                        <td>
                                                                            <?php if ($b['image']): ?>
                                                                                <img src="<?= base_url($b['image']) ?>"
                                                                                    alt="Slide Image" class="img-responsive img-thumbnail" style="max-width: 80px; height: auto;" />
                                                                            <?php else: ?>
                                                                                <span>No Image</span>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                <!-- tombol action -->
                                                                 <td>
                                                                    <?php if ($b['status'] == 'aktif'): ?>
                                                                        <span class="badge badge-pill badge-success" style="font-size: 0.9rem; padding: 6px 12px;">
                                                                            <i class="fas fa-check-circle mr-1"></i> Aktif
                                                                        </span>
                                                                    <?php else: ?>
                                                                        <span class="badge badge-pill badge-danger" style="font-size: 0.9rem; padding: 6px 12px;">
                                                                            <i class="fas fa-times-circle mr-1"></i> Tidak Aktif
                                                                        </span>
                                                                    <?php endif; ?>
                                                                 </td>
                                                                <td>
                                                                <!-- Edit Button with Icon -->
                                                                <a href="<?= base_url('admin/edit_slides/' . $b['id']) ?>" class="btn btn-success btn-sm">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>

                                                                <!-- Delete Button with Icon -->
                                                                <a href="<?= base_url('admin/hapus_slides/' . $b['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">
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
                             <!-- ============================================================== -->
                            <!--  slides with indicator  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Slides with Indicators</h5>
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <?php foreach ($slides as $key => $slide): ?>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>" class="<?= $key === 0 ? 'active' : '' ?>"></li>
                                                <?php endforeach; ?>
                                            </ol>
                                            <div class="carousel-inner">
                                                <?php foreach ($slides as $key => $slide): ?>
                                                    <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                                                        <img class="d-block w-100" src="<?= base_url($slide['image']) ?>" alt="Slide <?= $key + 1 ?>">
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end slides with indicator  -->
                            <!-- ============================================================== -->


                           
                        </div>
                        </div>
                        

                        <!-- BAWAHNYA FOOTER -->
<!-- Modal for Tambah/Edit Galeri -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('admin/tambah_slides') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Galeri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Judul -->
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>

                    <!-- Status -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status" required>
                        <?php foreach ($status_options as $status): ?>
                            <option value="<?php echo $status; ?>" <?php echo ($status == $slides->status) ? 'selected' : ''; ?>>
                                <?php echo ucfirst($status); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                    <!-- Deskripsi -->
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
                    </div>

                    <!-- Gambar -->
                    <div class="form-group" id="image-upload-section">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Galeri</button>
                </div>
            </form>
        </div>
    </div>
</div>

