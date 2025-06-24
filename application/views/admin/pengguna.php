<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <!-- Page Header -->
            <div class="row">
                <div class="col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title"><?= $judul ?> </h2>
                        <p class="pageheader-text">Manajemen pengguna Serikat Pekerja.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table & Controls -->
            <div class="ecommerce-widget">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header">Biodata Serikat Pekerja</h5>
                            <div class="card-body">
                                <!-- Tambah Pengguna -->
                                <button type="button" class="btn btn-primary mb-3" id="btnTambahPengguna">
                                    <i class="fas fa-plus"></i> Tambah Pengguna
                                </button>

                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No KTA</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Avatar</th>
                                                <th>Username</th>
                                                <th>Status Keanggotaan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($users)) : ?>
                                                <?php foreach ($users as $user) : ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($user['no_kta'] ?? 'No KTA') ?></td>
                                                        <td><?= htmlspecialchars($user['name']) ?></td>
                                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                                        <td><?= htmlspecialchars($user['role']) ?></td>
                                                        <td>
                                                            <?php if (!empty($user['avatar'])) : ?>
                                                                <img src="<?= base_url($user['avatar']) ?>" alt="Avatar" width="40" height="40" class="rounded-circle">
                                                            <?php else : ?>
                                                                <span class="text-muted">-</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?= htmlspecialchars($user['username']) ?></td>
                                                        <td>
                                                            <?php if ($user['status_keanggotaan'] === 'Aktif') : ?>
                                                                <span class="badge badge-success"><i class="fas fa-check-circle mr-1"></i> Aktif</span>
                                                            <?php else : ?>
                                                                <span class="badge badge-danger"><i class="fas fa-times-circle mr-1"></i> Tidak Aktif</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <!-- Hapus -->
                                                            <a href="#" class="btn-hapus" data-id="<?= $user['id'] ?>" title="Hapus">
                                                                <i class="fas fa-trash-alt text-danger"></i>
                                                            </a>
                                                            &nbsp;
                                                            <!-- Edit -->
                                                            <a href="#" title="Edit" data-toggle="modal" data-target="#editRoleModal<?= $user['id'] ?>">
                                                                <i class="fas fa-edit text-primary"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <!-- Modal Edit Per Pengguna -->
                                                    <div class="modal fade" id="editRoleModal<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel<?= $user['id'] ?>" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <form action="<?= base_url('admin/update_role_pengguna/' . $user['id']) ?>" method="post">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Ubah Role: <?= htmlspecialchars($user['username']) ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Role</label>
                                                                            <select name="role" class="form-control" required>
                                                                                <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                                                                                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Status Keanggotaan</label>
                                                                            <select name="status_keanggotaan" class="form-control" required>
                                                                                <option value="Aktif" <?= $user['status_keanggotaan'] === 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                                                                                <option value="Tidak Aktif" <?= $user['status_keanggotaan'] === 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>No. KTA</label>
                                                                            <input type="text" name="no_kta" class="form-control" value="<?= htmlspecialchars($user['no_kta']) ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="8" class="text-center">Tidak ada data pengguna.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No KTA</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Avatar</th>
                                                <th>Username</th>
                                                <th>Status Keanggotaan</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Pengguna -->
        <div class="modal fade" id="modalTambahPengguna" tabindex="-1" role="dialog" aria-labelledby="modalTambahPenggunaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="formTambahPengguna" action="<?= base_url('admin/tambah_pengguna') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form Input -->
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status Keanggotaan</label>
                                <select name="status_keanggotaan" class="form-control" required>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <div class="custom-file">
                                    <input type="file" name="avatar" class="custom-file-input" id="avatar" accept="image/*" required>
                                    <label class="custom-file-label" for="avatar">Pilih file gambar...</label>
                                </div>
                                <small class="form-text text-muted">Format gambar: JPG, PNG, GIF. Ukuran maksimum 2MB.</small>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


