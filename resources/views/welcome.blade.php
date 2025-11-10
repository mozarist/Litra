<x-app-layout>

    {{-- about us --}}
    <div class="flex flex-col md:flex-row gap-10 justify-between items-center w-full">
        <div class="max-w-2xl w-full space-y-8">
            <h2 class="text-3xl lg:text-6xl">
                Apa itu Litra?
            </h2>

            <div class="space-y-2">
                <p class="text-base leading-tight">
                    Di tengah derasnya arus informasi digital, Litra hadir sebagai ruang untuk berhenti sejenak.
                    Membaca
                    dengan sadar, merenung, dan berbagi kembali.
                </p>

                <p class="text-base leading-tight">
                    Kami percaya bahwa literasi bukan cuma soal membaca buku, tapi juga memahami, berdialog, dan
                    tumbuh
                    bersama ide-ide yang kita temui di dunia digital.
                </p>
            </div>

            <div>
                <a href="{{ route('products.index') }}">
                    <x-primary-button>
                        Gabung dengan Litra!
                    </x-primary-button>
                </a>
            </div>
        </div>

        <div class="flex w-fit pt-24">
            <img src="https://images.unsplash.com/photo-1460518451285-97b6aa326961?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170"
                alt="img"
                class="bg-zinc-100 w-[400px] h-[300px] object-cover border-4 border-zinc-100 rounded-xl rotate-3">
            <img src="https://images.unsplash.com/photo-1491440091121-b546925dc8a1?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170"
                alt="img"
                class="absolute -m-24 bg-zinc-100 w-[400px] h-[300px] object-cover border-4 border-zinc-100 rounded-xl -rotate-3">
        </div>
    </div>

    <div class="space-y-2 md:space-y-8">

        <div class="flex gap-4 justify-between items-end border-b border-zinc-300 pb-4">
            <h2 class="text-2xl md:text-6xl">Terbaru dari kami</h2>
            <div>
                <a href="{{ route('products.index') }}"
                    class="underline hover:text-zinc-800 font-medium transition">Lihat
                    lebih
                    banyak
                    artikel kami
                </a>
            </div>
        </div>

        @if ($product->isEmpty())
            <p
                class="text-zinc-700 text-center font-semibold p-5 py-20 w-full border-2 border-zinc-500 border-dashed rounded-md">
                Maaf! Belum ada artikel tersedia
            </p>
        @else
            <div
                class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols:3 xl:grid-cols-4 2xl-grid-cols-4 gap-5 items-center">

                @foreach ($product->take(4) as $p)
                    <a href="{{ route('products.show', $p->id) }}">
                        <x-book-card title="{{ $p->nama }}" description="{{ $p->deskripsi }}">
                            {{ asset('storage/' . $p->gambar) }}
                        </x-book-card>
                    </a>
                @endforeach

            </div>
        @endif
    </div>

    <div class="space-y-2 md:space-y-8">

        <div class="flex gap-4 justify-between items-end border-b border-zinc-300 pb-4">
            <h2 class="text-2xl md:text-6xl">Buku Terbaru</h2>
            <div>
                <a href="{{ route('products.index') }}"
                    class="underline hover:text-zinc-800 font-medium transition">Lihat lebih
                    banyak
                    buku
                </a>
            </div>
        </div>

        @if ($product->isEmpty())
            <p
                class="text-zinc-700 text-center font-semibold p-5 py-20 w-full border-2 border-zinc-500 border-dashed rounded-md">
                Maaf! Belum ada buku Tersedia
            </p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 items-center">

                @foreach ($product->take(8) as $p)
                    <a href="{{ route('products.show', $p->id) }}">
                        <div
                            class="flex flex-col gap-5 bg-zinc-50 p-5 w-full h-full border border-zinc-400 rounded-xl hover:scale-105 transition">
                            <img src="{{ asset('storage/' . $p->gambar) }}" alt=""
                                class="flex-2 w-full aspect-square object-cover border border-zinc-400 rounded-xl">

                            <div class="flex-1 flex flex-col gap-5 justify-between w-full h-full">
                                <div class="space-y-2">
                                    <h6 class="text-sm md:text-lg/5 font-semibold truncate">
                                        {{ $p->nama }}
                                    </h6>

                                    <span class="text-sm font-base truncate">
                                        -{{ $p->author }}
                                    </span>

                                    <p class="text-zinc-700 text-sm leading-tight line-clamp-2">
                                        {{ $p->deskripsi }}
                                    </p>
                                </div>

                                <div class="flex items-center gap-2">

                                    <p class="text-sm font-semibold leading-none">
                                        Kategori: <span class="text-zinc-700">{{ $p->kategori }}</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        @endif
    </div>

    <div class="space-y-2 md:space-y-8">

        <div class="flex gap-4 justify-between items-end border-b border-zinc-300 pb-4">
            <h2 class="text-2xl md:text-6xl">Ruang Pikiran Pembaca</h2>
            <div>
                <a href="{{ route('products.index') }}"
                    class="underline hover:text-zinc-800 font-medium transition">Lihat lebih
                    banyak
                </a>
            </div>
        </div>

        @if ($product == true)
            <p
                class="text-zinc-700 text-center font-semibold p-5 py-12 w-full border-2 border-zinc-500 border-dashed rounded-md">
                Maaf! Belum ada pembaca yang membagikan pikiran mereka
            </p>
        @else
        @endif
    </div>

    <div class="space-y-2 md:space-y-8">

        <div class="flex gap-4 justify-between items-end border-b border-zinc-300 pb-4">
            <h2 class="text-2xl md:text-6xl">Blog Ulasan Buku</h2>
            <div>
                <a href="{{ route('products.index') }}"
                    class="underline hover:text-zinc-800 font-medium transition">Lihat lebih
                    banyak
                    buku
                </a>
            </div>
        </div>

        @if ($product == true)
            <p
                class="text-zinc-700 text-center font-semibold p-5 py-12 w-full border-2 border-zinc-500 border-dashed rounded-md">
                Maaf! Belum ada yang mengulas buku
            </p>
        @else
        @endif
    </div>

    {{-- CTA section --}}
    <div
        class="flex flex-col md:flex-row gap-10 justify-between items-center grid-frame-dark text-white p-10 rounded-2xl w-full overflow-hidden">

        <div class="max-w-xl w-full h-[400px] flex flex-col justify-between gap-8">
            <h2 class="text-3xl lg:text-6xl">
                Hidupkan literasi bersama Litra.
            </h2>

            <div>
                <a href="{{ route('products.index') }}">
                    <x-secondary-button>
                        Jadi bagian Litra.
                    </x-secondary-button>
                </a>
            </div>
        </div>

        <div class="relative top-36 pt-12 flex w-fit">
            <img src="https://images.unsplash.com/photo-1568667256549-094345857637?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=715"
                alt="img"
                class="bg-zinc-100 w-[300px] h-[200px] object-cover border-4 border-zinc-100 rounded-xl shadow-2xl rotate-3">
            <img src="https://images.unsplash.com/photo-1506880018603-83d5b814b5a6?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1074"
                alt="img"
                class="absolute -m-24 bg-zinc-100 w-[300px] h-[200px] object-cover border-4 border-zinc-100 rounded-xl shadow-2xl -rotate-2">
            <img src="https://images.unsplash.com/photo-1614849963640-9cc74b2a826f?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=687"
                alt="img"
                class="absolute -m-52 bg-zinc-100 w-[300px] h-[200px] object-cover border-4 border-zinc-100 rounded-xl shadow-2xl rotate-3">
        </div>
    </div>

</x-app-layout>
