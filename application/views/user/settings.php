

            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- Content Here -->
                        <div class="row">
                            <!-- Update Profile -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Update Profil</div>
                                    <div class="card-body">
                                        <form action="<?= site_url('user/update_profile') ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" value="<?= $username ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" value="<?= $email ?>" required>
                                            </div>
                                            <div class="form-group" id="avatar-container">
                                                <label>Avatar Saat Ini</label><br>
                                                <?php if ($this->session->userdata('avatar')): ?>
                                                    <img id="current-avatar" src="<?= base_url($this->session->userdata('avatar')) ?>" alt="Avatar" width="100" >
                                                <?php else: ?>
                                                    <p id="no-avatar-text" style="display: none;">Belum ada avatar</p>
                                                <?php endif; ?>
                                            </div>
                                            <!-- Form untuk upload avatar -->
                                            <div class="form-group">
                                                <label>Ganti Avatar (opsional)</label>
                                                <!-- Custom File Upload -->
                                                <div class="custom-file">
                                                    <input type="file" name="avatar" class="custom-file-input" id="avatar-upload">
                                                    <label class="custom-file-label" for="avatar-upload">Pilih Avatar</label>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary mt-2">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Change Password -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Ganti Password</div>
                                    <div class="card-body">
                                        <form action="<?= site_url('user/change_password') ?>" method="post">
                                            <div class="form-group">
                                                <label>Password Lama</label>
                                                <input type="password" name="current_password" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Password Baru</label>
                                                <input type="password" name="new_password" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Konfirmasi Password Baru</label>
                                                <input type="password" name="confirm_password" class="form-control" required>
                                            </div>
                                            <button type="submit" class="btn btn-info mt-2">Ganti Password</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
