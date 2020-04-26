<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("template/header_start.php")
?>
<!-- DataTables -->
<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php
include_once('template/header_end.php');
include_once('template/topbar.php');
?>
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12 mb-2">
            <h4 class="text-muted">Daftar Tagihan</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="m-b-20">
                <a href="<?= base_url('tagihan/tambah') ?>"><button type="button" class="btn btn-teal waves-effect waves-light"><i class="fa fa-plus"></i>&nbsp; Tagihan baru</button></a>
            </div>
        </div>
        <?= $this->session->flashdata('pesan') ?>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20 py-3">
                <div class="card-block">
                    <?php if ($tagihan) { ?>
                        <table class="table table-bordered datatable-init">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pasien</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($tagihan as $t) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $t['tanggal'] ?></td>
                                        <td><?= $t['nama_p'] ?></td>
                                        <td>Rp.
                                            <?php
                                            $jum = json_decode($t['jumlah_tagihan']);
                                            echo array_sum($jum);
                                            ?>
                                        </td>
                                        <td><?= $t['status_pembayaran'] ?></td>
                                        <td>
                                            <a href="<?= base_url('tagihan/cetak/') . $t['id_tagihan'] ?>"><button type="button" class="btn btn-sm btn-outline-primary">Cetak Tagihan</button></a>
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-href="<?= base_url('tagihan/hapus/') . $t['id_tagihan'] ?>" data-toggle="modal" data-target="#confirm-delete"><i class="far fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo "<h6 class='text-muted text-center'>Tidak ada data tagihan yang dapat ditampilkan.</h6>";
                    } ?>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi hapus data pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Anda akan menghapus data pasien ini, prosedur ini tidak dapat dibatalkan.</p>
                    <p>Apakah Anda ingin melanjutkan?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?php echo base_url(); ?>assets/js/datatables.init.js"></script>

<?php
include_once('template/footer_start.php');
include_once('template/footer_end.php')
?>