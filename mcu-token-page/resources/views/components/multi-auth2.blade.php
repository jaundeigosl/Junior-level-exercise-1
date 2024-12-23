<x-guest-layout>
    <h2 class="text-2xl font-bold">Two Factor Authentication</h2>
    <form action="{{route('checkMultiAuth')}}" method="POST"> 
        @csrf
        <x-input-label for="birth" value="Your Birth date"/>
        <input class="bg-gray-300 border-gray-200 focus:border-black focus:ring-black rounded-md shadow-sm" id="birth" name="birth" type="date"/>
        <x-input-error :messages="$errors->get('birth')"/>
        <x-primary-button>
            Send
        </x-primary-button>
    </form>
</x-guest-layout>