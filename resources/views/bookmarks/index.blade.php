@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ブックマーク一覧</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('bookmarks.create') }}" class="btn btn-primary">新規登録</a>
                        </div>
                        @include('components.alert')
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>タイトル</th>
                                <th>タグ</th>
                                <th>アクション</th>
                            </tr>
                            </thead>
                            @foreach($bookmarks as $bookmark)
                                <tr>
                                    <td class="align-middle">{{ $bookmark->id }}</td>
                                    <td class="align-middle">
                                        {!! link_to($bookmark->url, $bookmark->title) !!}
                                    </td>
                                    <td class="align-middle">
                                        @foreach($bookmark->tags as $tag)
                                            {!! link_to_route('tags.show', $tag->title, $tag) !!}
                                            @unless($loop->last)
                                                ,
                                            @endunless
                                        @endforeach
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex">
                                            {!! link_to_route('bookmarks.show', '表示', $bookmark, [
                                                'class' => 'btn btn-secondary btn-sm'
                                            ]) !!}
                                            {!! link_to_route('bookmarks.edit', '編集', $bookmark, [
                                                'class' => 'btn btn-secondary btn-sm ml-1'
                                            ]) !!}

                                            {!! Form::model($bookmark, [
                                                'route' => ['bookmarks.destroy', $bookmark],
                                                'method' => 'delete'
                                            ]) !!}
                                                <button onclick="return confirm('本当に削除しますか？')" class="btn btn-secondary btn-sm ml-1">削除</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $bookmarks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
