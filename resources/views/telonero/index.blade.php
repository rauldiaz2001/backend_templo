<!-- @extends('layouts.app')

@section('template_title')
    Telonero
@endsection -->

@extends('adminlte::page')

@section('title', 'Teloneros | Dashboard')

@section('content_header')
    <h1>Teloneros</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Telonero') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('teloneros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Concierto</th>
										<th>Telonero</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teloneros as $telonero)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $telonero->concierto->nombre }}</td>
											<td>{{ $telonero->telonero }}</td>

                                            <td>
                                                <form action="{{ route('teloneros.destroy',$telonero->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('teloneros.show',$telonero->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('teloneros.edit',$telonero->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $teloneros->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
