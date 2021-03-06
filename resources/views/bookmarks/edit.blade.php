@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">ブックマーク編集</div>
                    <div class="card-body">
                        @include('components.alert')
                        {!! Form::model($bookmark, [
                            'route' => ['bookmarks.update', $bookmark],
                            'method' => 'put'
                        ]) !!}
                            @include('bookmarks.fields')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
