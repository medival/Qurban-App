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
                        <button href="<?= base_url('admin/tambahnasabah'); ?>" class="btn btn-outline-primary btn-icon icon-left" data-toggle="modal" data-target="#modalTambahNasabah">
                            <i class="fa fa-user-plus"></i> Tambah Nasabah
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
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Terdaftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table_nasabah">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" tabindex="" role="dialog" id="modalTambahNasabah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Tambah Nasabah </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="needs-validation" novalidate="">
                        <p class="text-muted"> Informasi Pribadi </p>
                        <div class="form-group">
                            <label for="" class=" col-form-label">NIS</label>
                            <div class="col-sm">
                                <input type="text" class="form-control inputNIS" name="inputNIS" id="inputNIS" placeholder="NIS" required>
                                <div class="invalid-feedback">
                                    Masukan NIS lengkap calon nasabah?
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class=" col-form-label">Nama Lengkap</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" nama="inputNama" id="inputNama" placeholder="Nama" required>
                                <div class="invalid-feedback">
                                    Masukan nama lengkap calon nasabah?
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-form-label">Alamat</label>
                            <div class="col-sm">
                                <textarea class="form-control" id="inputAlamat" name="inputAlamat" placeholder="Alamat" required></textarea>
                                <div class="invalid-feedback">
                                    Oops! masukan alamat nasabah
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
                            <label for="" class=" col-form-label"> Tempat Lahir </label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="inputTempatLahir" id="inputTempatLahir" placeholder="Tempat Lahir" required>
                                <div class="invalid-feedback">
                                    Masukan tempat lahir calon nasabah?
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class=" col-form-label"> Tanggal Lahir </label>
                            <div class="col-sm">
                                <input type="varchar" class="form-control inputTanggalLahir" id="inputTanggalLahir" placeholder="YYYY-MM-DD" required name="inputTanggalLahir">
                                <div class="invalid-feedback">
                                    Masukan tanggal lahir calon nasabah?
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class=" col-form-label"> Nama Orang Tua </label>
                            <div class="col-sm">
                                <input type="varchar" class="form-control" name="inputNamaOrtu" id="inputNamaOrtu" placeholder="Nama orangtua" required>
                                <div class="invalid-feedback">
                                    Masukan nama wali murid?
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">No Telefon Nama Orang Tua </label>
                            <div class="col-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control inputKontak" name="inputKontakOrangTua" id="inputKontakOrangTua" placeholder="08123456789" required>
                                    <div class="invalid-feedback">
                                        Oops! tambahkan kontak telefon
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"> Kelas </label>
                            <div class="col-10">
                                <select class="form-control select2" style="width: 26.25rem">
                                    <option>Kelas 1</option>
                                    <option>Kelas 2</option>
                                    <option>Kelas 3</option>
                                    <option>Kelas 4</option>
                                    <option>Kelas 5</option>
                                    <option>Kelas 6</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btnAddNasabah"> Simpan Data </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="" role="dialog" id="modalEditNasabah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Edit Data Nasabah </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="needs-validation" novalidate="">
                        <p class="text-muted"> Informasi Pribadi </p>
                        <div class="form-group">
                            <label for="" class=" col-form-label">NIS</label>
                            <div class="col-sm">
                                <input type="text" readonly class="form-control inputNIS" name="editNIS" id="editNIS" placeholder="NIS" required>
                                <div class="invalid-feedback">
                                    Masukan NIS lengkap calon nasabah?
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class=" col-form-label">Nama Lengkap</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="editNama" id="editNama" placeholder="Nama" required>
                                <div class="invalid-feedback">
                                    Masukan nama lengkap calon nasabah?
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-form-label">Alamat</label>
                            <div class="col-sm">
                                <textarea class="form-control" id="editAlamat" name="editAlamat" placeholder="Alamat" required></textarea>
                                <div class="invalid-feedback">
                                    Oops! masukan alamat nasabah
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label>
                            <div class="col-sm row ml-2">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="editLakiLaki" name="edit_jenis_kelamin" class="custom-control-input" required value="L">
                                    <label class="custom-control-label" for="editLakiLaki">Laki - Laki</label>
                                </div>
                                <div class="custom-control custom-radio ml-3">
                                    <input type="radio" id="editPerempuan" name="edit_jenis_kelamin" class="custom-control-input" required value="P">
                                    <label class="custom-control-label" for="editPerempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Oops! masukan jenis kelamin calon nasabah
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class=" col-form-label"> Tempat Lahir </label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="editTempatLahir" id="editTempatLahir" placeholder="Tempat Lahir" required>
                                <div class="invalid-feedback">
                                    Masukan tempat lahir calon nasabah?
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class=" col-form-label"> Tanggal Lahir </label>
                            <div class="col-sm">
                                <input type="varchar" class="form-control editTanggalLahir" id="editTanggalLahir" placeholder="YYYY-MM-DD" required name="editTanggalLahir">
                                <div class="invalid-feedback">
                                    Masukan tanggal lahir calon nasabah?
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class=" col-form-label"> Nama Orang Tua </label>
                            <div class="col-sm">
                                <input type="varchar" class="form-control" name="editNamaOrtu" id="editNamaOrtu" placeholder="Nama orangtua" required>
                                <div class="invalid-feedback">
                                    Masukan nama wali murid?
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">No Telefon Nama Orang Tua </label>
                            <div class="col-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control editKontak" name="editKontakOrangTua" id="editKontakOrangTua" placeholder="081 2345 6789" required>
                                    <div class="invalid-feedback">
                                        Oops! tambahkan kontak telefon
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"> Kelas </label>
                            <div class="col-10">
                                <select class="form-control select2" style="width: 26.25rem">
                                    <option>Kelas 1</option>
                                    <option>Kelas 2</option>
                                    <option>Kelas 3</option>
                                    <option>Kelas 4</option>
                                    <option>Kelas 5</option>
                                    <option>Kelas 6</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btnEditNasabah"> Update Data </button>
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

        show_nasabah();
        $('#table1').dataTable();

        var cleaveNIS = new Cleave('.inputNIS', {
            numericOnly: true,
            blocks: [4]
        })

        var cleaveTgl = new Cleave('.inputTanggalLahir', {
            date: true,
            delimiter: '-',
            datePattern: ['Y', 'm', 'd']
        })

        var cleaveTgl = new Cleave('.editTanggalLahir', {
            date: true,
            delimiter: '-',
            datePattern: ['Y', 'm', 'd']
        })

        var cleavePhone = new Cleave('.inputKontak', {
            numericOnly: true,
            delimiter: ' ',
            blocks: [4, 4, 4]
        })
        var cleavePhone = new Cleave('.editKontak', {
            numericOnly: true,
            delimiter: ' ',
            blocks: [4, 4, 4]
        })

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

        $('#table_nasabah').on('click', '.deleteNasabah', function() {
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
                    show_nasabah();
                }
            });
            return false;
        })

        $('#table_nasabah').on('click', '.editNasabah', function() {
            var nis = $(this).data('nis');
            var nama = $(this).data('nama');
            var alamat = $(this).data('alamat');
            var jenis_kelamin = $(this).data('jenis_kelamin');
            var tempat_lahir = $(this).data('tempat_lahir');
            var tanggal_lahir = $(this).data('tanggal_lahir');
            var nama_ortu = $(this).data('nama_ortu');
            var kontak_orangtua = $(this).data('kontak_orangtua');
            var id_ruang = $(this).data('id_ruang');

            // console.log(nis, nama, alamat, tempat_lahir, tanggal_lahir, nama_ortu, kontak_orangtua, id_ruang, jenis_kelamin)
            $('#modalEditNasabah').modal('show');
            $('[name="editNIS"]').val(nis);
            $('[name="editNama"]').val(nama);
            $('[name="editAlamat"]').val(alamat);
            $('[name="editTempatLahir"]').val(tempat_lahir);
            $('[name="editTanggalLahir"]').val(epochtodate(tanggal_lahir));
            $('[name="editNamaOrtu"]').val(nama_ortu);
            $('[name="editKontakOrangTua"]').val(kontak_orangtua);
            // console.log(jenis_kelamin);
            if (jenis_kelamin == "L") {
                document.getElementById("editLakiLaki").checked = true;
            } else if (jenis_kelamin == "P") {
                document.getElementById("editPerempuan").checked = true;
            }
        })

        $('#btnEditNasabah').on('click', function() {
            var nis = $('#editNIS').val();
            var nama = $('#editNama').val();
            var alamat = $('#editAlamat').val();
            var tempat_lahir = $('#editTempatLahir').val();
            var tanggal_lahir = $('#editTanggalLahir').val();
            var nama_ortu = $('#editNamaOrtu').val();
            var kontak_orangtua = $('#editKontakOrangTua').val();
            var kontak_orangtua = kontak_orangtua.replace(/\s/g, '');
            var kontak_orangtua = kontak_orangtua.replace(/\s/g, '');
            var id_ruang = "1";
            var jenis_kelamin = document.querySelector('input[name="edit_jenis_kelamin"]:checked').value;
            var tanggal_lahir1 = datetoepoch(tanggal_lahir);
            console.log(nis, nama, alamat, tempat_lahir, tanggal_lahir1, nama_ortu, kontak_orangtua, id_ruang, jenis_kelamin)
            $.ajax({
                type: 'POST',
                url: "<?= base_url('admin/updatenasabah'); ?>",
                dataType: "JSON",
                data: {
                    nis: nis,
                    nama: nama,
                    alamat: alamat,
                    jenis_kelamin: jenis_kelamin,
                    tempat_lahir: tempat_lahir,
                    tanggal_lahir: tanggal_lahir1,
                    nama_ortu: nama_ortu,
                    kontak_orangtua: kontak_orangtua,
                    id_ruang: id_ruang,
                },
                success: function(data) {
                    // $('[name="editNIS"]').val("");
                    // $('[name="editNama"]').val("");
                    // $('[name="editAlamat"]').val("");
                    // $('[name="editTempatLahir"]').val("");
                    // $('[name="editTanggalLahir"]').val("");
                    // $('[name="editNamaOrtu"]').val("");
                    // $('[name="editKontakOrangTua"]').val("");
                    // $('[name="edit_jenis_kelamin"]').checked = false;
                    $("#modalEditNasabah").modal('hide');
                    show_nasabah();
                }
            })
        })

        $('#btnAddNasabah').on('click', function() {

            var nis = $('#inputNIS').val();
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
                    $('[name="inputNIS"]').val("");
                    $('[name="inputNama"]').val("");
                    $('[name="inputAlamat"]').val("");
                    $('[name="inputTempatLahir"]').val("");
                    $('[name="inputTanggalLahir"]').val("");
                    $('[name="inputNamaOrtu"]').val("");
                    $('[name="inputKontakOrangTua"]').val("");
                    $('[name="inputKontakOrangTua"]').val("");
                    $('#modalTambahNasabah').modal('hide');
                    show_nasabah();
                }
            })

            // console.log(nis, nama, alamat, tempat_lahir, tanggal_lahir, nama_ortu, kontak_orangtua, id_ruang, jenis_kelamin)
        })

        function show_nasabah() {
            $.ajax({
                type: "ajax",
                url: "<?php echo base_url('admin/data_nasabah'); ?>",
                async: false,
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        if (data[i].is_active == '1') {
                            var aktif = "Aktif";
                        }
                        html += '<tr>' +
                            '<td style="width: 2rem">' + i + '</td>' +
                            '<td>' + `${data[i].nis}` + '</td>' +
                            '<td>' + `${data[i].nama}` + '</td>' +
                            '<td>' + 'kelas' + '</td>' +
                            '<td>' + epochtodate(data[i].created_at) + '</td>' +
                            '<td>' + `${aktif}` + '</td >' +
                            '<td> <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary editNasabah" data-nis="' + data[i].nis + '" data-nama="' + data[i].nama + '" data-jenis_kelamin="' + data[i].jenis_kelamin + '" data-tempat_lahir="' + data[i].tempat_lahir + '" data-tanggal_lahir="' + data[i].tanggal_lahir + '" data-alamat="' + data[i].alamat + '" data-nama_ortu="' + data[i].nama_ortu + '" data-kontak_orangtua="' + `${data[i].kontak_orangtua}` + '" data-id_ruang="' + `${data[i].id_ruang}` + '"> <i class="fa fa-file-alt"></i> </a> ' +
                            '<a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-danger deleteNasabah" data-nis="' + data[i].nis + '"> <i class="fa fa-trash"></i> </a></td> ' +
                            '</tr>';
                    }
                    $('#table_nasabah').html(html);
                }
            })
        }
    });
</script>