@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('P_NOM') }}</label>

                            <div class="col-md-6">
                                <input id="P_NOM" type="text" class="form-control @error('P_NOM') is-invalid @enderror" name="P_NOM" value="{{ old('P_NOM') }}" required autocomplete="P_NOM" autofocus>

                                @error('P_NOM')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="P_EMAIL" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="P_EMAIL" type="P_EMAIL" class="form-control @error('P_EMAIL') is-invalid @enderror" name="P_EMAIL" value="{{ old('P_EMAIL') }}" required autocomplete="P_EMAIL">

                                @error('P_EMAIL')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="P_MDP" class="col-md-4 col-form-label text-md-right">{{ __('P_MDP') }}</label>

                            <div class="col-md-6">
                                <input id="P_MDP" type="password" class="form-control @error('P_MDP') is-invalid @enderror" name="P_MDP" required autocomplete="new-P_MDP">

                                @error('P_MDP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="P_MDP-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm P_MDP') }}</label>

                            <div class="col-md-6">
                                <input id="P_MDP-confirm" type="password" class="form-control" name="P_MDP_confirmation" required autocomplete="new-P_MDP">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
