<x-app-layout >
    <x-slot name="header">
         
          <h6 class="font-weight-bolder text-gray mb-0">{{ __('Dashboard') }}</h6>
       
    </x-slot>

    <div class="container-fluid py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
