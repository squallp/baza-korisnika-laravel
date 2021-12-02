<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Klijenti') }}
        </h2>
    </x-slot>
    <div class="py-6 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="GET" action="#">
                    <input name="pretraga" placeholder="Pretrazi klijente">
                    <button type="submit" class="">Pretraga</button>
                </form>
            </div>
        </div>
    </div>


    @foreach ($klijenti as $klijent)
        <div class="py-6 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-1 bg-white border-b border-gray-200 komplet-spisak">
                        <!--
                        -->
                        {{-- Insert komponente sa slanjem podataka komponenti
                        <x-klijenti :users="$users" /> --}}

                        <div class="main-spisak">
                            <h1><b>Naziv:</b> {{ $klijent ->name }}</h1>
                            <p><b>Mail:</b> {{ $klijent ->email }}</p>
                            <p><b>Telefon:</b> {{ $klijent ->telephone }}</p>
                        </div>
                        <div class="komentar-spisak">
                            <p><b>Komentar:</b> {{ $klijent ->comment }}</p>
                        </div>
                        <div class="dugmici-spisak">
                            <a href="{{ url('/klijenti/show') }}/{{ $klijent ->id }}">Prikazi klijenta</a>

                            <a href="{{ url('/klijenti/edit') }}/{{ $klijent ->id }}">Edituj klijenta</a>

                            <form action="{{ url('/klijenti/delete') }}/{{ $klijent->id }}" method="HEAD">
                                @csrf
                                <button type="submit">Obrisi klijenta</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @endforeach

{{-- renda linkove za paginaciju --}}
{{$klijenti->links()}}
</x-app-layout>
