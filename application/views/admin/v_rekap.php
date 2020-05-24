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
                        <button class="btn btn-outline-info" id="btnRekapitulasi">
                            <i class="fa fa-suitcase"></i> Rekap
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
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
                            <address>
                                <strong> Nasabah :</strong><br>
                                Nis<br>
                                Username <br>
                                Kelas <br>
                                Walikelas
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong> Transaksi:</strong><br>
                                Created at<br>
                                Jumlah Transaksi <br>
                                Terakhir Transaski<br>
                                Saldo
                            </address>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 2rem"> # </th>
                                <th> Nama </th>
                                <!-- <th>Alamat</th> -->
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
        <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-print"></i> Save to PDF</button>
    </section>
</div>

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

<?php $this->load->view('_partials/footer'); ?>

<script>
    $(document).ready(function() {

        show_transaksi();

        $('#table1').dataTable();


        $('.findRekapNasabah').select2({
            placeholder: "Cari Nasabah",
            allowClear: true
        })


        var cleaveJumlahSaldo = new Cleave('.userJumlahSaldo', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        })

        // var btnRekap = document.getElementById('btnRekapitulasi');
        $('#btnRekapitulasi').on('click', function() {
            console.log("aha");
            // memberaktif();
        })

        // $('#modalRekap').on('hidden.bs.modal', function() {
        //     $('#inputNISRekap').val("");
        //     $('#userRekap').html('username');
        // })

        $('#findRekapNasabah').on('change', function() {
            var nis = $('#findRekapNasabah').find(':selected').val();
            var nama = $('#findRekapNasabah').find(':selected').text();

            $('#userRekap').html(nama);
            $('[name="inputNISRekap"]').val(nis);
        })

        $('#btnRekapData').on('click', function() {
            var nis = $('#findRekapNasabah').val();
            // console.log(nis);
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
            // return false;
        });



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
                    $('#findRekapNasabah').html(ini + html);
                }
            });
        }

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
    });
</script>