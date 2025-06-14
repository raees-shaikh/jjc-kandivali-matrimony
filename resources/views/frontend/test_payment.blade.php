@extends('frontend.layouts.app')
@section('title')

@section('content')

    <section class="container mt-5 py-5">

        @php
            $t = 'T-' . now()->format('dmyhis');
            $s = env('PAYU_KEY') . '|' . $t . '|10|iPhone|Ashish|test@gmail.com|||||||||||' . env('PAYU_SALT');
            $h = hash('sha512', $s);
        @endphp
        {{-- @dd($s) --}}
        <form action='https://test.payu.in/_payment' method='post'>
            <input type="hidden" name="key" value="{{ env('PAYU_KEY') }}" />
            <input type="hidden" name="txnid" value="{{ $t }}" />
            <input type="hidden" name="productinfo" value="iPhone" />
            <input type="hidden" name="amount" value="10" />
            <input type="hidden" name="email" value="test@gmail.com" />
            <input type="hidden" name="firstname" value="Ashish" />
            <input type="hidden" name="lastname" value="Kumar" />
            <input type="hidden" name="surl" value="{{ route('frontend.payment.redirect') }}" />
            <input type="hidden" name="furl" value="{{ route('frontend.payment.redirect') }}" />
            <input type="hidden" name="phone" value="9988776655" />
            <input type='hidden' name='hash' value="{{ $h }}" />
            <input type="submit" value="submit">
        </form>
    </section>

@endsection
