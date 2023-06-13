<!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
<nav {{ $attributes->merge(['class' =>"border-b-4 border-yellow-400 fixed w-full top-0 shadow-lg text-white z-20 rounded-br-[2rem]"]) }}>
    <!-- Primary Navigation Menu -->
    <div class="flex justify-between h-20">
        <!-- Logo -->
        <div class="{{ $logoClass }} box-border w-64 md:w-80 py-2 px-4 flex justify-between items-center shadow-md">
            {{ $logo }}
            <i @click="open = !open" class="mdi mdi-sort-variant mdi-24px hidden md:block cursor-pointer"></i>
        </div>
        
        <div class="flex items-center py-2 px-6 justify-end w-full gap-x-4 md:gap-x-6">
            {{ $bigNav ?? '' }}

            <!-- Settings Dropdown -->
            <div class="ml-3 relative">
                Junior Web Developer
                {{-- <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex items-center gap-2 text-sm border-2 border-transparent rounded-full focus:outline-none transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                <span class="font-bold hidden md:block">{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    Junior Web Developer

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->

                        <x-dropdown-link class="flex gap-2" href="{{ route('profile.show') }}">
                            <i class="mdi mdi-account text-indigo-500"></i>
                            {{ __('Data Diri') }}
                        </x-dropdown-link>

                        <x-dropdown-link class="flex gap-2" href="{{ route('dashboard') }}">
                            <i class="mdi mdi-arrow-left-bold-circle-outline text-indigo-500"></i>
                            {{ __('Kembali ke Portal') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown> --}}
            </div>

            {{-- Responsive Nav --}}
            <div class="md:hidden">
                <button @click="open = !open"
                class="inline-flex items-center justify-center p-2 rounded-md text-white focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</nav>
<!-- Backdrop -->
<div
x-show="open"
x-transition:enter="transition ease-in-out duration-150"
x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in-out duration-150"
x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0"
class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
></div>
{{-- Simasa Aside Responsive --}}
<aside
style="display: none;"
x-show="open"
x-transition:enter="transition-all ease-in-out duration-1000"
x-transition:enter-start="transform -translate-x-full"
x-transition:enter-end="transform transform-x-0"
x-transition:leave="transition-all ease-in-out duration-1000"
x-transition:leave-start="transform transform-x-0"
x-transition:leave-end="transform -translate-x-full"
@click.away="open = false"
@keydown.escape="open = false"
class="{{ $asideClass }} fixed top-20 bottom-0 w-64 overflow-y-auto z-20">
    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 space-y-1">
        {{ $aside }}
    </div>
</aside>