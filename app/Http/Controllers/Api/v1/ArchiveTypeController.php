<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArchiveType\ArchiveTypeStoreRequest;
use App\Http\Resources\ArchiveType\ArchiveTypeResource;
use App\Models\ArchiveType;
use App\Models\Archive;
use Illuminate\Support\Facades\Auth;
use Log;

class ArchiveTypeController extends Controller
{
    public function index()
    {
        $data = ArchiveTypeResource::collection(ArchiveType::all());

        return $this->ok($data);
    }
    public function getBySectionId($id)
    {
        $data = ArchiveTypeResource::collection(ArchiveType::where('section_id', $id)->get());
        return $this->ok($data);
    }
    public function getBySectionUser()
    {
        //return(Auth::user()->Sections->first()->id);

        $id = Auth::user()->Sections->first()->id;
        $data = ArchiveTypeResource::collection(ArchiveType::where('section_id', $id)->get());
        return $this->ok($data);
    }

    public function store(ArchiveTypeStoreRequest $request)
    {
        $data = ArchiveType::create([
            'name' => $request->name,
            'description' => $request->description,
            'section_id' => Auth::user()->sections()->first()->id,
        ]);

        return $this->ok(new ArchiveTypeResource($data));
    }

    public function show(string $id)
    {
        $data = ArchiveType::find($id);

        return $this->ok(new ArchiveTypeResource($data));
    }

    public function update(ArchiveTypeStoreRequest $request, string $id)
    {
        $data = ArchiveType::find($id);
        $data->name = $request->name;
        $data->description = $request->description;

        $data->save();

        return $this->ok(new ArchiveTypeResource($data));
    }

    public function destroy(string $id)
    {
        $is_used_in_archive = Archive::where('archive_type_id', $id)->exists();

        if ($is_used_in_archive) {
            return $this->FailedResponse('This archive type is used in some archives', null, 400);
        }

        $data = ArchiveType::find($id);
        $data->delete();

        return $this->ok(null);
    }
}
