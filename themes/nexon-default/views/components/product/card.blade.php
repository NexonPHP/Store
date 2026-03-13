@props([
    'title',
    'description',
    'image',
    'url',
    'price',
    'sale_price'
])

<a href="{{ $url }}" class="group block rounded-lg border border-zinc-200 bg-white p-4 shadow-sm transition-colors hover:border-emerald-600 dark:border-zinc-700 dark:bg-zinc-900">
    <div class="aspect-square overflow-hidden rounded-md">
        <img src="{{ $image }}" alt="{{ $title }}" class="h-full w-full object-cover object-center transition-transform group-hover:scale-105">
    </div>

    <div class="mt-4">
        <h3 class="text-sm font-semibold text-zinc-900 dark:text-white">
            {{ $title }}
        </h3>
        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
            {{ $description }}
        </p>
        <div class="mt-2 flex items-center gap-2">
            @if(isset($sale_price) && $sale_price < $price)
                <span class="text-sm font-semibold text-red-600">
                    ${{ number_format($sale_price, 2) }}
                </span>
                <span class="text-sm line-through text-zinc-500 dark:text-zinc-400">
                    ${{ number_format($price, 2) }}
                </span>
            @else
                <span class="text-sm font-semibold text-zinc-900 dark:text-white">
                    ${{ number_format($price, 2) }}
                </span>
            @endif
        </div>
    </div>
</a>
