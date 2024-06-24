<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Personal Data') }}
        </h2>

        <form method="POST" action="{{ route('datadiri.update', $datadiri) }}">
            @csrf
            @method('PUT')

            <div>
                <x-input-label for="nama" :value="__('Name')" />
                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="$datadiri->nama" required autofocus />
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="alamat" :value="__('Address')" />
                <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="$datadiri->alamat" required />
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="pekerjaan" :value="__('Occupation')" />
                <x-text-input id="pekerjaan" class="block mt-1 w-full" type="text" name="pekerjaan" :value="$datadiri->pekerjaan" required />
                <x-input-error :messages="$errors->get('pekerjaan')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>