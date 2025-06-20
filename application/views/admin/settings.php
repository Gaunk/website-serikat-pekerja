
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
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="needs-validation" action="<?= base_url('admin/update_profile') ?>" method="post" enctype="multipart/form-data" novalidate>
                                        <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id') ?>">

                                        <div class="row">

                                            <!-- Username -->
                                            <div class="col-12 mb-3">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>" readonly>
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>

                                            <!-- Email -->
                                            <div class="col-12 mb-3">
                                                <label for="email">E-mail</label>
                                                <input type="email" class="form-control" name="email" id="email" value="<?= $email ?>" required>
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>

                                            <!-- Avatar -->
                                            <div class="col-12 mb-3">
                                                <div class="form-group" id="avatar-container">
                                                    <label>Avatar Saat Ini</label><br>
                                                    <?php if ($this->session->userdata('avatar')): ?>
                                                        <img id="current-avatar" src="<?= base_url($this->session->userdata('avatar')) ?>" alt="Avatar" width="100" style="border-radius: 50%; object-fit: cover; border: 1px solid #ddd;">
                                                    <?php else: ?>
                                                        <p id="no-avatar-text">Belum ada avatar</p>
                                                        <img id="current-avatar" src="#" alt="Avatar" width="100" style="display: none; border-radius: 50%; object-fit: cover; border: 1px solid #ddd;">
                                                    <?php endif; ?>
                                                </div>

                                                <!-- Upload Avatar -->
                                                <div class="form-group">
                                                    <label for="fileInput">Upload Avatar</label><br>
                                                    <div class="custom-upload-wrapper">
                                                        <label class="btn-upload">
                                                            Pilih File
                                                            <input type="file" id="avatar" name="avatar" accept="image/*" hidden>
                                                        </label>
                                                        <span id="fileName" class="file-name">Belum ada file dipilih</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Submit Button -->
                                            <div class="col-12">
                                                <button class="btn btn-primary" type="submit">Submit Form</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end validation form -->
                        <!-- ============================================================== -->
                         <!-- ============================================================== -->
                        <!-- validation form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Ganti Password</h5>
                                <div class="card-body">
                                    <form class="needs-validation" action="<?= site_url('admin/change_password') ?>" method="post" novalidate>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">Password Lama</label>
                                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="new_password">Password Baru</label>
                                                <input type="password" class="form-control" name="new_password" id="new_password" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="new_password">Konfirmasi Password Baru</label>
                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
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
