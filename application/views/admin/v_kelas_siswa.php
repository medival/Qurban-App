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
                        <button class="btn btn-outline-primary" id="btnTambah">
                            <i class="fa fa-user-plus"></i> Tambah Ksiswa
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
                                <th>Tahun Ajaran</th>
                                <th>Kelas</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <!-- <th>Wali Ksiswa </th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table_ksiswa">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section-body">
            </div>
    </section>
</div>

<!-- Modal Tambah Nasabah -->
<div class="modal fade" tabindex="" role="dialog" id="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judul"> </h5>
                    <button type="button" class="close batal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formData">
                        <input type="hidden" id="id_ksiswa" name="id_ksiswa">
                        <div class="form-group">
                            <label class="col-form-label"> Tahun Ajaran </label>
                            <div class="col-10">
                                <select class="form-control select2" style="width: 26.25rem" id="id_tahun" name="id_tahun" required>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"> Kelas </label>
                            <div class="col-10">
                                <select class="form-control select2" style="width: 26.25rem" id="id_ruang" name="id_ruang" required>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"> Siswa </label>
                            <div class="col-10">
                                <select class="form-control select2" style="width: 26.25rem" id="nis" name="nis" required>

                                </select>
                                <div class="invalid-feedback">
                                    Pilih siswa
                                </div>
                            </div>
                        </div>

                        
                        
                        <div class="form-group">
                            <label for="" class=" col-form-label">Keterangan</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="exp : Naik Kelas" required>
                                <div class="invalid-feedback">
                                    Masukan Keterangan
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary batal" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" > Simpan Data </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Tambah Nasabah -->


    <!-- Modal Delete Nasabah -->
    <div class="modal fade" tabindex="" role="dialog" id="modalHapus">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Hapus <?=$title?> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p class="text-center"> Data yang dihapus tidak bisa dikembalikan? </p>
                        <input type="hidden" class="form-control" id="deleteid_ksiswa" name="deleteid_ksiswa">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="btnDeleteKelasSiswa"> Hapus Data </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Delete Nasabah -->
</div>
<?php $this->load->view('_partials/footer');?>