@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">タグ登録</div>
                    <div class="card-body">
                        @include('components.alert')
                        {!! Form::open(['route' => 'tags.store']) !!}
                            @include('tags.fields')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
