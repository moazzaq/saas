<div class="card border-0 rounded-0 p-lg-4 bg-light">
    <div class="card-body">
        <h5 class="text-uppercase mb-4">Navigation</h5>

        <div class="py-2 px-4 mb-3 ">
            <a href="{{ route('subscriptions') }}" class="">
                <strong class="small text-uppercase font-weight-bold">Subscription</strong>
            </a>
        </div>

        {{--                            @if (auth()->user()->hasSubscription())--}}
        <div class="py-2 px-4 mb-3 ">
            <a href="" class="">
                <strong class="small text-uppercase font-weight-bold">Payment Method</strong>
            </a>
        </div>

        <div class="py-2 px-4 mb-3 ">
            <a href="" class="">
                <strong class="small text-uppercase font-weight-bold">Receipts</strong>
            </a>
        </div>

        <div class="py-2 px-4 mb-3">
            <a href="" class="">
                <strong class="small text-uppercase font-weight-bold">Cancel Account</strong>
            </a>
        </div>
        {{--                            @endif--}}
    </div>

</div>
