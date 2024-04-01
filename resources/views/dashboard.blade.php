<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Unos glasača') }}
        </h2>
    </x-slot>
    @include('profile.partials.form')  
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <div 
                id="success-message" 
                x-data="{ show: true }" 
                x-show="show" 
                class="alert alert-success"
                x-init="setTimeout(() => { show = false; }, 3000)">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div> 
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 4000)" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Uspešno ste se ulogovali!") }}
                </div>
            </div>
        </div>
    </div>    --}}
    
</x-app-layout>
