<div x-data="{open:false}">
    <a
    href="{{ $href ? route($href) : 'javascript:void(0)' }}"
    @if (!$href)
    @click="open = !open"
    @click.away="open = false"
    @close.stop="open = false"
    @endif
    class="pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white hover:text-sky-800 dark:hover:text-white hover:bg-sky-300 dark:hover:bg-gray-800 hover:border-sky-400 focus:outline-none focus:text-sky-800 focus:bg-sky-300 focus:border-sky-400 transition flex items-center"
    :class="{'bg-sky-400': open}"
    >
        <i class="mdi mdi-{{ $icon }} mr-4"></i>
        <span>{{ __($title) }}</span>
        @if (!$href)
        <span class="ml-auto">
            <svg class="w-4 h-4 transition-transform transform rotate-180" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </span>
        @endif
    </a>

    @if (isset($subs))
    <div x-show="open" class="mt-2 space-y-2 px-4 mb-4">
        @foreach ($subs as $key)
        <a href="{{ route($key->link) }}" class="block px-4 text-sm text-white transition-colors duration-200 rounded-md hover:text-sky-600">
            <i class="mdi mdi-{{ $key->icon }} mr-4 align-middle"></i>
            <span>{{ __($key->title) }}</span>
        </a>
        @endforeach
    </div>
    @endif
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
</div>