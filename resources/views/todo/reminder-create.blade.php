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
                    <form method="post" action="{{ route('reminder.add', ['id' => $id] ) }}" class="mt-6 space-y-6">
        @csrf    

        <div>
          <x-input-label for="reminder_date" :value="__('Reminder Date')" />
          <input required id="reminder_date" name="reminder_date" type="datetime-local" class="mt-1 block w-full"
           min="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}" />
          <x-input-error :messages="$errors->dueDate->get('reminder_date')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="reminder_message" :value="__('Reminder Message')" />
            <x-text-input required id="reminder_message" name="reminder_message" type="text" class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->todoTitle->get('reminder_message')" class="mt-2" />
            <span class="text-sm text-gray-600 dark:text-gray-400">max 150 char</span>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'reminder-saved')
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

