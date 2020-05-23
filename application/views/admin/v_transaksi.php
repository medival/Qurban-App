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
                        <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalRekap" id="btnRekap">
                            <i class="fa fa-suitcase"></i> Rekap
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body" id="paper">
                <!-- <div class="card"> -->
                <div class="card-header">
                    <h4> Informasi Tambahan </h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse" class="btn btn-icon" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="mycard-collapse">
                    <div class="card-body row">
                        <div class="col-md-6">
                            <b> Nasabah</b><br>
                            <label class="form-control-label">Nis</label> <br>
                            <label class="form-control-label">Username</label><br>
                            <label class="form-control-label">Kelas</label><br>
                            <label class="form-control-label">Walikelas</label>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <b> Transaksi:</b><br>
                            <label class="form-control-label">Created at</label> <br>
                            <label class="form-control-label">Jumlah Transaksi</label><br>
                            <label class="form-control-label">Terakhir Transaksi</label><br>
                            <label class="form-control-label">Saldo</label>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <!-- </div> -->
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 2rem"> # </th>
                                <th> Nama </th>
                                <th> Tanggal </th>
                                <th> Kredit </th>
                                <th> Debet </th>
                                <th> Saldo </th>
                                <!-- <th id="colAksi"> Aksi </th> -->
                            </tr>
                        </thead>
                        <tbody id="tb_transaksi">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-icon icon-left" id="btnCetakPDF"><i class="fas fa-print"></i> Save to PDF</button>
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
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Debet  -->

<!-- Modal Rekap -->
<div class="modal fade" tabindex="" role="dialog" id="modalRekap">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Modal Rekap </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label> Cari Nasabah</label>
                    <select class="form-control select2 findRekapNasabah" style="width: 28.25rem" id="findRekapNasabah">
                    </select>
                </div>
                <input type="hidden" name="inputNISRekap" id="inputNISRekap" class="form-control">
                <div class="row" style="width: 28.125rem; margin-left: 0.10rem">
                    <div class="card card-primary text-center col-12">
                        <div class="card-body">
                            <label class="card-title">Username</label>
                            <h6 class="username" id="userRekap">
                                username
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnRekapData">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Rekap -->

<?php $this->load->view('admin/_partials/footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://simonbengtsson.github.io/jsPDF-AutoTable/dist/jspdf.plugin.autotable.js"></script>
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

        $('.findRekapNasabah').select2({
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

        $('#modalRekap').on('hidden.bs.modal', function() {
            $('#inputNISRekap').val("");
            $('#userRekap').html('username');
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

        $('#findRekapNasabah').on('change', function() {
            var nis = $('#findRekapNasabah').find(':selected').val();
            var nama = $('#findRekapNasabah').find(':selected').text();

            $('#userRekap').html(nama);
            $('[name="inputNISRekap"]').val(nis);
        })

        $('#btnRekapData').on('click', function() {
            // console.log(nis);
            getrekapp();
        });

        function getrekapp() {
            var nis = $('#findRekapNasabah').val();
            var nama = $('#findRekapNasabah').text();

            var baseUrl = "<?php echo base_url('admin/getrekapdata/'); ?>" + nis;
            $.ajax({
                type: 'ajax',
                url: baseUrl,
                async: false,
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    var no = 1;
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
                            '<td>' + no++ + '</td>' +
                            '<td>' + data[i].nama + '</td>' +
                            '<td>' + epochtodate(`${data[i].tanggal}`) + '</td>' +
                            '<td class="text-right">' + `${kredit}` + '</td>' +
                            '<td class="text-right">' + `${debet}` + '</td>' +
                            '<td class="text-right">' + `${saldo}` + '</td>' +
                            // '<td>' + '<a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary" data-nis="' + data[i].nis + '"> <i class="fa fa-info-circle"></i> </a></td> ' +
                            // '<td>' +
                            // '</td>' +
                            '</tr>'
                    }
                    $('#tb_transaksi').html(html);
                }
            })
            return false;
        }

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
                    $('#findRekapNasabah').html(ini + html);
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
        })

        $('#btnRekap').on('click', function() {
            memberaktif();
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

            // Hours
            var hours = date.getHours();

            // Minutes
            var minutes = "0" + date.getMinutes();

            // Seconds
            var seconds = "0" + date.getSeconds();
            // Display date time in MM-dd-yyyy h:m:s format
            return convdataTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
            // return convdataTime = year + '-' + month + '-' + day;
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
                            // '<td> <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary" data-nis="' + data[i].nis + '"> <i class="fa fa-file-alt"></i> </a> ' +
                            // '<a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary" data-nis="' + data[i].nis + '"> <i class="fa fa-user"></i> </a></td> ' +
                            // '</td> ' +
                            // '<td>' +
                            // '</td>' +
                            '</tr>'
                    }
                    $('#tb_transaksi').html(html);
                }
            })
        }

        $('#btnCetakPDF').on('click', function() {
            cetakPDF();
        })

        function cetakPDF() {
            var doc = new jsPDF('p', 'pt');
            var res = doc.autoTableHtmlToJson(document.getElementById("table1"));
            // var nama = $('#findRekapNasabah').find(':selected').text();
            // var username = doc.autoTableHtmlToJson(nama);
            // doc.autoTable();
            // console.log(username);
            doc.autoTable(res.columns, res.data, {
                margin: {
                    top: 40
                }
            });

            // var nasabah = function(data) {
            //     doc.setFontSize(11);
            //     doc.setTextColor(40);
            //     doc.setFontStyle('normal');
            //     //doc.addImage(headerImgData, 'JPEG', data.settings.margin.left, 20, 50, 50);
            //     // doc.text(username, data.settings.margin.left, 50);
            //     // doc.text("Nasabah2", data.settings.margin.left, 70);
            // };

            // var options = {
            //     beforePageContent: nasabah,
            //     margin: {
            //         top: 80
            //     },
            //     startY: doc.autoTableEndPosY() + 20
            // };

            doc.save("tab.pdf");
        }
    });
</script>