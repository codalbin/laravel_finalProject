<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FinalProject</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="css/style.css"/>
    </head>
  <x-layout>

    <x-header-nav-bar />

    <div class="py-10">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
          <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">About us</h2>
        </div>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-0">
          <h2>Project developped by TARDIVEL Albin & JOSEPH Enzo</h2>
        </div>
      </div>
    </div>
  </x-layout>
</html>
