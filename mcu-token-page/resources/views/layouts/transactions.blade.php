<x-app-layout>

    <section class="flex justify-center my-8">
        <div class="mr-4">
            <x-link-btn href="{{route('transactions-form')}}">
                Make
            </x-link-btn>
        </div>
        <div class="mx-4">
            <x-link-btn href="{{route('transactions-show')}}">
                Show
            </x-link-btn>
        </div>
        <div class="ml-4">
            <x-primary-button type="button">Nada</x-primary-button>
        </div>
    </section>

    <section>
        {{$slot}}
    </section>
    
</x-app-layout>