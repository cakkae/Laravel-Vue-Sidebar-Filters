@extends('layouts.app')

@section('content')
    <!-- component -->
<div class="bg-white shadow rounded-lg p-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="grid lg:grid-cols-1 col-span-2 gap-6">
            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                  <p>
                    <label for="name" class="bg-white text-gray-600 px-1">Ime *</label>
                  </p>
                </div>
                <p>
                  <input id="name" value="{{Auth::user()->name}}" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                </p>
              </div>
              <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                  <p>
                    <label for="lastname" class="bg-white text-gray-600 px-1">Prezime *</label>
                  </p>
                </div>
                <p>
                  <input id="lastname" value="{{Auth::user()->name}}" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                </p>
              </div>
              <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                  <p>
                    <label for="username" class="bg-white text-gray-600 px-1">Naziv preduzeća *</label>
                  </p>
                </div>
                <p>
                  <input id="username" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                </p>
              </div>
              <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                  <p>
                    <label for="username" class="bg-white text-gray-600 px-1">Država / Regija *</label>
                  </p>
                </div>
                <p>
                  <input id="username" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                </p>
              </div>
              <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                  <p>
                    <label for="username" class="bg-white text-gray-600 px-1">Ulica *</label>
                  </p>
                </div>
                <p>
                  <input id="username" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                </p>
              </div>
              <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                  <p>
                    <label for="username" class="bg-white text-gray-600 px-1">Kanton (nije obavezno)</label>
                  </p>
                </div>
                <p>
                  <input id="username" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                </p>
              </div>
              <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                  <p>
                    <label for="username" class="bg-white text-gray-600 px-1">Poštanski broj *</label>
                  </p>
                </div>
                <p>
                  <input id="username" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                </p>
              </div>
              <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                  <p>
                    <label for="username" class="bg-white text-gray-600 px-1">Telefon *</label>
                  </p>
                </div>
                <p>
                  <input id="username" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                </p>
              </div>
        </div>
        <div class="grid lg:grid-cols-1 gap-6">
            <h1>BLA</h1>
        </div>
    </div>
    <div class="border-t mt-6 pt-3">
      <button class="bg-primary rounded w-full text-gray-100 px-3 py-4">
        NARUČI
      </button>
    </div>
</div>
@endsection
