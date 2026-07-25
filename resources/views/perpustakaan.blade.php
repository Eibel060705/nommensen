@extends('layouts.app')

@section('title', 'Perpustakaan')
@section('meta_description', 'Perpustakaan Digital B University.')

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-br from-blue-950 to-blue-800 py-20 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="text-sm font-semibold uppercase tracking-widest text-blue-200">
            Perpustakaan
        </p>

        <h1 class="mt-3 text-4xl font-extrabold sm:text-5xl">
            Perpustakaan Digital Cendekia
        </h1>

        <p class="mt-5 max-w-3xl text-lg leading-8 text-blue-100">
            Jelajahi koleksi buku yang telah dikelola melalui admin panel B University.
        </p>
    </div>
</section>

<!-- CONTENT -->
<section class="bg-slate-50 py-20">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mb-10 flex items-center justify-between">

            <div>
                <h2 class="text-3xl font-bold text-slate-900">
                    Koleksi Buku
                </h2>

                <p class="mt-2 text-slate-500">
                    Daftar buku yang tersedia di perpustakaan.
                </p>
            </div>

            <div class="rounded-full bg-blue-100 px-5 py-2 text-sm font-semibold text-blue-700">
                Total tampil: {{ $books->count() }} Buku
            </div>

        </div>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

            @forelse($books as $book)

                <div
                    class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl">

                    {{-- Cover --}}
                    @if($book->cover)
                        <img
                            src="{{ asset('storage/'.$book->cover) }}"
                            alt="{{ $book->title }}"
                            class="h-80 w-full object-cover">
                    @else
                        <img
                            src="https://placehold.co/600x800/E2E8F0/475569?text=No+Cover"
                            alt="No Cover"
                            class="h-80 w-full object-cover">
                    @endif

                    {{-- Content --}}
                    <div class="p-7">

                        <h2 class="mb-4 line-clamp-2 text-2xl font-bold text-slate-900">
                            {{ $book->title }}
                        </h2>

                        <div class="space-y-3 text-sm text-slate-600">

                            <div class="flex justify-between">
                                <span class="font-semibold">Penulis</span>
                                <span>{{ $book->author }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="font-semibold">Kategori</span>
                                <span>{{ $book->category }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="font-semibold">Tahun</span>
                                <span>{{ $book->publication_year }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="font-semibold">Stok</span>
                                <span>{{ $book->stock }} Buku</span>
                            </div>

                        </div>

                        <div class="mt-6 border-t border-slate-200 pt-5">

                            @if($book->stock > 0)

                                <span
                                    class="inline-flex items-center rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="mr-2 h-4 w-4"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M5 13l4 4L19 7"/>
                                    </svg>

                                    Tersedia

                                </span>

                            @else

                                <span
                                    class="inline-flex items-center rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-700">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="mr-2 h-4 w-4"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>

                                    Habis

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div
                    class="col-span-full rounded-3xl border border-dashed border-slate-300 bg-white p-16 text-center">

                    <h3 class="text-2xl font-bold text-slate-900">
                        Belum Ada Buku
                    </h3>

                    <p class="mt-3 text-slate-500">
                        Silakan tambahkan data buku melalui panel admin Filament.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection