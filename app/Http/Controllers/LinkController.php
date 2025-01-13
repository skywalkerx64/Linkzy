<?php

namespace App\Http\Controllers;

use App\Http\Requests\Link\SearchLinkRequest;
use App\Http\Requests\Link\StoreLinkRequest;
use App\Http\Resources\Link\LinkResource;
use Illuminate\Http\Request;
use App\Models\Link;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class LinkController extends Controller
{
    public function index(SearchLinkRequest $request)
    {
        $title = $request->title;
        $description = $request->description;
        $original_url = $request->original_url;
        $per_page = $request->per_page ?? 500;
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
        $link = Link::create($request->validated());

        return response()->json(LinkResource::make($link), Response::HTTP_CREATED);
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
}
