<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hellofaraby Smart Aquarium</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/images/logos/favicon.png'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.min.css'); ?>">

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./index.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>

                    </ul>

                </nav>
            </header>
            <div class="container-fluid">
                <div class="row">


                    <div class="col-6 col-lg-6 d-flex flex-column justify-content-center align-items-center mb-4">
                        <div class="card w-100">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                                <h5 class="card-title fw-semibold mb-4 text-center">Pompa</h5>
                                <button type="button" id="pompaToggle" class="btn btn-outline-primary m-1">Off</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-6 d-flex flex-column justify-content-center align-items-center mb-4">
                        <div class="card w-100">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                                <h5 class="card-title fw-semibold mb-4 text-center">Lampu</h5>
                                <button type="button" id="lampuToggle" class="btn btn-outline-primary m-1">Off</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-6 d-flex flex-column justify-content-center align-items-center mb-4">
                        <div class="card w-100">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                                <h5 class="card-title fw-semibold mb-4 text-center">Wave Maker</h5>
                                <button type="button" id="waveMakerToggle" class="btn btn-outline-primary m-1">Off</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-6 d-flex flex-column justify-content-center align-items-center mb-4">
                        <div class="card w-100">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                                <h5 class="card-title fw-semibold mb-4 text-center">Kipas Chiller</h5>
                                <button type="button" id="kipasToggle" class="btn btn-outline-primary m-1">Off</button>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol On All / Off All -->
                    <div class="col-12 mb-4 text-center">
                        <button id="onAll" class="btn btn-success m-1">Turn All On</button>
                        <button id="offAll" class="btn btn-danger m-1">Turn All Off</button>
                    </div>



                </div>

                <!-- Footer -->
                <div class="text-center mt-4 py-3">
                    <p class="mb-0 fs-4">Developed by <a href="https://www.instagram.com/hellofaraby" target="_blank" class="pe-1 text-primary">Hellofaraby</a></p>
                </div>
            </div>



        </div>
    </div>
    <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/sidebarmenu.js'); ?>"></script>
    <script src="<?= base_url('assets/js/app.min.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/apexcharts/dist/apexcharts.min.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/simplebar/dist/simplebar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dashboard.js'); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil tombol Pompa dan Lampu
            const pompaToggle = document.getElementById('pompaToggle');
            const lampuToggle = document.getElementById('lampuToggle');
            const waveMakerToggle = document.getElementById('waveMakerToggle');
            const kipasToggle = document.getElementById('kipasToggle');

            // Tombol On All dan Off All
            const onAll = document.getElementById('onAll');
            const offAll = document.getElementById('offAll');

            pompaToggle.addEventListener('click', function() {
                if (pompaToggle.innerText === 'Off') {
                    pompaToggle.innerText = 'On';
                    pompaToggle.classList.remove('btn-outline-primary');
                    pompaToggle.classList.add('btn-primary');
                } else {
                    pompaToggle.innerText = 'Off';
                    pompaToggle.classList.remove('btn-primary');
                    pompaToggle.classList.add('btn-outline-primary');
                }
            });

            lampuToggle.addEventListener('click', function() {
                if (lampuToggle.innerText === 'Off') {
                    lampuToggle.innerText = 'On';
                    lampuToggle.classList.remove('btn-outline-primary');
                    lampuToggle.classList.add('btn-primary');
                } else {
                    lampuToggle.innerText = 'Off';
                    lampuToggle.classList.remove('btn-primary');
                    lampuToggle.classList.add('btn-outline-primary');
                }
            });

            waveMakerToggle.addEventListener('click', function() {
                if (waveMakerToggle.innerText === 'Off') {
                    waveMakerToggle.innerText = 'On';
                    waveMakerToggle.classList.remove('btn-outline-primary');
                    waveMakerToggle.classList.add('btn-primary');
                } else {
                    waveMakerToggle.innerText = 'Off';
                    waveMakerToggle.classList.remove('btn-primary');
                    waveMakerToggle.classList.add('btn-outline-primary');
                }
            });

            kipasToggle.addEventListener('click', function() {
                if (kipasToggle.innerText === 'Off') {
                    kipasToggle.innerText = 'On';
                    kipasToggle.classList.remove('btn-outline-primary');
                    kipasToggle.classList.add('btn-primary');
                } else {
                    kipasToggle.innerText = 'Off';
                    kipasToggle.classList.remove('btn-primary');
                    kipasToggle.classList.add('btn-outline-primary');
                }
            });

            // Fungsi untuk menyalakan semua (Pompa dan Lampu)
            onAll.addEventListener('click', function() {
                // Pompa
                pompaToggle.innerText = 'On';
                pompaToggle.classList.remove('btn-outline-primary');
                pompaToggle.classList.add('btn-primary');

                // Lampu
                lampuToggle.innerText = 'On';
                lampuToggle.classList.remove('btn-outline-primary');
                lampuToggle.classList.add('btn-primary');

                // Wave Maker
                waveMakerToggle.innerText = 'On';
                waveMakerToggle.classList.remove('btn-outline-primary');
                waveMakerToggle.classList.add('btn-primary');

                // Kipas
                kipasToggle.innerText = 'On';
                kipasToggle.classList.remove('btn-outline-primary');
                kipasToggle.classList.add('btn-primary');
            });

            // Fungsi untuk mematikan semua (Pompa dan Lampu)
            offAll.addEventListener('click', function() {
                // Pompa
                pompaToggle.innerText = 'Off';
                pompaToggle.classList.remove('btn-primary');
                pompaToggle.classList.add('btn-outline-primary');

                // Lampu
                lampuToggle.innerText = 'Off';
                lampuToggle.classList.remove('btn-primary');
                lampuToggle.classList.add('btn-outline-primary');

                // Wave Maker
                waveMakerToggle.innerText = 'Off';
                waveMakerToggle.classList.remove('btn-primary');
                waveMakerToggle.classList.add('btn-outline-primary');

                // Kipas
                kipasToggle.innerText = 'Off';
                kipasToggle.classList.remove('btn-primary');
                kipasToggle.classList.add('btn-outline-primary');
            });
        });
    </script>
</body>
</html>