<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscriptions()
    {
        $user = auth()->user();
        $interval = request()->interval ?? 'month';
        $plans = Plan::with('features')->where('interval', $interval)->latest()->get();
        $userPlanId = $user->hasSubscription() ? $user->subscriptionInfo()->id : '';
        $userPlanName = $user->hasSubscription() ? $user->subscriptionInfo()->name : 'Free';
        $userNextPaymentDate = $user->hasSubscription() ?
            $user->subscription('default')->nextPayment()->date()->format('d/m/Y') : '';
        $userNextPaymentAmount = $user->hasSubscription() ?
            $user->subscription('default')->nextPayment()->amount : '';
        $userPlanTrail = $user->hasSubscription() && $user->onTrial('default') ?
            $user->trialEndsAt('default') : '';

        return view('frontend.subscriptions', compact('user', 'plans', 'userPlanId', 'userPlanName', 'userNextPaymentDate', 'userNextPaymentAmount', 'userPlanTrail'));
    }

    public function subscribe(Request $request)
    {
        $user = auth()->user();
        $plan = Plan::where('id', $request->plan)->first();

        if (!$user->hasSubscription()){

            $plan->payLink = request()->user()->newSubscription('default', $plan->paddle_id)
                ->returnTo(route('subscriptions'))
                ->create();

            return view('frontend.subscribe', compact('user', 'plan'));
        }else{
            $user->subscription('default')->swap($plan->paddle_id);

            return back()->with([
                'message' => 'Your subscription is updated successfully',
                'alert-type' => 'success'
            ]);
        }
    }
}
