    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-purple mr-0 float-right"><i class="fad fa-calendar-alt"></i></span>
                    <div class="mini-stat-info">
                        <span class="text-purple"><?= $jumlah['appointment'] ?></span>
                        Jumlah Appointment
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i class="fad fa-user-injured"></i></span>
                    <div class="mini-stat-info">
                        <span class="text-blue-grey"><?= $jumlah['pasien'] ?></span>
                        Jumlah Pasien
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-brown mr-0 float-right"><i class="fad fa-file-invoice-dollar"></i></span>
                    <div class="mini-stat-info">
                        <span class="text-brown"><?= $jumlah['tagihan'] ?></span>
                        Jumlah Tagihan
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-teal mr-0 float-right"><i class="fad fa-wallet"></i></span>
                    <div class="mini-stat-info">
                        <span class="text-teal">Rp. <?= $jumlah['pendapatan'] ?></span>
                        Jumlah Pendapatan
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Grafik Appointment
                    </div>
                    <div class="card-body">
                        <div id="morris-bar-chart" style="height: 400px"></div>
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-lg-4 my-xs-4">
                <div class="card">
                    <div class="card-header">
                        Grafik Pembayaran
                    </div>
                    <div class="card-body">
                        <div id="morris-bar-chart" style="height: 400px"></div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row my-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body table-responsive-sm">
                        <h5 class="card-title">Pasien Terakhir</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No. Hp</th>
                                    <th scope="col">Usia</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/raphael.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/morris.min.js') ?>"></script>