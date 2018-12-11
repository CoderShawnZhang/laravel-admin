@extends('layouts.app')
@section('content')
    @foreach($articles as $article)
        <article class="format-image group">
            <h2 class="post-title pad">
                <a href="/article/show?article_id={{ $article->id }}"> {{ $article->title }} {{ $article->getAuthor->name }}
                <?php echo isset($article->getAuthor->getOption->view) ? $article->getAuthor->getOption->view : 0;?>
                </a>
            </h2>
            <div class="post-inner">
                <div class="post-deco">
                    <div class="hex hex-small">
                        <div class="hex-inner"><i class="fa"></i></div>
                        <div class="corner-1"></div>
                        <div class="corner-2"></div>
                    </div>
                </div>
                <div class="post-content pad">
                    <div class="entry custome">
                        {{ $article->intro }}
                    </div>
                    <a class="more-link-custom" href="/article/show?article_id={{ $article->id }}"><span><i>更多</i></span></a>
                </div>
            </div>
        </article>
    @endforeach
@endsection