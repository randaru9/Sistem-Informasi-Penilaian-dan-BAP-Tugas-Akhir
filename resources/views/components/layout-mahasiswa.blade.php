<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>{{ $title }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                          gold : "#C5A127",
                          blue1 : "#2392EC"
                        },
                        fontFamily: {
                            poppins: ["Poppins", "sans-serif"],
                        },
                    }
                }
            }
        </script>
    </head>

    <body class="bg-blue1">
        <x-sidebar-mahasiswa modal="notif"/>
        <div class="p-4 sm:ml-72 bg-white h-screen md:rounded md:rounded-l-[30px]">
            <x-navbar modal="notif"/>
            <x-modal-notif modal="notif"/>
            <x-breadcrumbs :$collection/>
            {{$slot}}
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </body>
    </html>
</div>
