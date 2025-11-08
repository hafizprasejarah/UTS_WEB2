<?php
session_start();

if (isset($_POST['bayar'])) {
    $plat = $_POST['plat'];
    $kodeBayar = $_POST['kode_bayar'];
    $total = $_POST['total'];
    $jumlahbayar = $_POST['input_bayar'];
    $nama = $_POST['nama'];

    if ($jumlahbayar >= $total) {
        $_SESSION['data_pembayaran'] = [
            'plat' => $plat,
            'kode_bayar' => $kodeBayar,
            'total' => $total,
            'jumlah_dibayar' => $jumlahbayar,
            'kembali' => $jumlahbayar - $total,
            'tanggal' => date('Y-m-d H:i:s'),
            'nama' => $nama
        ];
    } else {
        echo "❌ Uang kurang, tidak bisa membuat kwitansi.";
        exit;
    }
}

$data = $_SESSION['data_pembayaran'] ?? null;
if (!$data) {
    echo "❌ Tidak ada data pembayaran.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FC PRT</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script>
        document.addEventListener("keydown", (btn) => {
            if (btn.key == "Enter") {
                event.preventDefault();
                const btnsubmit = document.getElementById("submit-btn");
                if (btnsubmit) {
                    btnsubmit.click();
                }
            }
        });
    </script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500  to-indigo-400">
    <div class="w-full h-screen flex items-center justify-center p-0 m-0  rounded-lg">
        <div class="flex flex-col space-y-5 w-full max-w-[400px] shadow-xl px-8 pb-8 rounded-lg  bg-white/90 backdrop-blur-md">

            <h1 class=" w-full text-[20px] font-bold text-center py-5 border-b-3 border-dashed border-gray-500 ">KWITANSI</h1>
            
                <div class="grid grid-cols-[auto_auto_1fr] gap-x-2 gap-y-1">
                    <p>Kode Bayar</p>
                    <p>:</p>
                    <p><?= $data['kode_bayar'] ?></p>

                    <p>Nama</p>
                    <p>:</p>
                    <p><?= $data['nama'] ?></p>

                    <p>Plat Nomor</p>
                    <p>:</p>
                    <p><?= $data['plat'] ?></p>

                    <p>Total Bayar</p>
                    <p>:</p>
                    <p>Rp<?=  number_format($data['total'], 0, ',', '.') ?></p>

                    <p>Jumlah Dibayar</p>
                    <p>:</p>
                    <p>Rp<?= number_format($data['jumlah_dibayar'], 0, ',', '.') ?></p>

                    <p>kembalian</p>
                    <p>:</p>
                    <p>Rp<?= number_format($data['kembali'], 0, ',', '.') ?></p>

                    <p>Tanggal</p>
                    <p>:</p>
                    <p><?= $data['tanggal'] ?></p>

                </div>
          
            <div class="border-b-3 border-dashed border-gray-500 w-full"></div>
            <div class="flex justify-center">
                <a href="pajak.php" class="w-full">
                    <button id="submit-btn" type="submit"
                        class="w-full bg-indigo-600 text-white font-semibold py-2 rounded-lg hover:bg-indigo-700 transition duration-200 cursor-pointer shadow-md hover:shadow-lg">Kembali</button>
                </a>
            </div>
        </div>
</body>

</html>