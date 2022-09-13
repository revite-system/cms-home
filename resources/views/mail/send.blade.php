お問い合わせありがとうございます。
<br>
<br>
{{ $company_name }}
<br>
{{ $user_name }}様
<br>
<br>
電話番号: {{ $tele_num }}
<br>
メールアドレス: {{ $email }}
<br>
生年月日: {{ $birthday[0] }}/{{ $birthday[1] }}/{{ $birthday[2] }}
<br>
性別: {{ $sex }}
<br>
職業: {{ $job }}
<br>
<br>
■お問い合わせ内:
<br>{!! nl2br( $content ) !!}
<br>
