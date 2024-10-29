<x-transactions>
    @if(Session::has('success'))
        <script>
            alert('Recharge Successful')
        </script>
    @endif
    <section>
        <x-container-flex class="bg-neutral-400 rounded mt-8 w-[20%]">
            <div class="flex justify-center">
                <p>Tokens owned: {{Session('ownTokens')}}</p>
            </div>
        </x-container-flex>
        <x-container-flex class="bg-neutral-400 rounded mt-8 w-[20%]">
            <div class="flex justify-center h-vh">
                <form method="POST" action="{{route('stripe-Checkout')}}">
                    @csrf
                    <h2>Tokens amount to buy</h2>
                    <x-input-label for="conversionAmount" value="(1 token equals 3 £)" />
                    <div class="flex justify-center">
                        <x-text-input id="conversionAmount" class="mt-2" name="conversionAmount" type="number" min="1" max="1000" />                    
                    </div>                    
                    <x-input-error :messages="$errors->get('conversionAmount')"/>   
                    <div class ="flex justify-center mt-4">
                        <x-primary-button>
                            Pay
                        </x-primary-button> 
                    </div>                
                </form>
            </div>
        </x-container-flex>
    </section>
</x-transactions>