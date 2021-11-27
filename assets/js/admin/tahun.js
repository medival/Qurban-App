$(document).ready(function () {
  const baseUrl = `http://localhost/apptabungan/`;
  show_tahun();

  $("#table1").dataTable();

  $("#table1").on("click", ".deletetahun", function () {
    var id_tahun = $(this).data("id_tahun");

    $("#modalDeleteTahun").modal("show");
    $('[name="deleteidtahun"]').val(id_tahun);
  });

  $("#btnDeleteTahun").on("click", function () {
    var id_tahun = $("#deleteidtahun").val();
    $.ajax({
      type: "POST",
      url: `${baseUrl}admin/deletetahun`,
      dataType: "JSON",
      data: {
        id_tahun: id_tahun,
      },
      success: function (data) {
        $('[name="deleteidtahun"]').val("");
        $("#modalDeleteTahun").modal("hide");
        show_tahun();
      },
    });
    return false;
  });

  $("#btnAddTahun").on("click", function () {
    var tahun = $("#inputtahun").val();
    var is_active = $("#inputis_active").val();

    $.ajax({
      type: "POST",
      url: `${baseUrl}admin/inputtahun`,
      dataType: "JSON",
      data: {
        tahun: tahun,
        is_active: is_active,
      },
      success: function (data) {
        $("#modalTambahTahun").modal("hide");
        show_tahun();
      },
    });
    return false;
  });

  $("#table1").on("click", ".edittahun", function () {
    var id_tahun = $(this).data("id_tahun");
    var tahun = $(this).data("tahun");
    var is_active = $(this).data("is_active");
    console.log(id_tahun,tahun,is_active);

    $("#modalEditTahun").modal("show");
    $('[name="editIdTahun"]').val(id_tahun);
    $('[name="editTahun"]').val(tahun);
    $('[name="editis_active"]').val(is_active);
  });

  $("#btnUpdateTahun").on("click", function () {
    var tahun = $("#editTahun").val();
    var id_tahun = $("#editIdTahun").val();
    var is_active = $("#editis_active").val();

    $.ajax({
      type: "POST",
      url: `${baseUrl}admin/updatedatatahun`,
      dataType: "JSON",
      data: {
        id_tahun: id_tahun,
        tahun: tahun,
        is_active: is_active,
      },
      success: function (data) {
        $("#modalEditTahun").modal("hide");
        show_tahun();
      },
    });
    return false;
  });

  function show_tahun() {
    $.ajax({
      type: "ajax",
      url: `${baseUrl}admin/gettahunlist`,
      async: false,
      dataType: "JSON",
      success: function (data) {
        var html = "";
        var i;
        var no = 1;
        for (i = 0; i < data.length; i++) {
          html +=
            `<tr>
              <td style="width: 2rem">${no++}</td>
              <td>${data[i].tahun}</td>
              <td>`;
              if(data[i].is_active == 0){
                html += `Tidak`;
              }else{
                html += `Aktif`;
              }
          html += `</td>
              <td> <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary edittahun" data-id_tahun="${data[i].id_tahun}"  data-is_active="${data[i].is_active}" data-tahun="${data[i].tahun}"><i class="fa fa-file-alt"></i> </a>
              <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-danger deletetahun" data-id_tahun="${data[i].id_tahun }"> <i class="fa fa-trash"></i> </a></td>
            </tr>`;
        }
        $("#table_tahun").html(html);
      },
    });
  }
});