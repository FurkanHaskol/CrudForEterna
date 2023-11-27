<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todo Create') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between">
                    <form method="post" action="{{ route('todo.update', ['id' => $todo->id]) }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="todo_title" :value="__('Todo Title')" />
            <x-text-input required id="todo_title" name="todo_title" type="text" :value="$todo->title ?? null" class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->todoTitle->get('todo_title')" class="mt-2" />
            <span class="text-sm text-gray-600 dark:text-gray-400">max 150 char</span>
        </div>

        <div>
            <x-input-label for="todo_description" :value="__('Todo Description')" />
            <x-text-input required id="todo_description" name="todo_description" type="text" :value="$todo->description ?? null" class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->todoTitle->get('todo_description')" class="mt-2" />
            <span class="text-sm text-gray-600 dark:text-gray-400">max 250 char</span>
        </div>

        <div>
            <x-input-label for="category" :value="__('Category')" />
            <select required id="category" name="category" class="mt-1 block w-full">
            <option value="" disabled selected>Please Select</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($todo->category_id == $category->id)selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
        <x-input-label for="priority" :value="__('Priority')" />
            <select required id="priority" name="priority" class="mt-1 block w-full">
            <option value="" disabled selected>Please Select</option>
            <option value="1" @if($todo->priority ==1)selected @endif>Low</option>
            <option value="2"@if($todo->priority ==2)selected @endif>Medium</option>
            <option value="3" @if($todo->priority ==3)selected @endif>High</option>
            </select>
        </div>

        <div>
             <x-input-label for="due_date" :value="__('Due Date')" />
             <input required id="due_date" name="due_date" type="date" class="mt-1 block w-full"
                 min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" 
                 @if ($todo->due_at)
                     value="{{ \Carbon\Carbon::parse($todo->due_at)->format('Y-m-d') }}"
                 @endif
             />
             <x-input-error :messages="$errors->dueDate->get('due_date')" class="mt-2" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('update') }}</x-primary-button>

            @if (session('status') === 'todo-saved')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

