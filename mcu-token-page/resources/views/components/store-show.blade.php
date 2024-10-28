<x-app-layout>
    <div class="flex">
        <section class="w-[70%] h-[100vh] m-8 mb-12 ">
            <div class="flex justify-around">
                <div class="flex justify-center my-8 py-4 mx-4">
                    <img class="border-black border-2 rounded w-[100vw] h-[50vh]" src="{{$product->image}}">
                </div>
                <div>
                    <div class="flex flex-wrap justify-center">
                        <h2 class="m-8 text-center text-2xl font-bold">{{$product->product_name}}</h2>
                        <div class="w-[70%]">
                            <p class="text-center">{{$product->product_description}}</p>
                        </div> 
                        <div class="flex justify-center w-[40%] mt-8">
                            <p>{{$product->price}} Tokens</p>
                        </div>   
                    </div>
                </div>
            </div>
        </section>
        <section class="w-[25%] h-[15vh] bg-neutral-400 rounded sticky mr-8" style="position: -webkit-sticky; top:15%;">
            <x-container-flex>
                <div  >
                    <div class="m-4">
                        <div class="flex justify-center mb-4">
                            <h2 class="text-lg font-bold">Available Tokens:{{Session('ownTokens')}}</h2>
                        </div>
                    </div>
                </div>
            </x-container-flex>
            <div class="bg-neutral-400 mt-2 p-4 w-[25vw] rounded">
                <form action="{{route('store-pay')}}" method="POST">  
                    @csrf
                    <x-input-label for="address" value="Delivery Address"/>
                    <x-text-input name="address" placeholder="{{$user->address}}"/>
                    <x-input-error :messages="$errors->get('address')" class="mt-2"/>

                    <x-input-label class="mt-2" for="quantity" value="Quantity"/>
                    <x-text-input type="number" name="quantity" min="1" max="10"/>
                    <x-input-error :messages="$errors->get('quantity')" class="mt-2"/>

                    <x-text-input hidden name="product" value="{{$product->id}}"/>
                    <x-input-error :messages="$errors->get('product')" class="mt-2"/>

                    <x-primary-button class="mt-2 ml-28">
                        Buy
                    </x-primary-button>
                
                </form>
            </div>
        </section>
    </div>

</x-app-layout>