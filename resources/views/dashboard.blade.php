<x-jwd-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-slate-600 border-b border-gray-200">

                    <h2 class="font-semibold text-xl text-gray-800 dark:text-slate-50 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>

                    <div class="min-w-full overflow-x-auto mt-3 rounded-xl">
                        <table class="min-w-full align-middle [&_tr]:border-b-2 [&_tr]:border-slate-100 [&_th]:p-3 [&_th]:border-b-2 [&_th]:border-slate-100 [&_th]:text-left [&_th]:sticky [&_th]:top-0 [&_td]:p-3 border-b-2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Tipe</th>
                                    <th>Masukan Data</th>
                                    <th>Luaran (Output)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($histories as $history)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $history->date->translatedFormat('l, j F Y H:i:s') }}</td>
                                    <td>{{ $history->type }}</td>
                                    <td class="prose prose-p:dark:text-slate-50">
                                        <p>
                                            @if ($history->type == 'Perpangkatan')
                                                Angka: {{ $history->inputs->angka }}<br>
                                                Pangkat: {{ $history->inputs->pangkat }}<br>
                                            @endif
                                            @if ($history->type == 'Faktorial')
                                                Angka: {{ $history->inputs->angka }}
                                            @endif
                                        </p>
                                    </td>
                                    <td>{{ $history->output }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Tidak terdapat data tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <x-chart type="pie" :labels="$labels" :series="$series" />
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
