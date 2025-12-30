<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Number;

class DashboardController extends Controller
{
    public function index() {
        $chart_data = json_encode([
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
            'datasets' => [
                [
                    'type' => 'bar',
                    'label' => 'Monthly Sales ($)',
                    'data' => [12000, 15000, 14000, 18000, 17000, 19000, 22000, 20000],
                ],
                [
                    'type' => 'line',
                    'label' => 'Trend',
                    'data' => [13000, 14500, 15000, 17000, 18000, 18500, 21000, 21500],
                ],
            ],
        ]);

        $recent_activities = [
            'John Doe added a new lead',
            'Proposal sent to Company X',
            'Follow-up task scheduled',
        ];

        $pipeline_leads = [
            'New' => [
                [
                    'lead_id' => 1,
                    'description' => 'This is a lead'
                ],
                [
                    'lead_id' => 2,
                    'description' => 'This is a lead'
                ]
            ],
            'Contacted' => [
                [
                    'lead_id' => 1,
                    'description' => 'This is a lead'
                ]
            ],
            'Qualified' => [
                [
                    'lead_id' => 1,
                    'description' => 'This is a lead'
                ]
            ],
            'Proposal' => [
                [
                    'lead_id' => 1,
                    'description' => 'This is a lead'
                ]
            ],
            'Won / Lost' => [
                [
                    'lead_id' => 1,
                    'description' => 'This is a lead'
                ]
            ],
        ];

        $new_leads = 25;
        $deals_in_progress = 8;
        $conversion_rate = 35;
        $revenue = 1250000 / 100;
        $formatted_revenue = Number::currency($revenue);
        $name = "name";

        return view('dashboard.index', compact(
            'chart_data',
            'recent_activities',
            'new_leads',
            'deals_in_progress',
            'conversion_rate',
            'formatted_revenue',
            'name'
        ));
    }
}
