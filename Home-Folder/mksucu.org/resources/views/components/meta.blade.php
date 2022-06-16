<meta property="og:title" name="Title" content="{{ $title ?? config('app.name', 'Eleso Ltd') }}">
<meta property="og:description" name="Description" content="{{ $description }}" maxLength="200">
    
<title>{{ $title ?? config('app.name', 'Eleso Ltd') }}</title>
<meta name="Keywords" content="{{ $keywords }}">
<meta name="robots" content="INDEX,follow">

<!-- MS, fb & Whatsapp -->

<!-- MS Tile - for Microsoft apps-->
<meta name="msapplication-TileImage" content="{{ $image }}">

<!-- fb & Whatsapp -->

<!-- Site Name, Title, and Description to be displayed -->
<meta property="og:site_name" content="{{config('app.name')}}">

<!-- Image to display -->
<!-- Replace   «example.com/image01.jpg» with your own -->
<meta property="og:image" content="{{ $image }}">

<!-- No need to change anything here -->
<meta property="og:type" content="website" />
<meta property="og:image:type" content="image/jpeg">

<!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">
<meta property="og:image:alt" content="{{config('app.name')}}">

<!-- Website to visit when clicked in fb or WhatsApp-->
<meta property="og:url" content="{{ $url }}">
