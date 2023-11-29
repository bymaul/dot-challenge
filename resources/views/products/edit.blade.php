<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('products.update', $product) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name') ? old('name') : $product->name" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-label for="stock" :value="__('Stock')" />

                            <x-input id="stock" class="block mt-1 w-full" type="number" name="stock"
                                :value="old('stock') ? old('stock') : $product->stock" required />
                            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-label for="price" :value="__('Price')" />

                            <x-input id="price" class="block mt-1 w-full" type="number" name="price"
                                :value="old('price') ? old('price') : $product->price" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-label for="category" :value="__('Category')" />

                            <x-select id="category" class="block mt-1 w-full" name="category" required>
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category') || $product->category->id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />

                            <x-textarea id="description" class="block mt-1 w-full" name="description" required>
                                {{ old('description') ? old('description') : $product->description }}
                            </x-textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex justify-end">
                            <x-button class="mt-3">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
