<div class="p-3 md:p-4">
    <flux:header
        class="rounded-2xl border border-zinc-200/80 bg-white/90 px-4 py-3 shadow-sm backdrop-blur dark:border-zinc-700 dark:bg-zinc-900/90">
        <div class="flex min-w-0 items-center gap-3">
            <flux:sidebar.toggle class="md:hidden" icon="bars-2" inset="left"/>

            <a href="{{ url('/') }}" class="flex min-w-0 flex-col leading-tight">
                <span
                    class="text-[11px] font-semibold uppercase tracking-[0.3em] text-emerald-600 dark:text-emerald-400">
                    Minecraft Store
                </span>
                <span class="truncate text-lg font-black text-zinc-900 dark:text-white">
                    Nexon Network
                </span>
            </a>
        </div>

        <flux:navbar class="ms-6 hidden items-center gap-2 md:flex">

            @foreach ($categories as $cat)

                @if($cat->children->count())

                    <div class="relative group flex items-center">

                        <!-- Parent link -->
                        <a href="/{{ $cat->slug }}" class="px-3 py-2">
                            {{ $cat->name }}
                        </a>

                        <!-- Dropdown trigger -->
                        <flux:dropdown>
                            <flux:navbar.item icon:trailing="chevron-down"/>

                            <flux:navmenu class="absolute left-0 top-full hidden group-hover:block">
                                @foreach ($cat->children as $child)
                                    <flux:navmenu.item href="/{{ $child->slug }}">
                                        {{ $child->name }}
                                    </flux:navmenu.item>
                                @endforeach
                            </flux:navmenu>

                        </flux:dropdown>

                    </div>

                @else

                    <flux:navbar.item href="/{{ $cat->slug }}">
                        {{ $cat->name }}
                    </flux:navbar.item>

                @endif

            @endforeach

        </flux:navbar>

        <flux:spacer/>

        <div class="hidden items-center gap-3 md:flex">
            <div class="hidden text-right leading-tight xl:block">
                <span class="block text-xs font-medium uppercase tracking-[0.3em] text-zinc-500 dark:text-zinc-400">
                    Server IP
                </span>
                <span class="block text-sm font-semibold text-zinc-900 dark:text-white">
                    play.nexon.net
                </span>
            </div>

            @if(auth()->check())
                <flux:dropdown>
                    <flux:navbar.item icon:trailing="chevron-down">
                        {{ auth()->user()->name }}
                    </flux:navbar.item>

                    <flux:navmenu>
                        <flux:navmenu.item :href="route('logout')">
                            Logout
                        </flux:navmenu.item>
                    </flux:navmenu>
                </flux:dropdown>
            @else
                <flux:button>Login</flux:button>
            @endif
        </div>

    </flux:header>

    <flux:sidebar collapsible="mobile" sticky="true"
                  class="md:hidden border-e border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.header>
            <a href="{{ url('/') }}" class="flex flex-col leading-tight">
                <span
                    class="text-[11px] font-semibold uppercase tracking-[0.3em] text-emerald-600 dark:text-emerald-400">
                    Minecraft Store
                </span>
                <span class="text-lg font-black text-zinc-900 dark:text-white">
                    @env("") @endenv
                </span>
            </a>

            <flux:sidebar.collapse
                class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2"/>
        </flux:sidebar.header>

        <flux:sidebar.nav>
            @foreach($categories as $cat)
                <flux:navlist.group heading="{{ $cat->name }}" expandable="true" :expanded="false">
                    @foreach ($cat->children as $child)
                        <flux:navlist.item href="/{{ $child->slug }}">
                            {{ $child->name }}
                        </flux:navlist.item>
                    @endforeach
                </flux:navlist.group>
            @endforeach
        </flux:sidebar.nav>

        <flux:spacer/>

        <div class="px-5 pb-5 pt-2">
            <div
                class="rounded-xl border border-zinc-200 bg-zinc-50 px-4 py-3 dark:border-zinc-700 dark:bg-zinc-800/80">
                <span class="block text-xs font-medium uppercase tracking-[0.3em] text-zinc-500 dark:text-zinc-400">
                    Server IP
                </span>
                <span class="mt-1 block text-sm font-semibold text-zinc-900 dark:text-white">
                    play.nexon.net
                </span>
            </div>
        </div>
    </flux:sidebar>
</div>
