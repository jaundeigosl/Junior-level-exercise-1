<x-app-layout>

    <div>
        <div class="bg-black flex justify-center px-4 h-60" >
            <img class=" rounded h-48 w-screen px-8" src="{{URL('storage/man-utd-heaven.jpg')}}" alt="Manchester United fans image">
        </div>
        <div>
            <div class="pb-4 flex justify-center bg-black w-screen ">
                <h1 class ="text-8xl font-bold text-red-600 uppercase text-center">Manchester United <br> Official Store</h1>
            </div> 
            <div class="mt-2 bg-red-700 py-4 flex-wrap justify-center">
                <div class="flex justify-center">
                    <img class ="rounded-full" src="{{URL('storage/stadium.jpg')}}" alt="Old Tradford Stadium">
                </div>
                <div class="my-12 bg-red-600 w-96 p-2 border flex-wrap">
                    <div class=" mt-4 ">
                        <p class="text-2xl font-medium text-center">Get your Tickes for the next game!</p>
                    </div>
                    <div class="flex justify-center mt-8">   
                        <a class="text-black text-2xl font-medium border py-2 px-4 rounded-full transition hover:border-black hover:bg-black hover:text-white hover:font-bold duration-300 "  href="{{}}">Buy Tickets</a>
                    </div>    
                </div>
            </div>
            <div class="flex justify-center pt-4">
                    <h1 class ="text-8xl font-bold text-black uppercase text-center">Manchester United <br> Official Store</h1>
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>