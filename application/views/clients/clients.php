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
                                            <li class="breadcrumb-item active" aria-current="page">clients</li>
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
                                    <!-- Button to Open Modal for Adding New clients with Icon -->
                                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahModal">
                                        <i class="fas fa-plus"></i> Tambah clients
                                    </button>
                                    <div class="card">
                                        <h5 class="card-header">Clients</h5>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered second" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Gambar</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        <?php foreach ($clients as $b) : ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td>
                                                                    <?php if ($b->image): ?>
                                                                        <img src="<?= base_url($b->image) ?>" alt="clients" class="img-thumbnail" style="max-width: 100px; height: auto;" />
                                                                    <?php else: ?>
                                                                        <span>No Image</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                <!-- Edit Button with Icon -->
                                                                <a href="<?= base_url('admin/edit_clients/' . $b->id) ?>" class="btn btn-success btn-sm">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>

                                                                <!-- Delete Button with Icon -->
                                                                <a href="<?= base_url('admin/hapus_clients/' . $b->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">
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
<!-- Modal for Tambah clients -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Form for adding new client -->
            <form action="<?= base_url('admin/clients') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Gambar -->
                    <div class="form-group" id="image-upload-section">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control-file" id="image" name="image" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Client</button>
                </div>
            </form>
        </div>
    </div>
</div>


