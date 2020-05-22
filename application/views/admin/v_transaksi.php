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

                        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalDebet" id="btnDebet">
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
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 2rem"> No </th>
                                <th> NIS </th>
                                <!-- <th>Alamat</th> -->
                                <th> Tanggal </th>
                                <th> Kredit </th>
                                <th> Debet </th>
                                <th> Saldo </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody id="tb_transaksi">

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
            <form action="" class="needs-validation" novalidate="">
                <div class="modal-body">
                    <div class="form-group">
                        <label> Cari Nasabah</label>
                        <select class="form-control select2 findNasabahKredit" style="width: 28.25rem" id="findNasabahKredit">
                        </select>
                    </div>

                    <div class="form-group row text-center" style="width: 28.125rem; margin-left: 0.10rem">
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
                            <input type="text" class="form-control inputNominalKredit" name="inputNominalKredit" id="inputNominalKredit" required>
                            <div class="invalid-feedback">
                                Input Nominal
                            </div>
                            <input type="hidden" name="inputNISKredit" id="inputNISKredit" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnInputKredit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Kredit  -->

<!-- Modal Debet  -->
<div class="modal fade" tabindex="" role="dialog" id="modalDebet">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tarik Tunai </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" class="needs-validation" novalidate="">
                <div class="modal-body">
                    <div class="form-group">
                        <label> Cari Nasabah</label>
                        <select class="form-control select2 findNasabahDebet" style="width: 28.25rem" id="findNasabahDebet">
                        </select>
                    </div>
                    <div class="row" style="width: 28.125rem; margin-left: 0.10rem">
                        <div class="card card-primary col-6 text-center">
                            <div class="card-body">
                                <label class="card-title">Username</label>
                                <h6 class="username" id="userDebet">
                                    username
                                </h6>
                            </div>
                        </div>
                        <div class="card card-danger col-6 text-center">
                            <div class="card-body">
                                <label class="card-title"> Saldo </label>
                                <h5 class="userJumlahSaldo" id="userJumlahSaldo2">
                                    0
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- <h6 class="text-center text-danger" id="text-info" id="testt"> Warning </h6> -->
                    <input type="hidden" name="inputNISDebet" id="inputNISDebet" class="form-control">
                    <input type="hidden" name="cekSaldo" id="cekSaldo" class="form-control">

                    <div class="form-group">
                        <label for="" class=" col-form-label"> Nominal </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Rp
                                </div>
                            </div>
                            <input type="text" class="form-control inputNominalDebet" name="inputNominalDebet" id="inputNominalDebet" placeholder="" required>
                            <div class="invalid-feedback">
                                Masukan Nominal
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnInputDebet">Save changes</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Debet  -->
<?php $this->load->view('admin/_partials/footer'); ?>

<script>
    $(document).ready(function() {

        show_transaksi();

        $('#table1').dataTable();

        $('.findNasabah').select2({
            placeholder: "Cari Nasabah",
            allowClear: true
        })

        $('.findNasabahKredit').select2({
            placeholder: "Cari Nasabah",
            allowClear: true
        })

        $('.findNasabahDebet').select2({
            placeholder: "Cari Nasabah",
            allowClear: true
        })

        var cleaveKredit = new Cleave('.inputNominalKredit', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
        })

        var cleaveDebet = new Cleave('.inputNominalDebet', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        })

        var cleaveJumlahSaldo = new Cleave('.userJumlahSaldo', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        })

        $('#modalKredit').on('hidden.bs.modal', function() {
            $('#inputNominalKredit').val("");
            $('#userKredit').html('username');
            $('#inputNISKredit').val("");
            $('#userJumlahSaldo').html(0);
        })

        $('#modalDebet').on('hidden.bs.modal', function() {
            $('#inputNominalDebet').val("");
            $('#userDebet').html('username');
            $('#inputNISDebet').val("");
            $('#cekSaldo').val("");
            $('#userJumlahSaldo2').html(0)
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

            $('[name="inputNISKredit"]').val(nis);
            // $('[name="inputNISDebet"]').val(nis);
            $('#userKredit').html(nama);
            $('#userJumlahSaldo').html(CurrencyID(Jumlahsaldo));
        })

        $('#findNasabahDebet').on('change', function() {
            var nis = $('#findNasabahDebet').find(':selected').val();
            var nama = $('#findNasabahDebet').find(':selected').text();
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

            $('[name="cekSaldo"]').val(Jumlahsaldo);
            $('[name="inputNISDebet"]').val(nis);
            $('#userDebet').html(nama);
            $('#userJumlahSaldo2').html(CurrencyID(Jumlahsaldo));

            // console.log(Jumlahsaldo)
            var btnDebet = document.getElementById('btnInputDebet');
            if (Jumlahsaldo <= 0) {
                $(btnDebet).prop('disabled', true);
                // console.log("Add Disabled");
            } else if (Jumlahsaldo > 0) {
                $(btnDebet).prop('disabled', false);
                // console.log('remove Disabled');
            }
        })

        function CurrencyID(nominal) {
            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });
            return formatter.format(nominal);
        }

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
                    $('#findNasabahDebet').html(ini + html);
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

        $('#btnDebet').on('click', function() {
            memberaktif();

            // const nominal = document.getElementById('inputNominalDebet');
            // const testtt = document.getElementById('testt');
            // // const cekSaldo = document.getElementById('cekSaldo');
            // const btnDebet = document.getElementById('btnInputDebet');

            // console.log(nominal, btnDebet);


            // const inputHandler = function(e) {
            //     btnDebet.innerHTML = e.target.value;
            // }

            // nominal.addEventListener('input', inputHandler);

        })

        $('#btnInputKredit').on('click', function() {
            var nis = $('#inputNISKredit').val();
            var nominal = $('#inputNominalKredit').val();
            nominal = nominal.replace(/,/g, '');
            nominal = nominal.replace(/,/g, '');
            // var kredit_debet = "kredit";
            console.log(nis, nominal);

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/inputdatakredit'); ?>',
                dataType: 'JSON',
                data: {
                    nis: nis,
                    // kredit_debet: kredit_debet,
                    nominal: nominal
                },
                success: function(data) {
                    $('#modalKredit').modal('hide');
                    show_transaksi();
                }
            })
            return false;
        })


        $('#btnInputDebet').on('click', function() {
            var nis = $('#inputNISDebet').val();
            var saldo = $('#cekSaldo').val();
            var nominal = $('#inputNominalDebet').val();
            nominal = nominal.replace(/,/g, '');
            nominal = nominal.replace(/,/g, '');

            // if (nominal < saldo) {
            // alert('fff');
            // $(btnDebet).prop('disabled', false);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/inputdatadebet'); ?>',
                Datatype: 'JSON',
                data: {
                    nis: nis,
                    nominal: nominal
                },
                success: function(data) {
                    $('#modalDebet').modal('hide');
                    show_transaksi();
                }
            })
            //     console.log("acc");
            // } else if (nominal > saldo) {
            //     console.log("no");
            // }
            // console.log(nis, "nominal " + nominal, "Saldo " + saldo)

            return false;
        })

        $('#btnAktivasi').on('click', function() {
            var nis = $('#inputidaktivasi').val();

            console.log(nis);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/aktivasimember') ?>',
                dataType: 'JSON',
                data: {
                    nis: nis
                },
                success: function(data) {
                    $('#modalAktivasi').modal('hide');
                    $('#idAktivasi').html("Username");
                    alert('sccc');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("data exist");
                }
            })
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

        function show_transaksi() {
            $.ajax({
                type: 'ajax',
                url: '<?= base_url('admin/gettransaksi'); ?>',
                async: false,
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    var number = 1;
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].kredit_debet == "kredit") {
                            var debet = "-";
                            var kredit = CurrencyID(data[i].nominal);
                            // var kredit = "Kredit";
                        } else if (data[i].kredit_debet == "debet") {
                            var debet = CurrencyID(data[i].nominal);
                            // var debet = "Debet";
                            var kredit = "-";
                        }

                        if (data[i].saldo != null) {
                            var saldo = CurrencyID(data[i].saldo);
                        } else if (data[i].saldo == null) {
                            var saldo = CurrencyID(0);
                        }
                        html += '<tr>' +
                            '<td>' + number++ + '</td>' +
                            '<td>' + `${data[i].nama}` + '</td>' +
                            '<td>' + epochtodate(`${data[i].tanggal}`) + '</td>' +
                            '<td class="text-right">' + `${kredit}` + '</td>' +
                            '<td class="text-right">' + `${debet}` + '</td>' +
                            '<td class="text-right">' + `${saldo}` + '</td>' +
                            '<td> <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary" data-nis="' + data[i].nis + '"> <i class="fa fa-file-alt"></i> </a> ' +
                            '<a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary" data-nis="' + data[i].nis + '"> <i class="fa fa-user"></i> </a></td> ' +
                            '</td> ' +
                            '</tr>'
                    }
                    $('#tb_transaksi').html(html);
                }
            })
        }
    });
</script>