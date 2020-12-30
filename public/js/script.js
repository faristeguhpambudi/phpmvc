$(function () {
    $('.tombolTambahData').on('click', function () {
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.buttonModal').html('Tambah');
    });


    $('.tampilModalUbah').on('click', function () {
        //UBAH TAMPILAN HTML DI MODAL
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.buttonModal').html('Ubah');
        $('.aksiModal').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

        //AMBIL ID YANG MAU DIUPDATE
        const id = $(this).data('id');

        //JALANIN AJAX
        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getUbah',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#npm').val(data.npm);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });
    });
});