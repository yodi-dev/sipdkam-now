@extends('layouts.app', [
'namePage' => 'Create Dokter',
'class' => '',
'activePage' => 'dokter',
'activeNav' => 'page',
])

@section('content')
<div class="panel-header">
</div>
<div class="content">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Dokter Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('dokter.index') }}"
                                class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('dokter.store') }}" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="nama_dokter" id="input-name"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'name'])
                                {{-- <input type="hidden" name="created_at"> --}}
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
