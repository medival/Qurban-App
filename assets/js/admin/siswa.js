$(document).ready(function () {
  const baseUrl = "http://34.101.238.50/apptabungan/";
  show_nasabah();

  $("#table1").dataTable({
    pageLength: 50,
  });

  var cleaveNIS = new Cleave(".inputNIS", {
    numericOnly: true,
    blocks: [4],
  });

  var cleaveTgl = new Cleave(".inputTanggalLahir", {
    date: true,
    delimiter: "-",
    datePattern: ["Y", "m", "d"],
  });

  var cleaveTgl = new Cleave(".editTanggalLahir", {
    date: true,
    delimiter: "-",
    datePattern: ["Y", "m", "d"],
  });

  var cleavePhone = new Cleave(".inputKontak", {
    numericOnly: true,
    delimiter: " ",
    blocks: [4, 4, 4],
  });
  var cleavePhone = new Cleave(".editKontak", {
    numericOnly: true,
    delimiter: " ",
    blocks: [4, 4, 4],
  });


  $("#modalTambahNasabah").on("hidden.bs.modal", function () {
    $("#editNIS").val("");
    $("#editNama").val("");
    $("#editAlamat").val("");
    $("#editTempatLahir").val("");
    $("#editTanggalLahir").val("");
    $("#editNamaOrtu").val("");
    $("#editKontakOrangTua").val("");
    $('[name="edit_jenis_kelamin"]').checked = false;
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

    // Display date time in MM-dd-yyyy h:m:s format
    // return convdataTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
    return (convdataTime = year + "-" + month + "-" + day);
  }

  function datetoepoch(date) {
    return new Date(date).getTime() / 1000;
  }

  $("#table_nasabah").on("click", ".deleteNasabah", function () {
    var nis = $(this).data("nis");

    $("#modalHapusNasabah").modal("show");
    $('[name="deleteNIS"]').val(nis);
  });

  $("#btnDeleteNasabah").on("click", function () {
    var nis = $("#deleteNIS").val();
    $.ajax({
      type: "POST",
      url: `${baseUrl}admin/deletenasabah`,
      dataType: "JSON",
      data: {
        nis: nis,
      },
      success: function (data) {
        $('[name="deleteNIS"]').val("");
        $("#modalHapusNasabah").modal("hide");
        show_nasabah();
      },
    });
    return false;
  });

  $("#table_nasabah").on("click", ".editNasabah", function () {


    var nis = $(this).data("nis");
    var nama = $(this).data("nama");
    var alamat = $(this).data("alamat");
    var jenis_kelamin = $(this).data("jenis_kelamin");
    var tempat_lahir = $(this).data("tempat_lahir");
    var tanggal_lahir = $(this).data("tanggal_lahir");
    var nama_ortu = $(this).data("nama_ortu");
    var kontak_orangtua = $(this).data("kontak_orangtua");

    $("#modalEditNasabah").modal("show");
    $('[name="editNIS"]').val(nis);
    $('[name="editNama"]').val(nama);
    $('[name="editAlamat"]').val(alamat);
    $('[name="editTempatLahir"]').val(tempat_lahir);
    $('[name="editTanggalLahir"]').val(epochtodate(tanggal_lahir));
    $('[name="editNamaOrtu"]').val(nama_ortu);
    $('[name="editKontakOrangTua"]').val(kontak_orangtua);
    if (jenis_kelamin == "L") {
      document.getElementById("editLakiLaki").checked = true;
    } else if (jenis_kelamin == "P") {
      document.getElementById("editPerempuan").checked = true;
    }
  });

  $("#btnEditNasabah").on("click", function () {
    var nis = $("#editNIS").val();
    var nama = $("#editNama").val();
    var alamat = $("#editAlamat").val();
    var tempat_lahir = $("#editTempatLahir").val();
    var tanggal_lahir = $("#editTanggalLahir").val();
    var nama_ortu = $("#editNamaOrtu").val();
    var kontak_orangtua = $("#editKontakOrangTua").val();
    var kontak_orangtua = kontak_orangtua.replace(/\s/g, "");
    var kontak_orangtua = kontak_orangtua.replace(/\s/g, "");
    var jenis_kelamin = document.querySelector(
      'input[name="edit_jenis_kelamin"]:checked'
    ).value;
    var tanggal_lahir1 = datetoepoch(tanggal_lahir);

    $.ajax({
      type: "POST",
      url: `${baseUrl}admin/updatenasabah`,
      dataType: "JSON",
      data: {
        nis: nis,
        nama: nama,
        alamat: alamat,
        jenis_kelamin: jenis_kelamin,
        tempat_lahir: tempat_lahir,
        tanggal_lahir: tanggal_lahir1,
        nama_ortu: nama_ortu,
        kontak_orangtua: kontak_orangtua,
      },
      success: function (data) {
        $('[name="editNIS"]').val("");
        $('[name="editNama"]').val("");
        $('[name="editAlamat"]').val("");
        $('[name="editTempatLahir"]').val("");
        $('[name="editTanggalLahir"]').val("");
        $('[name="editNamaOrtu"]').val("");
        $('[name="editKontakOrangTua"]').val("");
        $('[name="edit_jenis_kelamin"]').checked = false;
        show_nasabah();
        $("#modalEditNasabah").modal("hide");
      },
    });
    return false;
  });

  $("#btnAddNasabah").on("click", function () {
    var nis = $("#inputNIS").val();
    var nama = $("#inputNama").val();
    var alamat = $("#inputAlamat").val();
    var tempat_lahir = $("#inputTempatLahir").val();
    var tanggal_lahir = $("#inputTanggalLahir").val();
    var nama_ortu = $("#inputNamaOrtu").val();
    var kontak_orangtua = $("#inputKontakOrangTua").val();
    var kontak_orangtua = kontak_orangtua.replace(/\s/g, "");
    var kontak_orangtua = kontak_orangtua.replace(/\s/g, "");
    var jenis_kelamin = document.querySelector(
      'input[name="jenis_kelamin"]:checked'
    ).value;

    $.ajax({
      type: "POST",
      url: `${baseUrl}admin/inputnasabah`,
      dataType: "JSON",
      data: {
        nis: nis,
        nama: nama,
        alamat: alamat,
        tempat_lahir: tempat_lahir,
        tanggal_lahir: tanggal_lahir,
        nama_ortu: nama_ortu,
        kontak_orangtua: kontak_orangtua,
        jenis_kelamin: jenis_kelamin,
      },
      success: function (data) {
        $("#modalTambahNasabah").modal("hide");
        $('[name="inputNIS"]').val("");
        $('[name="inputNama"]').val("");
        $('[name="inputAlamat"]').val("");
        $('[name="inputTempatLahir"]').val("");
        $('[name="inputTanggalLahir"]').val("");
        $('[name="inputNamaOrtu"]').val("");
        $('[name="inputKontakOrangTua"]').val("");
        $('[name="inputKontakOrangTua"]').val("");
        $('input[name="jenis_kelamin"]').prop("checked", false);
        show_nasabah();
      },
    });
    return false;
  });

  function show_nasabah() {
    $.ajax({
      type: "ajax",
      url: `${baseUrl}/admin/getAllnasabah`,
      async: false,
      dataType: "JSON",
      success: function (data) {
        var html = "";
        var i;
        var no = 1;
        var jk = "";
        for (i = 0; i < data.length; i++) {

          if(data[i].jenis_kelamin == "L"){
            jk = "Laki-laki";
          }else{
            jk = "Perempuan";
          }
          if (data[i].is_active == "1") {
            var aktif = "Aktif";
          } else if (data[i].is_active == "0") {
            var aktif = "Tidak Aktif";
          }
          html +=
            "<tr>" +
            '<td style="width: 2rem">' +
            no++ +
            "</td>" +
            "<td>" +
            `${data[i].nis}` +
            "</td>" +
            "<td>" +
            `${data[i].nama}` +
            "</td>" +
            "<td>" +
            `${jk}` +
            "</td>" +
            "<td>" +
            ` ${aktif} ` +
            "</td>" +
            "<td>" +
            epochtodate(data[i].created_at) +
            "</td>" +
            '<td> <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary editNasabah" data-nis="' +
            data[i].nis +
            '" data-nama="' +
            data[i].nama +
            '" data-jenis_kelamin="' +
            data[i].jenis_kelamin +
            '" data-tempat_lahir="' +
            data[i].tempat_lahir +
            '" data-tanggal_lahir="' +
            data[i].tanggal_lahir +
            '" data-alamat="' +
            data[i].alamat +
            '" data-nama_ortu="' +
            data[i].nama_ortu +
            '" data-kontak_orangtua="' +
            `${data[i].kontak_orangtua}` +
            '"> <i class="fa fa-file-alt"></i> </a> ' +
            '<a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-danger deleteNasabah" data-nis="' +
            data[i].nis +
            '"> <i class="fa fa-trash"></i> </a></td> ' +
            "</tr>";
        }
        $("#table_nasabah").html(html);
      },
    });
  }
});