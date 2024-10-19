<!-- resources/views/location.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Wilayah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Select Bertingkat Wilayah Indonesia</h2>
        <form>
            <div class="form-group">
                <label for="province">Provinsi</label>
                <select class="form-control" id="province">
                    <option value="">Pilih Provinsi</option>
                    <!-- Provinsi akan dimuat di sini -->
                </select>
            </div>

            <div class="form-group">
                <label for="regency">Kabupaten/Kota</label>
                <select class="form-control" id="regency" disabled>
                    <option value="">Pilih Kabupaten/Kota</option>
                    <!-- Kabupaten/Kota akan dimuat di sini -->
                </select>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Load provinces on page load
            $.ajax({
                url: '/api/provinces',
                type: 'GET',
                success: function(response) {
                    let provinces = response.data;
                    $.each(provinces, function(key, province) {
                        $('#province').append(`<option value="${province.province_id}">${province.name}</option>`);
                    });
                }
            });

            // Load regencies when a province is selected
            $('#province').on('change', function() {
                let provinceId = $(this).val();
                if (provinceId) {
                    $('#regency').prop('disabled', false).empty().append('<option value="">Pilih Kabupaten/Kota</option>');
                    $('#district').prop('disabled', true).empty().append('<option value="">Pilih Kecamatan</option>');
                    
                    $.ajax({
                        url: `/api/regencies/${provinceId}`,
                        type: 'GET',
                        success: function(response) {
                            let regencies = response.data;
                            $.each(regencies, function(key, regency) {
                                $('#regency').append(`<option value="${regency.regency_id}">${regency.name}</option>`);
                            });
                        }
                    });
                } else {
                    $('#regency').prop('disabled', true).empty().append('<option value="">Pilih Kabupaten/Kota</option>');
                    $('#district').prop('disabled', true).empty().append('<option value="">Pilih Kecamatan</option>');
                }
            });

            // Load districts when a regency is selected
        });
    </script>
</body>
</html>
