<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form action="{{ route("register") }}" method="POST">
            @csrf

            <div>
                <x-label for="name" value="{{ __("Name") }}" />
                <x-input :value="old("name")" autocomplete="name" autofocus class="mt-1 block w-full" id="name"
                    name="name" required type="text" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __("Email") }}" />
                <x-input :value="old("email")" autocomplete="username" class="mt-1 block w-full" id="email"
                    name="email" required type="email" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __("Password") }}" />
                <x-input autocomplete="new-password" class="mt-1 block w-full" id="password" name="password" required
                    type="password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __("Confirm Password") }}" />
                <x-input autocomplete="new-password" class="mt-1 block w-full" id="password_confirmation"
                    name="password_confirmation" required type="password" />
            </div>
            {{-- <div class="mt-4">
                <x-label for="country" value="{{ __('Country') }}" />
                <x-input id="country" class="block mt-1 w-full" type="text" name="country" required autocomplete="country" />
            </div> --}}
            @livewire("select-flags")

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox id="terms" name="terms" required />

                            <div class="ms-2">
                                {!! __("I agree to the :terms_of_service and :privacy_policy", [
                                    "terms_of_service" =>
                                        '<a target="_blank" href="' .
                                        route("terms.show") .
                                        '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                        __("Terms of Service") .
                                        "</a>",
                                    "privacy_policy" =>
                                        '<a target="_blank" href="' .
                                        route("policy.show") .
                                        '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                        __("Privacy Policy") .
                                        "</a>",
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="mt-4 flex items-center justify-end">
                <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                    href="{{ route("login") }}">
                    {{ __("Already registered?") }}
                </a>

                <x-button class="ms-4">
                    {{ __("Register") }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
