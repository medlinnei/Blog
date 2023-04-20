<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        //Перевірка унікального значення. Якщо true запис створюється, якщо false то ні
        Tag::firstOrCreate($data);
        return redirect()->route('admin.tag.index');
    }
}
