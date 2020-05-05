@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    詳細
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="companyName">会社名</label>
                                <input type="text" class="form-control-plaintext" id="companyName" readonly
                                    value="{{ $callList->customer->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone">電話番号</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="03-xxxx-xxxx">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary">電話する</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="url">会社URL</label>
                            <a href="{{$callList->customer->url}}" class="form-control" target="_blank">{{$callList->customer->url}}</a>
                        </div>
                        <div class="mb-3">
                            <label for="note">メモ<span class="text-muted">(任意)</span></label>
                            <textarea name="note" id="note" cols="30" rows="5" class="form-control">{{$callList->note}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status">ステータス</label>
                            <select name="status" id="status" class="form-control">
                              <option value="ready">未対応</option>
                              <option value="hold">保留</option>
                              <option value="done">完了</option>
                            </select>
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
