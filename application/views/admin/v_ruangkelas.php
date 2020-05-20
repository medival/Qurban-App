<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h3><?= $title; ?></h3>
                <div class="card-body">
                    <div class="buttons">
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahKelas">
                            <i class="fa fa-user-plus"></i> Tambah Kelas
                        </button>

                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahRuangan" id="btnModalTambahRuangan">
                            <i class="fa fa-university"></i> Tambah Ruang
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Ruang</th>
                                <th>ID Kelas</th>
                                <th>Kelas</th>
                                <th>Wali Kelas </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table_kelas">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section-body">
            </div>
    </section>
</div>
<!-- Modal Kelas -->
<div class="modal fade" tabindex="" role="dialog" id="modalTambahKelas">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tambah Kelas </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" class="needs-validation" novalidate="">
                <div class="modal-body">
                    <div class="form-group">
                        <label> Kelas ini akan ditempati siswa </label>
                        <div class="col-12 mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-university"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="inputkelas" id="inputkelas" required>
                                <div class="invalid-feedback">
                                    Oops! tambahkan kelas
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnAddKelas">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal End of Kelas -->

<!-- Modal Tambah Ruangan  -->
<div class="modal fade" tabindex="" role="dialog" id="modalTambahRuangan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tambah Ruangan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" class="needs-validation" novalidate="">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label"> Pilih Kelas </label>
                        <div class="col-10">
                            <select class="form-control select2 inputruang" style="width: 26.25rem" id="pkelas">
                            </select>
                        </div>
                    </div>
                    <div class=" form-group">
                        <label> Ruangan ini akan ditempati siswa </label>
                        <div class="col-12 mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-university"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="txtinputruang" id="txtinputruang" required>
                                <div class="invalid-feedback">
                                    Oops! tambahkan ruangan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnAddRuangan"> Tambah Ruang Kelas</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Ruangan  -->

<!-- Modal Edit Ruangan -->
<div class="modal fade" tabindex="" role="dialog" id="modalEditRuangan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Ruang </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" class="needs-validation" novalidate="">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label"> Pilih Kelas </label>
                        <div class="col-10">
                            <select class="form-control select2 inputruang" style="width: 26.25rem" id="ekelas">
                            </select>
                        </div>
                    </div>
                    <div class=" form-group">
                        <label> Ruangan ini akan ditempati siswa </label>
                        <div class="col-12 mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-university"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="editruang" id="editruang" required>
                                <div class="invalid-feedback">
                                    Oops! tambahkan ruangan
                                </div>
                                <input type="hidden" class="form-control" name="editidruang" id="editidruang" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnEditRuangan"> Simpan Data </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Edit Ruangan -->

<!-- Modal Delete Ruangan -->
<div class="modal fade" tabindex="" role="dialog" id="modalDeleteRuangan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Hapus Ruangan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p class="text-center"> Data yang dihapus tidak bisa dikembalikan? </p>
                    <input type="hidden" class="form-control" id="deleteid_ruang" name="deleteidruang">
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id="btnDeleteRuangan"> Hapus Data </button>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Delete Ruangan -->
<?php $this->load->view('admin/_partials/footer'); ?>

<script>
    $(document).ready(function() {

        show_kelas();

        $('#table1').dataTable();

        $('#table1').on('click', '.deleteruangkelas', function() {
            var id_ruang = $(this).data('id_ruang');

            $("#modalDeleteRuangan").modal('show');
            $('[name="deleteidruang"]').val(id_ruang);
        });


        $('#btnDeleteRuangan').on('click', function() {
            var id_ruang = $('#deleteid_ruang').val();
            // console.log(id_ruang);
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/deleteruangkelas'); ?>',
                dataType: 'JSON',
                data: {
                    id_ruang: id_ruang
                },
                success: function(data) {
                    $('[name="deleteidruang"]').val("");
                    $('#modalDeleteRuangan').modal('hide');
                    show_kelas();
                }
            })
        });

        $('#btnAddKelas').on('click', function() {
            var kelas = $('#inputkelas').val();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/inputkelas') ?>',
                dataType: 'JSON',
                data: {
                    kelas: kelas
                },
                success: function(data) {
                    $('[name="inputkelas"]').val("");
                    $('#modalTambahKelas').modal('hide');
                }
            })
        })

        $('#btnAddRuangan').on('click', function() {
            var id_kelas = $('#pkelas').find(":selected").val();
            var ruang = $('#txtinputruang').val();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/inputruangkelas') ?>',
                dataType: 'JSON',
                data: {
                    id_kelas: id_kelas,
                    ruang: ruang
                },
                success: function(data) {
                    $('#modalTambahRuangan').modal('hide');
                }
            })
            show_kelas();
        });

        $('#btnModalTambahRuangan').on('click', function() {
            func_pilihkelas();
        })

        function func_pilihkelas() {
            $.ajax({
                type: "ajax",
                url: "<?php echo site_url("admin/getkelaslist") ?>",
                async: false,
                dataType: "json",
                success: function(data) {
                    var html = '';
                    var ini = '<option></option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        ini;
                        html += '<option value="' + data[i].id_kelas + '">' + data[i].kelas + ' </option>';
                    }
                    $('#pkelas').html(ini + html);
                    $('#ekelas').html(ini + html);
                }
            })
            show_kelas();
        }


        $('#table1').on('click', '.editruangkelas', function() {
            func_pilihkelas();

            var id_ruang = $(this).data('id_ruang');
            var ruang = $(this).data('ruang');
            var id_kelas = $(this).data('id_kelas');

            $('#modalEditRuangan').modal('show');
            $('[name="editidruang"]').val(id_ruang);
            $('[name="editruang"]').val(ruang);
            document.getElementById('ekelas').value = id_kelas;
        })

        $('#btnEditRuangan').on('click', function() {

            var id_ruang = $('#editidruang').val();
            var ruang = $('#editruang').val();
            var id_kelas = $('#ekelas').find(':selected').val();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/updateruangkelas'); ?>',
                dataType: 'JSON',
                data: {
                    id_ruang: id_ruang,
                    ruang: ruang,
                    id_kelas: id_kelas
                },
                success: function(data) {
                    $('[name="editidruang"]').val("");
                    $('[name="editruang]').val("");
                    $('#modalEditRuangan').modal('hide');
                }
            })
            show_kelas();
            // console.log(ruang, id_ruang, id_kelas)
        })

        function show_kelas() {
            $.ajax({
                type: "ajax",
                url: "<?php echo base_url('admin/getruangkelas'); ?>",
                async: false,
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td style="width: 2rem">' + i + '</td>' +
                            '<td>' + `${data[i].id_ruang}` + '</td>' +
                            '<td>' + `${data[i].id_kelas}` + '</td>' +
                            '<td>' + `${data[i].kelas}` + ` ${data[i].ruang}` + '</td>' +
                            '<td>' + "Walikelas" + '</td>' +
                            '<td> <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary editruangkelas" data-id_ruang="' + data[i].id_ruang + '" data-id_kelas="' + data[i].id_kelas + '" data-ruang="' + data[i].ruang + '"><i class="fa fa-file-alt"></i> </a> ' +
                            '<a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-danger deleteruangkelas" data-id_ruang="' + data[i].id_ruang + '"> <i class="fa fa-trash"></i> </a></td> ' +
                            '</tr>';
                    }
                    $('#table_kelas').html(html);
                }
            })
        }

        $('.inputruang').select2({
            placeholder: "Pilih Kelas",
            allowClear: true
        });
    });
</script>