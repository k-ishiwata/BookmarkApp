@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">ブックマーク登録</div>
                    <div class="card-body">
                        @include('components.alert')
                        {!! Form::open(['route' => 'bookmarks.store']) !!}
                            @include('bookmarks.fields')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
