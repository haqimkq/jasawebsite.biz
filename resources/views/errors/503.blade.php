<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<body class="bg-gray-900">
    <div class="grid grid-cols-2 h-screen px-5">
        <div class="flex items-center">
            <div class="space-y-3">
                <p class="text-7xl text-white font-bold">
                    Oops !!
                </p>
                <p class="text-3xl text-white">Website Under Maintenance</p>
            </div>
        </div>
        <div class="flex items-center justify-center">
            <div class=" w-3/4">
                <lottie-player src="https://lottie.host/08c17038-de1a-4cae-9e22-49ab664bf9c5/2oge7AgYR2.json"
                    background="transparent" speed="1" loop autoplay></lottie-player>
            </div>
        </div>

    </div>

</body>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

</html>
