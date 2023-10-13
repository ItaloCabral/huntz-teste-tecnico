@extends('layouts.app')
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-slate-200 ">
        <div class="md:px-32 py-8 w-full px-16">
            @isset ($e)
                <div class="shadow mx-auto rounded-md border-b border-gray-200 bg-white max-w-2xl">
                    <div class="w-full bg-slate-700 text-red-300 px-4 py-2">
                        <h2>Error: {{ $e }}</h2>
                    </div>
                </div>
                <a href="/" class="px-3 py-1 bg-gray-400 rounded  text-white hover:text-gray-200">Back</a>
            @endisset

            @isset($user)
                <div class="shadow mx-auto overflow-hidden rounded-md border-b border-gray-200 bg-white max-w-2xl">
                    <div class="w-full bg-slate-700 text-gray-300 px-4 py-2">
                        <h2># {{ $user['id'] }}</h2>
                    </div>


                    <div class="py-3 px-4">
                        <div class="text-left my-2">Name: {{ $user['name'] }}</div>
                        <div class="text-left my-2">Age: {{ $user['age'] }}</div>
                        <div class="text-left my-2">Email: {{ $user['email'] }}</div>
                    </div>

                    <div class="flex justify-between items-center border-t-2 border-gray-400 w-full px-4 py-2">
                        <a href="/" class="px-3 py-1 bg-gray-400 rounded text-white hover:text-gray-200">Back</a>

                        <div class="w-1/2">
                            <a href="/edit/{{ $user['id'] }}" class="px-3 py-1.5 bg-yellow-300 rounded text-white hover:text-gray-200">Edit</a>
                            <form action="/delete/{{ $user['id'] }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-400 rounded text-white hover:text-gray-200">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>

            @endisset

        </div>
    </div>
@stop
