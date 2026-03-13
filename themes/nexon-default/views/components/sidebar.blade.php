@props([
    'categories'
])

<aside class="sticky top-4 space-y-4">
    <div class="rounded-2xl border border-zinc-200 bg-white p-4 shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
        <div class="border-b border-zinc-200 pb-4 dark:border-zinc-800">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-zinc-500 dark:text-zinc-400">Store Menu</p>
            <h2 class="mt-2 text-xl font-black text-zinc-900 dark:text-white">Browse Categories</h2>
        </div>

        <nav class="mt-4 space-y-4">
            @foreach($categories as $cat)
                <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-700 dark:bg-zinc-800/80">
                    <a href="/{{ $cat->slug }}" class="flex items-center justify-between gap-2 text-sm font-bold text-zinc-900 transition hover:text-emerald-600 dark:text-zinc-100 dark:hover:text-emerald-400">
                        <span>{{ $cat->name }}</span>
                        <span class="rounded-md bg-zinc-200 px-2 py-0.5 text-xs font-semibold text-zinc-600 dark:bg-zinc-700 dark:text-zinc-300">{{ $cat->children->count() }}</span>
                    </a>

                    <div class="mt-3 space-y-1">
                        @forelse ($cat->children as $child)
                            <a href="/{{ $child->slug }}" class="block rounded-md px-2 py-1.5 text-sm text-zinc-700 transition hover:bg-emerald-50 hover:text-emerald-700 dark:text-zinc-300 dark:hover:bg-zinc-700 dark:hover:text-emerald-400">
                                {{ $child->name }}
                            </a>
                        @empty
                            <p class="px-2 py-1 text-xs text-zinc-500 dark:text-zinc-400">No packages available yet.</p>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </nav>
    </div>
</aside>
