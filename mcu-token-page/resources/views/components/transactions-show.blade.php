<x-transactions>

    <section>
        <x-container-flex class="bg-neutral-400 rounded mt-8 w-[20%]">
            <div class="flex justify-center">
                <p>Tokens owned: {{Session('ownTokens')}}</p>
            </div>
        </x-container-flex>
    </section>

    <section >
        <x-container-flex>
            <x-card-transactions >                    
            </x-card-transactions>
        </x-container-flex>
    </section>
</x-transactions>