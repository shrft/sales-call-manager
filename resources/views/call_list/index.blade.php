@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('success'))
                <div class="alert alert-primary" role="alert">
                {{Session::get('success')}}
                </div>
            @endif
            
            <div class="card">
                <div class="card-header">
                    {{__('customer list')}}
                </div>
                <div class="card-body">
                  <a href="./call-list?filter=ready" type="button" class="btn btn-outline-primary btn-sm">@lang('ready')</a>
                  <a href="./call-list?filter=hold" type="button" class="btn btn-outline-warning btn-sm">@lang('hold')</a>
                  <a href="./call-list?filter=done" type="button" class="btn btn-outline-dark btn-sm">@lang('done')</a>
                  <a href="./call-list?filter=all" type="button" class="btn btn-outline-info btn-sm">@lang('all')</a>
                  </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('company name')</th>
                                    <th>@lang('status')</th>
                                    <th>@lang('note')</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($callList as $row)
                                <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->customer->name}}</td>
                                <td>@lang($row->status)</td>
                                <td>{{$row->note}}</td>
                                <td><a type="button" href="{{route('cl.dtl',['id'=>$row->id])}}" class="btn btn-info btn-sm" >@lang('detail')</a></td>
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
