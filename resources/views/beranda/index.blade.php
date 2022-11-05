@extends('layouts.app')

@section('content')
    @livewire('search-produk')
@endsection

@section('js')
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
@endsection
