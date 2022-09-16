@extends('admin.layouts.base')

@section('title', '会員一覧')
@section('web-active' , 'active')

@include('admin.layouts.sub')
@include('admin.layouts.header')
@section('content')

<div class="main-contet-inner">
    <div class="page-ttl_ar">
        <h1 class="page-ttl">アカウント一覧</h1>
        <p><a class="new-btn" href="{{ route('user.create') }}"><i class="fas fa-plus-circle mg-r_5"></i>新規作成</a></p>
    </div>
    <div class="list-contents">
        @if (session('error'))
            <div class="alert-danger">{{ session('error') }}</div>
        @endif
        <div class="table_ar">
            <table class="list-table">
                <thead>
                    <tr>
                        <th style="width: 50px">
                            <p>編集</p>
                        </th>
                        <th style="width: 20px">
                            <p>削除</p>
                        </th>
                        <th style="width: 50px">
                            <p>名前</p>
                        </th>
                        <th style="width: 100px">
                            <p>メールアドレス</p>
                        </th>
                        <th style="width: 70px">
                            <p>電話番号</p>
                        </th>
                        <th style="width: 30px">
                            <p>都道府県</p>
                        </th>
                        <th style="width: 70px">
                            <p>市町村</p>
                        </th>
                        <th style="width: 70px">
                            <p>番地・アパート名</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="edit-icon">
                                <p><a class="tooltip" title="編集する" href="{{ route('user.create' , $user->id ) }}" ><i class="fas fa-edit"></i></a></p>
                            </td>
                            <td class ="edit-icon">
                                @if($user->id != 1)
                                {{-- 管理者ユーザー以外削除可能 --}}
                                    <p class="delete-btn tooltip" title="削除する" data-id="{{ $user->id }}"><i class="fas fa-trash"></i></p>
                                @endif
                            </td>
                            <td>
                                <p>{{ $user->name }}</p>
                            </td>
                            <td>
                                <p>{{ $user->email }}</p>
                            </td>
                            <td>
                                <p>{{ $user->phone_number }}</p>
                            </td>
                            <td>
                                <p>{{ $prefecture[$user->prefecture_id] }}</p>
                            </td>
                            <td>
                                <p>{{ $user->city }}</p>
                            </td>
                            <td>
                                <p>{{ $user->address }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pager-wrapper bottom">
            <div class="pager_ar">
                <p class="search-result">{{ $users->links() }}</p>
            </div>
        </div>
    </div>
</div>
<div class="modal-content delete">
    <div class="modal-ttl">
    <h4>削除</h4>
        <p class="modal-close"></p>
    </div>
    <div class="modal-inner">
    <p>削除しますか？</p>
        <div class="modal-btn_ar">
        <button type="button" class="no">いいえ</button>
            <form method="POST" action="{{ route('user.delete') }}">
                {{ csrf_field() }}
                <input type="hidden" value="" name="id" id="deleteInput">
                <button type="submit" class="yes">はい</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('pageJs')
<script src="{{ asset('js/admin/modal.js') }}"></script>
<script>
    $(".delete-btn").on("click",function() {
        $("#deleteInput").val(this.dataset.id);
        $(".delete").modal();
    });
</script>
@endsection
