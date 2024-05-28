<x-layout>
    <x-slot:title>Register</x-slot:title>
    <x-slot:heading>Register</x-slot:heading>

    <form action="/register" method="POST" class="px-3">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class=" grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="first_name">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="firstname" :value="old('first_name')" name="first_name" id="first_name"
                                          placeholder="John"
                                          required/>
                        </div>
                        <x-form-error name="first_name"/>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="last_name" :value="old('last_name')" id="last_name" placeholder="Doe"
                                          required/>
                        </div>
                        <x-form-error name="last_name"/>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" :value="old('email')" name="email" id="email"
                                          placeholder="test@example.com" required/>
                        </div>
                        <x-form-error name="email"/>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password" id="password" placeholder="Password"
                                          required/>
                        </div>
                        <x-form-error name="password"/>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password_confirmation"
                                          id="password_confirmation" placeholder="Password"
                                          required/>
                        </div>
                        <x-form-error name="password_confirmation"/>
                    </x-form-field>
                </div>

            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a type="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Register</x-form-button>
        </div>
    </form>
</x-layout>
