
@extends('layouts.app')
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-slate-200 ">
        <div class="md:px-32 py-8 w-full p-16">
            <div class="shadow mx-auto overflow-hidden rounded-md border-b border-gray-200 bg-white max-w-2xl">
                <div class="w-full bg-slate-700 text-gray-300 px-4 py-2">
                    <h2># {{ $user['id'] }}</h2>
                </div>


                <div class="py-3 px-4">
                    <form action="/update/{{ $user['id'] }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="text-left my-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ $user['name'] }}" class="border border-gray-400 rounded w-full px-3 py-1">
                        </div>
                        <div class="text-left my-2">
                            <label for="age">Age</label>
                            <input type="number" name="age" id="age" value="{{ $user['age'] }}" class="border border-gray-400 rounded w-full px-3 py-1">
                        </div>
                        <div class="text-left my-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user['email'] }}" class="border border-gray-400 rounded w-full px-3 py-1">
                        </div>
                        <div class="text-left my-2">
                            <button type="submit" class="px-3 py-1 bg-green-400 rounded text-white hover:text-gray-200">Update</button>
                        </div>
                    </form>
                </div>

                <div class="flex justify-between items-center border-t-2 border-gray-400 w-full px-4 py-2">
                    <a href="/" class="px-3 py-1 bg-gray-400 rounded text-white hover:text-gray-200">Back</a>

                    <div class="w-1/2">

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
