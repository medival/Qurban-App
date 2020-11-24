<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partials/header');
?>

<style>
</style>
<!-- Main Content -->
<div class="main-content">
    <div class="col-6 container">
        <div class="card">
            <div class="">
                <form action="#" class="needs-validation" novalidate="">
                    <div class="input-group">
                        <input type="text" class="form-control text-center" placeholder="Masukan 4 digit NIS" id="inputNIS" required maxlength="4">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="btnSearch"><i class="fas fa-search"></i> Search </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="clearfix mb-3"></div>
                <div class="table-responsive">
                    <table class="table table-striped" id="tableutama">
                        <tr>
                            <td class="text-center">
                                <h5>EMPTY</h5>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>
<?php $this->load->view('_partials/footer'); ?>
<script>
    $('#btnSearch').on('click', function() {
        getrekapp();
    })

    function getrekapp() {
        var nis = $('#inputNIS').val();
        var baseUrl = "<?php echo base_url('ceksaldo/getrekap/'); ?>" + nis;

        $.ajax({
            type: 'ajax',
            url: baseUrl,
            async: false,
            dataType: "JSON",
            success: function(data) {
                var infoJumlahTransaksi = data.length;
                console.log(data);
                if (infoJumlahTransaksi < 1) {
                    var html = '<tr> <td colspan=7" class="text-center"> <b> DATA IS EMPTY </b> </td> </tr>';
                } else {
                    var tb = '<thead><th>#</th><th>Tanggal</th><th>Operator</th><th>Kredit</th><th>Debet</th><th>Saldo</th></thead><tbody id="tableresult"></tbody>';
                    var html = '';
                    var no = 1;
                    for (var i = 0; i < infoJumlahTransaksi; i++) {
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
                        // var infoSaldo = CurrencyID(data[i].saldo);
                        // var infoOperator = `${data[i].nama_operator}`;
                        // var infoSaldoTransaksi = CurrencyID(data[i].t_saldo);
                        html += '<tr>' +
                            '<td>' + no++ + '</td>' +
                            // '<td>' + data[i].nama + '</td>' +
                            '<td>' + epochtodate(`${data[i].tanggal}`) + '</td>' +
                            '<td>' + `${data[i].nama_operator}` + '</td>' +
                            '<td class="text-right">' + `${kredit}` + '</td>' +
                            '<td class="text-right">' + `${debet}` + '</td>' +
                            '<td class="text-right">' + CurrencyID(data[i].saldo) + '</td>' +
                            // '<td>' + '<a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary" data-nis="' + data[i].nis + '"> <i class="fa fa-info-circle"></i> </a></td> ' +
                            // '<td>' +
                            // '</td>' +
                            '</tr>'
                        // console.log(data[i].nama);
                    }
                }
                $('#tableutama').html(tb + html);
                // $('#table1').dataTable();
            }
        })
    }

    function CurrencyID(nominal) {
        var formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });
        return formatter.format(nominal);
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
</script>