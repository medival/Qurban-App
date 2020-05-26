<script>
    $(document).ready(function() {

        show_kelas();

        $('#table1').dataTable();

        $('#table1').on('click', '.deleteruangkelas', function() {
            var id_ruang = $(this).data('id_ruang');

            $("#modalDeleteRuangan").modal('show');
            $('[name="deleteidruang"]').val(id_ruang);
        });

        $('#modalTambahRuangan').on('hidden.bs.modal', function() {
            $('#txtinputruang').val("");
        })

        $('#btnDeleteRuangan').on('click', function() {
            var id_ruang = $('#deleteid_ruang').val();
            // console.log(id_ruang);
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/deleteruangkelas'); ?>',
                dataType: 'JSON',
                data: {
                    id_ruang: id_ruang
                },
                success: function(data) {
                    $('[name="deleteidruang"]').val("");
                    $('#modalDeleteRuangan').modal('hide');
                    show_kelas();
                }
            })
        });

        $('#btnAddKelas').on('click', function() {
            var kelas = $('#inputkelas').val();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/inputkelas') ?>',
                dataType: 'JSON',
                data: {
                    kelas: kelas
                },
                success: function(data) {
                    $('[name="inputkelas"]').val("");
                    $('#modalTambahKelas').modal('hide');
                }
            })
        })

        $('#btnAddRuangan').on('click', function() {
            var id_kelas = $('#pkelas').find(":selected").val();
            var ruang = $('#txtinputruang').val();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/inputruangkelas') ?>',
                dataType: 'JSON',
                data: {
                    id_kelas: id_kelas,
                    ruang: ruang
                },
                success: function(data) {
                    $('#modalTambahRuangan').modal('hide');
                    show_kelas();
                }
            })
            return false;
        });

        $('#btnModalTambahRuangan').on('click', function() {
            func_pilihkelas();
        })

        function func_pilihkelas() {
            $.ajax({
                type: "ajax",
                url: "<?php echo site_url("admin/getkelaslist") ?>",
                async: false,
                dataType: "json",
                success: function(data) {
                    var html = '';
                    var ini = '<option></option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        // ini;
                        html += '<option value="' + data[i].id_kelas + '">' + data[i].kelas + ' </option>';
                    }
                    $('#pkelas').html(ini + html);
                    $('#ekelas').html(ini + html);
                    // show_kelas();
                }
            })
            return false;
        }


        $('#table1').on('click', '.editruangkelas', function() {
            func_pilihkelas();

            var id_ruang = $(this).data('id_ruang');
            var ruang = $(this).data('ruang');
            var id_kelas = $(this).data('id_kelas');

            $('#modalEditRuangan').modal('show');
            $('[name="editidruang"]').val(id_ruang);
            $('[name="editruang"]').val(ruang);
            document.getElementById('ekelas').value = id_kelas;
        })

        $('#btnEditRuangan').on('click', function() {

            var id_ruang = $('#editidruang').val();
            var ruang = $('#editruang').val();
            var id_kelas = $('#ekelas').find(':selected').val();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/updateruangkelas'); ?>',
                dataType: 'JSON',
                data: {
                    id_ruang: id_ruang,
                    ruang: ruang,
                    id_kelas: id_kelas
                },
                success: function(data) {
                    $('[name="editidruang"]').val("");
                    $('[name="editruang]').val("");
                    $('#modalEditRuangan').modal('hide');
                    show_kelas();
                }
            })
            return false;
            // console.log(ruang, id_ruang, id_kelas)
        })

        function show_kelas() {
            $.ajax({
                type: "ajax",
                url: "<?php echo base_url('admin/getAllruangkelas'); ?>",
                async: false,
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    var i;
                    var no = 1;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td style="width: 2rem">' + no++ + '</td>' +
                            '<td>' + `${data[i].id_ruang}` + '</td>' +
                            // '<td>' + `${data[i].id_kelas}` + '</td>' +
                            // '<td>' + 'jml' + '</td>' +
                            '<td>' + `${data[i].kelas}` + ` ${data[i].ruang}` + '</td>' +
                            // '<td>' + +'</td>' +
                            '<td>' + `${data[i].name}` + '</td>' +
                            '<td> <a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-primary editruangkelas" data-id_ruang="' + data[i].id_ruang + '" data-id_kelas="' + data[i].id_kelas + '" data-ruang="' + data[i].ruang + '"><i class="fa fa-file-alt"></i> </a> ' +
                            '<a href="javascript:void(0);" class="btn btn-icon icon-left btn-outline-danger deleteruangkelas" data-id_ruang="' + data[i].id_ruang + '"> <i class="fa fa-trash"></i> </a></td> ' +
                            '</tr>';
                    }
                    $('#table_kelas').html(html);
                }
            })
            return false;
        }

        $('.inputruang').select2({
            placeholder: "Pilih Kelas",
            allowClear: true
        });
    });
</script>