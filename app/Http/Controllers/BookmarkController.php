<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Tag;
use App\Http\Requests\BookmarkRequest;

class BookmarkController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bookmarks = Bookmark::orderBy('id', 'desc')->paginate(20);
        return view('bookmarks.index', compact('bookmarks'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::pluck('title', 'id')->toArray();
        return view('bookmarks.create', compact('tags'));
    }

    /**
     * @param BookmarkRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookmarkRequest $request)
    {
        $bookmark = Bookmark::create($request->all());
        $bookmark->tags()->sync($request->tags);

        return redirect()
            ->route('bookmarks.index')
            ->with('status', 'ブックマークを登録しました。');
    }

    /**
     * @param Bookmark $bookmark
     * @return \Illuminate\View\View
     */
    public function show(Bookmark $bookmark)
    {
        return view('bookmarks.show', compact('bookmark'));
    }

    /**
     * @param Bookmark $bookmark
     * @return \Illuminate\View\View
     */
    public function edit(Bookmark $bookmark)
    {
        $tags = Tag::pluck('title', 'id')->toArray();
        return view('bookmarks.edit', compact('bookmark', 'tags'));
    }

    /**
     * @param BookmarkRequest $request
     * @param Bookmark $bookmark
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BookmarkRequest $request, Bookmark $bookmark)
    {
        $bookmark->update($request->all());
        $bookmark->tags()->sync($request->tags);

        return redirect()
            ->route('bookmarks.edit', $bookmark)
            ->with('status', 'ブックマークを更新しました。');
    }

    /**
     * @param Bookmark $bookmark
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Bookmark $bookmark)
    {
        $bookmark->delete();
        $bookmark->tags()->detach();

        return redirect()
            ->route('bookmarks.index')
            ->with('status', 'ブックマークを削除しました。');
    }
}
