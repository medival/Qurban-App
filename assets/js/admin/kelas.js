$(document).ready(function () {
  const baseUrl = `http://localhost/apptabungan/`;
  show_kelas();

  $("#table1").dataTable();

  $("#table1").on("click", ".deletekelas", function () {
    var id_kelas = $(this).data("id_kelas");

    $("#modalDeleteKelas").modal("show");
    $('[name="deleteidkelas"]').val(id_kelas);
  });

  $("#btnDeleteKelas").on("click", function () {
    var id_kelas = $("#deleteidkelas").val();
    $.ajax({
      type: "POST",
      url: `${baseUrl}admin/deletekelas`,
      dataType: "JSON",
      data: {
        id_kelas: id_kelas,
      },
      success: function (data) {
        $('[name="deleteidkelas"]').val("");
        $("#modalDeleteKelas").modal("hide");
        show_kelas();
      },
    });
    return false;
  });

  $("#btnAddKelas").on("click", function () {
    var kelas = $("#inputkelas").val();

    $.ajax({
      type: "POST",
      url: `${baseUrl}admin/inputkelas`,
      dataType: "JSON",
      data: {
        kelas: kelas,
      },
      success: function (data) {
        $("#modalTambahKelas").modal("hide");
        show_kelas();
      },
    });
    return false;
  });

  $("#table1").on("click", ".editkelas", function () {
    var id_kelas = $(this).data("id_kelas");
    var kelas = $(this).data("kelas");

    $("#modalEditKelas").modal("show");
    $('[name="editIdKelas"]').val(id_kelas);
    $('[name="editKelas"]').val(kelas);
  });

  $("#btnUpdateKelas").on("click", function () {
    var kelas = $("#editKelas").val();
    var id_kelas = $("#editIdKelas").val();

    $.ajax({
      type: "POST",
      url: `${baseUrl}admin/updatedatakelas`,
      dataType: "JSON",
      data: {
        id_kelas: id_kelas,
        kelas: kelas,
      },
      success: function (data) {
        $("#modalEditKelas").modal("hide");
        show_kelas();
      },
    });
    return false;
  });

  function show_kelas() {
    $.ajax({
      type: "ajax",
      url: `${baseUrl}admin/getkelaslist`,
      async: false,
      dataType: "JSON",
      success: function (data) {
        var html = "";
        var i;
        var no = 1;
        for (i = 0; i < data.length; i++) {
          html +=
            "<tr>" +
            '<td style="width: 2rem">' +
            no++ +
            "</td>" +
            "<td>" +
            `${data[i].id_kelas}` +
            "</td>" +
            "<td>" +
            `${data[i].kelas}` +
            "</td>" +
            '<td> <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary editkelas" data-id_kelas="' +
            data[i].id_kelas +
            '" data-kelas="' +
            data[i].kelas +
            '"><i class="fa fa-file-alt"></i> </a> ' +
            '<a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-danger deletekelas" data-id_kelas="' +
            data[i].id_kelas +
            '"> <i class="fa fa-trash"></i> </a></td> ' +
            "</tr>";
        }
        $("#table_kelas").html(html);
      },
    });
  }
});