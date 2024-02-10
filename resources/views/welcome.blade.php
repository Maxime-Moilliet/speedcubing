@extends('layout.app')

@section('app')
    <main class="flex">
        <aside class="fixed top-0 bottom-0 min-w-[18rem] bg-indigo-600 px-6 flex flex-col gap-3">
            <a href="{{ route('welcome') }}" class="text-white font-bold text-xl py-4">SpeedCubing</a>
            <form action="{{ route('session.store') }}" method="post" class="flex gap-1 pb-2 pt-4">
                @csrf
                <input type="text" name="name" placeholder="Create new session"
                       class="w-full border-0 bg-indigo-700 py-1.5 pl-2 text-white placeholder:text-gray-200 focus:ring-0 sm:leading-6 rounded">
                <button type="submit"
                        class="rounded-md bg-white px-3 py-1.5 font-semibold text-indigo-600 hover:bg-indigo-100">
                    V
                </button>
            </form>
            <ul class="flex flex-col gap-1.5">
                @foreach ($sessions as $s)
                    <li>
                        <a href="{{ route('welcome', $s->name) }}"
                           class="flex justify-between text-white p-2 px-3 w-full rounded @if($s->id === $session->id) bg-indigo-700 @endif hover:bg-indigo-700">
                            {{ $s->name }}
                            <form action="{{ route('session.destroy', $s) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">X</button>
                            </form>
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>
        <div class="w-full pl-[18rem]">
            <div class="flex justify-center py-4 bg-indigo-500 w-full">
                <p class="text-2xl text-white font-bold tracking-widest">{{ $scramble }}</p>
            </div>
            <p class="mx-auto text-center pt-12 pb-6 text-4xl font-semibold text-gray-900">{{ $average }}<span
                    class="text-xl">s avg</span></p>
            <div class="flex justify-center">
                <form action="{{ route('time.store', $session) }}" method="post">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <input type="number" step="0.01" name="time"
                               class="w-[300px] border bg-white py-2 pl-2 text-gray-900 text-center text-xl placeholder:text-gray-400 focus:ring-0 sm:leading-6 rounded">
                        <input type="hidden" name="scramble" value="{{ $scramble }}">
                        <div class="flex gap-4">
                            <div class="flex gap-1 items-center">
                                <input type="checkbox" name="is_incomplete" id="is_incomplete"
                                       class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                <label for="is_incomplete">+ 2</label>
                            </div>
                            <div class="flex gap-1 items-center">
                                <input type="checkbox" name="is_dnf" id="is_dnf"
                                       class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                <label for="is_dnf">DNF</label>
                            </div>
                        </div>
                        <button type="submit"
                                class="rounded bg-indigo-600 px-3 py-1.5 font-semibold text-white hover:bg-indigo-700">
                            Add
                        </button>
                    </div>
                </form>
            </div>
            <div class="max-w-3xl mx-auto pt-10">
                <form action="{{ route('time.destroyAll', $session) }}" method="post" class="flex justify-end">
                    @csrf
                    @method('delete')
                    <button type="submit"
                            class="text-sm rounded bg-indigo-600 px-3 py-1.5 text-white hover:bg-indigo-700">
                        Delete all times
                    </button>
                </form>
                <div
                    class="pt-3 relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                        <tr>
                            <th class="p-4 border-b border-gray-200 bg-gray-100">
                                <p class="block text-sm font-normal leading-none text-gray-900 opacity-70">
                                    Action</p>
                            </th>
                            <th class="p-4 border-b border-gray-200 bg-gray-100">
                                <p class="block text-sm font-normal leading-none text-gray-900 opacity-70">
                                    Time</p>
                            </th>
                            <th class="p-4 border-b border-gray-200 bg-gray-100">
                                <p class="block text-sm font-normal leading-none text-gray-900 opacity-70">
                                    Scramble</p>
                            </th>
                            <th class="p-4 border-b border-gray-200 bg-gray-100">
                                <p class="block text-sm font-normal leading-none text-gray-900 opacity-70">
                                    + 2</p>
                            </th>
                            <th class="p-4 border-b border-gray-200 bg-gray-100">
                                <p class="block text-sm font-normal leading-none text-gray-900 opacity-70">
                                    DNF</p>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($session->times as $time)
                            <tr>
                                <td class="p-4 border-b border-gray-200">
                                    <form action="{{ route('time.destroy', $time) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                                <td class="p-4 border-b border-gray-200">
                                    <p class="block text-sm font-normal leading-normal text-gray-700">
                                        {{ $time->time }}s
                                    </p>
                                </td>
                                <td class="p-4 border-b border-gray-200">
                                    <p class="block text-sm font-normal leading-normal text-gray-700">
                                        {{ $time->scramble }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-gray-200">
                                    <p class="block text-sm font-normal leading-normal text-gray-700">
                                        {{ $time->is_incomplete ? 'v' : 'x' }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-gray-200">
                                    <p class="block text-sm font-normal leading-normal text-gray-700">
                                        {{ $time->is_dnf ? 'v' : 'x' }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
