<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\FaviconFetcherService;
use App\Http\Resources\Link\LinkResource;
use App\Http\Requests\Link\StoreLinkRequest;
use App\Http\Requests\Link\SearchLinkRequest;
use Symfony\Component\HttpFoundation\Response;

class LinkController extends Controller
{
    public function index(SearchLinkRequest $request)
    {
        $title = $request->title;
        $description = $request->description;
        $original_url = $request->original_url;
        $per_page = $request->per_page ?? 10;
        $page = $request->page ?? 1;

        $links = Link::query();

        if($title) $links = $links->where('title', 'like', "%$title%");
        if($description) $links = $links->where('description', 'like', "%$description%");
        if($original_url) $links = $links->where('original_url', 'like', "%$original_url%");

        return Inertia::render('Link/Index', [
            'links' => LinkResource::collection($links->paginate($per_page, ['*'], 'page', $page)),
        ]);
    }

    public function search(SearchLinkRequest $request)
    {
        $title = $request->title;
        $description = $request->description;
        $original_url = $request->original_url;
        $per_page = $request->per_page ?? 10;
        $page = $request->page ?? 1;

        $links = Link::query();

        if($title) $links = $links->where('title', 'like', "%$title%");
        if($description) $links = $links->where('description', 'like', "%$description%");
        if($original_url) $links = $links->where('original_url', 'like', "%$original_url%");

        return Inertia::render('Link/Index', [
            'links' => LinkResource::collection($links->paginate($per_page, ['*'], 'page', $page)),
        ]);
    }

    public function show($id)
    {
        $link = Link::find($id);
        if ($link) {
            return response()->json($link);
        } else {
            return response()->json(['message' => 'Link not found'], 404);
        }
    }

    public function store(StoreLinkRequest $request)
    {

        $slug = Str::random(8);
        while (Link::where('slug', $slug)->exists()) {

            $slug = Str::random(8);
        }

        $link = Link::create([
            ...$request->validated(),
            'slug' => $slug,
            'shortened_url' => config('app.url') . '/' . $slug,
            'user_id' => $request->user()->id,
            'favicon' => FaviconFetcherService::fetchFromUrl($request->original_url),
            'title' => FaviconFetcherService::getTitle($request->original_url),
        ]);

        return redirect()->intended(route('links.index'));
    }

    public function update(Request $request, $id)
    {
        $link = Link::find($id);
        if ($link) {
            $link->update($request->all());
            return response()->json($link);
        } else {
            return response()->json(['message' => 'Link not found'], 404);
        }
    }

    public function destroy($id)
    {
        $link = Link::find($id);
        if ($link) {
            $link->delete();
            return response()->json(['message' => 'Link deleted']);
        } else {
            return response()->json(['message' => 'Link not found'], 404);
        }
    }

    public function generateSlug(Request $request)
    {
        $slug = Str::random(8);

        while (Link::where('slug', $slug)->exists()) {

            $slug = Str::random(8);
        }

        return response()->json(['slug' => $slug]);
    }
}
