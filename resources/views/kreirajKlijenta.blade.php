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


                    <form action="{{ url('/klijenti/store') }}" method="PUT">
                    @csrf <!-- csrf  Cros site security -->
                        <p>Ime: <input name="name" type="text" placeholder="Naziv klijenta"></p>
                        <p>e mail: <input name="email"  type="text" placeholder="e-mail"></p>
                        <p>Telefon: <input name="telephone"  type="text" placeholder="Telefon"></p>
                        <p>Komentar: <input name="comment"  type="text" placeholder="Opis..."></p>
                        <p><button type="submit">Snimi</button></p>
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
