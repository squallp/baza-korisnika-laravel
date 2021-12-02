<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kvarovi') }}
        </h2>
    </x-slot>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-1 bg-white border-b border-gray-200 komplet-spisak">
                        <!--
                        -->
                        {{-- Insert komponente sa slanjem podataka komponenti
                        <x-klijenti :users="$users" /> --}}

                        <div class="main-spisak">
                            <h2>Klijent: {{ $kvar->klijent->name }}</h2>
                            <h2>Model auta: {{ $kvar ->modelAuta }}</h2>
                            <h2>Registarske tablice: {{ $kvar ->registarskeTablice }}</h2>
                        </div>
                        <div class="main-spisak">
                            <h2>Ime majstora: {{ $kvar ->imeMajstora }}</h2>
                        </div>
                        <div class="main-spisak">
                            <h2><b>Dijagnoza:</b> {{ $kvar ->dijagnoza }}</h2>
                            <h2><b>Simptom:</b> {{ $kvar ->simptom }}</h2>
                        </div>
                        <div class="main-spisak">
                            <p><b>Izvršene popravke:</b> {{ $kvar ->izvrsenePopravke }}</p>
                        </div>

                        <div class="komentar-spisak">
                            <p><b>Komentar:</b> {{ $kvar ->comment }}</p>
                        </div>
                        <div class="dugmici-spisak">

                            <a href="{{ url('/kvarovi/edit') }}/{{ $kvar ->id }}">Edituj kvar</a>

                            <form action="{{ url('/kvarovi/delete') }}/{{ $kvar->id }}" method="HEAD">
                                @csrf
                                <button type="submit">Obrisi kvar</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
