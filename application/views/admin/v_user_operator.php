<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h3><?=$title;?></h3>
                <div class="card-body">
                    <div class="buttons">
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahOperator" id="tambahOperator">
                            <i class="fa fa-user-plus"></i> Tambah Operator
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
                                <th class="text-center">Status </th>
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
<?php $this->load->view('_partials/footer');?>