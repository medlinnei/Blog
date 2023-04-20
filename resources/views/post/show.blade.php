@extends("layouts.main")
@section("content")
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up"
               data-aos-delay="200">{{$date->translatedFormat('F')}}  {{$date->day}}, {{$date->year}}
                 {{$date->format('H:i')}} • {{$post->comments->count()}} Коментарі</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/'. $post->preview_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
                <section>
                    @auth()
                    <form action="{{route('post.like.store', $post->id)}}" method="post">
                        @csrf
                        <button type="submit" class="border-0 bg-transparent">
                            <span>{{$post->liked_users_count}}</span>
                            <i
                                class="fa{{ auth()->user()->likedPosts->contains($post->id) ? 's' : 'r'}} fa-heart">
                            </i>
                        </button>
                    </form>
                    @endauth
                </section>
                <section class="comment-list mb-6">
                    <h2>Коментарі: ({{$post->comments->count()}})</h2>
                    @foreach($post->comments as $comment)
                        <div class="comment-text mb-3">
                            <span class="username">
                                <div>
                                    {{$comment->user->name}}
                                </div>
                            </span>
                            {{$comment->message}}
                        </div>
                    @endforeach
                </section>
                @auth()
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Відпративи коментарій</h2>
                    <form action="{{route('post.comment.store', $post->id)}}" method="post">
                        @csrf
                            <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Написання коментаря"
                                          rows="10"></textarea>
                            </div>
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Додати коментар" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
                @endauth
            </section>
        </div>
        </div>
    </main>

@endsection

