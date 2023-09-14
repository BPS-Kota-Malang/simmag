<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('components.core')

    <title>
        Soft UI Design System by Creative Tim
    </title>


</head>

<body class="index-page">
    @include('components.navbar')

    @yield('container')

    @include('components.footer')
</body>

</html>