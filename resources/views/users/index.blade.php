@extends('layouts.app')
@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-slate-200 ">
    <div class="md:px-16 py-8 w-full p-6">
        <div class="mb-2 shadow overflow-hidden rounded border-b border-gray-200">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white uppercase">
                    <tr>
                        <th scope="col" class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Id</th>
                        <th scope="col" class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                        <th scope="col" class="text-left py-3 px-4 uppercase font-semibold text-sm">Age</th>
                        <th scope="col" class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                        <th scope="col" class="text-left py-3 px-4 uppercase font-semibold text-sm">Options</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                @foreach($users->collection as $user)
                    <tr>
                        <td class="w-1/3 text-left py-3 px-4">{{ $user['id'] }}</td>
                        <td class="w-1/3 text-left py-3 px-4"><a href="#">{{ $user['name'] }}</a></td>
                        <td class="text-left py-3 px-4">{{ $user['age'] }}</td>
                        <td class="text-left py-3 px-4">{{ $user['email'] }}</td>
                        <td class="text-left py-3 px-4">
                            <a href="/{{ $user['id'] }}" class="text-indigo-600 hover:text-indigo-900">Details</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot class="flex justify-between">
                </tfoot>
            </table>
        </div>
        <div>
            {{ $users->links() }}
        </div>
    </div>
</div>
@stop
