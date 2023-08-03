<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Task name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Completed?
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Date of Completion
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $task->title }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $task->description }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($task->completed == true)
                                                <div class="flex items-center">
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> <span class="text-green-500">Complete</span>
                                                </div>
                                            @else
                                                <div class="flex items-center">
                                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> <span class="text-red-500">Incomplete</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($task->completed_at == null)
                                                N/A
                                            @else
                                                {{ $task->completed_at }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($task->completed == false)
                                                <form action="{{route('tasks.update',$task->id)}}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit">Complete!</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
