@extends('layouts.app', [
    'title' => trans('settings.api.title'),
    'description' => trans('settings.api.description'),
    'breadcrumbs' => false
])

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-lg-2 col-sm-4 col-xs-4">
            @include('settings.menu', ['active' => 'api'])
        </div>
        <div class="col-lg-6 col-sm-8 col-xs-8">
            <div class="box box-solid">
                <div class="box-body">
                    <h2 class="page-header with-border">
                        {{ trans('settings.api.title') }}
                    </h2>

                    <p class="text-muted">
                        {{ __('settings.api.experimental') }}
                        <a href="/docs/1.0" target="_blank"><i class="fa fa-external-link-alt"></i> {{ __('settings.api.link') }}</a>
                    </p>
                    <passport-clients></passport-clients>
                    <passport-authorized-clients></passport-authorized-clients>
                    <passport-personal-access-tokens></passport-personal-access-tokens>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ mix('js/api.js') }}" defer></script>
@endsection
