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
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahTahun">
                            <i class="fa fa-user-plus"></i> Tambah Tahun
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
                                <th>Tahun</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table_tahun">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section-body">
            </div>
    </section>
</div>
<!-- Modal Tahun -->
<div class="modal fade" tabindex="" role="dialog" id="modalTambahTahun">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tambah Tahun </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" class="needs-validation" novalidate="">
                <div class="modal-body">
                    <div class="form-group">
                        <label> Inputkan Tahun Ajaran </label>
                        <div class="col-12 mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-university"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="inputtahun" id="inputtahun" required placeholder="exp: 2021/2022" maxlength="10">
                                <div class="invalid-feedback">
                                    Oops! tambahkan tahun
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> Status </label>
                        <div class="col-12 mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-university"></i>
                                    </div>
                                </div>
                                <select name="inputis_active" class="form-control" id="inputis_active" required>
                                  <option value="">-- Pilih Status --</option>
                                  <option value="0">Tidak</option>
                                  <option value="1">Aktif</option>
                                </select>
                                <div class="invalid-feedback">
                                    Oops! tambahkan status
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnAddTahun">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal End of Tahun -->

<!-- Modal Edit Tahun -->
<div class="modal fade" tabindex="" role="dialog" id="modalEditTahun">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Tahun </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" class="needs-validation" novalidate="">
                <div class="modal-body">
                    <div class="form-group">
                        <label> Inputkan Tahun Ajaran </label>
                        <div class="col-12 mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-university"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="editTahun" id="editTahun" required>
                                <div class="invalid-feedback">
                                    Oops! tambahkan tahun
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="editIdTahun" id="editIdTahun" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label> Status </label>
                        <div class="col-12 mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-university"></i>
                                    </div>
                                </div>
                                <select name="editis_active" class="form-control" id="editis_active" required>
                                  <option value="">-- Pilih Status --</option>
                                  <option value="0">Tidak</option>
                                  <option value="1">Aktif</option>
                                </select>
                                <div class="invalid-feedback">
                                    Oops! tambahkan status
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnUpdateTahun">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Edit Tahun -->

<!-- Modal Delete Ruangan -->
<div class="modal fade" tabindex="" role="dialog" id="modalDeleteTahun">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Hapus Tahun Ajaran </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p class="text-center"> Data yang dihapus tidak bisa dikembalikan? </p>
                    <input type="hidden" class="form-control" id="deleteidtahun" name="deleteidtahun">
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id="btnDeleteTahun"> Hapus Data </button>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Delete Ruangan -->
<?php $this->load->view('_partials/footer');?>