<x-layout>
    <x-slot:title>Login</x-slot:title>
    <x-slot:heading>Login</x-slot:heading>

    <form action="/login" method="POST" class="px-3">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class=" grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-6">

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" :value="old('email')"
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

                </div>

            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a type="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Login</x-form-button>
        </div>
    </form>
</x-layout>
