@extends('admin.admin-main', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('components.topnav', ['title' => 'Dashboard'])

    <section class="pt-3 pb-4" id="count-stats" style="margin-top: 300px">
        <x-app-layout>
            <div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')
                    @endif
                    <x-jet-section-border />

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mt-5 sm:mt-0">
                            @livewire('profile.update-password-form')
                        </div>
                    @endif
                    <x-jet-section-border />

                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        <div class="mt-5 sm:mt-0">
                            @livewire('profile.delete-user-form')
                        </div>
                    @endif
                </div>
            </div>
        </x-app-layout>
    </section>
@endsection

