
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
                                <h5 class="card-header">SEO</h5>
                                <div class="card-body">
                                    <form action="<?= base_url('admin/update_seo'); ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $seo->id; ?>">

                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?= htmlspecialchars($seo->meta_title); ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" name="meta_description" rows="3" required><?= htmlspecialchars($seo->meta_description); ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="<?= htmlspecialchars($seo->meta_keywords); ?>" required>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-6 pl-0">
                                            <p class="text-right">
                                                <a href="<?= base_url('admin/seo') ?>" class="btn btn-space btn-secondary">Cancel</a>
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