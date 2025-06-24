    <div class="row">
    </div>
    </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->

    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 (gunakan satu versi jquery saja) -->
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    
    <!-- bootstrap bundle js -->
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    
    <!-- slimscroll js -->
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    
    <!-- main js -->
    <script src="<?= base_url('temp_admin/') ?>assets/libs/js/main-js.js"></script>
    
    <!-- chart libraries -->
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/charts/morris-bundle/morris.js"></script>
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="<?= base_url('temp_admin/') ?>assets/libs/js/dashboard-ecommerce.js"></script>
    
    <!-- multi-select -->
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('temp_admin/') ?>assets/vendor/datatables/js/data-table.js"></script>
    
    <!-- DataTables export dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
    <!-- Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    // Update label input saat file dipilih
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
<script>
  $(document).ready(function() {
    $('#btnTambahPengguna').click(function() {
      $('#modalTambahPengguna').modal('show');
    });
  });
</script>
    <script>
        $(document).ready(function() {
    $('.btn-lihat').on('click', function(e) {
        e.preventDefault();
        var userId = $(this).data('id');
        
        // Lakukan request ke server
        $.ajax({
            url: '<?= base_url("admin/lihat_pengguna/") ?>' + userId, // URL yang akan dipanggil
            method: 'GET',
            success: function(response) {
                // Isi modal dengan response
                $('#modalContainer').html(response);

                // Tampilkan modal menggunakan Bootstrap 5
                var myModal = new bootstrap.Modal(document.getElementById('modalLihatPengguna'));
                myModal.show();
            },
            error: function(xhr, status, error) {
                // Debugging error
                alert('Gagal memuat data pengguna.\nStatus: ' + status + '\nError: ' + error);
                console.log(xhr.responseText);  // Debug response dari server
            }
        });
    });
});


    </script>

    <script>
        // Update the label of file input when a file is selected
$(document).ready(function () {
    $('#avatar').on('change', function () {
        var fileName = $(this).val().split('\\').pop(); // Get the file name
        $(this).next('.custom-file-label').html(fileName); // Update the label with file name
    });
});

        document.addEventListener('DOMContentLoaded', function () {
            const tombolHapus = document.querySelectorAll('.btn-hapus');

            tombolHapus.forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();

                    const userId = this.getAttribute('data-id');
                    const username = this.getAttribute('data-username');

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        html: `Pengguna: <strong>${username}</strong> akan dihapus!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect ke URL hapus pengguna
                            window.location.href = '<?= base_url("admin/hapus_pengguna/") ?>' + userId;
                        }
                    });
                });
            });
        });
</script>

    <script>
        // Inisialisasi flatpickr untuk input tanggal_lahir
        flatpickr("#tanggal_lahir", {
            dateFormat: "Y-m-d",
            maxDate: "today",
            altInput: true,
            altFormat: "d F Y",
            locale: "id"
        });

        // Inisialisasi flatpickr untuk input ttl (tempat tanggal lahir)
        flatpickr("#ttl", {
            dateFormat: "Y-m-d",
            maxDate: "today",
            allowInput: true,
            locale: {
                firstDayOfWeek: 1 // Senin sebagai awal minggu
            }
        });

        // Preview avatar ketika file dipilih
        document.getElementById('avatar').addEventListener('change', function () {
            const file = this.files[0];
            const fileNameText = document.getElementById('fileName');
            const avatarImage = document.getElementById('current-avatar');
            const noAvatarText = document.getElementById('no-avatar-text');

            if (file) {
                // Tampilkan nama file
                fileNameText.textContent = file.name;

                // Jika file gambar, tampilkan preview
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        avatarImage.src = e.target.result;
                        avatarImage.style.display = 'inline-block';
                        if (noAvatarText) noAvatarText.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                } else {
                    // Kalau bukan gambar, sembunyikan preview
                    avatarImage.style.display = 'none';
                    if (noAvatarText) noAvatarText.style.display = 'block';
                }
            } else {
                fileNameText.textContent = 'Belum ada file dipilih';
                avatarImage.style.display = 'none';
                if (noAvatarText) noAvatarText.style.display = 'block';
            }
        });
    </script>

</body>
</html>
