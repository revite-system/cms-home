@extends('admin.layouts.base')

@section('title', 'お問い合わせ一覧')
@section('web-active' , 'active')

@include('admin.layouts.sub')
@include('admin.layouts.header')
@section('content')

<div class="main-contet-inner">
	<div class="page-ttl_ar">
		<h1 class="page-ttl">お問い合わせ一覧</h1>
	</div>
	<div class="list-contents">
		<div class="table_ar">
			<table class="list-table">
				<thead>
					<tr>
                        <th style="width: 20px">
                            <p>編集</p>
                        </th>
                        <th style="width: 50px">
                            <p>ステータス</p>
                        </th>
                        <th style="width: 80px">
                            <p>会社名</p>
                        </th>
						<th style="width: 50px">
							<p>氏名</p>
						</th>
						<th style="width: 70px">
							<p>電話番号</p>
						</th>
					</tr>
				</thead>
				<tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td class="edit-icon">
                                <p><a class="tooltip" title="編集する" href="{{ route('contact.edit',$contact->id)}}" ><i class="fas fa-edit"></i></a></p>
                            </td>
                            <td>
                                <p>{{ $status[$contact->status] }}</p>
                            </td>
                            <td>
                                <p>{{ $contact->company_name }}</p>
                            </td>
                            <td>
                                <p>{{ $contact->user_name }}</p>
                            </td>
                            <td>
                                <p>{{ $contact->tele_num }}</p>
                            </td>
                        </tr>
                    @endforeach
				</tbody>
			</table>
		</div>
	</div>
    <div class="pager-wrapper bottom">
        <div class="pager_ar">
            <p class="search-result">{{ $contacts->links() }}</p>
        </div>
    </div>
</div>
@endsection

@section('pageJs')
@endsection
