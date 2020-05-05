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
                    詳細
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate=""
                        action="{{ route('cl.dtl.updt',['id'=>$callList->id]) }}"
                        method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="companyName">会社名</label>
                                <input type="text" class="form-control-plaintext" id="companyName" readonly
                                    value="{{ $callList->customer->name }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone">電話番号</label>
                            <div class="form-row">
                                <div class="col">
                                    <input id="phone" type="text" class="form-control" placeholder="03xxxxxxxx" name="phone"
                                        value="{{ $callList->customer->phone }}">
                                </div>
                                <div class="col">
                                    <button class="btn btn-success call-customer-button" disabled>電話する</button>
                                    <button class="btn btn-danger hangup-button" onclick="hangUp();return false;"disabled>切る</button>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="url">会社URL</label>
                            <a href="{{ $callList->customer->url }}" class="form-control"
                                target="_blank">{{ $callList->customer->url }}</a>
                        </div>
                        <div class="mb-3">
                            <label for="note">メモ<span class="text-muted">(任意)</span></label>
                            <textarea name="note" id="note" cols="30" rows="5"
                                class="form-control">{{ $callList->note }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status">ステータス</label>
                            {!! Form::select('status', ['ready'=>'未対応','hold'=>'保留','done'=>'完了'], $callList->status,
                            ['class'=>'form-control']) !!}
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
