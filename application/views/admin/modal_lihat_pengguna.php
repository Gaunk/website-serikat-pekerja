<!-- Modal lihat pengguna -->
<div class="modal fade" id="modalLihatPengguna" tabindex="-1" aria-labelledby="modalLihatPenggunaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLihatPenggunaLabel">Detail Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Nama:</strong> <?= htmlspecialchars($user->nama) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user->email) ?></p>
        <p><strong>Username:</strong> <?= htmlspecialchars($user->username) ?></p>
        <p><strong>Role:</strong> <?= htmlspecialchars($user->role) ?></p>
        <!-- Tambahkan detail lain jika diperlukan -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
