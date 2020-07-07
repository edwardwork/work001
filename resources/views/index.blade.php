@extends('app')

@section('content')

	<a href="{{ route('payment.type', ['slug' => 'sber_bank']) }}">
		<button type="button" class="btn btn-primary">СберБанк</button>
	</a>
	<a href="{{ route('payment.type', ['slug' => 'pay_pal']) }}">
		<button type="button" class="btn btn-secondary">PayPal</button>
	</a>
	<a href="{{ route('payment.type', ['slug' => 'yandex_kassa']) }}">
		<button type="button" class="btn btn-success">ЯндексКасса</button>
	</a>

@endsection