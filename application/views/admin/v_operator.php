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
                                <input type="text" class="form-control inputNIP" name="inputNIP" id="inputNIP" placeholder="123.45.678910" required>
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

    <div class="modal fade" tabindex="" role="dialog" id="modalHapusNasabah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Hapus Nasabah </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p class="text-center"> Data yang dihapus tidak bisa dikembalikan? </p>
                        <input type="hidden" class="form-control" id="deleteNIS" name="deleteNIS">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="btnDeleteNasabah"> Hapus Data </button>
                </div>
            </div>
        </div>
    </div>
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

        

        $('#btnAddOperator').on('click', function(){
            var nip = $('#inputNIP').val();
            var nip = nip.replace('.', '')
            var nip = nip.replace('.', '')
            var nama = $('#inputNama').val();
            // var jenis_kelamin = document.querySelector('input[name="jenis_kelamin"]:checked').value;
            var jenis_kelamin = document.querySelector('input[name="jenis_kelamin"]:checked').value;
            var id_ruang = $('#pkelas').find(':selected').val();
            
            console.log(id_ruang);

            // $.ajax({
            //     type: 'POST',
            //     url: "<?= base_url('admin/inputoperator')?>",
            //     dataType: "JSON",
            //     data: {
            //         nip: nip,
            //         nama: nama,
            //         jenis_kelamin: jenis_kelamin,
            //         id_ruang: id_ruang
            //     }
            // })
        });



        $('#btnModalAddOperator').on('click', function() {
            $.ajax({
                type: "ajax",
                url: "<?= base_url('admin/getruangkelas');?>",
                async: false,
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    var selopt = "<option></option";
                    var i;
                    for (i=0; i < data.length; i++) {
                        selopt;
                        html += '<option value="' + data[i].id_ruang + '"> ' + data[i].kelas + data[i].id_ruang + '</option>';
                    }
                    // $('#pkelas').html(selopt);
                    $('#pkelas').html(selopt + html);
                }
            })
            show_operator();
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

        $('#btnAddNasabah').on('click', function() {

            var nis = $('#inputNIP').val();
            var nama = $('#inputNama').val();
            var alamat = $('#inputAlamat').val();
            var tempat_lahir = $('#inputTempatLahir').val();
            var tanggal_lahir = $('#inputTanggalLahir').val();
            var nama_ortu = $('#inputNamaOrtu').val();
            var kontak_orangtua = $('#inputKontakOrangTua').val();
            var kontak_orangtua = kontak_orangtua.replace(/\s/g, '');
            var kontak_orangtua = kontak_orangtua.replace(/\s/g, '');
            var id_ruang = "1";
            var jenis_kelamin = document.querySelector('input[name="jenis_kelamin"]:checked').value;

            $.ajax({
                type: 'POST',
                url: "<?= base_url('admin/inputnasabah'); ?>",
                dataType: "JSON",
                data: {
                    nis: nis,
                    nama: nama,
                    alamat: alamat,
                    tempat_lahir: tempat_lahir,
                    tanggal_lahir: tanggal_lahir,
                    nama_ortu: nama_ortu,
                    kontak_orangtua: kontak_orangtua,
                    id_ruang: id_ruang,
                    jenis_kelamin: jenis_kelamin,
                },
                success: function(data) {
                    $('[name="inputNIP"]').val("");
                    $('[name="inputNama"]').val("");
                    $('[name="inputAlamat"]').val("");
                    $('[name="inputTempatLahir"]').val("");
                    $('[name="inputTanggalLahir"]').val("");
                    $('[name="inputNamaOrtu"]').val("");
                    $('[name="inputKontakOrangTua"]').val("");
                    $('[name="inputKontakOrangTua"]').val("");
                    $('#modalTambahOperator').modal('hide');
                    show_operator();
                }
            })

            // console.log(nis, nama, alamat, tempat_lahir, tanggal_lahir, nama_ortu, kontak_orangtua, id_ruang, jenis_kelamin)
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
                        } else if(data[i].is_active =='0'){
                            var aktif = "Tidak Aktif";
                        }

                        html += '<tr>' +
                            '<td style="width: 2rem">' + i + '</td>' +
                            '<td>' + `${data[i].nip}` + '</td>' +
                            '<td>' + `${data[i].nama}` + '</td>' +
                            '<td>' + `${data[i].kelas}` + ` ${data[i].ruang}` + '</td>' +
                            '<td>' + epochtodate(data[i].created_at) + '</td>' +
                            '<td>' + `${aktif}` + '</td >' +
                            '<td> <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary editOperator" data-nip="' + data[i].nip + '" data-nama="' + data[i].nama + '" data-jenis_kelamin="' + data[i].jenis_kelamin + '" data-id_ruang="' + data[i].id_ruang +'"> <i class="fa fa-file-alt"></i> </a> ' +
                            '<a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-danger deleteOperator" data-nip="' + data[i].nip + '"> <i class="fa fa-trash"></i> </a></td> ' +
                            '</tr>';
                    }
                    $('#table_operator').html(html);
                }
            })
        }
    });
</script>