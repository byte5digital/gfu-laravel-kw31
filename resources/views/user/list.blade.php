<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('general.user-list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="grid grid-cols-4 font-bold">
                    <p>ID</p>
                    <p>Name</p>
                    <p>E-Mail Adresse</p>
                    <p>Erstellt</p>
                </div>
                @foreach ($users as $user)
                    <div class="grid grid-cols-4">
                        <p>{{$user->id}}</p>
                        <p>{{$user->name}}</p>
                        <p>{{$user->email}}</p>
                        <p>{{$user->created_at}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
