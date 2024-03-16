<?php

namespace App\Http\Controllers;
namespace App\Models;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Model;

class TodoController extends Controller
{
    // TODOリストの一覧表示
    public function index()
    {
        $todos = Todo::all();
        return view('todos', compact('todos'));
    }

    // TODOリストの作成フォーム表示
    public function create()
    {
        return view('create');
    }

    // TODOリストの保存
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            // 他のバリデーションルールがあれば追加
        ]);

        Todo::create($validated);
        return redirect()->route('todos');
    }

    // TODOリストの編集フォーム表示
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    // TODOリストの更新
    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            // 他のバリデーションルールがあれば追加
        ]);

        $todo->update($validated);
        return redirect()->route('todos');
    }

    // TODOリストの削除
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos');
    }
}
class Todo extends Model
{
    protected $fillable = ['title'];
    // 他の属性があれば、配列に追加します
}
