<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" href="img/3.png"> -->
    <title>CIPKBO</title>
    <style>
        * {
            font-family: "Lato", sans-serif;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        const gantiHalaman = (page) => {
            window.location.href = 'halaman-pajak/pajak.php';

        }
    </script>
</head>

<body class="p-0 m-0 bg-gradient-to-r from-blue-500  to-indigo-400">
    <div class="w-full flex justify-center ">
        <div class="max-w-[1080px] flex justify-center py-6 ">
            <div class="max-w-[850px] shadow-lg bg-[#EEEEEE] p-6 rounded-md space-y-2 shadow-xl">
                <h1 class="text-[16px] font-bold">Pembayaran Informasi Pajak Kendaraan Bermotor Online Pulau Jawa</h1>
                <h1 class="text-justify text-[16px]">
                    Bayar pajak kendaraan bermotor online dengan mudah dan cepat
                    menggunakan plat nomor dari berbagai provinsi di Pulau Jawa.
                    Dapatkan informasi status pajak, tanggal jatuh tempo, dan
                    estimasi jumlah tagihan Anda.
                </h1>
                <div class="text-[16px]  bg-red-400/50 p-3">
                    <h1 class="font-bold">
                        Catatan Penting :
                    </h1>
                    <h1>
                        <ul>
                            <li>
                                1. Pajak online hanya bisa dilakukan untuk pembayaran tahunan (bukan 5 tahunan).
                            </li>
                            <li>
                                2. Untuk pajak 5 tahunan (ganti STNK & plat nomor), wajib datang ke Samsat untuk cek fisik kendaraan.
                            </li>
                            <li>
                                3. Pastikan data di STNK dan KTP sesuai nama pemilik agar tidak gagal validasi.
                            </li>
                        </ul>
                    </h1>
                </div>

                <div class="flex space-x-2 text-[16px] my-6 pointer">
                    <a href="" class=" bg-blue-500 px-4 py-2 rounded-[10px] text-white hover:bg-blue-600 hover:text-gray-200 transition">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="" class="bg-blue-500 px-4 py-2 rounded-[10px] text-white hover:bg-blue-600 hover:text-gray-200 transition">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="" class="bg-blue-500 px-4 py-2 rounded-[10px] text-white hover:bg-blue-600 hover:text-gray-200 transition">
                        <i class="fa-brands fa-linkedin-in"></i>

                    </a>
                    <a href="" class="bg-blue-500 px-4 py-2 rounded-[10px] text-white hover:bg-blue-600 hover:text-gray-200 transition">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 font-bold">
                    <div>
                        <ul class="text-[16px] font-normal space-y-2">
                            <li class="flex justify-between border-b p-3 relative hover:bg-gray-300" onclick="gantiHalaman('banten')">
                                <div>
                                    <h4 class="font-semibold">Bayar Pajak Kendaraan</h4>
                                    <div class="text-[14px]">Banten, DIY Yogyakarta, Jakarta, Jawa Barat, Jawa Tengah, Jawa Timur</div>
                                </div>
                                <i class="fa-solid fa-chevron-right absolute right-5 top-1/2 text-gray-500"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>