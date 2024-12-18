<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

abstract class Controller
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    protected function getName($view) // 이동할 페이지 이름
    {
        $modelName = class_basename($this->model);

        if ($modelName === 'CkEditor') {
            $modelName = 'ckEditor';
        } else {
            $modelName = strtolower($modelName);
        }

        return 'editor.' . $modelName . ucfirst($view);
    }

    public function index(Request $request)
    {
        $query = $this->model->query();

        $items = $query->orderBy('id', 'desc')->get();

        return view($this->getName('index'), compact('items'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $this->model->create($data);

        if ($request->filled('continue')) {
            return redirect()->route($this->getName('create'));
        }

        return redirect()->route($this->getName('index'));
    }

    public function upload(Request $request) // 에디터 이미지 업로드
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('upload')->store('images', 'public');

        return response()->json([
            'url' => Storage::url($path),
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = $this->model->find($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $item->update($data);

        return redirect()->route($this->getName('index'));
    }

    public function edit($id)
    {
        $item = $this->model->find($id);

        if (!$item) {
            return redirect()->route($this->getName('index'))->with('error', '해당 게시물을 찾을 수 없습니다.');
        }

        return view($this->getName('edit'), compact('item'));
    }

    public function create(Request $request)
    {

        return view($this->getName('create'));
    }

    public function destroy($item)
    {
        $item = $this->model->findOrFail($item);
        $item->delete();

        return redirect()->route($this->getName('index'));
    }
}
