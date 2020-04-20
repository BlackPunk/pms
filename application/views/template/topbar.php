<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <a class=" navbar-brand ml-md-4" href="<?= base_url('dashboard') ?>"><i class="fad fa-clinic-medical"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-md-auto ml-md-auto text-md-center px-md-3">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard') ?>"><i class="fab fa-bandcamp"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard/appointment') ?>"><i class="fal fa-calendar-check"></i> Appointment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard/resep') ?>"><i class="fal fa-mortar-pestle"></i> Resep</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fal fa-file-invoice-dollar"></i> Tagihan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard/pasien') ?>"><i class="fal fa-user-injured"></i> Pasien</a>
            </li>
        </ul>
    </div>
    <ul class="nav navbar-nav mr-md-4">
        <li class="dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                <i class="fad fa-user-md"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"><i class="far fa-user-cog"></i> Profile</a>
                <a class="dropdown-item" href="#"><i class="fal fa-user-lock"></i> Kunci layar</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="fal fa-sign-out-alt"></i> Logout</a>
            </div>
        </li>
    </ul>
</nav>