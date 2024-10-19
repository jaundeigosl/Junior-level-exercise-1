<x-app-layout >
    <div class="flex justify-between p-[20px]">
        <section class="w-[85%] ml-4">
            <x-container-flex>
                <x-card class="mb-4 flex justify-center">
                    <h2 class="text-xl font-bold">Last Transactions</h2>
                </x-card>
            </x-container-flex>
            
            <x-container-flex>
                <x-card class="mb-4">
                    <div class="flex flex-wrap justify-center justify-around">
                        <p>From:</p>
                        <p >To:</p>
                        <p>Purpouse:</p>
                        <p>Amount:</p>
                    </div>
                </x-card>
            </x-container-flex>

        </section>
        <section class="w-[15%] h-[25vh] bg-neutral-400 rounded sticky mr-8" style="position: -webkit-sticky; top:15%;">
            <x-container-flex>
                <div  >
                    <div class="m-4">
                        <div class="flex justify-center mb-4">
                            <h2 class="text-lg font-bold">Referral Code</h2>
                        </div>
                        <div class="flex flex-wrap justify-center">
                            <div>
                                <p>Code: {{$code}}</p>
                            </div>
                            <div>
                                <p>Referred Users: {{$refUsers}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </x-container-flex>
        </section>
    </div>
</x-app-layout>
