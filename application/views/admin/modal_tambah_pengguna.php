<!-- Modal Tambah Pengguna -->
<div class="modal fade" id="modalTambahPengguna" tabindex="-1" aria-labelledby="modalTambahPenggunaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahPenggunaLabel">Tambah Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahPengguna" method="POST">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
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
        // Tampilkan modal
        var myModal = new bootstrap.Modal(document.getElementById('modalTambahPengguna'));
        myModal.show();
    });

    // Submit form tambah pengguna via AJAX
    $('#formTambahPengguna').on('submit', function(e) {
        e.preventDefault();

        // Ambil data form
        var formData = $(this).serialize();

        $.ajax({
            url: '<?= base_url("admin/tambah_pengguna") ?>',
            method: 'POST',
            data: formData,
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    // Tutup modal
                    $('#modalTambahPengguna').modal('hide');
                    // Tampilkan pesan sukses
                    alert(data.message);
                    // Bisa juga update daftar pengguna di halaman
                } else {
                    // Tampilkan pesan error
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