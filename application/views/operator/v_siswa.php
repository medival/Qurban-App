<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h3> <?=$title;?> </h3>
                <div class="card-body">
                    <div class="buttons">
                        <button href="<?=base_url('');?>" class="btn btn-outline-primary btn-icon icon-left" data-toggle="modal" data-target="#modalTambahSiswa" id="btnModalAddSiswa">
                            <i class="fa fa-user-plus"></i> Tambah <?=$title?>
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
                                <th>Walikelas</th>
                                <th>Terdaftar</th>
                                <!-- <th>Status</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableSiswa">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Nasabah -->
    <div class="modal fade" tabindex="" role="dialog" id="modalTambahSiswa">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Tambah Siswa </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="needs-validation" novalidate="" id="frmTambahNasabah">
                        <p class="text-muted"> Informasi Pribadi </p>
                        <div class="form-group">
                            <label for="" class=" col-form-label">NIS</label>
                            <div class="col-sm">
                                <input type="text" class="form-control inputNIS" name="inputNIS" id="inputNIS" placeholder="NIS" required>
                                <div class="invalid-feedback">
                                    Masukan NIS lengkap calon siswa?
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class=" col-form-label">Nama Lengkap</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="inputNama" id="inputNama" placeholder="Nama" required>
                                <div class="invalid-feedback">
                                    Masukan nama lengkap calon siswa?
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-form-label">Alamat</label>
                            <div class="col-sm">
                                <textarea class="form-control" id="inputAlamat" name="inputAlamat" placeholder="Alamat" required></textarea>
                                <div class="invalid-feedback">
                                    Oops! masukan alamat siswa
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
                                Oops! masukan jenis kelamin calon siswa
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class=" col-form-label"> Tempat Lahir </label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="inputTempatLahir" id="inputTempatLahir" placeholder="Tempat Lahir" required>
                                <div class="invalid-feedback">
                                    Masukan tempat lahir calon siswa?
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class=" col-form-label"> Tanggal Lahir </label>
                            <div class="col-sm">
                                <input type="varchar" class="form-control inputTanggalLahir" id="inputTanggalLahir" placeholder="YYYY-MM-DD" required name="inputTanggalLahir">
                                <div class="text-muted"> Format YYYY-MM-DD</div>
                                <div class="invalid-feedback">
                                    Masukan tanggal lahir calon siswa?
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
                                <select class="form-control select2 pkelas" style="width: 26.25rem" id="pkelas">
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btnAddSiswa"> Tambah Data </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Tambah Nasabah -->

    <!-- Modal Edit Siswa -->
    <div class="modal fade" tabindex="" role="dialog" id="modalEditSiswa">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Edit <?=$title?> </h5>
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
                                <select class="form-control select2" style="width: 26.25rem" id="ekelas">
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btnEditSiswa"> Update Data </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Edit Siswa -->

    <!-- Modal Delete Nasabah -->
    <div class="modal fade" tabindex="" role="dialog" id="modalHapusSiswa">
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
                        <input type="hidden" class="form-control" id="deleteNIS" name="deleteNIS">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="btnDeleteSiswa"> Hapus Data </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Delete Nasabah -->
</div>

<?php $this->load->view('_partials/footer');?>