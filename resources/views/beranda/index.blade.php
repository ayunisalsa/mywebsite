<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    @livewireStyles
</head>

<body>
    @livewire('search-produk')

    <script type="text/javascript">
        window.isLoading = false
        window.onscroll = ev => {
            // Check scroll position
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                // Check loading flag
                if (window.isLoading) {
                    return true
                }
                // Load more data
                window.livewire.emit('load-more');
                // Set the flag to disable loading
                window.isLoading = true;
            }
        };
        // To reset the isLoading flag we'll emit an event from the Livewire component to the browser
        window.addEventListener('loading-complete', event => {
            window.isLoading = false;
        })
    </script>
    @livewireScripts
</body>

</html>
