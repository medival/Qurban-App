$(document).ready(function () {
  const baseUrl = "http://localhost/apptabungan/";
  show_transaksi();

  $("#table1").dataTable({
    pageLength: 50,
  });

  $(".findNasabah").select2({
    placeholder: "Cari Nasabah",
    allowClear: true,
  });

  $(".findNasabahKredit").select2({
    placeholder: "Cari Nasabah",
    allowClear: true,
  });

  $(".findNasabahDebet").select2({
    placeholder: "Cari Nasabah",
    allowClear: true,
  });

  $(".findRekapNasabah").select2({
    placeholder: "Cari Nasabah",
    allowClear: true,
  });

  var cleaveKredit = new Cleave(".inputNominalKredit", {
    numeral: true,
    numeralThousandsGroupStyle: "thousand",
  });

  var cleaveDebet = new Cleave(".inputNominalDebet", {
    numeral: true,
    numeralThousandsGroupStyle: "thousand",
  });

  var cleaveJumlahSaldo = new Cleave(".userJumlahSaldo", {
    numeral: true,
    numeralThousandsGroupStyle: "thousand",
  });

  $("#modalKredit").on("hidden.bs.modal", function () {
    $("#inputNominalKredit").val("");
    $("#userKredit").html("username");
    $("#inputNISKredit").val("");
    $("#inputNIPKredit").val("");
    $("#userJumlahSaldo").html(0);
  });

  $("#modalDebet").on("hidden.bs.modal", function () {
    $("#inputNominalDebet").val("");
    $("#userDebet").html("username");
    $("#inputNISDebet").val("");
    $("#inputNIPDebet").val("");
    $("#cekSaldo").val("");
    $("#userJumlahSaldo2").html(0);
  });

  $("#modalRekap").on("hidden.bs.modal", function () {
    $("#inputNISRekap").val("");
    $("#userRekap").html("username");
  });

  $("#findNasabahKredit").on("change", function () {
    var nis = $("#findNasabahKredit").find(":selected").val();
    var nama = $("#findNasabahKredit").find(":selected").text();
    $.ajax({
      type: "ajax",
      url: `${baseUrl}operator/getMemberInfo/${nis}`,
      async: false,
      dataType: "JSON",
      success: function (data) {
        Jumlahsaldo = data["saldo"][0]["saldo"];
        nip = data["nip"][0]["nip"];
      },
    });

    $('[name="inputNISKredit"]').val(nis);
    $('[name="inputNIPKredit"]').val(nip);
    $("#userKredit").html(nama);
    $("#userJumlahSaldo").html(CurrencyID(Jumlahsaldo));
  });

  $("#findNasabahDebet").on("change", function () {
    var nis = $("#findNasabahDebet").find(":selected").val();
    var nama = $("#findNasabahDebet").find(":selected").text();

    $.ajax({
      type: "ajax",
      url: `${baseUrl}operator/getMemberInfo/${nis}`,
      async: false,
      dataType: "JSON",
      success: function (data) {
        Jumlahsaldo = data["saldo"][0]["saldo"];
        nip = data["nip"][0]["nip"];
      },
    });

    $('[name="cekSaldo"]').val(Jumlahsaldo);
    $('[name="inputNIPDebet"]').val(nip);
    $('[name="inputNISDebet"]').val(nis);
    $("#userDebet").html(nama);
    $("#userJumlahSaldo2").html(CurrencyID(Jumlahsaldo));

    var btnDebet = document.getElementById("btnInputDebet");
    if (Jumlahsaldo <= 0) {
      $(btnDebet).prop("disabled", true);
    } else if (Jumlahsaldo > 0) {
      $(btnDebet).prop("disabled", false);
    }
  });

  $("#findRekapNasabah").on("change", function () {
    var nis = $("#findRekapNasabah").find(":selected").val();
    var nama = $("#findRekapNasabah").find(":selected").text();

    $("#userRekap").html(nama);
    $('[name="inputNISRekap"]').val(nis);
  });

  $("#btnRekapData").on("click", function () {
    getrekapp();
    getinfo();
  });

  function getrekapp() {
    var nis = $("#findRekapNasabah").val();
    var nama = $("#findRekapNasabah").text();
    console.log(nis);

    $.ajax({
      type: "ajax",
      url: `${baseUrl}/operator/getrekapdata/${nis}`,
      async: false,
      dataType: "JSON",
      success: function (data) {
        var infoJumlahTransaksi = data.length;
        if (infoJumlahTransaksi < 1) {
          var html =
            '<tr> <td colspan=7" class="text-center"> <b> DATA IS EMPTY </b> </td> </tr>';
        } else {
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
              data[i].nama +
              "</td>" +
              "<td>" +
              epochtodate(`${data[i].tanggal}`) +
              "</td>" +
              "<td>" +
              `${data[i].nama_operator}` +
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
              "</tr>";
          }
        }
        $("#tb_transaksi").html(html);
      },
    });
    return false;
  }

  function getinfo() {
    var nis = $("#findRekapNasabah").val();
    var nama = $("#findRekapNasabah").text();

    $.ajax({
      type: "ajax",
      url: `${baseUrl}/operator/getsummary/${nis}`,
      async: false,
      dataType: "JSON",
      success: function (data) {
        var isi = data.length;
        if (isi < 1) {
          var infoNIS = "empty";
          var infoNama = "empty";
          var infoKelas = "empty";
          var infoCreatedAt = "empty";
          var infoTerakhirTransaksi = "empty";
          var infoSaldo = "empty";
          var infoJumlahTransaksi = "empty";
          var infoOperator = "empty";
        } else {
          var infoNIS = data["infobasic"][0]["nis"];
          var infoNama = data["infobasic"][0]["nama"];
          var infoKelas =
            data["infobasic"][0]["kelas"] + data["infobasic"][0]["ruang"];
          var infoOperator = data["infobasic"][0]["nama_operator"];
          var infoCreatedAt = epochtodate(data["infobasic"][0]["created_at"]);
          var infoTerakhirTransaksi = epochtodate(
            data["infoTransaksi"][0]["lasttransaksi"]
          );
          var infoSaldo = CurrencyID(data["infoTransaksi"][0]["saldo"]);
          var infoJumlahTransaksi = data["jumlahtransaksi"][0]["jml"];
        }
        $("#infoNIS").html(infoNIS);
        $("#infoNama").html(infoNama);
        $("#infoKelas").html(infoKelas);
        $("#infoOperator").html(infoOperator);
        $("#infoCreatedAt").html(infoCreatedAt);
        $("#infoTerakhirTransaksi").html(infoTerakhirTransaksi);
        $("#infoJumlahTransaksi").html(infoJumlahTransaksi);
        $("#infoSaldo").html(infoSaldo);
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

  function getNasabahAktif() {
    $.ajax({
      type: "ajax",
      url: `${baseUrl}operator/getNasabahAktif`,
      dataType: "JSON",
      async: false,
      success: function (data) {
        var html = "";
        var ini = "<option></option>";
        var i;
        for (i = 0; i < data.length; i++) {
          html +=
            '<option value="' +
            data[i].nis +
            '"> ' +
            `${data[i].nama}` +
            "</option>";
        }
        $("#findNasabahKredit").html(ini + html);
        $("#findNasabahDebet").html(ini + html);
        $("#findRekapNasabah").html(ini + html);
      },
    });
  }

  $("#findNasabah").on("change", function () {
    var nama = $("#findNasabah").find(":selected").text();
    var nis = $("#findNasabah").find(":selected").val();
    $("#idAktivasi").html(nama);
    $('[name="inputidaktivasi"]').val(nis);
  });

  $("#btnModalAktivasi").on("click", function () {
    carinasabah();
  });

  $("#btnKredit").on("click", function () {
    getNasabahAktif();
  });

  $("#btnDebet").on("click", function () {
    getNasabahAktif();
  });

  $("#btnRekap").on("click", function () {
    getNasabahAktif();
  });

  $("#btnInputKredit").on("click", function () {
    var nis = $("#inputNISKredit").val();
    var nominal = $("#inputNominalKredit").val();
    var nip = $("#inputNIPKredit").val();
    nominal = nominal.replace(/,/g, "");
    nominal = nominal.replace(/,/g, "");
    console.log(nis, nominal);

    if (nominal != null && nominal > 0) {
      $.ajax({
        type: "POST",
        url: `${baseUrl}operator/inputdatakredit`,
        dataType: "JSON",
        data: {
          nis: nis,
          nominal: nominal,
          nip: nip,
        },
        success: function (data) {
          $("#modalKredit").modal("hide");
          show_transaksi();
        },
      });
      return false;
    }
  });

  $("#btnInputDebet").on("click", function () {
    var nis = $("#inputNISDebet").val();
    var nip = $("#inputNIPDebet").val();
    var saldo = $("#cekSaldo").val();
    var nominal = $("#inputNominalDebet").val();
    nominal = nominal.replace(/,/g, "");
    nominal = nominal.replace(/,/g, "");
    if (nominal != null && nominal > 0) {
      $.ajax({
        type: "POST",
        url: `${baseUrl}operator/inputdatadebet`,
        Datatype: "JSON",
        data: {
          nis: nis,
          nominal: nominal,
          nip: nip,
        },
        success: function (data) {
          $("#modalDebet").modal("hide");
          show_transaksi();
        },
      });
      return false;
    }
  });

  $("#btnAktivasi").on("click", function () {
    var nis = $("#inputidaktivasi").val();

    console.log(nis);
    $.ajax({
      type: "POST",
      url: `${baseUrl}operator/aktivasimember`,
      dataType: "JSON",
      data: {
        nis: nis,
      },
      success: function (data) {
        $("#modalAktivasi").modal("hide");
        $("#idAktivasi").html("Username");
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert("data exist");
      },
    });
  });

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

  function carinasabah() {
    $.ajax({
      type: "ajax",
      url: `${baseUrl}operator/getnonmember`,
      async: false,
      dataType: "JSON",
      success: function (data) {
        console.log(data);
        var html = "";
        var ini = "<option></option>";
        var i;
        for (i = 0; i < data.length; i++) {
          html +=
            '<option value="' +
            data[i].nis +
            '">' +
            `${data[i].nama}` +
            "</option>";
        }
        $("#findNasabah").html(ini + html);
      },
    });
  }

  function show_transaksi() {
    $.ajax({
      type: "ajax",
      url: `${baseUrl}operator/getalltransaksi`,
      async: false,
      dataType: "JSON",
      success: function (data) {
        console.table(data);
        var html = "";
        var number = 1;
        for (var i = 0; i < data.length; i++) {
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
            number++ +
            "</td>" +
            "<td>" +
            `${data[i].nama}` +
            "</td>" +
            "<td>" +
            epochtodate(`${data[i].tanggal}`) +
            "</td>" +
            "<td>" +
            `${data[i].nama_operator}` +
            "</td>" +
            '<td class="text-right">' +
            `${kredit}` +
            "</td>" +
            '<td class="text-right">' +
            `${debet}` +
            "</td>" +
            '<td class="text-right">' +
            `${saldo}` +
            "</td>" +
            "</tr>";
        }
        $("#tb_transaksi").html(html);
      },
    });
  }

  $("#btnCetakPDF").on("click", function () {
    var fileName = $("#infoNama").text();
    if (fileName == "Username" || fileName == "-") {
      var fileName = new Date();
      cetakPDF(fileName);
    } else {
      cetakPDF(fileName);
    }
  });

  function cetakPDF(fileName) {
    var doc = new jsPDF("p", "pt");
    var res = doc.autoTableHtmlToJson(document.getElementById("table1"));
    doc.autoTable(res.columns, res.data, {
      margin: {
        top: 40,
      },
    });

    doc.save(fileName + ".pdf");
  }
});