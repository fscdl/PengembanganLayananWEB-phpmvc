<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Personal Data') }}
        </h2>

        <form method="POST" action="{{ route('datadiri.store') }}">
            @csrf
            <div>
                <x-input-label for="nama" :value="__('Name')" />
                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus />
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="alamat" :value="__('Address')" />
                <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required />
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="pekerjaan" :value="__('Occupation')" />
                <x-text-input id="pekerjaan" class="block mt-1 w-full" type="text" name="pekerjaan" :value="old('pekerjaan')" required />
                <x-input-error :messages="$errors->get('pekerjaan')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>

        @forelse ($datadiri as $data)
            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <div class="p-6 flex space-x-2">
                    <div class="flex-1">
                        <p class="text-gray-800">{{ __('Name') }}: {{ $data->nama }}</p>
                        <p class="text-gray-800">{{ __('Address') }}: {{ $data->alamat }}</p>
                        <p class="text-gray-800">{{ __('Occupation') }}: {{ $data->pekerjaan }}</p>
                        <div class="mt-4 flex justify-end">
                            <a href="{{ route('datadiri.edit', $data) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-2">
                                {{ __('Edit') }}
                            </a>
                            <form method="POST" action="{{ route('datadiri.destroy', $data) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-600">{{ __('No personal data found.') }}</p>
        @endforelse
    </div>
</x-app-layout>
