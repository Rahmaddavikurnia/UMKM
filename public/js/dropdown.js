
    $(document).ready(function() {
        // Memanggil API untuk mendapatkan daftar provinsi
        $.ajax({
            url: '/api/provinces',
            type: 'GET',
            success: function(data) {
                $('#province').empty();
                $('#province').append('<option value="">Pilih Provinsi</option>');
                $.each(data, function(key, value) {
                    $('#province').append('<option value="' + value.province_id + '">' + value.province + '</option>');
                });
            }
        });

        // Mengambil kabupaten/kota berdasarkan provinsi yang dipilih
        $('#province').change(function() {
            var province_id = $(this).val();
            if (province_id) {
                $.ajax({
                    url: '/api/regencies/' + province_id,
                    type: 'GET',
                    success: function(data) {
                        $('#regency').empty();
                        $('#regency').append('<option value="">Pilih Kabupaten/Kota</option>');
                        $.each(data, function(key, value) {
                            $('#regency').append('<option value="' + value.city_id + '">' + value.city_name + '</option>');
                        });
                    }
                });
            } else {
                $('#regency').empty();
                $('#regency').append('<option value="">Pilih Kabupaten/Kota</option>');
            }
        });
    });

