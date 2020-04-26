<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once('template/header_start.php');
?>
<link rel="stylesheet" href="<?= base_url('assets/plugins/select2/css/select2.min.css') ?>" type="text/css">
<link rel="stylesheet" href="<?= base_url('assets/plugins/datetimepicker-master/build/jquery.datetimepicker.min.css') ?>">

<!-- Load Fullclender.io plugins -->
<link href="<?php echo base_url('assets/plugins/fullcalendar/packages/core/main.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/plugins/fullcalendar/packages/daygrid/main.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/plugins/fullcalendar/packages/bootstrap/main.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/plugins/fullcalendar/packages/timegrid/main.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/plugins/fullcalendar/packages/list/main.css'); ?>" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/core/main.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/interaction/main.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/daygrid/main.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/bootstrap/main.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/timegrid/main.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/list/main.js"></script>



<?php
include_once('template/header_end.php');
include_once('template/topbar.php');
?>

<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12 mb-2">
            <h4 class="text-muted">Daftar Appointment</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="m-b-20">
                <!-- Button trigger modal -->
                <button type="button" id="btn_baru" class="btn btn-teal waves-effect waves-light" data-toggle="modal" data-target="#appoint_modal">
                    <i class="fas fa-calendar-plus mr-2"></i> Appointment baru
                </button>
            </div>
        </div>
        <?= $this->session->flashdata('pesan') ?>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card m-b-20 p-3">
                <div class="card-block">
                    <div id="calendar"></div>
                    <div style='clear:both'></div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card mb-5 p-3">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12 m-b-20 text-center">
                            <h5>Daftar Appointment | <lable id="selected_date"><?php echo date('d M, Y'); ?></lable>
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="appointment_list">
                            <?php if ($ap_list) { ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Pasien</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Opsi</th>
                                    </tr>
                                    <?php
                                    $i = 1;
                                    foreach ($ap_list as $jadwal) { ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $jadwal['nama_p'] ?></td>
                                            <td><?= $jadwal['tanggal'] ?></td>
                                            <td><?= $jadwal['jam'] ?></td>
                                            <td>
                                                <a href="<?= base_url('pasien/profil/') . $jadwal['id_pasien'] ?>"><button type="button" class="btn btn-sm btn-outline-primary"><i class="far fa-user-cog"></i></button></a>
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-href="<?= base_url('appointment/hapus/') . $jadwal['id_appointment'] ?>" data-toggle="modal" data-target="#confirm-delete"><i class="far fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </table>
                            <?php } else {
                                echo '<h6 class="text-center">Tidak ada jadwal appointment pada tanggal ' . date('d M, Y') . '</h6>';
                            } ?>

                        </div>
                        <div class="col-md-12" id="list_baru" style="display : none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Appointment -->
    <div class="modal fade" id="appoint_modal" role="dialog" aria-labelledby="appointModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="appointModalLabel">Form appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="True">x</button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="row">
                            <a href="<?= base_url('pasien/baru') ?>"><button type="button" class="btn btn-teal waves-effect waves-light" style="margin-left:20px;"><i class="fa fa-plus"></i>&nbsp; Pasien baru</button></a>
                        </div>
                        <form class="p-3">
                            <div class="form-group row">
                                <label for="patient" class="col-form-label text-muted">Pasien</label>
                                <div class="input-group">
                                    <select class="form-control select" id="myselect2" name="id_pasien" required="">
                                        <option value='0'>Pilih</option>
                                        <?php foreach ($pasien as $row) { ?>
                                            <option value="<?= $row['id_pasien'] ?>"><?= $row['nama_p'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-form-label text-muted">Tanggal</label>
                                <div class="input-group">
                                    <input class="form-control dt" id="date" name="tanggal" required>
                                    <span class="input-group-addon "><i class="far fa-calendar-check fa-2x ml-1"></i></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="time" class="col-form-label text-muted">Jam</label>
                                <input id="time" name="jam" type="text" class="form-control dt" required>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <blockquote>
                                        <lable class="status">Silahkan pilih jadwal</lable>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="form-group row">
                                <button type="button" id="btn_tambah" class="btn btn-teal waves-effect waves-light">Buat Appoinment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi hapus appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Anda akan menghapus jadwal appointment pasien ini, tindakan ini tidak dapat dibatalkan.</p>
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

<?php include_once('template/footer_start.php') ?>

<!-- Load plugins -->
<script src="<?php echo base_url('assets/plugins/datetimepicker-master/jquery.datetimepicker.full.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/moment/moment.js'); ?>"></script>

<!-- <script src="<?php echo base_url('assets/js/appointment.js'); ?>"></script> -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['dayGrid', 'timeGrid', 'list', 'bootstrap', 'interaction'],
            themeSystem: 'bootstrap',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listMonth'
            },
            buttonText: {
                today: 'Hari ini',
                month: 'Bulan',
                list: 'List'
            },
            dateClick: function(info) {
                var tgl = info.dateStr;
                $('#selected_date').html(tgl);
                $('#appointment_list').hide();
                $('#list_baru').show();
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('appointment/getJadwalTgl') ?>',
                    dataType: 'json',
                    data: {
                        tgk: tgl
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $('#list_baru').html('<h6 class="text-center">Tidak ada jadwal appointment pada tanggal ini</h6>')
                        } else {
                            var j = 1;
                            var table = '<table class="table table-bordered"><tr><th>No</th><th>Pasien</th><th>Tanggal</th><th>Jam</th><th>Opsi</th></tr>';
                            $.each(data, function(i, nama_p, tanggal, jam) {
                                table += "<tr><td>" + j + "</td><td>" + data[i].nama_p + "</td><td>" + data[i].tanggal +
                                    "</td><td>" + data[i].jam + "</td><td><a href='<?= base_url('pasien/profil/') ?>" + data[i].id_pasien +
                                    "'> <button type ='button' class='btn btn-sm btn-outline-primary'> <i class='far fa-user-cog'></i></button> </a><button type='button' class='btn btn-sm btn-outline-primary' data-href='<?= base_url('appointment/hapus/') ?>" +
                                    data[i].id_appointment + "' data-toggle='modal' data-target='#confirm-delete'><i class='far fa-trash'></i></button></td></tr>";
                                j++;
                            });
                            $('#list_baru').html(table);
                        }
                    },
                    error: function(data) {
                        alert('oops! Terjadi kesalahan dalam memproses.');
                    }
                });
            },
            weekNumbers: true,
            eventLimit: true,
            selectable: true,
            selectHelper: true,
            events: "<?= base_url('appointment/getJadwal') ?>",
        });

        calendar.render();
    });

    $(document).ready(function() {
        $('body').on('shown.bs.modal', '.modal', function() {
            $(this).find('select').each(function() {
                var dropdownParent = $(document.body);
                if ($(this).parents('.modal.in:first').length !== 0)
                    dropdownParent = $(this).parents('.modal.in:first');
                $(this).select2({
                    dropdownParent: dropdownParent
                    // ...
                });
            });
        });
        $('.select').select2();

        $('.dt').on('change', function() {
            // alert();
            $("#btn_tambah").removeAttr('disabled');
        });

        $('#btn_tambah').on('click', function(e) {
            e.preventDefault();
            var p_id = $('#myselect2').val();
            var date = $('#date').val();
            var time = $('#time').val();
            // alert(time);

            $.ajax({
                type: 'POST',
                url: '<?= base_url('appointment/tambah') ?>',
                dataType: 'json',
                data: {
                    p_id: p_id,
                    date: date,
                    time: time
                },
                success: function(data) {
                    if (data.status == 1) {
                        $(".status").css('color', 'red');
                        $(".status").text("Jadwal hari ini sudah di booking oleh pasien ini.");
                        $("#btn_tambah").prop('disabled', 'true');
                        //console.log('success');
                    } else if (data.status == 2) {
                        $(".status").css('color', 'red');
                        $(".status").text("Slot pada jam ini sudah di booking oleh pasien lain");
                    } else if (data.status == 3) {
                        $(".status").css('color', 'red');
                        $(".status").text("Terdapat masukkan yang tidak valid, Cek kembali formnya");
                    } else {
                        $(".status").css('color', 'green');
                        $(".status").text("Sukses menambahkan jadwal appointment pada hari ini");
                        setTimeout(() => {
                            location.reload(true)
                        }, 1500);
                    }
                },
                error: function(data) {
                    alert('oops! Terjadi kesalahan dalam memproses.');
                }
            });
        });
        $('#btn_baru').on('click', function() {
            $(".status").css('color', 'black');
            $(".status").text("Silahkan pilih jadwal");
        })
    });

    $('#time').datetimepicker({
        timepicker: true,
        datepicker: false,
        format: 'H:i',
        value: '09:45',
        hours12: true,
        step: 5,
        allowTimes: ['09:45', '10:30', '11:15', '13:00', '13:45', '14:30', '15:30', '16:15', '17:00', '19:00', '19:45', '20:15']
    })
    $('#date').datetimepicker({
        timepicker: false,
        datepicker: true,
        format: 'Y-m-d',
    })
</script>
<?php include_once('template/footer_end.php') ?>