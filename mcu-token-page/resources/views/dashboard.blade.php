<x-app-layout >
    <div class="flex justify-center p-[20px]">
        <section class="w-[25%] h-[25vh] bg-neutral-400 rounded sticky mr-8" style="position: -webkit-sticky; top:15%;">
            <x-container-flex>
                <div  >
                    <div class="m-4">
                        <div class="flex justify-center mb-4">
                            <h2 class="text-lg font-bold">Referral Code</h2>
                        </div>
                        <div class="flex flex-wrap justify-center">
                            <div class="m-2">
                                <p>Code: {{$code}}</p>
                            </div>
                            <div class="m-2">
                                <p>Referred Users: {{$refUsers}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </x-container-flex>
        </section>
    </div>
</x-app-layout>
