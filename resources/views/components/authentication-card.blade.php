<x-custome>
        <div class="min-h-screen flex flex-col sm:justify-center items-start pt-3 sm:pt-0 bg-white">
            <div class="flex w-full max-w-7xl">

                <div class="flex-1 flex flex-col items-center ml-4 " style="margin-top:80px;">

                    <h1 class="text-6xl font-semibold custom-font">
                        Welcome to the <span class="text-custom-blue">CELLMASTER</span>
                    </h1>

                    <img src="{{asset('images/login1.png')}}" alt="login image" class=" w-200 h-120" style="margin-top:50px;">
                </div>

                <div class="flex-1 flex flex-col items-center justify-center">
                    <div class="mb-3">
                        {{ $logo }}
                    </div>
                    <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
</x-custome>




