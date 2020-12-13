$(document).ready(function () {
  const baseUrl = "http://localhost/apptabungan/";
  show_user();

  $("#table1").dataTable();

  $(".inputRole").select2({
    placeholder: "Pilih Hak Akses",
    allowClear: true,
  });

  $(".editRole").select2({
    placeholder: "Pilih Role",
    allowClear: true,
  });

  $("#tambahUser").on("click", function () {
    getrole();
  });

  $("#table1").on("click", ".is_active", function () {
    var id = $(this).data("id");

    console.log(baseUrl);
    $.ajax({
      type: "POST",
      url: `${baseUrl}admin/userkontrol/${id}`,
      dataType: "json",
      data: {},
      success: function (data) {
        show_user();
      },
    });
    return false;
  });

  $("#modalUpdateUser").on("hidden.bs.modal", function () {
    $("#editid").val("");
    $("#editname").val("");
    $("#editEmail").val("");
  });

  $("#tb_user").on("click", ".editUser", function () {
    var id = $(this).data("id");
    var name = $(this).data("name");
    var email = $(this).data("email");
    var role = $(this).data("role");

    console.log(name, email, role);
    $("#modalEditUser").modal("show");
    $('[name="editid"]').val(id);
    $('[name="editNama"]').val(name);
    $('[name="editEmail"]').val(email);
    getrole();
    document.getElementById("eRole").value = 1;
  });

  $("#tb_user").on("click", ".deleteUser", function () {
    var id = $(this).data("id");
    $("#modalDeleteUser").modal("show");
    $('[name="deleteIdUser"]').val(id);
  });

  $("#btnDeleteUser").on("click", function () {
    var id = $("#deleteIdUser").val();

    $.ajax({
      type: "post",
      url: `${baseUrl}admin/deleteuser`,
      dataType: "json",
      data: {
        id: id,
      },
      success: function (data) {
        $("#modalDeleteUser").modal("hide");
        show_user();
      },
    });
    return false;
  });

  $("#btnUpdateUser").on("click", function () {
    var id = $("#editid").val();
    var name = $("#editNama").val();
    var email = $("#editEmail").val();
    var role = $("#eRole").find(":selected").val();

    console.log(name, email, role, id);
    $.ajax({
      type: "POST",
      url: `${baseUrl}admin/edituser`,
      dataType: "JSON",
      data: {
        id: id,
        name: name,
        email: email,
        role: role,
        id_ruang: null,
        nip: null,
      },
      success: function (data) {
        console.log(data);
        $("#modalEditUser").modal("hide");
        show_user();
      },
    });
    return false;
  });

  $("#table1").on("click", ".deletekelas", function () {
    var id_kelas = $(this).data("id_kelas");

    $("#modalDeleteKelas").modal("show");
    $('[name="deleteidkelas"]').val(id_kelas);
  });

  $("#btnAddUser").on("click", function () {
    var nama = $("#inputNama").val();
    var email = $("#inputEmail").val();
    var password = $("#inputPassword").val();
    var role = $("#pRole").find(":selected").val();

    console.log(nama, email, password, role);

    $.ajax({
      type: "post",
      url: `${baseUrl}admin/adduser`,
      dataType: "JSON",
      data: {
        nama: nama,
        email: email,
        password: password,
        role: role,
        nip: null,
        id_ruang: null,
      },
      success: function (data) {
        $("#modalTambahUser").modal("hide");
        show_user();
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

  function getrole() {
    $.ajax({
      type: "ajax",
      url: `${baseUrl}admin/getroleadmin`,
      async: false,
      dataType: "JSON",
      success: function (data) {
        console.log(data);
        var html = "";
        var i;
        var ini = "<option></option>";
        for (i = 0; i < data.length; i++) {
          html +=
            '<option value="' +
            data[i].id_role +
            '"> ' +
            data[i].role_name +
            "</option>";
        }
        $("#pRole").html(ini + html);
        $("#eRole").html(ini + html);
      },
    });
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
    // return convdataTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
    return (convdataTime = year + "-" + month + "-" + day);
  }

  function show_user() {
    $.ajax({
      type: "ajax",
      url: `${baseUrl}admin/getadmin`,
      async: false,
      dataType: "JSON",
      success: function (data) {
        console.log(data);
        var html = "";
        var no = 1;
        var i;
        for (i = 0; i < data.length; i++) {
          var id = data[i].id;
          if (data[i].is_active == 1) {
            var is_active =
              '<span data-id="' +
              id +
              '" data-is_active="' +
              1 +
              '"class="badge badge-success is_active">Aktif </span>';
          } else if (data[i].is_active == 0) {
            var is_active =
              '<span data-id="' +
              id +
              '" data-is_active="' +
              0 +
              '"class="badge badge-danger is_active"> Inaktif</span>';
          }
          if (data[i].role == 1) {
            var roleId = role;
            var role = "Adminstrator";
          } else if (data[i].role == 2) {
            var roleId = role;
            var role = "Operator";
          }
          var name = data[i].name;
          var email = data[i].email;
          var created_at = epochtodate(data[i].created_at);

          html +=
            "<tr>" +
            "<td> " +
            no++ +
            "</td>" +
            "<td> " +
            name +
            "</td>" +
            "<td> " +
            email +
            "</td>" +
            "<td> " +
            role +
            "</td>" +
            "<td>" +
            is_active +
            "</td>" +
            "<td>" +
            created_at +
            "</td>" +
            "<td>" +
            '<a href="javascript:void(0);"  class="btn btn-icon icon-left btn-outline-primary editUser" data-id="' +
            id +
            '" data-name="' +
            name +
            '" data-email="' +
            email +
            '" data-role="' +
            role +
            '"> <i class="fa fa-file-alt"></i> </a> ' +
            '<a href="#" class="btn btn-icon icon-left btn-outline-danger deleteUser" data-id="' +
            id +
            '"> <i class="fa fa-trash"></i> </a>' +
            "</td>";
          ("</tr>");
        }
        $("#tb_user").html(html);
      },
    });
    return false;
  }
});