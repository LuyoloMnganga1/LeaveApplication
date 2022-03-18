<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo style="margin-top: -50%;" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ url('updateUser', $data->id) }}">
            @csrf

            {{ __('Edit User') }}
          
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$data->name" required autofocus />
            </div>
            
            <!--    Surname -->
            <div>
                <x-label for="surname" :value="__('Surname')" />

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="$data->surname" required autofocus />
            </div>
            <!--    Phone -->
            <div>
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" pattern="[0-9]{10}" :value="$data->phone" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$data->email" required />
            </div>
            <!--Departments-->
           <div class="mt-4">
            <x-label for="department" value="{{ __('Department') }}" />

            <select name="department"  class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indingo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>
                   <option value=""  disabled selected>{{ $data->department }}</option>
                    <option value="Business Development">Business Development</option>
                    <option value="Software Development">Software Development</option>
                    <option value="Project Management">Project Management</option>
                    <option value="Technical Department">Technical Department</option>
                    <option value="Finance Department">Finance Department</option>
            </select>
            </div>
            <!-- User roles-->
            <div class="mt-4">
                <x-label for="role" value="{{ __('Role') }}" />

                <select name="role"class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indingo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>
                <option value="" disabled selected>{{ $data->role }}</option>
                        <option value="admin">Admin</option>
                        <option value="department-head">Department-head</option>
                        <option value="user">User</option>
                    </select>
            </div>
            <div class="flex items-center justify-end mt-4">
                
                <x-button class="ml-4">
                    {{ __('Save') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
