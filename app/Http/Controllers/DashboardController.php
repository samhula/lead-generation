<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Illuminate\Support\Carbon; // Import Carbon for date handling

class DashboardController extends Controller
{
    public function index() {
        // 1. Chart Data
        $chart_data = [
                'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                'datasets' => [
                    [
                        'type' => 'bar',
                        'label' => 'Monthly Sales ($)',
                        'data' => [12000, 15000, 14000, 18000, 17000, 19000, 22000, 20000],
                        'backgroundColor' => '#3b82f6',
                        'borderRadius' => 4,
                        // 'order' is important for mixed charts so lines sit on top of bars
                        'order' => 2
                    ],
                    [
                        'type' => 'line',
                        'label' => 'Trend',
                        'data' => [13000, 14500, 15000, 17000, 18000, 18500, 21000, 21500],
                        'borderColor' => '#10b981',
                        'tension' => 0.4,
                        'borderWidth' => 3,
                        'order' => 1
                    ],
                ],
            ];

        // 2. Recent Activities (Updated to be Objects with Carbon dates)
        $recent_activities = [
            (object) [
                'id' => 1,
                'description' => 'Call with Sarah from Acme Corp',
                'type' => 'call', // Used for icon logic if you add it
                'created_at' => Carbon::now()->subHours(2),
            ],
            (object) [
                'id' => 2,
                'description' => 'Sent proposal to Stark Industries',
                'type' => 'email',
                'created_at' => Carbon::now()->subHours(5),
            ],
            (object) [
                'id' => 3,
                'description' => 'Meeting scheduled with Wayne Ent',
                'type' => 'meeting',
                'created_at' => Carbon::now()->subDay(),
            ],
            (object) [
                'id' => 4,
                'description' => 'Closed deal with Cyberdyne Systems ($8,500)',
                'type' => 'success',
                'created_at' => Carbon::now()->subDays(2),
            ],
            (object) [
                'id' => 5,
                'description' => 'New lead added: Umbrella Corp',
                'type' => 'lead',
                'created_at' => Carbon::now()->subDays(3),
            ],
        ];

        // 3. Pipeline Data (Optional, but good for context)
        $pipeline_leads = [
            'New' => [
                (object)['id' => 1, 'title' => 'Acme Corp', 'value' => '$5,000'],
                (object)['id' => 2, 'title' => 'Stark Ind', 'value' => '$1,200']
            ],
            'Contacted' => [
                (object)['id' => 3, 'title' => 'Wayne Ent', 'value' => '$15,000']
            ],
            'Qualified' => [
                (object)['id' => 4, 'title' => 'Cyberdyne', 'value' => '$8,500']
            ],
            'Proposal' => [
                (object)['id' => 5, 'title' => 'Massive Dynamic', 'value' => '$22,000']
            ],
            'Won / Lost' => [
                (object)['id' => 6, 'title' => 'Initech', 'value' => '$3,000']
            ],
        ];

        // 4. KPI Stats
        $new_leads = 25;
        $deals_in_progress = 8;
        $conversion_rate = 35; // %
        $revenue = 1250000 / 100; // 12,500
        $formatted_revenue = Number::currency($revenue);
        $name = "Alex Smith";

        return view('dashboard.index', compact(
            'chart_data',
            'recent_activities',
            'pipeline_leads', // Added this just in case you need it
            'new_leads',
            'deals_in_progress',
            'conversion_rate',
            'formatted_revenue',
            'name'
        ));
    }
}