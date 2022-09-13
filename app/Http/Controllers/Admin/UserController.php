<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // 管理画面TOP
    public function index(){
        return view('admin.home.index');
    }

    //　会員一覧
    public function show()
    {
        $users = User::latest()->simplePaginate(5);
        $prefecture = config('const.prefecture_id');
        return view('admin.users.index',compact('users','prefecture'));
    }

    // 作成画面
    public function create(User $user)
    {
        $prefecture = config('const.prefecture_id');
        return view('admin.users.create',compact('prefecture','user'));
    }

    // 保存機能
    public function store(User $user, UserRequest $request)
    {
        $inputs = $request->all();
        if($user->id == null || $inputs['password'] != null ){
            // user->idがnullの場合新規ユーザー、もしくはユーザー編集からパスワードの入力があった場合新たなパスワードを保存。
            $inputs['password'] = Hash::make($inputs['password']);
        }else{
            // ユーザー編集でパスワードの更新がない場合
            $inputs['password'] = $user->password;
        }
        // トランザクション開始
        DB::beginTransaction();
        try {
            $result = $user->fill($inputs)->save();
            if( ! $result ){
                throw new \Exception('保存に失敗に失敗しました。');
            }
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            \Log::error($e);
            return redirect(route('user.create'))->with('error',$e->getMessage());
        }
        return redirect( route('user.show') );
    }

    // 会員削除
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        // トランザクション開始
        DB::beginTransaction();
        try {
            $result = $user->delete();
            if( ! $result ){
                throw new \Exception('削除に失敗しました。');
            }
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            \Log::error($e);
            return redirect(route('user.show'))->with('error',$e->getMessage());
        }
        return redirect(route('user.show'));
    }
}
