<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'time' => ['required', 'regex:/^\d{1,2}(:\d{2})?$/'],
        ]);

        $timeInput = $validated['time'];

        if (!str_contains($timeInput, ':')) {
            $timeInput .= ':00';
        }

        [$minutes, $seconds] = explode(':', $timeInput);
        $totalSeconds = ((int) $minutes * 60) + (int) $seconds;

        $distribution = $this->getDistribution($validated['distance']);

        $percentile = 0;
        foreach ($distribution as $time => $p) {
            if ($totalSeconds <= $time) {
                $percentile = $p;
                break;
            }
        }

        $rank = $this->getRankFromPercentile($percentile);

        return view('result', [
            'distance' => $validated['distance'],
            'time' => $timeInput,
            'percentile' => $percentile,
            'rank' => $rank,
        ]);
    }

    private function getRankFromPercentile(int $percentile): string
    {
        return match (true) {
            $percentile >= 99 => 'Challenger',
            $percentile >= 95 => 'Grandmaster',
            $percentile >= 90 => 'Master',
            $percentile >= 80 => 'Diamond',
            $percentile >= 65 => 'Platinum',
            $percentile >= 40 => 'Gold',
            $percentile >= 20 => 'Silver',
            $percentile >= 6  => 'Bronze',
            default           => 'Iron',
        };
    }

    private function getDistribution(string $distance): array
    {
        return match ($distance) {

            '5k' => [
                900  => 99,
                1080 => 95,
                1200 => 90,
                1350 => 80,
                1500 => 70,
                1800 => 50,
                2100 => 30,
                2400 => 15,
                2700 => 5,
            ],

            '10k' => [
                2100 => 99,
                2400 => 95,
                2700 => 90,
                3000 => 80,
                3300 => 70,
                3600 => 50,
                4200 => 30,
                4800 => 15,
                5400 => 5,
            ],

            '21k' => [
                4800  => 99,
                5400  => 95,
                6000  => 90,
                6600  => 80,
                7200  => 70,
                8100  => 50,
                9000  => 30,
                10800 => 15,
                12600 => 5,
            ],

            '42k' => [
                9000  => 99,
                10800 => 95,
                12600 => 90,
                14400 => 80,
                16200 => 70,
                18000 => 50,
                21600 => 30,
                25200 => 15,
                28800 => 5,
            ],

            default => [],
        };
    }
}
