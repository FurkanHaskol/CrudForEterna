<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button class="bg-gray-500 dark:hover:bg-white text-black font-bold py-2 px-4 rounded">
                <a href="{{ route('categories.create') }}">
                    Create Category
                </a>
            </button>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($categories as $category)
                        <div class="flex justify-between">
                            <div>
                                <a href="{{ route('categories.show', $category) }}">
                                    {{ $category->name }}
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('categories.edit', $category) }}">
                                    Edit
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>