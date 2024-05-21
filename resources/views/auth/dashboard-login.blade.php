<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ["Poppins", "sans-serif"],
                    },
                }
            }
        }
    </script>
</head>

<body>
    <div class="relative flex justify-center items-center min-h-screen overflow-auto h-fit bg-[url('{{ url(asset('storage/assets/background_dashboard_login.svg')) }}')] bg-no-repeat bg-cover">
        <div class="absolute z-0 opacity-70 bg-[#3484DF] h-full w-screen bg-cover"></div>
        <div class="relative min-h-full h-fit w-screen flex justify-center items-center flex-col space-y-16">
            <img src="{{ url(asset('storage/assets/logo_dashboard_login.svg')) }}" class="w-1/2 md:w-1/4 h-fit" alt="logo_prodi">
            <p class="font-poppins w-10/12 font-bold text-3xl md:text-5xl text-center text-white">SISTEM INFORMASI PENILAIAN <br> DAN BERITA ACARA PENILAIAN TUGAS AKHIR <br> TEKNIK INFORMATIKA ITERA</p>
            <a href="/login" class="bg-[#E0BC40] p-2 px-10 rounded-[5px] text-white font-poppins font-medium  text-base md:text-lg">
                Login
            </a>
        </div>
    </div>
</body>

</html>
