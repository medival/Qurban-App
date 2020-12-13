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
                                <!-- <th>ID Kelas</th> -->
                                <th>Kelas</th>
                                <!-- <th>Jumlah</th> -->
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
                        <label> Ruangan </label>
                        <p class="text-muted"> Ex Kelas 1 Input Ruang A. 1 A </p>
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
                        <label> Ruangan </label>
                        <p class="text-muted"> Ex Kelas 1 Ganti Ruang B. 1 B </p>
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
<?php $this->load->view('_partials/footer');?>