<head>
    <title>{{ $headerTitle }}</title>

    {{-- https://metatags.io/ --}}
    {{-- http://opengraphprotocol.org/ || http://ogp.me/ --}}

    <!-- Core Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $headerTitle }}">
    <meta name="description" content="{{ $headerSubtitle }}">
    <meta name="author" content="{{ $headerAuthor }}">
    <meta name="keywords" content="{{ $headerTags }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:url" content="{{ $headerUrl }}">
    <meta property="og:title" content="{{ $headerTitle }}">
    <meta property="og:description" content="{{ $headerSubtitle }}">
    <meta property="og:site_name" content="{{ $headerAuthor }}">
    <meta property="og:determiner" content="the">
    <meta property="og:locale" content="en_GB">
    <meta property="og:image" content="{{ $headerImage }}">
    <meta property="og:type" content="{{ $headerOgType }}">

    @if ($headerOgTypeArticle)
        <!-- Article type info -->
        <meta property="article:published_time" content="{{ $headerOgTypeArticlePublishedTime }}">
        <meta property="article:modified_time" content="{{ $headerOgTypeArticleModifiedTime }}">
        <meta property="article:author" content="{{ $headerAuthor }}"> {{-- Update with FB profile link once linked --}}
        <meta property="article:section" content="{{ $headerTags }}">
        <meta property="article:tag" content="{{ $headerTags }}">
    @endif

    <!-- Twitter -->
    <meta property="twitter:card" content="{{ $headerImage }}">
    <meta property="twitter:url" content="{{ $headerUrl }}">
    <meta property="twitter:title" content="{{ $headerTitle }}">
    <meta property="twitter:description" content="{{ $headerSubtitle }}">
    <meta property="twitter:image" content="{{ $headerImage }}">

    @if (isset($canonical))
        <link rel="canonical" href="{{ $canonical }}" />
    @endif

    <link rel="shortcut icon" href="/favicon.png">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
