<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Guests') }}
            </h2>
            <span>
                <a href="{{ route('guests.create') }}" class="text-white font-bold py-2 px-4 rounded fa-xl">
                    <i class="fa-solid fa-plus"></i>
                </a>
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($guests->isEmpty())
                        <tr>
                            <td class="border px-4 py-2 text-center" colspan="4">No guests found.</td>
                        </tr>
                    @endif
                    @foreach($guests as $guest)
                        <tr>
                            <td class="border px-4 py-2">
                                <a href="{{ route('guests.show', $guest) }}" class="text-blue-500 hover:text-blue-700">
                                    {{ $guest->name }}
                                </a>
                            </td>
                            <td class="border px-4 py-2">
                                @if ($guest->arrived_at)
                                    <small class="bg-green-500 text-white px-2 py-2 rounded"><i class="fa-solid fa-check"></i></small>
                                @else
                                    <small class="bg-red-500 text-white px-2 py-2 rounded"><i class="fa-solid fa-clock"></i></small>
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                <span class="inline-flex">
                                    <a href="{{ route('guests.edit', $guest->id) }}" class="rounded bg-blue-200 hover:bg-blue-400 py-2 px-4 mr-2">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <form action="{{ route('guests.destroy', $guest->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded bg-red-200 hover:bg-red-400 py-2 px-4 mr-2" onclick="return confirm('Are you sure you want to delete this guest?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('guests.reset', $guest->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="rounded bg-gray-200 hover:bg-gray-500 py-2 px-4" onclick="return confirm('Are you sure you want to reset the arrival of this guest?')">
                                            <i class="fa-solid fa-undo"></i>
                                        </button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $guests->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
