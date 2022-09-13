<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    // 管理画面一覧
    public function show()
    {
        $contacts = Contact::latest()->simplePaginate(10);
        $status = config('const.status');
        return view('admin.contacts.show',compact('contacts','status'));
    }

    // 管理画面詳細
    public function edit(Contact $contact)
    {
        $status = config('const.status');
        return view('admin.contacts.edit',compact('contact','status'));
    }

    //  管理画面保存
    public function store(Contact $contact,ContactRequest $request)
    {
        // トランザクション開始
        DB::beginTransaction();
        try {
            $result = $contact->update($request->validated());
            if(! $result ){
                throw new \Exception('保存に失敗しました。');
            }
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            \Log::error($e);
            return redirect()->back()->with('error',$e->getMessage());
        }

        return redirect(route('contact.show'));
    }
}
