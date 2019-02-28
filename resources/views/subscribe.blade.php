@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Subscribe. Only 10$ in month</h2>
            <script src="https://js.stripe.com/v3/"></script>

            <form action="/subscribe" method="POST">
            @csrf
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_XqZs68rKFPEPeEPNIlvyqUmo"
    data-amount="10"
    data-name="main"
    data-description="Example charge"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
</form>
        </div>
    </div>
</div>
@stop
