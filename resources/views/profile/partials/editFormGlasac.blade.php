<x-app-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form action="{{ route('glasac.update', ['id' => $glasac->id]) }}" method="POST" class="max-w-md mx-auto mt-6 px-4 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                @method('PUT')
                @csrf
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <!-- Ime i prezime -->
                <div class="mb-4">
                    <label for="ime_prezime" class="block text-gray-700 text-sm font-bold mb-2">Ime i prezime</label>
                    <input type="text" id="ime_prezime" name="ime_prezime" value="{{ $glasac->ime_prezime }}" 
                        class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300 @error('ime_prezime') border-red-500 @enderror"
                        pattern="^[A-Za-zА-Яа-яЁёЉљЊњЂђЋћЧчЏџЈјĐđŽžČčĆć\s]+$"
                        title="Only letters, - and . are allowed"
                        required>
                    @error('ime_prezime')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                
            
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ $glasac->email }}" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300 @error('email') border-red-500 @enderror" required>
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            
                <div class="mb-4">
                    <label for="jmbg" class="block text-gray-700 text-sm font-bold mb-2">JMBG</label>
                    <input type="text" id="jmbg" name="jmbg" value="{{ $glasac->jmbg }}" pattern="\d{13}" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300 @error('jmbg') border-red-500 @enderror" pattern="\d{13}" title="JMBG must be 13 digits" required>
                    @error('jmbg')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            
                <div class="mb-4">
                    <label for="adresa" class="block text-gray-700 text-sm font-bold mb-2">Adresa</label>
                    <input type="text" id="adresa" name="adresa" value="{{ $glasac->adresa }}" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300 @error('adresa') border-red-500 @enderror" required>
                    @error('adresa')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            
                <div class="mb-4">
                    <label for="poverenistvoEdit" class="block text-gray-700 text-sm font-bold mb-2">Poverenistvo</label>
                    <select  id="poverenistvoEdit" name="poverenistvoEdit" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300 @error('poverenistvoEdit') border-red-500 @enderror" required>
                    @foreach($opstine as $opstina)
                        <option value="{{ $opstina->naziv_opstine }}" {{ $glasac->poverenistvo == $opstina->naziv_opstine ? 'selected' : '' }}>
                            {{ $opstina->naziv_opstine }}
                        </option>
                    @endforeach
                    
                    </select>
                    @error('poverenistvoEdit')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-center">
                    <button type="submit" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-auto h-auto">Ažuriraj glasača</button>
                </div>
                {{-- Message  --}}
                @if (session('success'))
                <div 
                    id="success-message" 
                    x-data="{ show: true }" 
                    x-show="show" 
                    class="alert alert-success text-center"
                    x-init="setTimeout(() => { show = false; }, 3000)">
                    {{ session('success') }}
                </div>
                @endif
            </form>

        </div> 
    
    </div>
</x-app-layout>
