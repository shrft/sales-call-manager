@extends('layouts.app')

@section('javascript')
{{-- <script src="/js/test.js"></script> --}}
{{-- <script src="/js/manifest.js"></script> --}}
<script src="{{ asset('js/browser-calls.js') }}"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    @lang('detail')
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate=""
                        action="{{ route('cl.dtl.updt',['id'=>$callList->id]) }}"
                        method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="companyName">@lang('company name')</label>
                                <input type="text" class="form-control-plaintext" id="companyName" readonly
                                    value="{{ $callList->customer->name }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone">@lang('phone number')</label>
                            <div class="form-row">
                                <div class="col">
                                    <input id="phone" type="text" class="form-control" placeholder="03xxxxxxxx" name="phone"
                                        value="{{ $callList->customer->phone }}">
                                </div>
                                <div class="col">
                                    <button class="btn btn-success call-customer-button" disabled>@lang('call')</button>
                                    <button class="btn btn-danger hangup-button" onclick="hangUp();return false;"disabled>@lang('hang up')</button>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="url">@lang('company url')</label>
                            <a href="{{ $callList->customer->url }}" class="form-control"
                                target="_blank">{{ $callList->customer->url }}</a>
                        </div>
                        <div class="mb-3">
                            <label for="note">@lang('note')<span class="text-muted">(@lang('optional'))</span></label>
                            <textarea name="note" id="note" cols="30" rows="5"
                                class="form-control">{{ $callList->note }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status">@lang('status')</label>
                            {!! Form::select('status', ['ready'=>__('ready'),'hold'=>__('hold'),'done'=>__('done')], $callList->status,
                            ['class'=>'form-control']) !!}
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">@lang('update')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
