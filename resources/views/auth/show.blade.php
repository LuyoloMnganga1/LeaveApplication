<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo style="margin-top: -50%;" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
@if(Auth::user()->hasRole('department-head'))
<form method="GET" action="{{ url('userListHod') }}">
@endif
@if(Auth::user()->hasRole('admin'))
        <form method="GET" action="{{ url('userList') }}">
            @csrf
            {{ __('Show User') }}
            @if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
      <a href="#" class="close" id ="cl" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$data->name" disabled />
            </div>
            
            <!--    Surname -->
            <div>
                <x-label for="surname" :value="__('Surname')" />

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="$data->surname" disabled />
            </div>
            <!--    Phone -->
            <div>
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" pattern="[0-9]{10}" :value="$data->phone" disabled />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$data->email" disabled />
            </div>
            <!--Departments-->
           <div class="mt-4">
            <x-label for="department" value="{{ __('Department') }}" />

            <select name="department" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indingo-200 focus:ring-opacity-50 rounded-md shadow-sm" disabled>
                    <option value="">{{ $data->department }}</option>
                    <option value="Business Development">Business Development</option>
                    <option value="Software Development">Software Development</option>
                    <option value="Project Management">Project Management</option>
                    <option value="Technical Department">Technical Department</option>
                    <option value="Finance Department">Finance Department</option>
            </select>
            </div>
            <!-- User roles-->
            <div class="mt-4">
                <x-label for="role_id" value="{{ __('Role') }}" />

                <select name="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indingo-200 focus:ring-opacity-50 rounded-md shadow-sm" disabled>
                        <option value="">{{ $data->role }}</option>
                        <option value="admin">Admin</option>
                        <option value="department-head">Department-head</option>
                        <option value="user">User</option>
                    </select>
            </div>
            <div class="flex items-center justify-end mt-4">
                
                <x-button class="ml-4">
                    {{ __('Back') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
