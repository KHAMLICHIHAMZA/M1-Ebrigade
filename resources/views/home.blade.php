@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                       
                    <h1 class="display-4 text-center" style="font-size: 2.5rem">@lang("Hello!")</h1>
                    <h3 class="display-4 text-center" style="font-size: 1.5rem">{{ trans('lang.title') }}</h3>
                    <h4 class="display-4 text-center" style="font-size: 1.5rem">{{ __("Stay with us and keep learning")}}</h4>

                <div class="card-header">Dashboard</div>
               <div class="card-body">
                    @if (session('status'))
                <div class="alert alert-success" role="alert">

                    {{('status')}}

                </div>

                    @endif


                </div>      

            </div>
        </div>
    </div>
</div>
@endsection
