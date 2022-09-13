@extends('layouts.contact')
@section('title','確認画面')
@section('content')
<form method="POST" action="{{ route('contacts.send' ) }}">
    @csrf
    <div class="Form">
        <div class="Form-Item">
            <p class="Item-Input">会社名: {{ $request['company_name'] }}</p>
            <input type="hidden" name="company_name" value="{{ $request['company_name'] }}">
        </div>
        <div class="Form-Item">
            <p class="Item-Input">氏名: {{ $request['user_name'] }}</p>
            <input type="hidden" name="user_name" value="{{ $request['user_name'] }}">
        </div>
        <div class="Form-Item">
            <p class="Item-Input">電話番号: {{ $request['tele_num'] }}</p>
            <input type="hidden" name="tele_num" value="{{ $request['tele_num'] }}">
        </div>
        <div class="Form-Item">
            <p class="Item-Input">メールアドレス: {{ $request['email'] }}</p>
            <input type="hidden" name="email" value="{{ $request['email'] }}">
        </div>
        <div class="Form-Item">
            @php $birthday = explode('-',$request['birthday'] ) @endphp
            <p class="Item-Input">生年月日: {{ $birthday[0] }}/{{ $birthday[1] }}/{{ $birthday[2] }}</p>
            <input type="hidden" name="birthday" value="{{ $request['birthday'] }}">
        </div>
        <div class="Form-Item">
            <p class="Item-Input">性別: {{ $request['sex'] }}</p>
            <input type="hidden" name="sex" value="{{ $request['sex'] }}">
        </div>
        <div class="Form-Item">
            <p class="Item-Input">職業: {{ $request['job'] }}</p>
            <input type="hidden" name="job" value="{{ $request['job'] }}">
        </div>
        <div class="Form-Item">
            <p class="Item-Input">お問い合わせ内容:<br>{!! nl2br( $request['content'] ) !!}
            </p>
            <input type="hidden" name="content" value="{{ $request['content'] }}">
        </div>
        <input type="hidden" name="status" value="1">
        <input type="submit" class="Form-Btn" value="送信する">
        <button type="button" class="Form-Btn" onClick="history.back()">戻る</button>
    </div>
</form>
@endsection
