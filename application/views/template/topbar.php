<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <a class=" navbar-brand ml-md-4" href="<?= base_url('dashboard') ?>"><i class="fad fa-clinic-medical"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <nav class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-md-auto ml-md-auto text-md-center px-md-3">
            <li class="nav-item <?= ($this->uri->segment(1) == 'dashboard' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?= base_url('dashboard') ?>"><i class="fab fa-bandcamp"></i> Dashboard</a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'appointment' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?= base_url('appointment') ?>"><i class="fal fa-calendar-check"></i> Appointment</a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'resep' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?= base_url('resep') ?>"><i class="fal fa-mortar-pestle"></i> Resep</a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'tagihan' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?= base_url('tagihan') ?>"><i class="fal fa-file-invoice-dollar"></i> Tagihan</a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'pasien' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?= base_url('pasien') ?>"><i class="fal fa-user-injured"></i> Pasien</a>
            </li>
        </ul>
    </nav>
    <ul class="nav navbar-nav mr-md-4">
        <li class="dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                <i class="fad fa-user-md"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url('user') ?>"><i class="far fa-user-cog"></i> Profile</a>
                <a class="dropdown-item" href="<?= base_url('auth/kunci') ?>"><i class="fal fa-user-lock"></i> Kunci layar</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="fal fa-sign-out-alt"></i> Logout</a>
            </div>
        </li>
    </ul>
</nav>