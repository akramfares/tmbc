@extends('layouts.app')
{{-- Web site Title --}}
@section('title') Home :: @parent @endsection

@section('meta_author')
    <meta name="author" content="Akram Fares"/>
@endsection
{{-- Content --}}
@section('content')
    <h1>Sample blog post</h1>
    <p>This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.

        Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
    <div>
        <span class="badge badge-info">Posted</span>
    </div>

    @include('partials.comments')

@endsection