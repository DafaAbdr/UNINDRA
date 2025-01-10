function hitungTotal() {
    var item1 = parseFloat(document.getElementById("item1").value);
    var item2 = parseFloat(document.getElementById("item2").value);
    var item3 = parseFloat(document.getElementById("item3").value);
    var totalBelanja, diskon, totalBayar, pesanError = "";

    if (isNaN(item1) || item1 < 0 || isNaN(item2) || item2 < 0 || isNaN(item3) || item3 < 0) {
        pesanError = "Input tidak valid. Harap masukkan angka positif untuk semua item.";
        document.getElementById("hasil").innerHTML = pesanError;
        return;
    }

    totalBelanja = item1 + item2 + item3;

    if (totalBelanja < 100000) {
        diskon = 0;
    } else if (totalBelanja >= 100000 && totalBelanja <= 499999) {
        diskon = 0.1 * totalBelanja;
    } else if (totalBelanja >= 500000 && totalBelanja <= 999999) {
        diskon = 0.2 * totalBelanja;
    } else {
        diskon = 0.3 * totalBelanja;
    }

    totalBayar = totalBelanja - diskon;

    var hasil = `
        Harga Item 1: Rp ${item1.toLocaleString('id-ID')}<br>
        Harga Item 2: Rp ${item2.toLocaleString('id-ID')}<br>
        Harga Item 3: Rp ${item3.toLocaleString('id-ID')}<br><br>
        Total Belanja: Rp ${totalBelanja.toLocaleString('id-ID')}<br>
        Besar Diskon: Rp ${diskon.toLocaleString('id-ID')}<br>
        Total Bayar: Rp ${totalBayar.toLocaleString('id-ID')}
    `;
    document.getElementById("hasil").innerHTML = hasil;
}