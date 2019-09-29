@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ブックマーク詳細</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th class="w-25">タイトル</th>
                                <td>{{ $bookmark->title }}</td>
                            </tr>
                            <tr>
                                <th>URL</th>
                                <td><a href="{{ $bookmark->url }}">{{ $bookmark->url }}</a></td>
                            </tr>
                            <tr>
                                <th>概要</th>
                                <td>{{ $bookmark->description }}</td>
                            </tr>
                            <tr>
                                <th>タグ</th>
                                <td>
                                    @foreach($bookmark->tags as $tag)
                                        <a href="{{ route('tags.show', $tag->id) }}">{{ $tag->title }}</a>
                                        @unless($loop->last)
                                            ,
                                        @endunless
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>作成日</th>
                                <td>{{ $bookmark->created_at->format('Y年m月d日') }}</td>
                            </tr>
                            <tr>
                                <th>編集日</th>
                                <td>{{ $bookmark->updated_at->format('Y年m月d日') }}</td>
                            </tr>
                        </table>
                        <div>
                            <a href="{{ route('bookmarks.index') }}" class="btn btn-secondary">戻る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
