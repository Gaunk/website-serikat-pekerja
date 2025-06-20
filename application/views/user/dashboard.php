

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>10368</h2>
                                                <span>Pekerja</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>1,086</h2>
                                                <span>Account</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="title-1 m-b-25">Nama Pekerja</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Status Pekerjaan</th>
                                                <th>No. KTA</th>
                                                <th class="text-right">Nama Perusahaan</th>
                                                <th class="text-right">Jenis Kelamin</th>
                                                <th class="text-right">Status anggota</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $biodata['name'] ?? 'Alamat belum diisi' ?></td>
                                                <td><?= $biodata['status_pekerjaan'] ?? 'Alamat belum diisi' ?></td>
                                                <td><?= $biodata['no_kta'] ?? 'Alamat belum diisi' ?></td>
                                                <td class="text-right"><?= $biodata['nama_perusahaan'] ?? 'Alamat belum diisi' ?></td>
                                                <td class="text-right"><?= $biodata['jenis_kelamin'] ?? 'Alamat belum diisi' ?></td>
                                                <td class="text-right">
                                                    <?php if ($biodata['status_keanggotaan'] == 'Aktif'): ?>
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                <div class="col-lg-3">
                                    <h2 class="title-1 m-b-25">Kantor Cabang</h2>
                                    <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                                        <div class="au-card-inner">
                                            <div class="table-responsive">
                                                <table class="table table-top-countries">
                                                    <tbody>
                                                        <tr>
                                                            <td>Jakarta</td>
                                                            <td class="text-right">6</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bogor</td>
                                                            <td class="text-right">5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Depok</td>
                                                            <td class="text-right">5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tangerang</td>
                                                            <td class="text-right">4</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bekasi</td>
                                                            <td class="text-right">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Banten</td>
                                                            <td class="text-right">5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Karawang</td>
                                                            <td class="text-right">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bandung</td>
                                                            <td class="text-right">2</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

