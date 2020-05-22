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
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAktivasi" id="btnModalAktivasi">
                            <i class="fa fa-user-plus"></i> Aktivasi
                        </button>

                        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalKredit" id="btnKredit">
                            <i class="fa fa-plus"></i> Setor Tunai
                        </button>

                        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalTarik">
                            <i class="fa fa-minus"></i> Tarik Tunai
                        </button>
                        <a href="#" class="btn btn-outline-info btn-icon icon-left">
                            <i class="fa fa-suitcase"></i> Rekap
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <!-- <th>Alamat</th> -->
                                <th>Terdaftar</th>
                                <th>Pencairan</th>
                                <th>Saldo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1</td>
                                <td>Gregory Nixon</td>
                                <!-- <td>779 Bedell Lane, Dotsero, Idaho, 2988</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <a href="<?= base_url('admin/detailtabungan'); ?>" class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </a>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 2</td>
                                <td>Horne Sears</td>
                                <!-- <td>644 Ross Street, Hamilton, Wyoming, 3749</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 3</td>
                                <td>Lenora Mathis</td>
                                <!-- <td>312 Schenck Place, Kilbourne, Texas, 5179</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 4</td>
                                <td>Campbell Weeks</td>
                                <!-- <td>338 Lafayette Walk, Craig, Alabama, 6085</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 5</td>
                                <td>Karin Barr</td>
                                <!-- <td>572 Carroll Street, Woodlake, Washington, 9824</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 6</td>
                                <td>Lottie Brooks</td>
                                <!-- <td>735 Brooklyn Road, Homeland, Mississippi, 3404</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 7</td>
                                <td>Rose Martin</td>
                                <!-- <td>863 Varick Street, Walker, Georgia, 9917</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 8</td>
                                <td>Acosta Gilmore</td>
                                <!-- <td>774 Anna Court, Navarre, Indiana, 351</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 9</td>
                                <td>Herman Munoz</td>
                                <!-- <td>734 Elliott Place, Wheaton, New Mexico, 8921</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 10</td>
                                <td>orsey Bailey</td>
                                <!-- <td>445 Hemlock Street, Newcastle, Montana, 9693</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 11</td>
                                <td>ruitt Scott</td>
                                <!-- <td>452 Halleck Street, Allendale, Alaska, 9897</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 12</td>
                                <td>eila Tran</td>
                                <!-- <td>810 Chase Court, Wakarusa, Kansas, 9901</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 13</td>
                                <td>ula Silva</td>
                                <!-- <td>890 Boerum Place, Coyote, Oregon, 6367</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 14</td>
                                <td>elley Henry</td>
                                <!-- <td>422 Kent Avenue, Bethany, Arkansas, 3540</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 15</td>
                                <td>endoza Glover</td>
                                <!-- <td>134 Bayview Place, Saticoy, South Dakota, 5725</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 16</td>
                                <td>axwell Franklin</td>
                                <!-- <td>126 Franklin Avenue, Talpa, Wisconsin, 8032</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td> 17</td>
                                <td>arza Curtis</td>
                                <!-- <td>413 Grace Court, Idledale, New Jersey, 9262</td> -->
                                <td> 20-Mei-2020</td>
                                <td> - </td>
                                <td> $ 9,122 </td>
                                <td>
                                    <button class="btn btn-icon icon-left btn-outline-primary">
                                        <i class="fa fa-file-alt"></i>
                                    </button>
                                    <button class="btn btn-icon icon-left btn-outline-info">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section-body">
                <?php

                ?>
            </div>
    </section>
</div>
<!-- Modal Aktivasi -->
<div class="modal fade" tabindex="" role="dialog" id="modalAktivasi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Aktivasi Nasabah </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label> Cari Nasabah</label>
                    <div class="input" id="inputNasabah">
                        <select class="form-control select2 findNasabah" style="width: 28.25rem" id="findNasabah">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <p class="text-center"> Anda akan mengaktivasi? </p>
                    <h5 class="text-center" id="idAktivasi"> Username </h5>
                    <input type="hidden" class="form-control" name="inputidaktivasi" id="inputidaktivasi">
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btnAktivasi">Aktivasi</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal End of Aktivasi -->

<!-- Modal Kredit  -->
<div class="modal fade" tabindex="" role="dialog" id="modalKredit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Kredit Tunai </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label> Cari Nasabah</label>
                    <select class="form-control select2 findNasabahKredit" style="width: 28.25rem" id="findNasabahKredit">
                    </select>
                </div>

                <div class="form-group row text-center">
                    <div class="card card-primary col-6">
                        <div class="card-body">
                            <label class="card-title">Username</label>
                            <h6 class="username" id="userKredit">
                                username
                            </h6>
                        </div>
                    </div>
                    <div class="card card-danger col-6">
                        <div class="card-body">
                            <label class="card-title"> Saldo </label>
                            <h5 class="userJumlahSaldo" id="userJumlahSaldo">
                                0
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label> Nominal </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                Rp
                            </div>
                        </div>
                        <input type="text" name="inputNISKredit" id="inputNISKredit" class="form-control">
                        <input type="text" class="form-control inputNominalKredit" name="inputNominalKredit" id="inputNominalKredit">
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnInputKredit">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Kredit  -->

<!-- Modal Tarik  -->
<div class="modal fade" tabindex="" role="dialog" id="modalTarik">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tarik Tunai </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label> Cari Nasabah</label>

                    <select class="form-control select2" style="width: 28.25rem">
                        <option>Nasabah 1</option>
                        <option>Nasabah 2</option>
                        <option>Nasabah 3</option>
                        <option>Nasabah 4</option>
                        <option>Nasabah 5</option>
                        <option>Nasabah 6</option>
                        <option>Nasabah 7</option>
                        <option>Nasabah 8</option>
                        <option>Nasabah 9</option>
                        <option>Nasabah 10</option>
                        <option>Nasabah 12</option>
                        <option>Nasabah 13</option>
                    </select>
                    <!-- </div> -->
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h6> Nasabah 1 </h6>
                    </div>
                    <div class="card-body">
                        <h5> Rp. 9.000.000 </h5>
                    </div>
                </div>

                <div class="form-group">
                    <label> Nominal </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                Rp
                            </div>
                        </div>
                        <input type="text" class="form-control tarikTunai">
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tarik  -->
<?php $this->load->view('admin/_partials/footer'); ?>

<script>
    $(document).ready(function() {

        $('.findNasabah').select2({
            placeholder: "Cari Nasabah",
            allowClear: true
        })

        $('.findNasabahKredit').select2({
            placeholder: "Cari Nasabah",
            allowClear: true
        })

        var cleaveKredit = new Cleave('.inputNominalKredit', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
        })

        var cleaveJumlahSaldo = new Cleave('.userJumlahSaldo', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        })

        $('#findNasabahKredit').on('change', function() {
            var nis = $('#findNasabahKredit').find(':selected').val();
            var nama = $('#findNasabahKredit').find(':selected').text();
            var baseURL = "<?php echo base_url('admin/getMemberSaldo/'); ?>" + nis;
            $.ajax({
                type: 'ajax',
                url: baseURL,
                async: false,
                dataType: "JSON",
                success: function(data) {
                    Jumlahsaldo = data[0].saldo;
                }
            })
            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            })
            $('[name="inputNISKredit"]').val(nis);
            $('#userKredit').html(nama);
            $('#userJumlahSaldo').html(formatter.format(Jumlahsaldo));
        })

        function memberaktif() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url('admin/getMemberList'); ?>',
                dataType: 'JSON',
                async: false,
                success: function(data) {
                    var html = '';
                    var ini = '<option></option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].nis + '"> ' + `${data[i].nama}` + '</option>';
                    }
                    $('#findNasabahKredit').html(ini + html);
                }
            });
        }

        $('#findNasabah').on('change', function() {
            var nama = $('#findNasabah').find(':selected').text();
            var nis = $('#findNasabah').find(':selected').val();
            $('#idAktivasi').html(nama);
            $('[name="inputidaktivasi"]').val(nis);

            console.log(nama, nis);
        });

        $('#btnModalAktivasi').on('click', function() {
            carinasabah();
        });

        $('#btnKredit').on('click', function() {
            memberaktif();
        })

        $('#btnInputKredit').on('click', function() {
            var nis = $('#inputNISKredit').val();
            var nominal = $('#inputNominalKredit').val();
            nominal = nominal.replace(/,/g, '');
            nominal = nominal.replace(/,/g, '');
            var kredit_debet = "kredit";
            console.log(nis, nominal, kredit_debet);

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/inputdatakredit'); ?>',
                dataType: 'JSON',
                data: {
                    nis: nis,
                    kredit_debet: kredit_debet,
                    nominal: nominal
                },
                success: function(data) {
                    $('#modalKredit').modal('hide');
                }
            })
        })

        $('#btnAktivasi').on('click', function() {
            var nis = $('#inputidaktivasi').val();

            console.log(nis);
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/aktivasimember') ?>',
                dataType: 'JSON',
                data: {
                    nis: nis
                },
                success: function(data) {
                    // $("#idAktivasi").html("Username");
                    $('#modalAktivasi').modal('hide');
                    alert('sccc');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("data exist");
                }
            })
        });

        function carinasabah() {
            $.ajax({
                type: "ajax",
                url: '<?= base_url('admin/getnis') ?>',
                async: false,
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    var ini = '<option></option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].nis + '">' + `${data[i].nama}` + '</option>';
                    }
                    $('#findNasabah').html(ini + html);
                }
            });
        }
    });
</script>