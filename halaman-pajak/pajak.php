<?php
session_start();

$kendaraan = [
    'AB1234CD' => [
        'nama' => 'Andi Pratama',
        'nik' => '3401012300010001',
        'jenis' => 'Motor',
        'nomor_rangka' => '12345',
        'pajak_pokok' => 250000,
        'denda' => 0,
        'status_bayar' => false
    ],
    'B5678EF' => [
        'nama' => 'Rina Utami',
        'nik' => '3174025400020002',
        'jenis' => 'Mobil',
        'nomor_rangka' => '67890',
        'pajak_pokok' => 950000,
        'denda' => 100000,
        'status_bayar' => false
    ],
    'D1122GH' => [
        'nama' => 'Bagus Santoso',
        'nik' => '3273016500030003',
        'jenis' => 'Motor',
        'nomor_rangka' => '11223',
        'pajak_pokok' => 300000,
        'denda' => 50000,
        'status_bayar' => false
    ],
    'L3344IJ' => [
        'nama' => 'Siti Aisyah',
        'nik' => '3578017200040004',
        'jenis' => 'Mobil',
        'nomor_rangka' => '33445',
        'pajak_pokok' => 1200000,
        'denda' => 0,
        'status_bayar' => false
    ],
    'H5566KL' => [
        'nama' => 'Dewi Kartika',
        'nik' => '3374098500050005',
        'jenis' => 'Motor',
        'nomor_rangka' => '55667',
        'pajak_pokok' => 275000,
        'denda' => 25000,
        'status_bayar' => false
    ]
];



$plat =  $_POST['plat'] ?? '';
$nik = $_POST['nik'] ?? '';
$nomorRangkaInput = $_POST['no_rangka'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script>
        const update = (input, total) => {
            const bayar = parseInt(input.value) || 0;
            const info = document.getElementById('hasilBayar');

            if (bayar < total) {
                info.textContent = `Uang anda kurang Rp ${total - bayar}`;
                info.className = "text-red-600 font-semibold";
            } else if (bayar > total) {
                info.textContent = `Kembali Rp ${bayar - total}`;
                info.className = "text-green-600 font-semibold";
            } else {
                info.textContent = `Pembayaran pas!`;
                info.className = "text-blue-600 font-semibold";
            }
        };
    </script>
</head>

<body class="p-0 m-0 bg-gradient-to-r from-blue-500  to-indigo-400">
    <div class="w-full flex justify-center ">
        <div class="max-w-[1080px] grid grid-column justify-center space-y-6 py-6 ">
            <div class="max-w-[850px] shadow-lg bg-white/90 p-6 rounded-md space-y-2 shadow-xl ">
                <form action="" method="post" class="grid grid-cols-[auto_1px_1fr] gap-3 justify-center items-center">

                    <div>Nomor Plat</div>
                    <div>:</div>
                    <input required="text" name="plat" maxlength="8" minlength="8" class="ml-2 border rounded px-2 py-1 w-full">

                    <div>NIK</div>
                    <div>:</div>
                    <input required type="text" maxlength="16"
                        minlength="0" class="ml-2 border rounded px-2 py-1 w-full" name="nik">

                    <div class="flex- flex-column">
                        <h4>No Rangka</h4>
                        <p class="text-[10px] text-gray-500">(5 Digit Terakhir Nomor Rangka bisa dilihat di STNK)</p>
                    </div>
                    <div>:</div>
                    <input required type="number" name="no_rangka" maxlength="5" minlength="5" min="0" class="ml-2 border rounded px-2 py-1 w-full">

                    <div class=" flex items-center w-full">
                        <button type="submit" name="cek" class="px-3 py-1 bg-gray-400 text-white rounded hover:bg-gray-500">Cek</button>
                    </div>

                </form>
            </div>

            <div class="max-w-[850px] shadow-lg bg-white/90 p-6 rounded-md shadow-xl ">
                <?php
                if (isset($_POST['cek'])) : ?>

                    <?php
                    if (!isset($kendaraan[$plat])) {
                        echo "❌ Data kendaraan tidak ditemukan.";
                        exit;
                    }
                    $data = $kendaraan[$plat];

                    if ($data['nomor_rangka'] !== $nomorRangkaInput) {
                        echo "❌ Nomor rangka tidak sesuai.";
                        exit;
                    }
                    $total = $data['pajak_pokok'] + $data['denda'];

                    $kodeBayar = strtoupper(substr(md5($plat . time()), 0, 10));

                    ?>


                    <h3 class="">Informasi Pajak Kendaraan</h3>
                    Nama Pemilik : <?= $data['nama'] ?><br>
                    Jenis Kendaraan : <?= $data['jenis'] ?><br>
                    Pajak Pokok : Rp<?= number_format($data['pajak_pokok'], 0, ',', '.') ?><br>
                    Denda : Rp<?= number_format($data['denda'], 0, ',', '.') ?><br>
                    <b>Total Bayar : Rp <?= number_format($total, 0, ',', '.') ?></b><br><br>
                    Kode Bayar Anda : <b><?= $kodeBayar ?></b><br>

                    <hr>
                    <br>
                    <form action="kwitansi.php" method="post" class=" flex flex-col space-y-6">
                        <!-- Hidden data -->
                        <input type="hidden" name="plat" value="<?= $plat ?>">
                        <input type="hidden" name="kode_bayar" value="<?= $kodeBayar ?>">
                        <input type="hidden" name="total" value="<?= $total ?>">
                        <input type="hidden" name="nama" value="<?= $data['nama'] ?>">

                        <div class="flex">
                            <label for="bayar">Bayar:</label>
                            <input id="bayar" required type="number" min="0" name="input_bayar" class="ml-2 border rounded px-2 py-1"
                                onchange="update(this, <?= $total ?>)">
                        </div>
                        <p id="hasilBayar"></p>

                        <div class=" flex items-center w-full">
                            <button type="submit" name="bayar" class="px-3 py-1 bg-gray-400 text-white rounded hover:bg-gray-500">Bayar</button>
                        </div>
                    </form>
                    <br>

                    <?php if (isset($_POST['bayar'])) {
                        $jumlahbayar = $_POST['input_bayar'];
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
                                'nama' => $kendaraan[$plat]['nama']
                            ];
                            header('Location: kwitansi.php');
                            exit;
                        }
                    }
                    ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>