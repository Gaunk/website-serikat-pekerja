
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
                        <!-- basic form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Menu</h5>
                                <div class="card-body">
                                    <form id="basicform" data-parsley-validate="" action="<?= base_url('admin/tambah_menu') ?>" method="post">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" 
                                            data-parsley-trigger="change" required autocomplete="off" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" id="slug" name="slug" 
                                            data-parsley-trigger="change" required autocomplete="off" class="form-control">
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            <!-- Kosong atau bisa diisi informasi tambahan -->
                                        </div>
                                        <div class="col-sm-6 pl-0">
                                            <p class="text-right">
                                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                            </p>
                                        </div>
                                    </div>
                                </form>

                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form -->
                        <!-- ============================================================== -->
                         <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <!-- ======================= Menu Table ======================= -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Data Menu</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($menu)) : ?>
                                                <?php $no = 1; foreach ($menu as $me) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= htmlspecialchars($me->title) ?></td>
                                                        <td><?= htmlspecialchars($me->slug) ?></td>
                                                        <td class="text-center">
                                                            <a href="<?= base_url('admin/edit_menu/' . $me->id) ?>" class="btn btn-sm btn-warning" title="Edit">
                                                                <i class="far fa-edit"></i>
                                                            </a>
                                                            <a href="<?= base_url('admin/delete_menu/' . $me->id) ?>" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Hapus data ini?')">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                            <a href="<?= site_url('home/#' . $me->slug) ?>" target="_blank">
                                                                <i class="fas fa-eye"></i> Lihat
                                                            </a>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="5" class="text-center">Belum ada data Menu.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
