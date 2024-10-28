<x-app-layout>
    <div class="flex justify-center m-4 mt-8">
        <h1 class="text-2xl">MCU STORE</h1>
    </div>
    <div class="flex flex-wrap" >
        @foreach ($products as $product )
            <x-container-flex class="w-[25%] h-[50%] m-8 p-8">
                <section class="bg-neutral-400 rounded p-2">
                    <div class="flex justify-center">
                        <h2>{{$product->product_name}}</h2>
                    </div>
                    <div class="p-2" >
                        <img class="h-[30vh] w-[25vw] rounded  border-2 border-black" src="{{$product->image}}">
                    </div>

                    <div class="flex flex-wrap justify-center ">
                        <div class="h-[150px] p-2 text-center mb-4">
                            <p>{{$product->product_description}}</p>
                        </div>
                        <div class="mt-4">
                            <p class="text-center mb-2">{{$product->price}} Tokens</p> 
                            <a class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150' href="{{route('store-show',['product_id'=>$product->id])}}">Buy</a>
                        </div>
                    </div>

                </section>
            </x-container-flex>
        @endforeach
    </div>
</x-app-layout>