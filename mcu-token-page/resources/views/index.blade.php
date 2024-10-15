<x-app-layout>
    @push('css')
        <link rel="stylesheet" href="{{asset('styles.css')}}">
    @endpush
    <link rel="stylesheet" href="url(styles.css)"/>
    <section id="parallax-wrapper">
        <section>
            <div class="bg-black flex justify-center px-4 h-60" >
                <img class=" rounded h-48 w-screen px-8" src="{{URL('storage/images/man-utd-heaven.jpg')}}" alt="Manchester United fans image">
            </div>
            <div class="pb-4 flex justify-center bg-black">
                <h1 class ="text-8xl ms:text-xl font-bold text-red-600 uppercase text-center">Manchester United <br> Official Store</h1>
            </div> 
        </section>
        <div class="parallax-container">
            <img class="parallax-image my-8 h-full w-full" src="{{URL('storage/images/manchester-utd-trophy.jpg')}}">
        </div>
        <section class="bg-red-700 py-4">
            <section class="flex flex-wrap justify-center mt-4">
                <div class="min-h-[200px] min-w-[280px] h-[250px] w-[350px] my-4 transition-all hover:h-[275px] hover:w-[375px] duration-300 ">
                    <img class ="rounded-full h-full w-full" src="{{URL('storage/images/stadium.jpg')}}" alt="Old Tradford Stadium">
                </div>
                <div class=" min-h-[200px] min-w-[280px] h-[250px] w-[350px] mx-8 my-4 transition-all hover:h-[275px] hover:w-[375px] duration-300">
                    <img class ="rounded-full h-full w-full" src="{{URL('storage/images/manchester-utd-stadium2.jpg')}}" alt="Old Tradford Stadium">
                </div>
                <div class="min-h-[200px] min-w-[280px] h-[250px] w-[350px] my-4 transition-all hover:h-[275px] hover:w-[375px] duration-300">
                    <img class ="rounded-full h-full w-full" src="{{URL('storage/images/manchester-utd-stadium3.jpg')}}" alt="Old Tradford Stadium">
                </div>                    
            </section>
            <section class="flex justify-center">
                <div class="mt-12 mb-4 bg-red-950 w-96 p-2  rounded-[80px]">
                    <div class=" mt-4 ">
                        <p class="text-2xl text-white font-medium text-center">Get your Tickes for the next game!</p>
                    </div>
                    <div class="flex justify-center mt-8 mb-2">   
                        <a class="text-white text-2xl font-medium border border-black py-2 px-4 rounded-[12px] transition hover:border-red-700 hover:bg-red-700 hover:text-black hover:font-bold duration-300 ">Buy Tickets</a>
                    </div>    
                </div>
            </section>
        </section>
        <div class="parallax-container">
            <img class="parallax-image h-full" src="{{URL('storage/images/manchester-utd-history.jpg')}}">
        </div>
        <section class="pb-4 flex flex-wrap justify-center bg-black mb-4">
            <div class="mt-4 flex flex-wrap">    
                <x-card class="m-4 transition-all hover:p-0 duration-300">
                    <img class="h-full"src="{{URL('storage/images/shirts/shirt3.jpg')}}">
                </x-card>
                <x-card class="m-4 m-4 transition-all hover:p-0 duration-300"  >
                    <img class="h-full rounded" src="{{URL('storage/images/shirts/shirt5.jpg')}}">
                </x-card>
                <x-card class="m-4 m-4 transition-all hover:p-0 duration-300" >
                    <img class="h-full rounded" src="{{URL('storage/images/shirts/shirt6.jpg')}}">
                </x-card>
                <x-card class="m-4 m-4 transition-all hover:p-0 duration-300">
                    <img class="h-full rounded" src="{{URL('storage/images/shirts/shirt7.jpg')}}">
                </x-card>
            </div>
            <div>
                <div class="my-12 bg-red-950 w-96 p-2  rounded-[80px]">
                    <div class=" mt-4 ">
                        <p class="text-2xl text-white font-medium text-center">Are you a true red devil?<br>Then get your shirt!</p>
                    </div>
                    <div class="flex justify-center mt-8 mb-2">   
                        <a class="text-white text-2xl font-medium border border-black py-2 px-4 rounded-[12px] transition hover:border-red-700 hover:bg-red-700 hover:text-black hover:font-bold duration-300 "  href="{{}}">Buy Shirts</a>
                    </div>    
                </div>
            </div>
        </section>  
    </section>
</x-app-layout>