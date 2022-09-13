@extends('admin.layouts.base')

@section('title', 'ユーザー作成')
@section('web-active' , 'active')

@include('admin.layouts.sub')
@include('admin.layouts.header')
@section('content')

<div class="main-contet-inner">
	<div class="page-ttl_ar">
		<h1 class="page-ttl">会員一覧</h1>
	</div>
    <div class="container">
        <div class="row justify-content-center">
            @if (session('error'))
                <div class="alert-danger">{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ route('user.store', $user->id) }}">
            @csrf
            <input type="hidden" name='id' value="{{ $user['id'] }}">
                <div class="form-group">
                    <label for="exampleInputUserName"><span class="Form-Item-Label-Required">必須</span>会員名
                        <small>
                            @error('name')
                                ※{{ $message }}
                            @enderror
                        </small>
                    </label>
                    {{-- old()で値保持 --}}
                    <input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control" id="exampleInputEmail1"placeholder="太郎">
                </div>
                <div class="form-group">
                    <label for="exampleInputKana"><span class="Form-Item-Label-Required">必須</span>フリガナ
                        <small>
                            @error('kana')
                                ※{{ $message }}
                            @enderror
                        </small>
                    </label>
                    <input type="text" name="kana" value="{{ old('kana',$user->kana) }}" placeholder="タロウ">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail"><span class="Form-Item-Label-Required">必須</span>メールアドレス
                        <small>
                            @error('email')
                                ※{{ $message }}
                            @enderror
                        </small>
                    </label>
                    <input type="email" name="email"  value="{{ old('email',$user->email) }}" class="form-control" id="exampleInputEmail" placeholder="example@hoge.com">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">@if($user->password == null)<span class="Form-Item-Label-Required">必須 @endif</span>パスワード
                        <small>
                            @error('password')
                                ※{{ $message }}
                            @enderror
                        </small>
                    </label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPhone_Number"><span class="Form-Item-Label-Required">必須</span>電話番号
                        <small>
                            @if($errors->has('phone_number'))
                                ※{{ $errors->first('phone_number')}}
                            @endif
                        </small>
                    </label>
                    <?php $phone_array = isset($user['phone_number']) ? explode('-',$user['phone_number']) : '' ?>
                    @for($i = 0; $i<3; $i++)
                        <div class="col">
                            <input type="tel" name="phone_number[{{ $i }}]"  value="{{ old('phone_number') != null ? old('phone_number')[$i] : ( $phone_array != null ? $phone_array[$i] : null ) }}"
                            class="form-control"  placeholder="000">
                        </div>
                    @endfor
                </div>
                <div class="form-group">
                    <label for="exampleInputKana"><span class="Form-Item-Label-Required">必須</span>郵便番号
                        <small>
                            @error('postcode')
                                ※{{ $message }}
                            @enderror
                        </small>
                    </label>
                    <?php $post_array = isset($user['postcode']) ? explode('-', $user['postcode'] ) : '' ?>
                    @for($i = 0; $i<2; $i++)
                        <div class="col">
                            <input type="tel" name="postcode[{{ $i }}]" value="{{ old('postcode') != null ? old('postcode')[$i] : ( $post_array != null ? $post_array[$i] : null ) }}"
                            class="form-control" placeholder="000">
                        </div>
                    @endfor
                </div>
                <div class="input-group pb-3">
                    <div class="input-group-prepend">
                        <label class="input-group" for="inputGroupSelect01"><span class="Form-Item-Label-Required">必須</span>都道府県
                            <small>
                                @error('prefecture_id')
                                    ※{{ $message }}
                                @enderror
                            </small>
                        </label>
                    </div>
                    <select name="prefecture_id"class="custom-select" id="inputGroupSelect01">
                        <option value ="" selected>選択してください</option>
                        @foreach($prefecture as $id => $value)
                            <option value="{{ $id }}" {{ old('prefecture_id', $user->prefecture_id) == $id ?  'selected': ''}}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputKana"><span class="Form-Item-Label-Required">必須</span>市区町村
                        <small>
                            @error('city')
                                ※{{ $message }}
                            @enderror
                        </small>
                    </label>
                    <input type="text" name="city" value="{{ old('city',$user->city) }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputKana"><span class="Form-Item-Label-Required">必須</span>番地・アパート名
                        <small>
                            @error('address')
                                ※{{ $message }}
                            @enderror
                        </small>
                    </label>
                    <input type="text" name="address" value="{{ old('address',$user->address)}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">備考欄
                        <small>
                            @error('remark')
                                ※{{ $message }}
                            @enderror
                        </small>
                    </label>
                    <textarea name="remark"  class="form-control" id="exampleFormControlTextarea1" rows="4">{{ old('remark',$user->remark) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">登録する</button>
            </form>
        </div>
        @if ($errors->has('exception'))
            <div class="notification is-danger">
                <strong>{{ $errors->first('exception') }}</strong>
            </div>
        @endif
    </div>
</div>
@endsection
