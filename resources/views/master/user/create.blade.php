<x-app-layout title="Tambah User">

    <body class="font-sans text-gray-900 antialiased">
        <div class="w-full bg-gray-100 dark:bg-gray-900 h-screen">
            <div class=" h-full flex items-center justify-center">
                <div
                    class=" px-6 py-7  self-center bg-gradient-to-b dark:from-gray-800 from-gray-200  dark:to-transparent shadow-md  rounded-lg flex-auto max-w-md">
                    <form method="POST" action="{{ route('user.store') }}" class="space-y-2" autocomplete="off">
                        @csrf

                        <!-- Name -->
                        <div class="">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="name" id="name"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>

                        <!-- Email Address -->
                        <div class="">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-Mail</label>
                            <input type="text" name="email" id="email"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>

                        <!-- Password -->
                        <div class="">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" autocomplete="new-password"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>

                        <!-- Confirm Password -->
                        <div class="">
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                autocomplete="new-password"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>
                        <div class="">
                            <x-input-label for="role" :value="__('Role')" />
                            <select name="role" id="role"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="admin">Admin</option>
                                <option value="support">Support</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="hidden" id="no_hp_div">
                            <label for="no_hp"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Hp</label>
                            <input type="text" name="no_hp" id="no_hp"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Tambah User') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>


</x-app-layout>
<script>
    const roleSelect = document.getElementById('role');
    const noHpDiv = document.getElementById('no_hp_div');
    const noHpInput = document.getElementById('no_hp');

    roleSelect.addEventListener('change', function() {
        if (roleSelect.value === 'support') {
            noHpDiv.classList.remove('hidden');
            noHpInput.required = true;
        } else {
            noHpDiv.classList.add('hidden');
            noHpInput.required = false;
        }
    });
</script>
