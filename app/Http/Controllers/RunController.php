<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\CarbonInterval;

class RunController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function result(Request $request)
    {
        $validated = $request->validate([
            'distance' => 'required|in:5k,10k,21k,42k',
            'time' => 'required|string',
        ]);

        $rawTime = trim($validated['time']);

        // Parse du temps (minutes / heures / secondes)
        if (preg_match('/^\d+$/', $rawTime)) {
            $interval = CarbonInterval::minutes((int) $rawTime);
        } elseif (preg_match('/^\d+:\d{2}$/', $rawTime)) {
            [$m, $s] = explode(':', $rawTime);
            $interval = CarbonInterval::minutes((int) $m)->seconds((int) $s);
        } elseif (preg_match('/^\d+:\d{2}:\d{2}$/', $rawTime)) {
            [$h, $m, $s] = explode(':', $rawTime);
            $interval = CarbonInterval::hours((int) $h)
                ->minutes((int) $m)
                ->seconds((int) $s);
        } else {
            return back()->withErrors([
                'time' => 'Format invalide (ex : 20, 20:00, 1:20:00)',
            ]);
        }

        $totalSeconds = $interval->totalSeconds;

        // Distances en km
        $distanceKm = [
            '5k'  => 5,
            '10k' => 10,
            '21k' => 21.1,
            '42k' => 42.195,
        ];

        // Paces de référence (sec/km)
        $referencePace = [
            '5k'  => 240,
            '10k' => 255,
            '21k' => 270,
            '42k' => 300,
        ];

        $km = $distanceKm[$validated['distance']];
        $paceSeconds = $totalSeconds / $km;

        // Normalisation
        $score = $referencePace[$validated['distance']] / $paceSeconds;

        // Clamp + percentile
        $percentile = max(0, min(100, round($score * 50)));

        return view('result', [
            'distance'   => $validated['distance'],
            'time'       => $interval->cascade()->forHumans(['short' => true]),
            'pace'       => gmdate('i:s', (int) $paceSeconds),
            'percentile' => $percentile,
        ]);
    }
}
