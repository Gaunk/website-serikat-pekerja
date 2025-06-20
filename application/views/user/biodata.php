

            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Profile Layout -->
                        <div class="col-lg-4">
                                <div class="card">
    <!-- Strip Merah di Atas -->
<div style="height: 10px; background-color: #f1002b; border-top-left-radius: 12px; border-top-right-radius: 12px;"></div>

<div class="card-body" style="
    background-color: #f2f2f2;
    color: #333;
    border-bottom-left-radius: 12px; 
    border-bottom-right-radius: 12px; 
    padding: 20px; 
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
">
    <!-- Header KTA Responsif -->
    <div class="mb-3">
        <div class="row align-items-center" style="border-bottom: 2px solid #ccc; padding-bottom: 10px;">
            <!-- Logo -->
            <div class="col-3 col-md-1 text-center text-md-start mb-2 mb-md-0">
                <img src="<?= base_url('temp_user/images/logo-kta-1.png') ?>" alt="Logo SPIM"
                     class="img-fluid" style="max-width: 60px; height: auto;">
            </div>

            <!-- Judul -->
            <div class="col-9 col-md-11 text-center text-md-start">
                <h4 style="letter-spacing: 2px; font-weight: 700; margin-bottom: 5px; color: #222;">KARTU TANDA ANGGOTA</h4>
                <h5 style="letter-spacing: 1.5px; font-weight: 600; margin-bottom: 0; color: #333;">SERIKAT PEKERJA INDONESIA MERDEKA</h5>
            </div>
        </div>
    </div>




        <!-- Container utama: Foto di kiri, data di kanan -->
        <div style="display: flex; align-items: flex-start; gap: 20px;">
            
            <!-- Foto Profil -->
            <div style="flex-shrink: 0; text-align: center;">
                <img src="<?= base_url($this->session->userdata('avatar')) ?>" alt="Avatar"
                     style="width: 100px; height: 120px; border: 2px solid white; border-radius: 6px; object-fit: cover; background-color: #f0f0f0;">
            </div>

            <!-- Data Biodata -->
            <div style="font-size: 0.85rem; line-height: 1.6; display: grid; grid-template-columns: 160px 1fr; gap: 6px 12px;">
                <div><strong>No. KTA</strong></div>
                <div>: <?= $biodata['no_kta'] ?? '-' ?></div>

                <div><strong>Nama Lengkap</strong></div>
                <div>: <?= $biodata['name'] ?? '-' ?></div>

                <div><strong>Tempat/Tanggal Lahir</strong></div>
                <div>: <?= $biodata['tempat_lahir'] ?? '-' ?>, <?= $biodata['tanggal_lahir'] ?? '-' ?></div>

                <div><strong>Jenis Kelamin</strong></div>
                <div>: <?= $biodata['jenis_kelamin'] ?? '-' ?></div>

                <div><strong>Alamat</strong></div>
                <div>: <?= $biodata['alamat'] ?? '-' ?></div>

                <div><strong>Status Pekerjaan</strong></div>
                <div>: <?= $biodata['status_pekerjaan'] ?? '-' ?></div>

                <div><strong>Kewarganegaraan</strong></div>
                <div>: <?= $biodata['kewarganegaraan'] ?? 'WNI' ?></div>

                <div><strong>Berlaku Hingga</strong></div>
                <div>: <?php 
                        // Calculate 5 years from the registration year
                        if (isset($biodata['tgl_daftar']) && $biodata['tgl_daftar'] != '0000-00-00 00:00:00') {
                            $tgl_daftar = new DateTime($biodata['tgl_daftar']);
                            $start_year = $tgl_daftar->format('Y'); // Get the starting year
                            $end_year = $tgl_daftar->modify('+5 years')->format('Y'); // Get the end year after adding 5 years
                            
                            echo $start_year . " - " . $end_year ;
                        } else {
                            echo "<p class='form-control-plaintext'>Periode 5 Tahun: Belum diisi</p>";
                        }
                        ?>
                
            </div>
            </div>
        </div>
    </div>
</div>


                        </div>

    <!-- Biodata Info Layout -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Informasi Biodata</h4>
                <hr>
                <!-- No. KTA -->
                <div class="form-group row">
                    <label class="col-md-4">No. KTA</label>
                    <div class="col-md-8">
                        <p class="form-control-plaintext">: <?= $biodata['no_kta'] ?? 'Belum ada KTA' ?></p>
                    </div>
                </div>

                <!-- Nama -->
                <div class="form-group row">
                    <label class="col-md-4">Nama</label>
                    <div class="col-md-8">
                        <p class="form-control-plaintext">: <?= isset($biodata['name']) && $biodata['name'] !== '' ? $biodata['name'] : 'Belum diisi' ?></p>

                    </div>
                </div>

                <!-- Status Pekerjaan -->
                <div class="form-group row">
                    <label class="col-md-4">Status Pekerjaan</label>
                    <div class="col-md-8">
                        <p class="form-control-plaintext">: <?= isset($biodata['status_pekerjaan']) && $biodata['status_pekerjaan'] !== '' ? $biodata['status_pekerjaan'] : 'Belum diisi' ?></p>
                    </div>
                </div>

                <!-- Status Perkawinan -->
                <div class="form-group row">
                    <label class="col-md-4">Status Perkawinan</label>
                    <div class="col-md-8">
                        <p class="form-control-plaintext">: <?= isset($biodata['status_perkawinan']) && $biodata['status_perkawinan'] !== '' ? $biodata['status_perkawinan'] : 'Belum diisi' ?></p>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="form-group row">
                    <label class="col-md-4">Alamat</label>
                    <div class="col-md-8">
                        <p class="form-control-plaintext">: <?= isset($biodata['alamat']) && $biodata['alamat'] !== '' ? $biodata['alamat'] : 'Belum diisi' ?></p>
                    </div>
                </div>

                <!-- No. KTP -->
                <div class="form-group row">
                    <label class="col-md-4">No. KTP</label>
                    <div class="col-md-8">
                        <p class="form-control-plaintext">: <?= isset($biodata['no_ktp']) && $biodata['no_ktp'] !== '' ? $biodata['no_ktp'] : 'Belum diisi' ?></p>
                    </div>
                </div>

                <!-- Tanggal Lahir -->
                <div class="form-group row">
                    <label class="col-md-4">Tempat/Tanggal Lahir</label>
                    <div class="col-md-8">
                        <p class="form-control-plaintext">: <?= $biodata['tempat_lahir'] ?? 'Umur belum diisi' ?>, <?= $biodata['tanggal_lahir'] ?? 'Umur belum diisi' ?></p>
                    </div>
                </div>

                <!-- Nama Perusahaan -->
                <div class="form-group row">
                    <label class="col-md-4">Nama Perusahaan</label>
                    <div class="col-md-8">
                        <p class="form-control-plaintext">: <?= isset($biodata['nama_perusahaan']) && $biodata['nama_perusahaan'] !== '' ? $biodata['nama_perusahaan'] : 'Belum diisi' ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

                            <!-- Form to Update Biodata -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Update Biodata</div>
                                    <div class="card-body">
                                        <form action="<?= base_url('user/update_biodata') ?>" method="post">
                                            <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id') ?>">
                                            <div class="form-group">
                                                <label>No. KTA</label>
                                                <input type="text" name="no_kta" class="form-control" value="<?= isset($next_no_kta) ? $next_no_kta : $biodata['no_kta']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="name" class="form-control" value="<?= $biodata['name'] ?? '' ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Status Pekerjaan</label>
                                                <select name="status_pekerjaan" id="status_pekerjaan" class="form-control" required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="PKWT" <?= isset($biodata['status_pekerjaan']) && $biodata['status_pekerjaan'] == 'PKWT' ? 'selected' : '' ?>>PKWT</option>
                                                    <option value="PKWTT" <?= isset($biodata['status_pekerjaan']) && $biodata['status_pekerjaan'] == 'PKWTT' ? 'selected' : '' ?>>PKWTT</option>
                                                    </select>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Status Perkawinan</label>
                                                    <select name="status_perkawinan" class="form-control" required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Kawin" <?= isset($biodata['status_perkawinan']) && $biodata['status_perkawinan'] == 'Kawin' ? 'selected' : '' ?>>Kawin</option>
                                                    <option value="Belum Kawin" <?= isset($biodata['status_perkawinan']) && $biodata['status_perkawinan'] == 'Belum Kawin' ? 'selected' : '' ?>>Belum Kawin</option>
                                                    <option value="Duda" <?= isset($biodata['status_perkawinan']) && $biodata['status_perkawinan'] == 'Duda' ? 'selected' : '' ?>>Duda</option>
                                                    <option value="Janda" <?= isset($biodata['status_perkawinan']) && $biodata['status_perkawinan'] == 'Janda' ? 'selected' : '' ?>>Janda</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Jenis Kelamin</label>
                                                    <select name="jenis_kelamin" class="form-control" required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Laki-laki" <?= isset($biodata['jenis_kelamin']) && $biodata['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                                    <option value="Perempuan" <?= isset($biodata['jenis_kelamin']) && $biodata['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                                </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea name="alamat" class="form-control" rows="4" required><?= $biodata['alamat'] ?? '' ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>No. KTP</label>
                                                <input type="number" name="no_ktp" class="form-control" value="<?= $biodata['no_ktp'] ?? '' ?>" required>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Tempat Lahir</label>
                                                    <input 
                                                        type="text" 
                                                        name="tempat_lahir" 
                                                        class="form-control" 
                                                        value="<?= $biodata['tempat_lahir'] ?? '' ?>" 
                                                        placeholder="Masukkan tempat lahir"
                                                        required
                                                    >
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Tanggal Lahir</label>
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
                                                </div>


                                            <div class="form-group">
                                                <label>Nama Perusahaan</label>
                                                <input type="text" name="nama_perusahaan" class="form-control" value="<?= $biodata['nama_perusahaan'] ?? '' ?>" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
