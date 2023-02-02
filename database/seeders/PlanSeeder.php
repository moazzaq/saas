<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $basicPlan = Plan::create([
            'name' => 'Basic',
            'desc' => 'Basic plan',
            'paddle_id' => 43850,
            'price' => 10.00,
            'interval' => 'month',
            'trial_period_days' => null,
            'sort_order' => 1,
        ]);
        $basicPlan->features()->saveMany([
            new PlanFeature(['name' => 'Posts per day', 'code' => 'posts_per_day', 'value' => 3, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Sending per day', 'code' => 'sending_per_day', 'value' => 1, 'sort_order' => 5]),
        ]);


        $basicYearlyPlan = Plan::create([
            'name' => 'Basic Year',
            'desc' => 'Basic Year plan',
            'paddle_id' => 43851,
            'price' => 100.00,
            'interval' => 'year',
            'trial_period_days' => null,
            'sort_order' => 2,
        ]);
        $basicYearlyPlan->features()->saveMany([
            new PlanFeature(['name' => 'Posts per day', 'code' => 'posts_per_day', 'value' => 10, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Sending per day', 'code' => 'sending_per_day', 'value' => 3, 'sort_order' => 5]),
        ]);

        $proPlan = Plan::create([
            'name' => 'Pro',
            'desc' => 'Pro plan',
            'paddle_id' => 43849,
            'price' => 30.00,
            'interval' => 'month',
            'trial_period_days' => null,
            'sort_order' => 3,
        ]);
        $proPlan->features()->saveMany([
            new PlanFeature(['name' => 'Posts per day', 'code' => 'posts_per_day', 'value' => 100000, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Sending per day', 'code' => 'sending_per_day', 'value' => 100000, 'sort_order' => 5]),
        ]);

        $proYearlyPlan = Plan::create([
            'name' => 'Pro Year',
            'desc' => 'Pro Year plan',
            'paddle_id' => 43852,
            'price' => 300.00,
            'interval' => 'year',
            'trial_period_days' => null,
            'sort_order' => 4,
        ]);
        $proYearlyPlan->features()->saveMany([
            new PlanFeature(['name' => 'Posts per day', 'code' => 'posts_per_day', 'value' => 100000, 'sort_order' => 1]),
            new PlanFeature(['name' => 'Sending per day', 'code' => 'sending_per_day', 'value' => 100000, 'sort_order' => 5]),
        ]);
    }
}
