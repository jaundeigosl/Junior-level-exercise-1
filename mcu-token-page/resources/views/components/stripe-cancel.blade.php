<x-app-layout>
    <section class="my-8">
        <x-container-flex class="bg-neutral-400 rounded mt-8 w-[20%]">
            <div class="flex justify-center">
                <p>Tokens owned: {{Session('ownTokens')}}</p>
            </div>
        </x-container-flex>
    </section>

    <section class="my-8">
        <x-container-flex class="bg-neutral-400 rounded mt-8 w-[20%]">
            <div class="flex justify-center">
                <h2>Error , Try again</h2>
            </div>
        </x-container-flex>
    </section>

</x-app-layout>