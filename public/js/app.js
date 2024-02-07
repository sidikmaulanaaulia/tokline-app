$(document).ready(function () {
    // Mendeteksi perubahan pada elemen select
    $("#sizeSelect").change(function () {
        // Mendapatkan nilai yang dipilih
        var ukuranTerpilih = $(this).val();

        // Memperbarui nilai di div ringkasan belanja
        $("#ukuranTerpilih").text(ukuranTerpilih);
    });
});

$(document).ready(function () {
    // Fungsi yang dipanggil ketika nilai input berubah
    $(".quantity").on("input", function () {
        updateTotalHarga();
    });

    // Fungsi yang dipanggil ketika tombol kurang diklik
    $(".btn-kurang").on("click", function () {
        var inputQuantity = $(this).parent().siblings(".quantity");
        var currentQuantity = parseInt(inputQuantity.val(), 10);

        // Kurangi nilai jika lebih dari 1
        if (currentQuantity > 1) {
            inputQuantity.val(currentQuantity - 1).trigger("input");
        }
    });

    // Fungsi yang dipanggil ketika tombol tambah diklik
    $(".btn-tambah").on("click", function () {
        var inputQuantity = $(this).parent().siblings(".quantity");
        var currentQuantity = parseInt(inputQuantity.val(), 10);
        var stok = parseInt(inputQuantity.data("stok"), 10);

        // Tambah nilai jika belum mencapai stok
        if (currentQuantity < stok) {
            inputQuantity.val(currentQuantity + 1).trigger("input");
        }
    });

    function updateTotalHarga() {
        var currentQuantity = parseInt($(".quantity").val(), 10);
        var hargaPerUnit = parseFloat($(".harga").data("harga"));

        // Perbarui total harga
        var totalHarga = currentQuantity * hargaPerUnit;
        $(".total-harga").text(totalHarga);
    }
});

// Gunakan event listener untuk mendeteksi perubahan pada input terkait ongkir
$('#destination, #courier, #weight').on('change', function () {
    // Ambil nilai kota, kurir, dan berat dari input
    var selectedDestination = $('#destination').val();
    var selectedCourier = $('#courier').val();
    var selectedWeight = $('#weight').val();

    // Lakukan permintaan ke server untuk menghitung ongkir
    $.ajax({
        url: 'https://api.rajaongkir.com/starter/cost',  // Ganti dengan endpoint yang sesuai di Laravel
        key : 'aca75271d45a42757fb47477a60c5087',  // Ganti dengan endpoint yang sesuai di Laravel
        method: 'POST',
        data: {
            destination: selectedDestination,
            courier: selectedCourier,
            weight: selectedWeight
        },
        success: function (response) {
            // Perbarui tampilan total ongkir
            $('#ongkir').text('Rp ' + response.totalOngkir);
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
});


//ubah profile





