@extends('main')

@section('container')
    <section class="pt-3 pb-4" id="count-stats">
        <x-app-layout>

            {{-- <div class="container">
                <div class="row">
                    <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
                        <div class="row">
                            <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
                                <h3 class="mb-5">Edit Profil</h3>
                                <form role="form" id="contact-form" method="post" autocomplete="off">
                                    <div class="card-body">



                                        <div class="mb-3">
                                            <label for="name" value="{{ __('Name') }}">Nama</label>
                                            <div class="input-group">
                                                <input id="name" type="text" class="form-control"
                                                    wire:model.defer="state.name" autocomplete="name">
                                                <x-jet-input-error for="name" class="mt-2" />

                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" value="{{ __('Email') }}">Email</label>
                                            <div class="input-group">
                                                <input id="email" type="email" class="form-control"
                                                    wire:model.defer="state.email">
                                                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                                                        !$this->user->hasVerifiedEmail())
                                                    <p class="text-sm mt-2">
                                                        {{ __('Your email address is unverified.') }}

                                                        <button type="button"
                                                            class="underline text-sm text-gray-600 hover:text-gray-900"
                                                            wire:click.prevent="sendEmailVerification">
                                                            {{ __('Click here to re-send the verification email.') }}
                                                        </button>
                                                    </p>

                                                    @if ($this->verificationLinkSent)
                                                        <p v-show="verificationLinkSent"
                                                            class="mt-2 font-medium text-sm text-green-600">
                                                            {{ __('A new verification link has been sent to your email address.') }}
                                                        </p>
                                                    @endif
                                                @endif
                                            </div>

                                        </div>

                                        <div name="actions" class="col-md-12">
                                            <x-jet-button class="btn bg-gradient-dark w-100" wire:loading.attr="disabled"
                                                wire:target="photo">
                                                {{ __('Save') }}
                                            </x-jet-button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

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
