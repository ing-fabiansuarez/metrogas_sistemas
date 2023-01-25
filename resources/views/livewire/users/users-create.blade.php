<div>
    <x-cards.card-principal>
        <x-slot:title>
            Directorio Activo
        </x-slot:title>

        <div class="container-fluid">
            <div class="page-header min-height-100 border-radius-xl">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>

            <div class="card card-body blur shadow-blur mx-4 mt-n6">
                <div class="row gx-4">
                    <div class="col-12">
                        <form wire:submit.prevent="search" method="post">
                            @csrf
                            <div class="input-group">
                                <input wire:model.defer="username" type="text" class="form-control"
                                    placeholder="Username" aria-describedby="button-addon2">
                                <button class="btn bg-gradient-secondary mb-0" type="submit"
                                    id="button-addon2">{{ __('forms.button.search') }}</button>
                            </div>
                            @error('username')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>

            @if (isset($userLdap))
                <div class="container-fluid py-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">{{ __('forms.user.information_general') }}</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <form wire:submit.prevent="store" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input_object_guid"
                                                class="form-control-label">{{ __('forms.user.object_guid') }}</label>
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="null" id="input_object_guid"
                                                value="{{ $userLdap->getAuthIdentifier() }}" disabled>
                                            <input type="hidden" name="object_guid"
                                                value="{{ $userLdap->getAuthIdentifier() }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="input_name"
                                                class="form-control-label">{{ __('forms.user.name') }}</label>
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="null" id="input_name" name="nombre"
                                                value="{{ $userLdap->getCommonName() }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="input_username"
                                                class="form-control-label">{{ __('forms.user.username') }}</label>
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="null" id="input_username"
                                                name="username" value="{{ $userLdap->getAccountName() }}" disabled>
                                            <input type="hidden" name="username"
                                                value="{{ $userLdap->getAccountName() }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="input_user_principal_name"
                                                class="form-control-label">{{ __('forms.user.user_principal_name') }}</label>
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="null"
                                                id="input_user_principal_name" name="nombre_principal"
                                                value="{{ $userLdap->getUserPrincipalName() }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="input_email"
                                                class="form-control-label">{{ __('forms.user.email') }}</label>
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="null" id="input_email"
                                                name="email" value="{{ $userLdap->getEmail() }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input_jobtitle_ldap"
                                                class="form-control-label">{{ __('forms.user.jobtitle_ldap') }}</label>
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="null"
                                                id="input_jobtitle_ldap" name="jobtitle_ldap"
                                                value="{{ $userLdap->getDescription() }}" disabled>
                                        </div>
                                       

                                 

                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit"
                                        class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ __('forms.user.button.new') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endif

        </div>
    </x-cards.card-principal>
</div>
