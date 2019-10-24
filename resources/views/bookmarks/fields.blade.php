<div class="form-group row">
    {!! Form::label('title', 'タイトル', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('title', null, [
            'class' => 'form-control'. ($errors->has('title') ? ' is-invalid' : ''),
            'required'
        ]) !!}
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    {!! Form::label('url', 'URL', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('url', null, [
            'class' => 'form-control'. ($errors->has('url') ? ' is-invalid' : ''),
            'required'
        ]) !!}
        @error('url')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    {!! Form::label('description', '説明文', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', null, [
            'class' => 'form-control'. ($errors->has('description') ? ' is-invalid' : ''),
            'rows' => 5
        ]) !!}
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    {!! Form::label('tags', 'タグ', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        @foreach($tags as $key => $tag)
            <div class="form-check form-check-inline">
                {!! Form::checkbox('tags[]', $key, null, [
                    'id' => 'tag'.$key
                ]) !!}
                {!! Form::label('tag'.$key, $tag, [
                    'class' => 'form-check-label'
                ]) !!}
            </div>
        @endforeach
        @error('tags')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        <a href="{{ route('bookmarks.index') }}" class="btn btn-secondary">一覧へ戻る</a>
    </div>
</div>
