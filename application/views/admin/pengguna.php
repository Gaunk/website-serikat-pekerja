
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
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Biodata Serikat Pekerja</h5>
                                    <div class="card-body">
                                        <button id="btnTambahPengguna" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalTambahPengguna">
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
                                                                <td>
                                                                <?= htmlspecialchars($user['no_kta'] ?? 'No KTA not available') ?>
                                                            </td>

                                                                <td><?= htmlspecialchars($user['name'] ?? '') ?></td>
                                                                <td><?= htmlspecialchars($user['email'] ?? '') ?></td>
                                                                <td><?= htmlspecialchars($user['role'] ?? '') ?></td>
                                                                <td>
                                                                    <?php if (!empty($user['avatar'])) : ?>
                                                                        <img src="<?= base_url($user['avatar'] ?? '') ?>" alt="Avatar" width="40" height="40" class="rounded-circle">
                                                                    <?php else : ?>
                                                                        <span class="text-muted">-</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                        
                                                                <td><?= htmlspecialchars($user['username'] ?? '-') ?></td>
                                                                <td class="text-right">
                                                                <?php if ($user['status_keanggotaan'] == 'Aktif'): ?>
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
                                                                    <!-- Tombol Hapus -->
                                                                    <a href="#" 
                                                                    class="btn-hapus" 
                                                                    data-id="<?= $user['id'] ?>" 
                                                                    data-username="<?= htmlspecialchars($user['username'], ENT_QUOTES) ?>" 
                                                                    title="Hapus">
                                                                        <i class="fas fa-trash-alt text-danger"></i>
                                                                    </a>

                                                                    &nbsp;

                                                                    <!-- Tombol Edit Role -->
                                                                    <a href="#" title="Edit" data-toggle="modal" data-target="#editRoleModal<?= $user['id'] ?>">
                                                                        <i class="fas fa-edit text-primary"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                        <?php endforeach; ?>
                                                    <?php else : ?>
                                                        <tr>
                                                            <td colspan="6" class="text-center">Tidak ada data pengguna.</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No. KTA</th>
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
                                            <div id="modalContainer"></div>
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

    <!-- MODAL EDIT -->
    <div class="modal fade" id="editRoleModal<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel<?= $user['id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('admin/update_role_pengguna/' . $user['id']) ?>" method="post">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editRoleModalLabel<?= $user['id'] ?>">Ubah Role: <?= $user['username'] ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <label for="role<?= $user['id'] ?>">Role</label>
                <select name="role" id="role<?= $user['id'] ?>" class="form-control" required>
                <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status_keanggotaan<?= $user['id'] ?>">Status Keanggotaan</label>
                <select name="status_keanggotaan" id="status_keanggotaan<?= $user['id'] ?>" class="form-control" required>
                <option value="aktif" <?= $user['status_keanggotaan'] === 'aktif' ? 'selected' : '' ?>>Aktif</option>
                <option value="tidak aktif" <?= $user['status_keanggotaan'] === 'tidak aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                </select>
            </div>
            <div class="form-group">
            <label for="no_kta">No. KTA</label>
        <input type="text" id="no_kta" name="no_kta" class="form-control" value="<?= isset($next_no_kta) ? $next_no_kta : $user['no_kta']; ?>" readonly>

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

<!-- Modal Tambah Pengguna -->
<div class="modal fade" id="modalTambahPengguna" tabindex="-1" role="dialog" aria-labelledby="modalTambahPenggunaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahPenggunaLabel">Tambah Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="<?= base_url('admin/tambah_pengguna') ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <div class="input-group">
        <select class="custom-select" id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>
</div>

<div class="mb-3">
    <label for="status_keanggotaan" class="form-label">Status Keanggotaan</label>
    <div class="input-group">
        <select class="custom-select" id="status_keanggotaan" name="status_keanggotaan" required>
            <option value="aktif">Aktif</option>
            <option value="tidak aktif">Tidak Aktif</option>
        </select>
    </div>
</div>

<div class="mb-3">
    <label for="avatar" class="form-label">Avatar</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="avatar" name="avatar" required>
        <label class="custom-file-label" for="avatar">Pilih file gambar (JPG, PNG, GIF)</label>
    </div>
    <small class="form-text text-muted">Pilih gambar untuk avatar pengguna (JPG, PNG, GIF).</small>
</div>

    <div class="mb-3 text-end">
        <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
    </div>
</form>

      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
    // Tampilkan modal saat klik tombol "Tambah Pengguna"
    $('#btnTambahPengguna').on('click', function() {
        $('#modalTambahPengguna').modal('show'); // Menampilkan modal
    });

    // Submit form tambah pengguna via AJAX
    $('#formTambahPengguna').on('submit', function(e) {
        e.preventDefault(); // Mencegah reload halaman

        // Ambil data form
        var formData = $(this).serialize();

        $.ajax({
            url: '<?= base_url("admin/tambah_pengguna") ?>',  // Ganti dengan URL yang sesuai
            method: 'POST',
            data: formData,
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    $('#modalTambahPengguna').modal('hide'); // Tutup modal setelah berhasil
                    alert(data.message);
                    // Bisa juga update daftar pengguna di halaman tanpa reload
                } else {
                    alert(data.message);
                }
            },
            error: function() {
                alert('Gagal menambahkan pengguna');
            }
        });
    });
});

</script>