@extends('admin.layouts.layout')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Физические лица</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="">
                <div class="col-25">
                    <div class="card">

                        {{--<div class="card-header">
                            <h3 class="card-title">{{$title ?? ''}}</h3>
                        </div>--}}
                        <div class="card-body">

                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dt-buttons btn-group flex-wrap">
                                            <div class="btn-group">
                                                {{--<a href="{{route('users.create')}}" class="btn btn-primary btn-sm">Добавить пользователя</a>--}}
                                                <a href="{{route('create-user')}}" class="btn btn-primary btn-sm">Добавить пользователя</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter">
                                            <form method="get" action="{{route('search')}}">
                                                <label>
                                                    Поиск:
                                                    <input id="s" name="s" type="search" class="form-control form-control-sm" placeholder="Например: 'ivanov'" aria-controls="example1">
                                                </label>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                            <thead>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Фото') }}</th>
                                            <th>{{ __('Фамилия') }}</th>
                                            <th>{{ __('Имя') }}</th>
                                            <th>{{ __('Телефон') }}</th>

                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td class="text-center">
                                                        <img src="{{asset('/storage/'.$user->photo)}}" style="opacity: .8" width="60" height="60" class="img-bordered-sm img-circle" alt="User Image">
                                                    </td>
                                                    <td>{{$user->last_name}}</td>
                                                    <td>{{$user->first_name}}</td>
                                                    <td>{{$user->phone}}</td>

                                                    </td>
                                                    {{--
                                                                                                        <td>@if($user->status == 1)Онлайн @else Оффлайн @endif</td>
                                                    --}}


                                                    <td>
                                                        @if($user->status == 2)
                                                            Заблокирован
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{route('ShowUser',[$user->id])}}" class="btn btn-default"><i class="fas fa-eye"></i></a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">

                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            <ul class="pagination">
                                                {{$users->links()}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection
