<x-jwd-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('dashboard') }}">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-slate-50 leading-tight mb-4">
                    <i class="mdi mdi-arrow-left"></i>
                    {{ __('Kembali') }}
                </h2>
            </a>

            <x-normal-form-section method="POST" :submit="route('factorials.store')">
                <x-slot:title>Hitung angka faktorial</x-slot>
                <x-slot:description>Masukkan data sesuai dengan kolom yang disediakan</x-slot>

                <x-slot:form>
                    <div class="col-span-6">
                        <x-label for="angka" :value="__('Angka')" />
                        <x-input id="angka" type="text" class="mt-1 block w-full" name="angka" autocomplete="angka" :value="old('angka')" />
                        <x-input-error for="angka" class="mt-2" />
                    </div>
                </x-slot>

                <x-slot:actions>
                    <x-button>Simpan</x-button>
                </x-slot>
            </x-normal-form-section>
        </div>
    </div>
</x-jwd-layout>
