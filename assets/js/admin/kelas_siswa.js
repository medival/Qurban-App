var baseUrl = "http://localhost/apptabungan/";


$(document).ready(function () {
  $('.select2').select2();
  showData();
  
  $("#table1").dataTable();


 

});

$('#btnTambah').click(function(){
  $('#modal').modal('show');
  batal();
  getKelas();
  getTahun();
  getSiswa();
  $('#formData')[0].reset();
  $("#judul").text("Tambah Kelas Siswa");
});

$("#btnHapus").click(function (e) { 
  e.preventDefault();
  $('#modalHapus').modal('show');
});

$('.batal').click(batal);

function batal(){
  $('#formData')[0].reset();
  $("[name='id_ksiswa']").val("");
  $("[name='id_tahun']").val("");
  $("[name='id_ruang']").val("");
  $("[name='nis']").val("");
  $("[name='keterangan']").val("");
}

function showData() {
  $.ajax({
    type: "ajax",
    url: `${baseUrl}admin/getksiswalist`,
    async: false,
    dataType: "JSON",
    success: function (data) {
      console.log(data);
      var html = "";
      var i;
      var no = 1;
      for (i = 0; i < data.length; i++) {
        if(data[i].is_active == 1){
          statusAktif = "Aktif";
        }else{
          statusAktif = "Tidak Aktif";
        }
        html +=
          `<tr>
            <td style="width: 2rem">${no++}</td>
            <td>${data[i].tahun} (${statusAktif})</td>
            <td>${data[i].kelas}${data[i].ruang}</td>
            <td>${data[i].nis}</td>
            <td>${data[i].nama}</td>
            <td>${data[i].keterangan}</td>
            <td> <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary" onclick="edit(${data[i].id_ksiswa})"><i class="fa fa-file-alt"></i> </a>
            <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-danger" onclick="hapus(${data[i].id_ksiswa})"> <i class="fa fa-trash"></i> </a>
            </td>
          </tr>`;
      }
      $("#table_ksiswa").html(html);
    },
  });
  return false;
}

function hapus(id_ksiswa){ 
  $('#modalHapus').modal('show');
  batal();

  $("#deleteid_ksiswa").val(id_ksiswa);

}

$("#btnDeleteKelasSiswa").on("click", function () {
  var id_ksiswa = $("#deleteid_ksiswa").val();
  $.ajax({
    type: "POST",
    url: `${baseUrl}admin/deleteksiswa`,
    dataType: "JSON",
    data: {
      id_ksiswa: id_ksiswa,
    },
    success: function (data) {
      $('[name="deleteid_ksiswa"]').val("");
      $("#modalHapus").modal("hide");
      batal();
      showData();
    },
  });
});


function edit(id_ksiswa){
  $('#modal').modal('show');
  batal();

  $.ajax({
    type: 'POST',
    url: `${baseUrl}admin/getksiswaid`,
    dataType : "JSON",
    data : {id_ksiswa : id_ksiswa},
    success: function(result){

      $("#judul").text("Edit Kelas Siswa");
      console.log(result);
      getKelas();
      getTahun();
      getSiswa();
      $("#id_ksiswa").val(result['id_ksiswa']);
      $("[name='id_ruang']").val(result['id_ruang']);
      $("[name='id_tahun']").val(result['id_tahun']);
      $("[name='nis']").val(result['nis']);
      $("[name='keterangan']").val(result['keterangan']);
    },
    error: function(xhr, textStatus, errorThrown) {
        console.log('error');
    }
  });
  return false;
}


function getKelas() {
  $.ajax({
    type: "ajax",
    url: `${baseUrl}admin/getAllruangkelas`,
    async: false,
    dataType: "JSON",
    success: function (data) {
      var html = "";
      var i;
      html += '<option value="">--Pilih Kelas--</option>';
      for (i = 0; i < data.length; i++) {
        html +=
          '<option value="' +
          data[i].id_ruang +
          '"> ' +
          data[i].kelas +
          " " +
          data[i].ruang +
          " </option>";
      }
      $("#id_ruang").html(html);
      //$("#eksiswa").html(html);
    },
  });
}


function getTahun() {
  $.ajax({
    type: "ajax",
    url: `${baseUrl}admin/gettahunlist`,
    async: false,
    dataType: "JSON",
    success: function (data) {
      var html = "";
      var i;
      html += '<option value="">--Pilih Tahun Ajaran--</option>';
      let statusAktif = "";
      for (i = 0; i < data.length; i++) {
        if(data[i].is_active == 1){
          statusAktif = "Aktif";
        }else{
          statusAktif = "Tidak Aktif";
        }
        html += `<option value="${data[i].id_tahun}">${data[i].tahun} - ${statusAktif}</option>`;
      }
      $("#id_tahun").html(html);
      //$("#eksiswa").html(html);
    },
  });
}

function getSiswa() {
  $.ajax({
    type: "ajax",
    url: `${baseUrl}admin/getsiswalist`,
    async: false,
    dataType: "JSON",
    success: function (data) {
      var html = "";
      var i;
      html += '<option value="">--Pilih Siswa--</option>';
      for (i = 0; i < data.length; i++) {
        html +=
          `<option value="${data[i].nis}">${data[i].nis} - ${data[i].nama}</option>`;
      }
      $("#nis").html(html);
      $("#nis").select2("val", "");
      //$("#eksiswa").html(html);
    },
  });
}

$(function(){
  $("#formData").submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    console.log(formData);

    $.ajax({
      url:`${baseUrl}admin/inputksiswa`,
      type:"POST",
      dataType : 'JSON',
      data:formData,
      processData: false,
      contentType: false,
      cache: false,
      async: false,
      success:function(data) {
        
          $("#modal").modal('hide');
          batal();
          showData();
        
      }
  
    });
    
   
  });
});
