@section('sub')
<div class="side-contents">
	<div class="side-inner">
		<div class="humberger_ar">
			<div class="humberger">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<nav class="side-nav">
			<ul class="main-category">
				<li>
					<h4>
						<a href="{{ route('user.index') }}">
							<figure><i class="fas fa-home"></i></figure>
							<p>HOME</p>
						</a>
					</h4>
				</li>
                <li>
					<h4>
						<a href="{{ route('user.show')}}">
							<figure><i class="fas fa-mail-bulk"></i></figure>
							<p>アカウント一覧</p>
						</a>
					</h4>
                    <h4>
						<a href="{{ route('contact.show')}}">
							<figure><i class="fas fa-mail-bulk"></i></figure>
							<p>お問い合わせ一覧</p>
						</a>
					</h4>
				</li>
			</ul>
			@yield('pageNav')
		</nav>
	</div>
</div>
@endsection
