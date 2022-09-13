@extends('admin.layouts.base')

@section('title', 'お問い合わせ編集')
@section('web-active' , 'active')

@include('admin.layouts.sub')
@include('admin.layouts.header')
@section('content')

<div class="main-contet-inner">
	<div class="page-ttl_ar">
		<h1 class="page-ttl">お問い合わせ編集</h1>
	</div>
    <div class="container">
        <div class="row justify-content-center">
            @if (session('error'))
                <div class="alert-danger">{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ route('contact.store',$contact->id) }}">
            @csrf
            <input type="hidden" name="id" value="{{ $contact->id }}">
                <div class="form-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">ステータス
                    </div>
                    <select name="status"class="status-select" id="inputGroupSelect01">
                        @foreach($status as $key => $value)
                            <option value="{{ $key }}" {{  old('status', $contact->status) == $key  ? 'selected'  :  '' }}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="input-group-text" for="inputGroupSelect01">お問い合わせ内容
                    </label>
                    <div>
                        {!! nl2br( $contact->content ) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">備考
                            <small>
                                @error('remark')
                                    ※{{ $message }}
                                @enderror
                            </small>
                    </div>
                    <textarea name="remark" form-control  rows="20">{{ old('remark',$contact->remark) }}</textarea>
                </div>
                <div class="form-group">
                    <label class="input-group-text" for="inputGroupSelect01">お問い合わせ情報</label>
                    <ul>
                        <li class="contact-list">
                            会社名:{{ $contact->company_name }}
                        </li>
                        <li class="contact-list">
                            氏名:{{ $contact->user_name }}
                        </li>
                        <li class="contact-list">
                            電話番号:{{ $contact->tele_num }}
                        </li>
                        <li class="contact-list">
                            メールアドレス:{{ $contact->email }}
                        </li>
                        @php $birthday = explode('-',$contact->birthday)  @endphp
                        <li class="contact-list">
                            生年月日: {{ $birthday[0] }}/{{ $birthday[1] }}/{{ $birthday[2] }}
                        </li>
                        <li class="contact-list">
                            性別:{{ $contact->sex }}
                        </li>
                        <li class="contact-list">
                            職業:{{ $contact->job }}
                        </li>
                    </ul>
                </div>
                <button type="submit" class="btn btn-primary">登録する</button>
            </form>
        </div>
    </div>
</div>
@endsection


