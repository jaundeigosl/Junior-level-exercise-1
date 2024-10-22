<x-transactions>

    <section>
        <x-container-flex class="bg-neutral-400 rounded mt-8 w-[20%]">
            <div class="flex justify-center">
                <p>Tokens owned: {{Session('ownTokens')}}</p>
            </div>
        </x-container-flex>
    </section>

    <section >
        <x-container-flex class="max-w-xl">
            @foreach ($transactions as $transaction)
                <x-card-transactions >
                    <div>
                        <p><strong>From:</strong> {{$transaction['sender_name']}} {{$transaction['sender_lastname']}} </p>
                        <p><strong>To:</strong> {{$transaction['receiver_name']}} {{$transaction['receiver_lastname']}} </p>                    
                        <p><strong>Purpose:</strong> {{$transaction['purpose']}} </p>                     
                        <p><strong>Amount:</strong> {{$transaction['amount']}} Tokens </p> 
                        <p><strong>Operation Number:</strong> {{$transaction['transaction_id']}} </p>
                        <p><strong>Date:</strong> {{$transaction['time']}}</p> 
                    </div>                     
                </x-card-transactions>
            @endforeach
        </x-container-flex>
    </section>
</x-transactions>