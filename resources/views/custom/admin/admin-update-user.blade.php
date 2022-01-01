<x-app-layout>
    <div class="mx-10">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <x-jet-validation-errors class="mb-4" />
                    <form action="{{ route('admin.users.update',['user_id'=>$user->id]) }}" method="POST">
                        @csrf
                        <div class="mt-4">
                            <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                            <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                value="{{ $user->first_name }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                            <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                value="{{ $user->last_name }}" required />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                value="{{ $user->email }}" required />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="role" value="{{ __('Role') }}" />
                            <select class="w-full text-lg rounded-md border-gray-300" name="role" id="role">
                                @if ($user->role=='etudiant')
                                <option value="etudiant" label="Etudiant" selected />
                                <option value="enseignant" label="Enseignant" />
                                <option value="pre_enseignant" label="Pre Enseignant" />
                                @elseif ($user->role == "pre_enseignant")
                                <option value="etudiant" label="Etudiant" />
                                <option value="enseignant" label="Enseignant" />
                                <option value="pre_enseignant" label="Pre Enseignant" selected />
                                @else
                                <option value="etudiant" label="Etudiant" />
                                <option value="enseignant" label="Enseignant" selected />
                                <option value="pre_enseignant" label="Pre Enseignant" />
                                @endif



                            </select>
                        </div>

                        <div class="flex justify-between mt-10">
                            <x-jet-button class="mr-4">
                                {{ __('Edit') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>