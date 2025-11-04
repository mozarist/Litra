<div
    class="flex flex-col gap-5 justify-between w-full h-full aspect-square bg-zinc-950 text-white p-5 border border-zinc-800 rounded-xl hover:scale-105 transition-all duration-300">

    <div class="space-y-2">
        <h6 class="text-lg font-medium leading-tight line-clamp-2">
            {{ $title }}
        </h6>

        <p class="text-sm font-light leading-tight line-clamp-2">
            {{ $description }}
        </p>
    </div>

    <div class="w-full h-1/2 overflow-hidden rounded-md border border-zinc-800">
        
        <img src="{{ $slot }}" alt="" class="h-full w-full object-cover object-center">

    </div>


</div>
