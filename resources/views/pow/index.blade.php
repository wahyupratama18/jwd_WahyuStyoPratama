<x-guest-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

                    <div class="flex justify-end">
                        <a href="{{ route('files.create') }}">
                            <x-button>Add</x-button>
                        </a>
                    </div>

                    <div class="min-w-full overflow-x-auto mt-3 rounded-xl">
                        <table class="min-w-full align-middle [&_tr]:border-b-2 [&_tr]:border-slate-100 [&_th]:p-3 [&_th]:border-b-2 [&_th]:border-slate-100 [&_th]:text-left [&_th]:sticky [&_th]:top-0 [&_td]:p-3 border-b-2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($records as $record)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $record->name }}</td>
                                    <td>{{ $record->age }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="999">No records available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
