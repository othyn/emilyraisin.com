<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Emily Raisin</title>

    @if (isset($canonical))
        <link rel="canonical" href="{{ $canonical }}" />
    @endif
    <meta name="description" content="Freelance copywriter. I’m creative, but I also understand briefs and deadlines. If that sounds like the type of person you would like to work with, contact me.">

    <link rel="shortcut icon" href="/favicon.png">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

</head>
