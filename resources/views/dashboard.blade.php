<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Unos glasača') }}
        </h2>
    </x-slot>
    @include('profile.partials.formGlasac')     

</x-app-layout>
