<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('temp_admin/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" />
    <link href="<?= base_url('temp_admin/') ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('temp_admin/') ?>assets/libs/css/style.css" />
    <link rel="stylesheet" href="<?= base_url('temp_admin/') ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css" />
    <link rel="stylesheet" href="<?= base_url('temp_admin/') ?>assets/vendor/charts/chartist-bundle/chartist.css" />
    <link rel="stylesheet" href="<?= base_url('temp_admin/') ?>assets/vendor/charts/morris-bundle/morris.css" />
    <link rel="stylesheet" href="<?= base_url('temp_admin/') ?>assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?= base_url('temp_admin/') ?>assets/vendor/charts/c3charts/c3.css" />
    <link rel="stylesheet" href="<?= base_url('temp_admin/') ?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('temp_admin/') ?>assets/vendor/datatables/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('temp_admin/') ?>assets/vendor/datatables/css/buttons.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('temp_admin/') ?>assets/vendor/datatables/css/select.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('temp_admin/') ?>assets/vendor/datatables/css/fixedHeader.bootstrap4.css" />
    <!-- di bagian <head> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />

    <!-- Include Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet"/>

    <title><?= $judul ?></title>

    <style>
        * {
        cursor: pointer; /* cursor berubah jadi tangan */
        }

        body,
        input,
        label,
        button,
        .form-control {
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            
        }
        

        .btn-upload {
            background-color: #1d3557;
            color: #fff;
            padding: 8px 18px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .btn-upload:hover {
            background-color: #457b9d;
        }

        .custom-upload-wrapper {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .file-name {
            font-style: italic;
            color: #333;
            font-size: 14px;
        }

        input[type="date"].form-control-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }

        /* Untuk mempercantik placeholder di browser yang support */
        input[type="date"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            filter: invert(0.3) brightness(1.2);
            transition: filter 0.3s ease;
        }

        input[type="date"]:hover::-webkit-calendar-picker-indicator {
            filter: invert(0.6) brightness(1.5);
        }
        /* Custom style for file input */
.custom-file-input:lang(en)~.custom-file-label::after {
    content: "Choose file"; /* Text that appears after input */
}

/* Customize select box border */
.custom-select {
    border-radius: 5px;
    border: 1px solid #ced4da;
    padding: 0.375rem 0.75rem;
}

/* Tooltip text for file input */
.form-text.text-muted {
    font-size: 0.85rem;
    color: #6c757d;
}

        
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="<?= base_url('admin/dashboard') ?>">Concept</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search.." />
                            </div>
                        </li>

                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" 
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-bell"></i> <span class="indicator"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title">Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img">
                                                        <img src="assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle" />
                                                    </div>
                                                    <div class="notification-list-user-block">
                                                        <span class="notification-list-user-name">Jeremy Rakestraw</span> accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img">
                                                        <img src="assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle" />
                                                    </div>
                                                    <div class="notification-list-user-block">
                                                        <span class="notification-list-user-name">John Abraham</span> is now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img">
                                                        <img src="assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle" />
                                                    </div>
                                                    <div class="notification-list-user-block">
                                                        <span class="notification-list-user-name">Monaan Pechi</span> is watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img">
                                                        <img src="assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle" />
                                                    </div>
                                                    <div class="notification-list-user-block">
                                                        <span class="notification-list-user-name">Jessica Caruso</span> accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer">
                                        <a href="#">View all notifications</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-th"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <a href="#" class="connection-item"><img src="assets/images/github.png" alt="" /> <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <a href="#" class="connection-item"><img src="assets/images/dribbble.png" alt="" /> <span>Dribbble</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <a href="#" class="connection-item"><img src="assets/images/dropbox.png" alt="" /> <span>Dropbox</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <a href="#" class="connection-item"><img src="assets/images/bitbucket.png" alt="" /> <span>Bitbucket</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <a href="#" class="connection-item"><img src="assets/images/mail_chimp.png" alt="" /> <span>Mail chimp</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <a href="#" class="connection-item"><img src="assets/images/slack.png" alt="" /> <span>Slack</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"><a href="#">More</a></div>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" 
                                aria-haspopup="true" aria-expanded="false">
                                <img src="<?= base_url($this->session->userdata('avatar')) ?>" alt="" class="user-avatar-md rounded-circle" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?= $username ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="<?= base_url('admin/biodata') ?>"><i class="fas fa-user mr-2"></i>Biodata</a>
                                <a class="dropdown-item" href="<?= base_url('admin/settings') ?>"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
