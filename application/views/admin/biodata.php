
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
                                            <li class="breadcrumb-item active" aria-current="page">Biodata</li>
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

                        <!-- ============================================================== -->
	                <!-- influencer profile  -->
	                <!-- ============================================================== -->
	                <div class="row">
                       


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                        <div class="card influencer-profile-data">
	                            <div class="card-body">
	                                <div class="row">
	                                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
	                                        <div class="text-center">
	                                            <img src="<?= base_url($this->session->userdata('avatar')) ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
	                                            </div>
	                                        </div>
	                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
	                                            <div class="user-avatar-info">
	                                                <div class="m-b-20">
	                                                    <div class="user-avatar-name">
	                                                        <h2 class="mb-1"><?= $username ?></h2>
	                                                    </div>
	                                                    <div class="rating-star  d-inline-block">
	                                                        <i class="fa fa-fw fa-star"></i>
	                                                        <i class="fa fa-fw fa-star"></i>
	                                                        <i class="fa fa-fw fa-star"></i>
	                                                        <i class="fa fa-fw fa-star"></i>
	                                                        <i class="fa fa-fw fa-star"></i>
	                                                        <p class="d-inline-block text-dark">14 Reviews </p>
	                                                    </div>
	                                                </div>
	                                                <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
	                                                <div class="user-avatar-address">
	                                                    <p class="border-bottom pb-3">
	                                                        <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>4045 Denver AvenueLos Angeles, CA 90017</span>
	                                                        <span class="mb-2 ml-xl-4 d-xl-inline-block d-block">Joined date: 23 June, 2018  </span>
	                                                        <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">Male 
	                                                                </span>
	                                                        <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">29 Year Old </span>
	                                                    </p>
	                                                    <div class="mt-3">
	                                                        <a href="#" class="badge badge-light mr-1">Fitness</a> <a href="#" class="badge badge-light mr-1">Life Style</a> <a href="#" class="badge badge-light">Gym</a>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="border-top user-social-box">
	                                    <div class="user-social-media d-xl-inline-block"><span class="mr-2 twitter-color"> <i class="fab fa-twitter-square"></i></span><span>13,291</span></div>
	                                    <div class="user-social-media d-xl-inline-block"><span class="mr-2  pinterest-color"> <i class="fab fa-pinterest-square"></i></span><span>84,019</span></div>
	                                    <div class="user-social-media d-xl-inline-block"><span class="mr-2 instagram-color"> <i class="fab fa-instagram"></i></span><span>12,300</span></div>
	                                    <div class="user-social-media d-xl-inline-block"><span class="mr-2  facebook-color"> <i class="fab fa-facebook-square "></i></span><span>92,920</span></div>
	                                    <div class="user-social-media d-xl-inline-block "><span class="mr-2 medium-color"> <i class="fab fa-medium"></i></span><span>291</span></div>
	                                    <div class="user-social-media d-xl-inline-block"><span class="mr-2 youtube-color"> <i class="fab fa-youtube"></i></span><span>1291</span></div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- ============================================================== -->
	                    <!-- end influencer profile  -->
	                    <!-- ============================================================== -->
                         <div class="row">
                            <!-- ============================================================== -->
                        <!-- validation form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="needs-validation" action="<?= base_url('admin/update_biodata') ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id') ?>">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">No. KTA</label>
                                                <input type="number" class="form-control" id="name" name="no_kta" value="<?= $biodata['no_kta'] ?? '' ?>">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="name">Nama</label>
                                                <input type="text" class="form-control" name="name" id="name" value="<?= $biodata['name'] ?? '' ?>" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="status_pekerjaan">Status Pekerjaan</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="status_pekerjaan" id="status_pekerjaan" value="<?= $biodata['status_pekerjaan'] ?? '' ?>" aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Status Perkawinan</label>
                                                <select name="status_perkawinan" class="form-control" required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Kawin" <?= isset($biodata['status_perkawinan']) && $biodata['status_perkawinan'] == 'Kawin' ? 'selected' : '' ?>>Kawin</option>
                                                    <option value="Belum Kawin" <?= isset($biodata['status_perkawinan']) && $biodata['status_perkawinan'] == 'Belum Kawin' ? 'selected' : '' ?>>Belum Kawin</option>
                                                    <option value="Duda" <?= isset($biodata['status_perkawinan']) && $biodata['status_perkawinan'] == 'Duda' ? 'selected' : '' ?>>Duda</option>
                                                    <option value="Janda" <?= isset($biodata['status_perkawinan']) && $biodata['status_perkawinan'] == 'Janda' ? 'selected' : '' ?>>Janda</option>
                                                    </select>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Jenis Kelamin</label>
                                                <select name="jenis_kelamin" class="form-control" required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Laki-laki" <?= isset($biodata['jenis_kelamin']) && $biodata['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                                    <option value="Perempuan" <?= isset($biodata['jenis_kelamin']) && $biodata['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                                    </select>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $biodata['alamat'] ?? '' ?>" aria-describedby="inputGroupPrepend" required>
                                            </div>
                                            
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">No. KTP</label>
                                                <input type="number" class="form-control" name="no_ktp" id="no_ktp" value="<?= $biodata['no_ktp'] ?? '' ?>" aria-describedby="inputGroupPrepend" required>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $biodata['tempat_lahir'] ?? '' ?>" aria-describedby="inputGroupPrepend" required>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input
                                                    type="text"
                                                    id="tanggal_lahir"
                                                    name="tanggal_lahir"
                                                    class="form-control"
                                                    placeholder="Pilih tanggal lahir"
                                                    value="<?= $biodata['tanggal_lahir'] ?? '' ?>"
                                                    required
                                                    autocomplete="off"
                                                >
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Nama Perusahaan</label>
                                                <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" value="<?= $biodata['nama_perusahaan'] ?? '' ?>" aria-describedby="inputGroupPrepend" required>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <div class="invalid-feedback">
                                                            You must agree before submitting.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit">Submit form</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end validation form -->
                        <!-- ============================================================== -->
                        
                        </div>
                        </div>
                        </div>
                        

                        <!-- BAWAHNYA FOOTER -->

