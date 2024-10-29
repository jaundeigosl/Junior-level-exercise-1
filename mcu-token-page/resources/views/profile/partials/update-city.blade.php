<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Update City
        </h2>
    </header>

    <form method="post" action="{{ route('city-update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label class="'block font-medium text-sm text-black" for="update_city_current_city" >
                Current City
            </label>
            <x-text-input id="update_city_current_city" name="current_city" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('current_city')" class="mt-2" />
        </div>

        <div>
            <label class="'block font-medium text-sm text-black" for="update_city_new_city" >
                New City
            </label>
            <x-text-input id="update_city_new_city" name="new_city" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('new_city')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'city-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>