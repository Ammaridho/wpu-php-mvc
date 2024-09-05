$(function () { // menjalankan jquery saat ready


    $('.tampilModal').on('click', function () {

        // set head modal text
        let text = $(this).data('name');
        $('#formModalLabel').text(text + ' Data Mahasiswa');

        // set button submit text
        $('.modal-footer button[type=submit]').text(text);

        // set form action sesuai tambah atau ubah
        $('.modal-body form').attr('action', 'http://localhost/wpu-mvc/public/mahasiswa/' + text);

        if (text == 'Ubah') {
            const id = $(this).data('id');
            $.ajax({
                url: 'http://localhost/wpu-mvc/public/mahasiswa/getUbah',
                data: { id: id },
                method: 'post',
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    $('#nama').val(result.nama);
                    $('#nim').val(result.nim);
                    $('#email').val(result.email);
                    $('#jurusan').val(result.jurusan);
                    $('#id').val(result.id);
                }
            });
        } else {
            $('#nama').val('');
            $('#nim').val('');
            $('#email').val('');
            $('#jurusan').val('');
            $('#id').val('');
        }

    });


})