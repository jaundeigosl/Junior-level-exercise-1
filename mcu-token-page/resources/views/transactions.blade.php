<x-app-layout>

    @push('script')
        <script src="{{asset('transactions.js') }}"></script>
    @endpush

    <script>
        @if (Session()->has('successful'))
            alert('Success')
        @endif
    </script>


    <x-container-flex class="bg-neutral-400 rounded mt-8 w-[20%]">
        <div class="flex justify-center">
            <p>Tokens owned: {{$ownTokens}}</p>
        </div>
    </x-container-flex>

    <section class="flex justify-center my-8">
        <div class="mr-4">
            <x-primary-button id="make" type="button" onClick="whichBtn('make');">Make a Transaction</x-primary-button>
        </div>
        <div class="mx-4">
            <x-primary-button id="show" type="button" onClick="whichBtn('show');">Show Transactions</x-primary-button>
        </div>
        <div class="ml-4">
            <x-primary-button id="recharge" type="button" onClick="whichBtn('recharge');">Recharge Tokens</x-primary-button>
        </div>
    </section>

    <section id="makeSection">
        <x-container-flex class="w-[25%] h-[45vh] bg-neutral-400 rounded p-4 flex flex-wrap justify-center" >
            <form method="POST" action="{{route('transactions')}}">
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

    <section id="showSection" >
        <x-container-flex>
            <x-card-transactions >
                <x-slot name="from">
                    1
                </x-slot>
                <x-slot name="to">
                    2
                </x-slot>
                <x-slot name="purpose">
                    3
                </x-slot>
                <x-slot name="amount">
                    4
                </x-slot>
            </x-card-transactions>
        </x-container-flex>

    </section>

    <section id="rechargeSection" >
        <div>
            holaaaa
        </div>

    </section>

</x-app-layout>