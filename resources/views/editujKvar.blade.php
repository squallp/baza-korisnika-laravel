<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edituj kvar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 komplet-spisak">


                    <form action="{{ url('/kvarovi/update/') }}/{{ $kvar->id }}" method="PUT">
                    @csrf <!-- csrf  Cros site security -->
                        <p>Model auta:<br /><input name="modelAuta" type="text" placeholder="Model auta" value="{{ $kvar->modelAuta }}"></p>
                        <p>Registarske tablice:<br /><input name="registarskeTablice"  type="text" placeholder="Registarske tablice" value="{{ $kvar->registarskeTablice }}"></p>
                        <p>Ime majstora:<br /><input name="imeMajstora"  type="text" placeholder="Ime majstora" value="{{ $kvar->imeMajstora }}"></p>
                        <p>Simptom:<br /><input name="simptom"  type="text" placeholder="Simptom" value="{{ $kvar->simptom }}"></p>
                        <p>Dijagnoza:<br /><input name="dijagnoza"  type="text" placeholder="Dijagnoza" value="{{ $kvar->dijagnoza }}"></p>
                        <p>Izvrsene popravke:<br /><input name="izvrsenePopravke"  type="text" placeholder="Izvrsene popravke" value="{{ $kvar->izvrsenePopravke }}"></p>
                        <p>Komentar:<br /><input name="comment"  type="text" placeholder="Opis..." value="{{ $kvar->comment }}"></p>
                        <p><button type="submit" class="dugme">Snimi</button></p>
                    </form>

                    <!-- Ispisivanje poruke sa validacije -->

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="background-color:red; list-style: none; padding: 10px">Poruka: {{ $error }}</li>
                            @endforeach

                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
