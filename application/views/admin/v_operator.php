<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h3> <?= $title; ?> </h3>
                <div class="card-body">
                    <div class="buttons">
                        <button href="<?= base_url('admin/tambahnasabah'); ?>" class="btn btn-outline-primary btn-icon icon-left" data-toggle="modal" data-target="#modalTambahOperator" id="btnModalAddOperator">
                            <i class="fa fa-user-plus"></i> Tambah Data Operator
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
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Terdaftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table_operator">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Tambah Operator -->
    <div class="modal fade" tabindex="" role="dialog" id="modalTambahOperator">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Tambah Data Operator </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="needs-validation" novalidate="">
                        <p class="text-muted"> Informasi Pribadi </p>
                        <div class="form-group">
                            <label for="" class=" col-form-label">NIP</label>
                            <div class="col-sm">
                                <input type="text" class="form-control inputNIP" name="inputNIP" id="inputNIP" placeholder="123.45.678910" required minlength="12">
                                <div class="invalid-feedback">
                                    Masukan NIP lengkap operator?
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class=" col-form-label">Nama Lengkap</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" nama="inputNama" id="inputNama" placeholder="Nama" required>
                                <div class="invalid-feedback">
                                    Masukan nama lengkap operator?
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label>
                            <div class="col-sm row ml-2">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="inputLakiLaki" name="jenis_kelamin" class="custom-control-input" required value="L">
                                    <label class="custom-control-label" for="inputLakiLaki">Laki - Laki</label>
                                </div>
                                <div class="custom-control custom-radio ml-3">
                                    <input type="radio" id="inputPerempuan" name="jenis_kelamin" class="custom-control-input" required value="P">
                                    <label class="custom-control-label" for="inputPerempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Oops! masukan jenis kelamin calon nasabah
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label"> Kelas </label>
                            <div class="col-10">
                                <select class="form-control select2 inputkkelas" style="width: 26.25rem" id="pkelas">
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btnAddOperator"> Simpan Data </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Tambah Operator -->

    <!-- Modal Edit Operator -->
    <div class="modal fade" tabindex="" role="dialog" id="modalEditOperator">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Edit Data Operator </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="needs-validation" novalidate="">
                        <p class="text-muted"> Informasi Pribadi </p>
                        <div class="form-group">
                            <label for="" class=" col-form-label">NIP</label>
                            <div class="col-sm">
                                <input type="text" class="form-control editNIP" name="editNIP" id="editNIP" placeholder="123.45.678910" required minlength="12">
                                <div class="invalid-feedback">
                                    Masukan NIP lengkap operator?
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class=" col-form-label">Nama Lengkap</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="editNama" id="editNama" placeholder="Nama" required>
                                <div class="invalid-feedback">
                                    Masukan nama lengkap operator?
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label>
                            <div class="col-sm row ml-2">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="editLakiLaki" name="jenis_kelamin" class="custom-control-input" required value="L">
                                    <label class="custom-control-label" for="editLakiLaki">Laki - Laki</label>
                                </div>
                                <div class="custom-control custom-radio ml-3">
                                    <input type="radio" id="editPerempuan" name="jenis_kelamin" class="custom-control-input" required value="P">
                                    <label class="custom-control-label" for="editPerempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Oops! masukan jenis kelamin calon nasabah
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label"> Kelas </label>
                            <div class="col-10">
                                <select class="form-control select2 inputkkelas" style="width: 26.25rem" id="ekelas">
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btnEditOperator"> Update Data </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Edit Operator -->

    <!-- Modal Delete Operator -->
    <div class="modal fade" tabindex="" role="dialog" id="modalDeleteOperator">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Data Operator </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p class="text-center"> Data yang dihapus tidak bisa dikembalikan? </p>
                        <input type="text" class="form-control" id="deleteNIP" name="deleteNIP">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id="btnDeleteOperator"> Hapus Data </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Delete Operator -->
</div>

<?php $this->load->view('admin/_partials/footer'); ?>
<script>
    $(document).ready(function() {

        show_operator();
        $('#table1').dataTable();

        var cleaveNIP = new Cleave('.inputNIP', {
            numericOnly: true,
            delimiter: '.',
            blocks: [3, 2, 7]
        })

        $('.inputkkelas').select2({
            placeholder: "Pilih Kelas",
            allowClear: true
        });

        function epochtodate(epoch) {

            // Months array
            var months_arr = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

            // Date array
            // var date_arr = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];

            // Convert timestamp to milliseconds
            var date = new Date(epoch * 1000);

            // Year
            var year = date.getFullYear();

            // Month
            var month = months_arr[date.getMonth()];

            // Day
            var day = date.getDate();

            // Display date time in MM-dd-yyyy h:m:s format
            // return convdataTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
            return convdataTime = year + '-' + month + '-' + day;
        }

        function datetoepoch(date) {
            return new Date(date).getTime() / 1000;
        }
        $('#table_operator').on('click', '.deleteOperator', function() {
            var nip = $(this).data('nip');

            $('#modalDeleteOperator').modal('show');
            $('[name="deleteNIP"]').val(nip);

            console.log(nip);
        })

        $('#btnDeleteOperator').on('click', function() {
            var nip = $('#deleteNIP').val();
            console.log(nip);

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('admin/deletedataoperator') ?>",
                dataType: 'JSON',
                data: {
                    nip: nip
                },
                success: function(data) {
                    $('#modalDeleteOperator').modal('hide');
                    show_operator();
                }
            });
            return false;
        })

        $('#table_operator').on('click', '.editOperator', function() {
            var nip = $(this).data('nip');
            var nama = $(this).data('nama');
            var jenis_kelamin = $(this).data('jenis_kelamin');
            var id_ruang = $(this).data('id_ruang');

            // console.log(nip, nama, jenis_kelamin, id_ruang)

            $('#modalEditOperator').modal('show');
            pilihkelas();
            $('[name="editNIP"]').val(nip);
            $('[name="editNama"]').val(nama);
            if (jenis_kelamin == "L") {
                document.getElementById("editLakiLaki").checked = true;
            } else if (jenis_kelamin == "P") {
                document.getElementById("editPerempuan").checked = true;
            }
            document.getElementById('ekelas').value = id_ruang;
        });

        $('#btnAddOperator').on('click', function() {
            var nip = $('#inputNIP').val();
            var nip = nip.replace('.', '')
            var nip = nip.replace('.', '')
            var nama = $('#inputNama').val();
            var jenis_kelamin = document.querySelector('input[name="jenis_kelamin"]:checked').value;
            var id_ruang = $('#pkelas').find(':selected').val();

            $.ajax({
                type: 'POST',
                url: "<?= base_url('admin/inputoperator') ?>",
                dataType: "JSON",
                data: {
                    nip: nip,
                    nama: nama,
                    jenis_kelamin: jenis_kelamin,
                    id_ruang: id_ruang
                },
                success: function(data) {
                    $('#modalTambahOperator').modal('hide');
                    show_operator();
                }
            })
            return false;
        });

        $('#btnEditOperator').on('click', function() {
            var nip = $('#editNIP').val();
            var nama = $('#editNama').val();
            var jenis_kelamin = document.querySelector('input[name="jenis_kelamin"]:checked').value;
            var id_ruang = $('#ekelas').find(':selected').val();

            $.ajax({
                type: 'POST',
                url: "<?= base_url('admin/updateoperator'); ?>",
                dataType: "JSON",
                data: {
                    nip: nip,
                    nama: nama,
                    jenis_kelamin: jenis_kelamin,
                    id_ruang: id_ruang
                },
                success: function(data) {
                    $('#modalEditOperator').modal('hide');
                    show_operator();
                }
            })
            return false;
        });

        function pilihkelas() {
            $.ajax({
                type: "ajax",
                url: "<?= base_url('admin/getruangkelas'); ?>",
                async: false,
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    var ini = '<option></option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        ini;
                        html += '<option value="' + data[i].id_ruang + '"> ' + data[i].kelas + ' ' + data[i].ruang + '</option>';
                    }
                    $('#pkelas').html(ini + html);
                    $('#ekelas').html(ini + html);
                }
            })
            show_operator();
        }

        $('#btnModalAddOperator').on('click', function() {
            pilihkelas();
        });

        $('#table_operator').on('click', '.deleteNasabah', function() {
            var nis = $(this).data('nis');

            $('#modalHapusNasabah').modal('show');
            $('[name="deleteNIS"]').val(nis);
        })

        $('#btnDeleteNasabah').on('click', function() {
            var nis = $('#deleteNIS').val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/deletenasabah') ?>",
                dataType: "JSON",
                data: {
                    nis: nis
                },
                success: function(data) {
                    $('[name="deleteNIS"]').val("");
                    $('#modalHapusNasabah').modal('hide');
                    show_operator();
                }
            });
            return false;
        })

        function show_operator() {
            $.ajax({
                type: "ajax",
                url: "<?php echo base_url('admin/listoperator'); ?>",
                async: false,
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        if (data[i].is_active == '1') {
                            var aktif = "Aktif";
                        } else if (data[i].is_active == '0') {
                            var aktif = "Tidak Aktif";
                        }

                        html += '<tr>' +
                            '<td style="width: 2rem">' + i + '</td>' +
                            '<td>' + `${data[i].nip}` + '</td>' +
                            '<td>' + `${data[i].nama}` + '</td>' +
                            '<td>' + `${data[i].kelas}` + ` ${data[i].ruang}` + '</td>' +
                            '<td>' + epochtodate(data[i].created_at) + '</td>' +
                            '<td>' + `${aktif}` + '</td >' +
                            '<td> <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary editOperator" data-nip="' + data[i].nip + '" data-nama="' + data[i].nama + '" data-jenis_kelamin="' + data[i].jenis_kelamin + '" data-id_ruang="' + data[i].id_ruang + '"> <i class="fa fa-file-alt"></i> </a> ' +
                            '<a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-danger deleteOperator" data-nip="' + data[i].nip + '"> <i class="fa fa-trash"></i> </a></td> ' +
                            '</tr>';
                    }
                    $('#table_operator').html(html);
                }
            })
        }
    });
</script>