<div class="content">
    <nav class="breadcrumb push rounded-pill px-1 py-2 mb-0">
        @foreach($urls as $url)
            @if($loop->last)
                <span class="breadcrumb-item active">{{ \App\Models\Widget\TextName::getTextTranslation($url) }}</span>
            @else
                @if($url == str_replace(["https://", "http://"], "", config('app.url')))
                    <a class="breadcrumb-item" href="{{ url('/') }}">{{ \App\Models\Widget\TextName::getTextTranslation('home') }}</a>
                @else
                    @if(!is_numeric($url))
                        @if(Route::has($url . '.index'))
                            <a class="breadcrumb-item" href="{{ route($url . '.index') }}">{{ \App\Models\Widget\TextName::getTextTranslation($url) }}</a>
                        @else
                            <a href="" class="breadcrumb-item">{{ \App\Models\Widget\TextName::getTextTranslation($url) }}</a>
                        @endif
                    @endif
                @endif
            @endif
        @endforeach
    </nav>
</div>
