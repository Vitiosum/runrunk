<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .badge {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 18px;
            color: white;
            margin-top: 10px;
        }

        .iron { background-color: #5f5f5f; }
        .bronze { background-color: #8c6239; }
        .silver { background-color: #bfc3c7; color: #000; }
        .gold { background-color: #d4af37; color: #000; }
        .platinum { background-color: #4fd1c5; }
        .diamond { background-color: #5b6cff; }
        .master { background-color: #9b59b6; }
        .grandmaster { background-color: #c0392b; }
        .challenger { background-color: #f1c40f; color: #000; }
    </style>
</head>
<body>

<h1>Résultat</h1>

<p><strong>Distance :</strong> {{ $distance }}</p>
<p><strong>Temps :</strong> {{ $time }}</p>
<p><strong>Percentile :</strong> Top {{ $percentile }} %</p>

<div class="badge {{ strtolower($rank) }}">
    {{ strtoupper($rank) }}
</div>

<br><br>
<a href="/">Retour</a>

</body>
</html>
