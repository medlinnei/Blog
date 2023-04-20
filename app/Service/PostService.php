<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            Post::firstOrCreate($data);
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            abort(404);
        }
    }
}
