<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once('template/header_start.php');
?>
<link rel="stylesheet" href="<?= base_url('assets/css/morris.css') ?>">
<?php
include_once('template/header_end.php');
include_once('template/topbar.php');
?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <h4 class="text-muted">Dashboard</h4>
        </div>
    </div>
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
                    <div id="morris-donut-chart" style="height: 400px"></div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row my-4">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-responsive-sm">
                    <?php if ($pasien) { ?>
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
                                <?php
                                $i = 1;
                                foreach ($pasien as $p) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $p['nama_p'] ?></td>
                                        <td><?= $p['no_hp'] ?></td>
                                        <td><?= $p['usia'] ?></td>
                                        <td><?= $p['alamat'] ?></td>
                                        <td><a href="<?= base_url('pasien/profil/') . $p['id_pasien'] ?>"><button type="button" class="btn btn-sm btn-outline-primary"><i class="far fa-user-cog"></i></button></a></td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo '<h5 class="card-title">Belum ada pasien yang terdaftar</h5>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('template/footer_start.php') ?>
<script src="<?= base_url('assets/js/raphael.min.js') ?>"></script>
<script src="<?= base_url('assets/js/morris.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '<?= base_url('dashboard/chartappointment') ?>',
            dataType: 'json',
            success: function(data) {

                var list = [];
                for (var i = 0; i <= data.length - 1; i++) {
                    list[i] = {
                        y: data[i].bulan,
                        a: data[i].total
                    };
                }

                Morris.Bar({
                    element: 'morris-bar-chart',
                    data: list,
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Jumlah Appointment'],
                    gridLineColor: '#eef0f2',
                    barSizeRatio: 0.4,
                    xLabelAngle: 35,
                    resize: true,
                    hideHover: 'auto',
                    barColors: ['#6983aa']
                });
            },
            error: function(data) {
                console.log(data);
            }
        });

        $.ajax({
            url: '<?= base_url('dashboard/charttagihan') ?>',
            dataType: 'json',
            success: function(data) {

                var tagihan = [];
                for (var i = 0; i <= data.length - 1; i++) {
                    tagihan[i] = {
                        label: data[i].status,
                        value: data[i].total
                    };
                }

                Morris.Donut({
                    element: 'morris-donut-chart',
                    data: tagihan,
                    resize: true,
                    colors: ['#6983aa', '#8566aa']
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>
<?php include_once('template/footer_end.php') ?>