<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <h2>Welcome to our Hotel</h2>

        <form method="get" action="/admin/login" style="display: inline-block;">
            @csrf
            <x-button class="btn btn-none mb-3">Login as Admin</x-button>
        </form>
        <form method="get" action="/manager/login" style="display: inline-block;">
            @csrf
            <x-button class="btn btn-none mb-3">Login as Manager</x-button>
        </form>
        <form method="get" action="/receptionist/login" style="display: inline-block;">
            @csrf
            <x-button class="btn btn-none mb-3">Login as Receptionist</x-button>
        </form>
        <br>
        <form method="get" action="/client/register" style="display: inline-block;">
            @csrf
            <x-button class="btn btn-none mb-3">Register</x-button>
        </form>
        <form method="get" action="/client/login" style="display: inline-block;">
            @csrf
            <x-button class="btn btn-none mb-3">Login</x-button>
        </form>

    </x-auth-card>
</x-guest-layout>