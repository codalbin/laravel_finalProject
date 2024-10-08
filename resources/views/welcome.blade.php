<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FinalProject</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body class="antialiased">

        <x-header-nav-bar />

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
              <h1 class="text-3xl font-bold tracking-tight text-gray-900">Welcome Home</h1>
            </div>
          </header>
          <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h2>Project developped by TARDIVEL Albin & JOSEPH Enzo</h2>
            </div>
          </main>
    </body>
</html>
