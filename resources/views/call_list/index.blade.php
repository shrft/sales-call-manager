@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    お客様一覧
                </div>
                <div class="card-body">
                  <a href="./call-list?filter=ready" type="button" class="btn btn-outline-primary btn-sm">未対応</a>
                  <a href="./call-list?filter=hold" type="button" class="btn btn-outline-warning btn-sm">保留</a>
                  <a href="./call-list?filter=done" type="button" class="btn btn-outline-dark btn-sm">完了</a>
                  <a href="./call-list?filter=all" type="button" class="btn btn-outline-info btn-sm">全て</a>
                  </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>会社名</th>
                                    <th>ステータス</th>
                                    <th>メモ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($callList as $row)
                                <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->customer->name}}</td>
                                <td>{{$row->present()->statusName}}</td>
                                <td>{{$row->note}}</td>
                                <td><a type="button" href="./call-list/detail?id={{$row->id}}" class="btn btn-info btn-sm"  target="_blank">詳細</a></td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                        {{$callList->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
