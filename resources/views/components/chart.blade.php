@php
    $id = 'chart'.Str::random(3);
@endphp
<!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
<div wire:ignore x-data="{
    options: {
        chart: {
            type: '{{ $type }}',
            height: 400,
            toolbar: { show: true }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: { width: 200 },
                legend: { position: 'bottom' }
            }
        }],
        dataLabels: {
            enabled: true,
            formatter: val => { return `${val.toFixed(2)}%` },
        },
        {{-- theme: { mode: 'dark' }, --}}
        labels: {{ json_encode($labels) }},
        stroke: { curve: 'smooth' },
        legend: {
            position: 'top',
            horizontalAlign: 'left'
        },
        series: {{ $series }}
    }
}" x-init="
{{ $id }} = new ApexCharts(document.getElementById('{{ $id }}'), options)
{{ $id }}.render()
" class="mt-2" id="{{ $id }}"></div>