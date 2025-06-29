
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
                                <h2 class="pageheader-title">E-commerce Dashboard Template </h2>
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
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Anggota</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?= $total_users; ?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Aktif</h5>
                                        <div class="metric-value d-inline-block">
                                            <?php if ($active_users > 0): ?>                                                
                                            <h1 class="mb-1"><?= $active_users; ?></h1>
                                            <?php endif; ?>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue2"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Tidak Aktif</h5>
                                        <div class="metric-value d-inline-block">
                                            <?php if ($blocked_users > 0): ?>
                                                <h1 class="mb-1"><?= $blocked_users; ?></h1>
                                            <?php endif; ?>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                            <span>N/A</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue3"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Kas</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">28000</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                            <span>-2.00%</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Biodata Serikat Pekerja</h5>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                             <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>No. KTA</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Status Pekerjaan</th>
                                                        <th>Alamat</th>
                                                        <th>Keanggotaan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($biodata as $key) : ?>

                                                    <tr>
                                                        <td><?= $key['name'] ?></td>
                                                        <td><?= $key['no_kta'] ?></td>
                                                        <td><?= $key['nama_perusahaan'] ?></td>
                                                        <td><?= $key['status_pekerjaan'] ?></td>
                                                        <td><?= $key['alamat'] ?></td>
                                                        <td class="text-right">
                                                            <?php if ($key['status_keanggotaan'] == 'Aktif'): ?>
                                                                <span class="badge badge-pill badge-success" style="font-size: 0.9rem; padding: 6px 12px;">
                                                                    <i class="fas fa-check-circle mr-1"></i> Aktif
                                                                </span>
                                                            <?php else: ?>
                                                                <span class="badge badge-pill badge-danger" style="font-size: 0.9rem; padding: 6px 12px;">
                                                                    <i class="fas fa-times-circle mr-1"></i> Tidak Aktif
                                                                </span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tfoot>
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