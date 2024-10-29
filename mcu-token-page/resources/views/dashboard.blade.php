<x-app-layout >
    <div class="p-[20px]">
        <section class="flex justify-center">
            <x-container-flex>
                <div>
                    <div class="m-4 bg-neutral-400 rounded p-4">
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
        <section>
            <x-container-flex>
                <div>
                    <div class="m-4 border-black border-2 rounded ">
                        <div class="flex justify-center mb-4">
                            <h2 class="text-lg font-bold">2 Factor Authentication</h2>
                        </div>
                        <div class="flex justify-center">
                            @if($auth)
                                <div>
                                    <p>Multi-factor Authentication: Activated</p>
                                    <div class="flex justify-center my-4">
                                        <form  action="{{route('dashboard-2fa')}}" method="POST">
                                            @csrf
                                            <input type="text" hidden name="authValue" value="false">
                                            <x-primary-button class="bg-red-700">
                                                Deactivate
                                            </x-primary-button>
                                        </form>
                                    </div>
                                </div>                                
                            @else
                                <div>
                                    <p>Multi-factor Authentication: Deactivated</p>
                                    <div class="flex justify-center my-4">
                                        <form  action="{{route('dashboard-2fa')}}" method="POST">
                                            @csrf
                                            <input type="text" hidden name="authValue" value="true">
                                            <x-primary-button class="bg-green-600">
                                                Activate
                                            </x-primary-button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </x-container-flex>
        </section>
    </div>
</x-app-layout>
