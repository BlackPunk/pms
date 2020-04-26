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
            <h4 class="text-muted">Daftar Resep</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="m-b-20">
                <a href="<?= base_url('resep/tambah ') ?>"><button type="button" class="btn btn-teal waves-effect waves-light waves-effect waves-light"><i class="fa fa-plus"></i>&nbsp; Resep baru</button></a>
            </div>
        </div>
        <?php $this->session->flashdata('pesan');
        ?>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20 py-3">
                <div class="card-block">
                    <?php if (count($resep) > 0) { ?>
                        <table class="table table-bordered datatable-init">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pasien</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($resep as $r) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $r['tanggal'] ?></td>
                                        <td><?= $r['nama_p'] ?></td>
                                        <td>
                                            <a href="<?= base_url('resep/cetak/') . $r['id_resep'] ?>"><button type="button" class="btn btn-sm btn-outline-primary">Cetak Resep</button></a>
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-href="<?= base_url('resep/hapus/') . $r['id_resep'] ?>" data-toggle="modal" data-target="#confirm-delete"><i class="far fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo "<h6 class='text-center text-muted'>Tidak ada data resep yang dapat ditampilkan.</h6>";
                    } ?>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi hapus resep pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Anda akan menghapus resep pasien ini, prosedur ini tidak dapat dibatalkan.</p>
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