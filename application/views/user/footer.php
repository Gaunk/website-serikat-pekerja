
<!-- Jquery JS-->
    <script src="<?= base_url('temp_user/') ?>vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?= base_url('temp_user/') ?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url('temp_user/') ?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?= base_url('temp_user/') ?>vendor/slick/slick.min.js"></script>
    <script src="<?= base_url('temp_user/') ?>vendor/wow/wow.min.js"></script>
    <script src="<?= base_url('temp_user/') ?>vendor/animsition/animsition.min.js"></script>
    <script src="<?= base_url('temp_user/') ?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?= base_url('temp_user/') ?>vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= base_url('temp_user/') ?>vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="<?= base_url('temp_user/') ?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url('temp_user/') ?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url('temp_user/') ?>vendor/chartjs/Chart.bundle.min.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url('temp_user/') ?>js/main.js"></script>
    <!-- SweetAlert2 -->
     
    <script>
    document.getElementById("avatar-upload").addEventListener("change", function(event) {
    var file = event.target.files[0]; // Ambil file yang dipilih
    if (file) {
        // Menambahkan efek loading (menyembunyikan gambar sementara)
        var avatarImg = document.getElementById("current-avatar");
        avatarImg.style.opacity = 0; // Membuat gambar fade-out saat menunggu file baru

        // Menambahkan loading spinner (opsional)
        avatarImg.style.display = "none";
        var spinner = document.createElement("div");
        spinner.id = "loading-spinner";
        spinner.innerHTML = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Memuat gambar...";
        document.querySelector(".form-group").appendChild(spinner);

        var reader = new FileReader(); // Membaca file yang dipilih

        reader.onload = function(e) {
            // Setelah file dibaca, kita ubah gambar avatar
            avatarImg.src = e.target.result; // Set gambar baru

            // Tampilkan gambar dengan fade-in
            avatarImg.style.display = "block";
            avatarImg.style.opacity = 1; // Gambar fade-in

            // Hapus spinner setelah gambar selesai dimuat
            spinner.remove();
        };

        reader.readAsDataURL(file); // Membaca file sebagai data URL (base64)
    } else {
        // Jika tidak ada gambar yang dipilih, tampilkan pesan
        document.getElementById("no-avatar-text").style.display = "block";
        document.getElementById("current-avatar").style.display = "none";
    }
});

</script>

<!-- JavaScript untuk mengganti nama label setelah file dipilih -->
<script>
    // Menambahkan event listener untuk mengganti nama label setelah memilih file
    document.getElementById('avatar-upload').addEventListener('change', function () {
        var fileName = this.value.split('\\').pop(); // Mendapatkan nama file yang dipilih
        var label = this.nextElementSibling;
        label.textContent = fileName; // Mengganti label dengan nama file
        label.classList.add('selected'); // Menambahkan kelas "selected" untuk perubahan warna
    });
</script>
<script>
flatpickr("#tanggal_lahir", {
    dateFormat: "d-m-Y",
    maxDate: "today",
    altInput: true,
    altFormat: "d F Y",
    allowInput: true,
    disableMobile: "true",
});
</script>

</body>

</html>
<!-- end document-->
