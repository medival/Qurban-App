$("#btnSearch").on("click", function () {
  getrekapp();
});

function getrekapp() {
  const baseUrl = "http://localhost/apptabungan/";
  var nis = $("#inputNIS").val();

  $.ajax({
    type: "ajax",
    url: `${baseUrl}ceksaldo/getrekap/${nis}`,
    async: false,
    dataType: "JSON",
    success: function (data) {
      var infoJumlahTransaksi = data.length;
      console.log(data);
      if (infoJumlahTransaksi < 1) {
        var html =
          '<tr> <td colspan=7" class="text-center"> <b> DATA IS EMPTY </b> </td> </tr>';
      } else {
        var tb =
          '<thead><th>#</th><th>Tanggal</th><th> Nama </th><th>Kredit</th><th>Debet</th><th>Saldo</th><th>Operator</th></thead><tbody id="tableresult"></tbody>';
        var html = "";
        var no = 1;
        for (var i = 0; i < infoJumlahTransaksi; i++) {
          if (data[i].kredit_debet == "kredit") {
            var debet = "-";
            var kredit = CurrencyID(data[i].nominal);
          } else if (data[i].kredit_debet == "debet") {
            var debet = CurrencyID(data[i].nominal);
            var kredit = "-";
          }
          if (data[i].saldo != null) {
            var saldo = CurrencyID(data[i].saldo);
          } else if (data[i].saldo == null) {
            var saldo = CurrencyID(0);
          }
          html +=
            "<tr>" +
            "<td>" +
            no++ +
            "</td>" +
            "<td>" +
            epochtodate(`${data[i].tanggal}`) +
            "</td>" +
            "<td>" +
            `${data[i].nama}` +
            "</td>" +
            '<td class="text-right">' +
            `${kredit}` +
            "</td>" +
            '<td class="text-right">' +
            `${debet}` +
            "</td>" +
            '<td class="text-right">' +
            CurrencyID(data[i].saldo) +
            "</td>" +
            "<td>" +
            `${data[i].nama_operator}` +
            "</td>" +
            "</tr>";
        }
      }
      $("#tableutama").html(tb + html);
    },
  });
}

function CurrencyID(nominal) {
  var formatter = new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
  });
  return formatter.format(nominal);
}

function epochtodate(epoch) {
  // Months array
  var months_arr = [
    "01",
    "02",
    "03",
    "04",
    "05",
    "06",
    "07",
    "08",
    "09",
    "10",
    "11",
    "12",
  ];

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
  return (convdataTime =
    year +
    "-" +
    month +
    "-" +
    day +
    " " +
    hours +
    ":" +
    minutes.substr(-2) +
    ":" +
    seconds.substr(-2));
  // return convdataTime = year + '-' + month + '-' + day;
}