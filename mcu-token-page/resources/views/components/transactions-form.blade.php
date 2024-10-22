<x-transactions>
    @if(Session::has('success'))
    <script>
        alert('Success')
    </script>
    @endif
    <section class="my-8">
        <x-container-flex class="bg-neutral-400 rounded mt-8 w-[20%]">
            <div class="flex justify-center">
                <p>Tokens owned: {{Session('ownTokens')}}</p>
            </div>
        </x-container-flex>
    </section>

    <section >
        <x-container-flex class="w-[25%] h-[45vh] bg-neutral-400 rounded p-4 flex flex-wrap justify-center" >
            <form method="POST" action="{{route('transactions-store')}}">
            @csrf
                <div>
                    <x-input-label for="for" value="For (reciever email)" />
                    <x-text-input name="for" type="text" placeholder="friend@gmail.com"/>
                    <x-input-error :messages="$errors->get('for')"/>
                </div>
                <div>
                    <x-input-label for="purpose" value="Purpose" />
                    <x-text-input name="purpose" type="text" placeholder="i love you"/>
                    <x-input-error :messages="$errors->get('purpose')"/>
                </div>
                <div>
                    <x-input-label for="amount" value="Amount (in tokens)" />
                    <x-text-input name="amount" type="number" min="0.1" max="1000" step=".1" />
                    <x-input-error :messages="$errors->get('amount')"/>
                </div>
                <x-primary-button  class="my-4">
                    Send
                </x-primary-button>
            </form>
        </x-container-flex>
    </section>
</x-transactions>