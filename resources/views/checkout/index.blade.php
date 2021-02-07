@extends('layouts.app')

@section('content')
    <!-- component -->
<div class="bg-white shadow rounded-lg p-6">
    <form action="{{route('checkout.store')}}" method="POST">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="grid lg:grid-cols-1 col-span-2 gap-4">
                <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="name" class="bg-white text-gray-600 px-1">Ime *</label>
                    </p>
                    </div>
                    <p>
                    <input id="name" value="{{Auth::user()->name}}" name="name" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                    </p>
                </div>
                <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="lastname" class="bg-white text-gray-600 px-1">Prezime *</label>
                    </p>
                    </div>
                    <p>
                    <input id="lastname" value="{{Auth::user()->lastname}}" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                    </p>
                </div>
                <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="company" class="bg-white text-gray-600 px-1">Naziv preduzeća *</label>
                    </p>
                    </div>
                    <p>
                    <input id="company" value="{{Auth::user()->company}}" name="company" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                    </p>
                </div>
                <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="country" class="bg-white text-gray-600 px-1">Država / Regija *</label>
                    </p>
                    </div>
                    <p>
                    <input id="country" value="{{Auth::user()->country}}" name="country" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                    </p>
                </div>
                <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="address" class="bg-white text-gray-600 px-1">Adresa *</label>
                    </p>
                    </div>
                    <p>
                    <input id="address" autocomplete="false" tabindex="0" value="{{Auth::user()->address}}" name="address" type="text" class="py-1 px-1 outline-none block h-full w-full">
                    </p>
                </div>

                <label><input type="checkbox" name="addressCheckbox" class="addressCheckbox" onclick="$(this).attr('value', this.checked ? 1 : 0)"> Želim koristiti drugu adresu za dostavu</label>

                <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="city" class="bg-white text-gray-600 px-1">Grad *</label>
                    </p>
                    </div>
                    <p>
                    <input id="city" value="{{Auth::user()->city}}" name="city" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                    </p>
                </div>
                <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="zip" class="bg-white text-gray-600 px-1">Poštanski broj *</label>
                    </p>
                    </div>
                    <p>
                    <input id="zip" value="{{Auth::user()->zip}}" name="zip" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                    </p>
                </div>
                <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="phone" class="bg-white text-gray-600 px-1">Telefon *</label>
                    </p>
                    </div>
                    <p>
                    <input id="phone" value="{{Auth::user()->phone}}" name="phone" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                    </p>
                </div>
            </div>
            <div id="summary" class="grid lg:grid-cols-1 gap-1">
                <h1 class="font-semibold text-2xl border-b pb-8">Vaša narudžba</h1>
                @foreach($items as $item)
                <div class="flex justify-between">
                    <span class="font-semibold text-sm uppercase">{{$item->name}}</span>
                    <span class="font-semibold text-sm">{{$item->quantity.' x '.number_format($item->price,2).' KM' }}</span>
                </div>
                @endforeach
                <hr/>
                <div class="flex justify-between">
                    <h4><strong class="text-right">Ukupno: {{number_format($getSubTotal,2).' KM'}} </strong></h4>
                </div>
                <div>
                    <label class="font-medium inline-block mb-3 text-sm uppercase">Dostava</label>
                    <select class="block p-2 text-gray-600 w-full text-sm">
                    <option selected>Euroexpress - 10.00 KM</option>
                    </select>
                </div>
                <div>
                    <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Kupon</label>
                    <input type="text" id="promo" placeholder="Unesite kupon" class="p-2 text-sm w-full">
                </div>
                <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">
                    <i class="fal fa-pencil-alt"></i>
                    AŽURIRAJ
                </button>
                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-1 text-sm uppercase">
                        <h2 class="black">UKUPNO: {{ number_format($getSubTotal,2).' KM' }}</h2>
                    </div>
                    <div class="flex font-semibold justify-between py-1 text-sm uppercase">
                        <h2 class="black">PDV: {{number_format($pdv->parsedRawValue,2).' KM'}}</h2>
                    </div>
                    <div class="flex font-semibold justify-between py-1 text-sm uppercase">
                        <h2 class="black">DOSTAVA: {{number_format($shipping->parsedRawValue,2).' KM'}}</h2>
                    </div>
                    <div class="flex font-semibold justify-between py-1 text-sm uppercase">
                        <h2 class="black">UKUPNO SA PDV: {{ number_format($getSubTotal+$pdv->parsedRawValue+$shipping->parsedRawValue,2).' KM' }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div class="border-t mt-6 pt-3 grid lg:grid-cols-1 col-span-1 gap-4">
                <button type="submit" class="bg-primary rounded w-full text-gray-100 px-3 py-4">
                    <i class="fal fa-check-circle"></i> ZAVRŠI NARUDŽBU
                </button>
            </div>
            <div class="border-t mt-6 pt-3 grid lg:grid-cols-1 col-span-1 gap-4">
                <a type="button" :href="'/'" class="text-center bg-primary rounded w-full text-gray-100 px-3 py-4 backToShop">
                    <i class="fal fa-backward"></i> VRATI SE NA SHOP
                </a>
            </div>
        </div>
    </form>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

    });
</script>

<style>
    .black {
        color: black;
    }
</style>
