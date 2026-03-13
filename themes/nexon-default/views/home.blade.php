@extends('theme::layouts.store')


@section('content')
    <div class="min-h-screen bg-zinc-50 text-zinc-900 dark:bg-zinc-950 dark:text-zinc-100">
        @include('theme::components.header')

        <div class="mx-auto max-w-7xl px-3 pb-10 sm:px-4 lg:px-6">
            <section class="overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
                <div class="grid gap-6 p-6 sm:p-8 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-emerald-600 dark:text-emerald-400">Nexon Network Store</p>
                        <h1 class="mt-3 text-3xl font-black tracking-tight sm:text-4xl">Support the server and unlock premium ranks, crates, and perks.</h1>
                        <p class="mt-3 max-w-2xl text-sm text-zinc-600 dark:text-zinc-400 sm:text-base">
                            Secure checkout, instant delivery, and exclusive seasonal bundles inspired by top Minecraft stores.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="#featured" class="inline-flex items-center rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-500">
                                Browse Packages
                            </a>
                            <a href="#categories" class="inline-flex items-center rounded-xl border border-zinc-300 px-5 py-2.5 text-sm font-semibold text-zinc-900 transition hover:bg-zinc-100 dark:border-zinc-700 dark:text-zinc-100 dark:hover:bg-zinc-800">
                                View Categories
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3 text-sm">
                        <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-800/70">
                            <p class="text-zinc-500 dark:text-zinc-400">Server Status</p>
                            <p class="mt-1 font-bold text-emerald-600 dark:text-emerald-400">Online</p>
                        </div>
                        <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-800/70">
                            <p class="text-zinc-500 dark:text-zinc-400">Avg Delivery</p>
                            <p class="mt-1 font-bold">&lt; 1 minute</p>
                        </div>
                        <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-800/70">
                            <p class="text-zinc-500 dark:text-zinc-400">Payments</p>
                            <p class="mt-1 font-bold">Card, PayPal, Crypto</p>
                        </div>
                        <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-800/70">
                            <p class="text-zinc-500 dark:text-zinc-400">Support</p>
                            <p class="mt-1 font-bold">24/7 Ticket Desk</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="categories" class="mt-6 rounded-2xl border border-zinc-200 bg-white p-4 shadow-sm dark:border-zinc-800 dark:bg-zinc-900 lg:hidden">
                <h2 class="text-base font-bold">Popular Categories</h2>
                <div class="mt-3 flex gap-2 overflow-x-auto pb-1">
                    @foreach($categories as $cat)
                        <a href="/{{ $cat->slug }}" class="whitespace-nowrap rounded-lg border border-zinc-300 bg-zinc-100 px-3 py-1.5 text-sm font-medium transition hover:border-emerald-500 hover:bg-emerald-50 dark:border-zinc-700 dark:bg-zinc-800 dark:hover:border-emerald-500 dark:hover:bg-zinc-700">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </section>

            <div class="mt-6 grid gap-6 lg:grid-cols-[290px_minmax(0,1fr)]">
                <aside class="hidden lg:block">
                    @include('theme::components.sidebar', [
                        'categories' => $categories,
                    ])
                </aside>

                <main class="space-y-6">
                    <section id="featured" class="rounded-2xl border border-zinc-200 bg-white p-4 shadow-sm dark:border-zinc-800 dark:bg-zinc-900 sm:p-6">
                        <div class="flex items-end justify-between gap-4">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-zinc-500 dark:text-zinc-400">Storefront</p>
                                <h2 class="mt-1 text-2xl font-black">Featured Packages</h2>
                            </div>
                            <a href="#categories" class="text-sm font-semibold text-emerald-600 transition hover:text-emerald-500 dark:text-emerald-400">All categories</a>
                        </div>

                        @php
                            $featuredPackages = $categories
                                ->flatMap(fn($cat) => $cat->children->map(fn($child) => ['category' => $cat, 'item' => $child]))
                                ->take(9);
                        @endphp

                        @if($featuredPackages->isNotEmpty())
                            <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
                                @foreach($featuredPackages as $package)
                                    <a href="/{{ $package['item']->slug }}" class="group rounded-xl border border-zinc-200 bg-zinc-50 p-4 transition hover:border-emerald-500 hover:bg-white dark:border-zinc-700 dark:bg-zinc-800/70 dark:hover:bg-zinc-800">
                                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-zinc-500 dark:text-zinc-400">{{ $package['category']->name }}</p>
                                        <h3 class="mt-2 text-lg font-bold">{{ $package['item']->name }}</h3>
                                        <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">Instantly delivered in-game after successful checkout.</p>
                                        <div class="mt-4 inline-flex items-center text-sm font-semibold text-emerald-600 dark:text-emerald-400">View package -></div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="mt-5 rounded-xl border border-dashed border-zinc-300 p-8 text-center dark:border-zinc-700">
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">No packages are live yet. Add category children to populate this section.</p>
                            </div>
                        @endif
                    </section>
                </main>
            </div>
        </div>
    </div>

    033.0

@endsection
