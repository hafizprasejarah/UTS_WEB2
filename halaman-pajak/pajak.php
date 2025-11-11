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
$wilayah = $_POST['wilayah'] ?? 0;
$tahunpajak = $_POST['tahun'] ?? 0;
$keyword = $_POST['keyword'] ?? 0;

$error = '';
$data = null;
$hasil_cari = [];
if ($keyword != '') {
    foreach ($kendaraan as $platNomor => $item) {
        if (stripos($platNomor, $keyword) !== false || stripos($item['nama'], $keyword) !== false || stripos($item['jenis'], $keyword) !== false) {
            $hasil_cari[$platNomor] = $item;
            
        }
    }

} else {
    $hasil_cari = $kendaraan; // Jika tidak mencari, tampilkan semua
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <div class="max-w-[1080px] grid grid-column justify-center space-y-6 py-6">
            <div class="max-w-[850px] shadow-lg bg-white/90 p-6 rounded-md space-y-2 shadow-xl w-[800px] ">
                <div class="w-full flex justify-between py-6">
                    <h2 class="font-bold text-lg mb-3">Pengechekan Data Kendaraan</h2>
                    <a href="../" class="bg-blue-500 px-4 py-2 rounded-[10px] text-white hover:bg-blue-600 hover:text-gray-200 transition">
                        <i class="fa-solid fa-house"></i>
                    </a>
                </div>
                <form action="" method="post" class="grid grid-cols-[auto_1px_1fr] gap-3 justify-center items-center">

                    <div>Nomor Plat</div>
                    <div>:</div>
                    <input required="text" name="plat" maxlength="8" minlength="8" class=" border rounded px-2 py-1 w-full">

                    <div>NIK</div>
                    <div>:</div>
                    <input required type="text" maxlength="16"
                        minlength="0" class=" border rounded px-2 py-1 w-full" name="nik">

                    <div class="flex- flex-column">
                        <h4>No Rangka</h4>
                        <p class="text-[10px] text-gray-500">(5 Digit Terakhir Nomor Rangka bisa dilihat di STNK)</p>
                    </div>
                    <div>:</div>
                    <input required type="number" name="no_rangka" maxlength="5" minlength="5" min="0" class=" border rounded px-2 py-1 w-full">

                    <div>Wilayah</div>
                    <div>:</div>
                    <select name="wilayah" class=" border rounded px-2 py-1 w-full" required>
                        <option value="DIY">DIY Yogyakarta</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                        <option value="Jawa Timur">Jawa Timur</option>
                    </select>

                    <div>Pembayaran</div>
                    <div>:</div>
                    <div class="flex gap-3 ">
                        <label><input type="radio" name="tahun" value="1" required> 1 Tahun</label>
                        <label><input type="radio" name="tahun" value="5" required> 5 tahun</label>
                    </div>


                    <div></div>
                    <div></div>
                    <button type="submit" name="cek" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Cek Pajak</button>


                </form>
            </div>

            <div class="max-w-[850px]  shadow-lg bg-white/90 p-6 rounded-md shadow-xl">
                <?php
                if (isset($_POST['cek'])) : ?>
                    <?php
                    if (!isset($kendaraan[$plat])) {
                        $error = "Data kendaraan tidak ditemukan.";
                    } else {
                        $data = $kendaraan[$plat];

                        if ($data['nomor_rangka'] !== $nomorRangkaInput) {
                            $error = "Nomor rangka tidak sesuai.";
                        } elseif ($data['nik'] !== $nik) {
                            $error = "NIK tidak sesuai.";
                        }
                    }

                    $kodeBayar = strtoupper(substr(md5($plat . time()), 0, 10));

                    $total = ($data['pajak_pokok'] + $data['denda']) * $tahunpajak;
                    ?>
                    <?php if ($error) : ?>
                        <div class="text-red-600 font-semibold"><?= $error ?></div>
                    <?php else : ?>

                        <h3 class="">Informasi Pajak Kendaraan</h3>
                        Nama Pemilik : <?= $data['nama'] ?><br>
                        Jenis Kendaraan : <?= $data['jenis'] ?><br>
                        Wilayah : <?= $wilayah ?><br>
                        Pajak Pokok : Rp<?= number_format($data['pajak_pokok'], 0, ',', '.') ?><br>
                        Denda : Rp<?= number_format($data['denda'], 0, ',', '.') ?><br>
                        Tahun : <?= $tahunpajak ?><br>
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
                            <input type="hidden" name="wilayah" value="<?= $wilayah ?>">
                            <input type="hidden" name="tahun" value="<?= $tahunpajak ?>">

                            <div class="flex items-center gap-3">
                                <label for="bayar">Bayar :</label>
                                <input id="bayar" required type="number" min="0" name="input_bayar" class="border rounded px-2 py-1"
                                    onchange="update(this, <?= $total ?>)">
                            </div>
                            <p id="hasilBayar"></p>

                            <div class=" flex items-center w-full">
                                <button type="submit" name="bayar" class="px-3 py-1 bg-gray-400 text-white rounded hover:bg-gray-500">Bayar</button>
                            </div>
                        </form>
                        <br>
                    <?php endif ?>

                <?php endif; ?>

                <?php if (isset($_SESSION['pesan'])): ?>
                    <div>Uang Kurang</div>
                    <?php unset($_SESSION['pesan']) ?>
                <?php endif; ?>
            </div>

            <div class="max-w-[850px]  shadow-lg bg-white/90 p-6 rounded-md shadow-xl w-[800px]">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="font-bold text-lg">Daftar Data Kendaraan</h2>

                    <form method="post" class="flex items-center gap-2">
                        <input type="text" name="keyword" placeholder="Cari plat, nama, atau jenis..." value="<?= htmlspecialchars($keyword) ?>" class="border rounded px-3 py-1 w-[250px]">
                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Cari</button>
                    </form>
                </div>
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2">Plat</th>
                            <th class="border p-2">Nama</th>
                            <th class="border p-2">Jenis</th>
                            <th class="border p-2">Pajak Pokok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($hasil_cari as $platNomor => $data) {
                            echo "<tr>
                        <td class='border p-2 text-center'>{$no}</td>
                        <td class='border p-2'>{$platNomor}</td>
                        <td class='border p-2'>{$data['nama']}</td>
                        <td class='border p-2'>{$data['jenis']}</td>
                        <td class='border p-2'>Rp" . number_format($data['pajak_pokok'], 0, ',', '.') . "</td></tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>