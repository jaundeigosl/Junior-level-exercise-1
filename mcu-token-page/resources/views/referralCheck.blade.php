<x-guest-layout class="bg-gray-500">
    <x-container-flex>
        <section>
            <div class="">
                <h2 class="text-black">If you have a referral code please use it</h2>
            </div>
            <div> 
                <form method="POST" action="{{route('referral-check')}}">
                    @csrf
                    <x-input-label for="code" value="Referral Code"/>
                    <x-text-input id="code" type="text" name="code"/>
                    <x-input-error :messages="$errors->get('code')"/>
                    <div class="flex flex-wrap mt-4">
                        <x-primary-button class="mr-4">
                            Send
                        </x-primary-button>  
                        <button class="bg-red-700 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="button">
                            <a href="{{route('dashboard')}}">SKIP</a>
                        <button>
                    </div>
                </form>
            </div>
        </section>
    </x-container-flex>
</x-guest-layout>