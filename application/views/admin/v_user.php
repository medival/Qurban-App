<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h3><?= $title; ?></h3>
                <div class="card-body">
                    <div class="buttons">
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahUser" id="tambahUser">
                            <i class="fa fa-user-plus"></i> Tambah User
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
                                <th>Email</th>
                                <th>Hak Akses </th>
                                <th>Walikelas </th>
                                <th>Status </th>
                                <th>Create </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tb_user">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section-body">
            </div>
    </section>
</div>

<!-- Modal Tambah User -->
<div class="modal fade" tabindex="" role="dialog" id="modalTambahUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tambah Data Operator </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="needs-validation" novalidate="">
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
                        <label class="col-form-label"> Kelas </label>
                        <div class="col-10">
                            <select class="form-control select2 inputkelas required" style="width: 26.25rem" id="pkelas">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class=" col-form-label">Email</label>
                        <div class="col-sm">
                            <input type="email" class="form-control" nama="inputEmail" id="inputEmail" placeholder="Email" required>
                            <div class="invalid-feedback">
                                Masukan valid email
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class=" col-form-label">Password</label>
                        <div class="col-sm">
                            <input type="password" class="form-control" nama="inputPassword" id="inputPassword" placeholder="Password" required minlength="5">
                            <div class="invalid-feedback">
                                Masukan password
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label"> Hak Akses </label>
                        <div class="col-10">
                            <select class="form-control select2 inputRole required" style="width: 26.25rem" id="pRole" required>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnAddUser"> Tambah User </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah User -->

<!-- Modal Edit User -->
<div class="modal fade" tabindex="" role="dialog" id="modalEditUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Data User </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="needs-validation" novalidate="">
                    <p class="text-muted"> Informasi Pribadi </p>
                    <div class="form-group">
                        <label for="" class=" col-form-label">NIP</label>
                        <div class="col-sm">
                            <input type="hidden" class="form-control editid" name="editid" id="editid">
                            <input type="text" class="form-control editNIP" name="editNIP" id="editNIP" placeholder="123.45.678910" required minlength="12">
                            <div class="invalid-feedback">
                                Masukan NIP lengkap operator?
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class=" col-form-label">Nama Lengkap</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="editNama" id="editNama" required>
                            <div class="invalid-feedback">
                                Masukan nama lengkap operator?
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label"> Kelas </label>
                        <div class="col-10">
                            <select class="form-control select2 editRuang required" style="width: 26.25rem" id="eRuang">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class=" col-form-label">Email</label>
                        <div class="col-sm">
                            <input type="email" class="form-control" name="editEmail" id="editEmail" placeholder="Email" required>
                            <div class="invalid-feedback">
                                Masukan valid email
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label"> Hak Akses </label>
                        <div class="col-10">
                            <select class="form-control select2 editRole required" style="width: 26.25rem" id="eRole" required>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnUpdateUser"> Update User </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Edit User -->

<!-- Modal Delete User -->
<div class="modal fade" tabindex="" role="dialog" id="modalDeleteUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Delete User </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p class="text-center"> Data yang dihapus tidak bisa dikembalikan? </p>
                    <input type="hidden" class="form-control" id="deleteIdUser" name="deleteIdUser">
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id="btnDeleteUser"> Hapus Data </button>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Delete User -->
<?php $this->load->view('_partials/footer'); ?>

<script>
    $(document).ready(function() {
        show_user();

        $('#table1').dataTable();

        var cleaveNIP = new Cleave('.inputNIP', {
            numericOnly: true,
            blocks: [3, 2, 7],
            delimiter: '.'
        })

        var cleaveNIP2 = new Cleave('.editNIP', {
            numericOnly: true,
            blocks: [3, 2, 7],
            delimiter: '.'
        })

        $('.inputkelas').select2({
            placeholder: "Pilih Kelas",
            allowClear: true
        })

        $('.inputRole').select2({
            placeholder: "Pilih Hak Akses",
            allowClear: true
        })

        $('.editRole').select2({
            placeholder: "Pilih untuk ganti",
            allowClear: true
        })

        $('.editRuang').select2({
            placeholder: "Pilih untuk ganti",
            allowClear: true
        })

        $('#tambahUser').on('click', function() {
            getkelaslist();
            getrole();
        })

        $('#modalUpdateUser').on('hidden.bs.modal', function() {
            $('#editid').val("");
            $('#editNIP').val("");
            $('#editname').val("");
            $('#editEmail').val("");
        });

        $('#tb_user').on('click', '.editUser', function() {
            var id = $(this).data('id');
            var nip = $(this).data('nip');
            var name = $(this).data('name');
            var id_ruang = $(this).data('id_ruang')
            var email = $(this).data('email');
            var role = $(this).data('role');

            console.log(nip, name, id_ruang, email, role)
            $('#modalEditUser').modal('show');
            getkelaslist();
            getrole();
            $('[name="editid"]').val(id);
            $('[name="editNIP"]').val(nip);
            $('[name="editNama"]').val(name);
            $('[name="editEmail"]').val(email);
            document.getElementById('eRole').value = role;
            document.getElementById('eRuang').value = id_ruang;
        });

        $('#tb_user').on('click', '.deleteUser', function() {
            var id = $(this).data('id');
            $('#modalDeleteUser').modal('show');
            $('[name="deleteIdUser"]').val(id);
        })

        $('#btnDeleteUser').on('click', function() {
            var id = $('#deleteIdUser').val();

            $.ajax({
                type: 'post',
                url: '<?= base_url('admin/deleteuser') ?>',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#modalDeleteUser').modal('hide');
                    show_user();
                }
            })
            return false;
        })

        $('#btnUpdateUser').on('click', function() {
            var id = $('#editid').val();
            var nip = $('#editNIP').val();
            var nip = nip.replace('.', '')
            var nip = nip.replace('.', '')
            var name = $('#editNama').val();
            var email = $('#editEmail').val();
            var role = $('#eRole').find(':selected').val();
            var id_ruang = $('#eRuang').find(':selected').val();

            // console.log(id, nip, name, id_ruang, email, role)
            $.ajax({
                type: 'post',
                url: '<?= base_url('admin/edituser'); ?>',
                dataType: 'JSON',
                data: {
                    id: id,
                    nip: nip,
                    name: name,
                    email: email,
                    role: role,
                    id_ruang: id_ruang
                },
                success: function(data) {
                    console.log(data);
                    $('#modalEditUser').modal('hide');
                    show_user();
                }
            });
            return false;
        })

        $('#table1').on('click', '.deletekelas', function() {
            var id_kelas = $(this).data('id_kelas');

            $("#modalDeleteKelas").modal('show');
            $('[name="deleteidkelas"]').val(id_kelas);
        });

        $('#btnAddUser').on('click', function() {
            var nip = $('#inputNIP').val();
            var nip = nip.replace('.', '')
            var nip = nip.replace('.', '')
            var nama = $('#inputNama').val();
            var id_ruang = $('#pkelas').find(':selected').val();
            var email = $('#inputEmail').val();
            var password = $('#inputPassword').val();
            var role = $('#pRole').find(':selected').val();

            console.log(nip, nama, id_ruang, email, password, role)

            $.ajax({
                type: 'post',
                url: '<?= base_url('admin/adduser') ?>',
                dataType: 'JSON',
                data: {
                    nip: nip,
                    nama: nama,
                    id_ruang: id_ruang,
                    email: email,
                    password: password,
                    role: role
                },
                success: function(data) {
                    $('#modalTambahUser').modal('hide');
                    show_user();
                }
            })
            return false;
        });

        $('#table1').on('click', '.editkelas', function() {

            var id_kelas = $(this).data('id_kelas');
            var kelas = $(this).data('kelas');

            $('#modalEditKelas').modal('show');
            $('[name="editIdKelas"]').val(id_kelas);
            $('[name="editKelas"]').val(kelas);
        })

        $('#btnUpdateKelas').on('click', function() {
            var kelas = $('#editKelas').val();
            var id_kelas = $('#editIdKelas').val();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/updatedatakelas'); ?>',
                dataType: 'JSON',
                data: {
                    id_kelas: id_kelas,
                    kelas: kelas
                },
                success: function(data) {
                    // $('[name="editIdKelas"]').val("");
                    // $('[name="editKelas"]').val("");
                    $("#modalEditKelas").modal('hide');
                    show_kelas();
                }
            })
            return false;
        })

        function show_kelas() {
            $.ajax({
                type: "ajax",
                url: "<?php echo base_url('admin/getkelaslist'); ?>",
                async: false,
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + i + '</td>' +
                            '<td>' + `${data[i].id_kelas}` + '</td>' +
                            '<td>' + `${data[i].kelas}` + '</td>' +
                            '<td>' + "Walikelas" + '</td>' +
                            '<td> <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary editkelas" data-id_kelas="' + data[i].id_kelas + '" data-kelas="' + data[i].kelas + '"><i class="fa fa-file-alt"></i> </a> <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-danger deletekelas" data-id_kelas="' + data[i].id_kelas + '"> <i class="fa fa-trash"></i> </a></td> ' +
                            '</tr>';
                    }
                    $('#table_kelas').html(html);
                }
            })
            return false;
        }

        function getkelaslist() {
            $.ajax({
                type: "ajax",
                url: '<?= base_url('admin/getAllruangkelas') ?>',
                async: false,
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    var i;
                    var ini = '<option></option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + `${data[i].id_ruang}` + '"> ' + `${data[i].kelas}` + ' ' +
                            `${data[i].ruang}` + '</option>'
                    }
                    $('#pkelas').html(ini + html);
                    $('#eRuang').html(ini + html);
                }
            })
        }

        function getrole() {
            $.ajax({
                type: "ajax",
                url: '<?= base_url('admin/getrole'); ?>',
                async: false,
                dataType: 'JSON',
                success: function(data) {
                    var html = '';
                    var i;
                    var ini = '<option></option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_role + '"> ' + data[i].role_name + '</option>';
                    }
                    $('#pRole').html(ini + html);
                    $('#eRole').html(ini + html);
                }
            })
        }

        function show_user() {
            $.ajax({
                type: 'ajax',
                url: '<?= base_url('admin/getuser') ?>',
                async: false,
                dataType: 'JSON',
                success: function(data) {
                    // console.log
                    var html = '';
                    var no = 1;
                    var i;
                    for (i = 0; i < data.length; i++) {
                        if (data[i].is_active == 1) {
                            var is_active = "Aktif"
                        } else if (data[i].is_active == 0) {
                            var is_active = "Nonaktif"
                        }
                        var id = data[i].id;
                        var name = data[i].name;
                        var nip = data[i].nip;
                        var email = data[i].email;
                        var role = data[i].role;
                        var id_ruang = data[i].id_ruang;
                        var created_at = data[i].created_at;
                        html += '<tr>' +
                            '<td> ' + no++ + '</td>' +
                            '<td> ' + nip + '</td>' +
                            '<td> ' + name + '</td>' +
                            '<td> ' + email + '</td>' +
                            '<td> ' + role + '</td>' +
                            '<td>' + id_ruang + '</td>' +
                            '<td>' + is_active + '</td>' +
                            '<td>' + created_at + '</td>' +
                            '<td>' +
                            '<a href="javascript:void(0);"  class="btn btn-icon icon-left btn-outline-primary editUser" data-id="' + id + '" data-nip="' + nip + '" data-name="' + name + '" data-id_ruang="' + id_ruang + '" data-email="' + email + '" data-role="' + role + '" data-id_ruang="' + id_ruang + '"> <i class="fa fa-file-alt"></i> </a> ' +
                            '<a href="#" class="btn btn-icon icon-left btn-outline-danger deleteUser" data-id="' + id + '"> <i class="fa fa-trash"></i> </a>' +
                            '</td>'
                        '</tr>'
                    }
                    $('#tb_user').html(html);
                }
            })
            return false;
        }
    });
</script>