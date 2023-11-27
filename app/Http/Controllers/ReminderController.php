<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reminder;

class ReminderController extends Controller
{
    public function edit($id)
    {
        $reminder = Reminder::where('to_do_id',$id)->first();
        
        return view('todo.reminder-create', compact('reminder'));
    }

    public function update(Request $request,$id)
    {
        $reminder = Reminder::where('to_do_id',$id)->first();
        $reminder->remind_at = $request->reminder_at;
        $category->update();

        $categories= auth()->user()->categories()->get();
        return view('category.categories-index')
            ->with('categories', $categories);
    }

}
