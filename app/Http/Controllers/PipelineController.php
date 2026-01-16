<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PipelineController extends Controller
{
    private $stagesConfig = [
        'New'       => 'bg-blue-500',
        'Contacted' => 'bg-yellow-400',
        'Qualified' => 'bg-indigo-500',
        'Proposal'  => 'bg-purple-500',
        'Won'       => 'bg-emerald-500',
    ];

    public function index(Request $request)
    {
        // Capture filters from the request (URL params)
        $filters = [
            'search' => $request->query('search'),
            'sort'   => $request->query('sort', 'date_desc'), // Default to newest
        ];

        $pipeline_leads = [];
        foreach ($this->stagesConfig as $stage => $color) {
            $pipeline_leads[$stage] = $this->getFakePaginator($stage, 0, $filters);
        }

        return view('pipeline.index', [
            'pipeline_leads' => $pipeline_leads,
            'stages'         => $this->stagesConfig,
            'filters'        => $filters // Pass back to view to populate inputs
        ]);
    }

    public function loadMore(Request $request)
    {
        $stage = $request->query('stage');
        $cursor = (int) $request->query('cursor', 0);
        
        $filters = [
            'search' => $request->query('search'),
            'sort'   => $request->query('sort', 'date_desc'),
        ];

        $paginator = $this->getFakePaginator($stage, $cursor, $filters);
        $nextCursor = $paginator->hasMorePages() ? ($cursor + 10) : null;

        if ($request->ajax()) {
            $html = '';
            foreach ($paginator->items() as $lead) {
                $html .= view('components.ui.pipeline.item', [
                    'id' => 'lead-' . $lead->id,
                    'title' => $lead->title,
                    'value' => $lead->value
                ])->render();
            }
            return response()->json(['html' => $html, 'next_cursor' => $nextCursor]);
        }
    }

    public function updateStage(Request $request)
    {
        // Fake success response
        return response()->json(['message' => 'Stage updated']);
    }

    // --- Helpers with Logic ---

    private function getFakePaginator($stage, $offset, $filters = [])
    {
        // 1. Generate Raw Data
        $all = $this->generateData($stage);

        // 2. Apply "Search" Filter
        if (!empty($filters['search'])) {
            $term = strtolower($filters['search']);
            $all = array_filter($all, function ($item) use ($term) {
                return str_contains(strtolower($item->title), $term);
            });
        }

        // 3. Apply "Sort" Filter
        $sort = $filters['sort'] ?? 'date_desc';
        usort($all, function($a, $b) use ($sort) {
            if ($sort === 'value_desc') return $b->value <=> $a->value;
            if ($sort === 'value_asc')  return $a->value <=> $b->value;
            if ($sort === 'date_asc')   return $a->created_at->timestamp <=> $b->created_at->timestamp;
            return $b->created_at->timestamp <=> $a->created_at->timestamp; // Default: date_desc
        });

        // 4. Slice for Pagination
        $items = array_slice($all, $offset, 10);
        $hasMore = count($all) > ($offset + 10);
        
        return new class($items, $hasMore, $offset + 10) {
            public $items; protected $hasMore, $next;
            public function __construct($i, $h, $n) { $this->items=$i; $this->hasMore=$h; $this->next=$n; }
            public function items() { return $this->items; }
            public function hasMorePages() { return $this->hasMore; }
            public function nextCursor() { 
                return $this->hasMore ? new class($this->next) { 
                    public $v; function __construct($v){$this->v=$v;} function encode(){return $this->v;} 
                } : null; 
            }
        };
    }

    private function generateData($stage) {
        $leads = [];
        
        // Use a seed so the "random" names stay the same between refreshes
        srand(crc32($stage)); 
        
        $prefixes = ['Global', 'Tech', 'Alpha', 'Prime', 'Stark', 'Wayne', 'Cyber', 'Acme', 'Massive', 'Hooli', 'Umbrella'];
        $suffixes = ['Corp', 'Inc', 'Systems', 'Solutions', 'Industries', 'Dynamics', 'Ltd', 'Logistics', 'Group'];

        for ($i = 1; $i <= 50; $i++) {
            // Pick random parts
            $prefix = $prefixes[rand(0, count($prefixes) - 1)];
            $suffix = $suffixes[rand(0, count($suffixes) - 1)];
            
            $leads[] = (object)[
                'id'         => $i + rand(10000, 99999),
                'title'      => "$stage Deal #$i",
                // Generate the fake company name
                'company'    => "$prefix $suffix", 
                'value'      => rand(1000, 50000),
                'created_at' => Carbon::now()->subHours($i * 5)
            ];
        }
        
        return $leads;
    }
}