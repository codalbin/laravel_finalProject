<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    {{-- <title>{{ $title }}</title> --}}

</head>
<body class="bg-gray-50 m-0">
  <div class="min-h-full">

      {{-- <x-navbar></x-navbar> --}}
      {{-- <x-header>{{ $title }}</x-header> --}}
      {{-- {{ $title }} --}}
      <main>
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
              {{ $slot }}
          </div>
      </main>
  </div>
</body>

</html>
