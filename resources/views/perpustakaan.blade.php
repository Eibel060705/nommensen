@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    <h1 class="text-4xl font-bold text-center mb-10">
        Perpustakaan Digital
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach($books as $book)

        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">

            @if($book->cover)
                <img src="{{ asset('storage/'.$book->cover) }}"
                     class="w-full h-72 object-cover">
            @else
                <img src="https://via.placeholder.com/400x500?text=No+Cover"
                     class="w-full h-72 object-cover">
            @endif

            <div class="p-5">

                <h2 class="text-xl font-bold mb-2">
                    {{ $book->title }}
                </h2>

                <p><strong>Penulis :</strong> {{ $book->author }}</p>

                <p><strong>Kategori :</strong> {{ $book->category }}</p>

                <p><strong>Tahun :</strong> {{ $book->publication_year }}</p>

                <p><strong>Stok :</strong> {{ $book->stock }}</p>

                @if($book->stock > 0)

                    <span class="inline-block mt-3 px-3 py-1 bg-green-100 text-green-700 rounded-full">
                        Tersedia
                    </span>

                @else

                    <span class="inline-block mt-3 px-3 py-1 bg-red-100 text-red-700 rounded-full">
                        Habis
                    </span>

                @endif

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection