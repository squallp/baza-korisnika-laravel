<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kreiraj klijenta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <form action="{{ url('/kvarovi/store') }}" method="PUT">
                    @csrf <!-- csrf  Cros site security -->
                        <p>Izaberi klijenta:</p>
                        <select name="klijentID">
                            @foreach ($klijenti as $klijent)
                                <option value="{{ $klijent ->id }}">{{ $klijent ->name }}</option>
                            @endforeach
                        </select>

                        <p>Model auta: <input name="modelAuta" type="text" placeholder="Model auta"></p>
                        <p>Registarske tablice: <input name="registarskeTablice" type="text"
                                                       placeholder="Registarske tablice"></p>
                        <p>Simptom: <input name="simptom" type="text" placeholder="Simptom"></p>
                        <p>Dijagnoza: <input name="dijagnoza" type="text" placeholder="Dijagnoza"></p>
                        <p>Izvrsene popravke: <input name="izvrsenePopravke" type="text"
                                                     placeholder="Izvrsene popravke"></p>
                        <p>Ime majstora: <input name="imeMajstora" type="text" placeholder="Ime majstora"></p>
                        <p>
                            <button type="submit">Snimi</button>
                        </p>
                    </form>

                    <!-- Ispisivanje poruke sa validacije -->

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="background-color:red; list-style: none; padding: 10px">
                                    Poruka: {{ $error }}</li>
                            @endforeach

                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
