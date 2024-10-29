<x-guest-layout>
    <h2 class="text-2xl font-bold">Two Factor Authentication</h2>
    <form action="{{route('checkMultiAuth')}}" method="POST"> 
        @csrf
        <x-input-label for="city" value="Enter the City"/>
        <x-text-input id="city" name="city" />
        <x-input-error :messages="$errors->get('city')"/>
        <x-primary-button>
            Send
        </x-primary-button>
    </form>
</x-guest-layout>