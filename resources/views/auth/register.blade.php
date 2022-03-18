<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo style="margin-top: -50%;" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            {{ method_field('GET') }}

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            
            <!--    Surname -->
            <div>
                <x-label for="surname" :value="__('surname')" />

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />
            </div>
            <!--    Phone -->
            <div>
                <x-label for="phone" :value="__('phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" pattern="[0-9]{10}" :value="old('phone')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <!--Departments-->
           <div class="mt-4">
            <x-label for="department" value="{{ __('Department') }}" />

            <select name="department" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indingo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>
                    <option value="" selected disabled>None</option>
                    @foreach ($dep as $item)
                    <option value="{{ $item->name }}"> {{$item->name}}</option>
                    @endforeach
            </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <!-- User roles-->
            <div class="mt-4">
                <x-label for="role_id" value="{{ __('Resgister as') }}" />

                <select name="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indingo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>
                        <option value="">None</option>
                        <option value="admin">Admin</option>
                        <option value="department-head">Department-head</option>
                        <option value="user">User</option>
                    </select>
            </div>
            <div class="flex items-center justify-end mt-4">
                
            <x-button class="ml-3">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
