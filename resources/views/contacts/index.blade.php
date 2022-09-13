@extends('layouts.contact')
@section('title','お問い合わせ')
@section('content')
<form method="POST" action="{{ route('contacts.confirm') }}">
    @csrf
    <input type="hidden" name="status" value="1">
    <div class="Form">
        @if (session('error'))
                <div class="alert-danger">{{ session('error') }}</div>
        @endif
        <div class="Form-Item">
            <p class="Form-Item-Label">
                <span class="Form-Item-Label-Required">必須</span>会社名
            </p>
            <div>
                <div>
                    <input name="company_name" value ="{{ old('company_name') }}" type="text" class="Form-Item-Input" placeholder="例）株式会社〇〇">
                </div>
                <div class="Form-Item-Error">
                    @error('company_name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="Form-Item">
            <p class="Form-Item-Label">
                <span class="Form-Item-Label-Required">必須</span>氏名
            </p>
            <div>
                <div>
                    <input name="user_name" value ="{{ old('user_name') }}" type="text" class="Form-Item-Input" placeholder="例）山田太郎">
                </div>
                <div class="Form-Item-Error">
                    @error('user_name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="Form-Item">
            <p class="Form-Item-Label">
                <span class="Form-Item-Label-Required">必須</span>電話番号
            </p>
            <div>
                <div>
                    <input name="tele_num" value ="{{ old('tele_num') }}" type="tel" class="Form-Item-Input" placeholder="例）000-0000-0000">
                </div>
                <div class="Form-Item-Error">
                    @error('tele_num')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="Form-Item">
            <p class="Form-Item-Label">
                <span class="Form-Item-Label-Required">必須</span>メールアドレス
            </p>
            <div>
                <div>
                    <input name="email" value ="{{ old('email') }}" type="email" class="Form-Item-Input" placeholder="例）example@gmail.com">
                </div>
                <div class="Form-Item-Error">
                    @error ('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="Form-Item">
            <p class="Form-Item-Label">
                <span class="Form-Item-Label-Required">必須</span>生年月日
            </p>
            <div>
                <div>
                    <input  class="Select" type="date" name="birthday" value ="{{ old('birthday') }}">
                </div>
                <div class="Form-Item-Error">
                    @error('birthday')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="Form-Item">
            <p class="Form-Item-Label">
                <span class="Form-Item-Label-Required">必須</span>性別
            </p>
            <div>
                <div class = "radio">
                    @foreach($sex as $key => $value)
                        <label>
                            <input type="radio" name="sex" value ="{{ $value }}" @if( old('sex') == "$value") checked @endif >{{ $value }}
                        </label>
                    @endforeach
                </div>
                <div class="Form-Item-Error">
                    @error('sex')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="Form-Item">
            <p class="Form-Item-Label">
                <span class="Form-Item-Label-Required">必須</span>職業
            </p>
            <div>
                <div>
                    <select name="job" class="Select">
                        <option value="">職業を選択してください</option>
                        @foreach($jobs as $job)
                            <option value="{{ $job }}" @if( old('job') == "$job") selected @endif>{{ $job }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="Form-Item-Error">
                    @error('job')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="Form-Item">
            <p class="Form-Item-Label isMsg">
                <span class="Form-Item-Label-Required">必須</span>お問い合わせ内容
            </p>
            <div>
                <div>
                    <textarea name="content" class="Form-Item-Textarea" rows="20">{{ old('content') }}</textarea>
                </div>
                <div class="Form-Item-Error">
                    @error('content')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <input type="hidden" name="status" value="1">
        <input type="submit" class="Form-Btn" value="確認する">
    </div>
</form>
@endsection
