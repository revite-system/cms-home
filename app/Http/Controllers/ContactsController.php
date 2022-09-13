<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactSendMail;
use App\Mail\ContactReceiveMail;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Log;

class ContactsController extends Controller
{
    public function index()
    {
        $jobs = config('const.jobs');
        $sex = config('const.sex');
        $status = config('const.status');
        return view('contacts.index',compact('jobs','sex','status'));
    }

    public function confirm(ContactRequest $request)
    {
        $status = config('const.status');
        return view('contacts.confirm',compact('request','status'));
    }

    public function send(Contact $contact ,ContactRequest $request)
    {
        $inputs = $request->all();
        $host = config('mail.mailers.smtp.username');

        // トランザクション開始
        DB::beginTransaction();
        try {
            $result = $contact->create($inputs);
            if( ! $result ){
                throw new \Exception('お問い合わせに失敗しました。');
            }
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            \Log::error($e);
            return redirect(route('contacts.index'))->with('error',$e->getMessage());
        }
        // メール送信
        \Mail::to($inputs['email'])->send(new ContactSendMail($inputs));
        \Mail::to($host)->send(new ContactReceiveMail($inputs));
        try {
            if( count(\Mail::failures()) > 0){
                throw new \Exception($inputs['email']);
            }
        }catch (\Exception $e) {
            \Log::error($e);
            return redirect(route('contacts.index'))->with('error','メール送信に失敗しました。');
        }
        return view('contacts.thanks',compact('inputs'));
    }
}
