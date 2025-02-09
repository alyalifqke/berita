@extends('layouts.front')

@section('content')

<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @foreach ($news as $item)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            @if ($item->image)
                            <img class="card-img rounded-0" src="{{ asset('storage/' . $item->image) }}" alt="">
                            @else
                            <img class="card-img rounded-0" src="{{ asset('storage/assets/img/no_image.jpg') }}" alt="">
                            @endif
                            
                            <a href="#" class="blog_item_date">
                                <h3>{{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('d') }}</h3>
                                <p>{{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('M Y') }}</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="../{{ $item->slug }}">
                                <h2>{{ $item->title }}</h2>
                            </a>
                            <p>{{ Str::limit($item->content, 150) }}</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> {{ $item->category->name }}</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> {{ $item->comments->count() }} Comments</a></li>
                            </ul>
                        </div>
                    </article>
                    @endforeach
                    {{-- <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="assets/img/blog/single_blog_2.png" alt="">
                            <a href="#" class="blog_item_date">
                                <h3>{{ \Carbon\Carbon::parse($fnews->updated_at)->translatedFormat('d') }}</h3>
                                <p>{{ \Carbon\Carbon::parse($fnews->updated_at)->translatedFormat('F Y') }}</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="single-blog.html">
                                <h2>Google inks pact for new 35-storey office</h2>
                            </a>
                            <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                he earth it first without heaven in place seed it second morning saying.</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                            </ul>
                        </div>
                    </article>

                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="assets/img/blog/single_blog_3.png" alt="">
                            <a href="#" class="blog_item_date">
                                <h3>15</h3>
                                <p>Jan</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="single-blog.html">
                                <h2>Google inks pact for new 35-storey office</h2>
                            </a>
                            <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                he earth it first without heaven in place seed it second morning saying.</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                            </ul>
                        </div>
                    </article>

                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="assets/img/blog/single_blog_4.png" alt="">
                            <a href="#" class="blog_item_date">
                                <h3>15</h3>
                                <p>Jan</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="single-blog.html">
                                <h2>Google inks pact for new 35-storey office</h2>
                            </a>
                            <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                he earth it first without heaven in place seed it second morning saying.</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                            </ul>
                        </div>
                    </article>

                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="assets/img/blog/single_blog_5.png" alt="">
                            <a href="#" class="blog_item_date">
                                <h3>15</h3>
                                <p>Jan</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="single-blog.html">
                                <h2>Google inks pact for new 35-storey office</h2>
                            </a>
                            <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                he earth it first without heaven in place seed it second morning saying.</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                            </ul>
                        </div>
                    </article> --}}
                    {{-- <nav aria-label="Page navigation justify-center d-flex"> --}}
                        {{-- <div class="d-flex justify-content-center"> --}}
                        {{-- <ul class="pagination"> --}}
                          {{-- <li class="page-item"> --}}
                             {{-- {{ $news->links() }} --}}
                          {{-- </li> --}}
                        {{-- </ul> --}}
                        {{-- </div> --}}
                      {{-- </nav> --}}
                      <div class="d-flex justify-content-center mt-4">
                        @if ($news->hasPages())
                        <nav>
                            <ul class="pagination justify-content-center">
                                {{-- Tombol "Sebelumnya" --}}
                                @if ($news->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $news->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                @endif
                    
                                {{-- Tombol Halaman --}}
                                @foreach ($news->links()->elements[0] as $page => $url)
                                    @if ($page == $news->currentPage())
                                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                    
                                {{-- Tombol "Berikutnya" --}}
                                @if ($news->hasMorePages())
                                    <li class="page-item"><a class="page-link" href="{{ $news->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                @else
                                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                @endif
                            </ul>
                        </nav>
                    @endif
                    
                    </div>
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">

                             {{-- <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link"></a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Search Keyword'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btns" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Search</button>
                        </form>
                        <iframe width="100%" height="300" src="https://embed.windy.com/embed2.html?lat=-5.14&lon=119.43&zoom=6&level=surface&overlay=wind&menu=&message=&marker=true" 
                            frameborder="0">
                        </iframe>

                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            @foreach ($categories as $cat)
                                    <li>
                                        <a href="{{ ('/category/' . $cat->slug) }}">{{ $cat->name }}</a>
                                        {{-- <p>Resaurant food</p> --}}
                                        {{-- <p>(37)</p> --}}
                                    </li>
                                    @endforeach
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        @foreach ($latestNews as $l)
                            
                        
                        <div class="media post_item">
                            @if ($l->image)
                            <img src="{{ asset('storage/' . $l->image) }}" alt="{{ $l->title }}" style="width: 120px"> 
                            @else
                            <img src="{{ asset('storage/assets/img/no_image.jpg') }}" style="width: 120px"> 
                            @endif             
                            <div class="media-body">
                                <a href="{{ $l->slug }}">
                                    <h3>{{ Str::limit($l->title, 30, '...') }}</h3>
                                </a>
                                <p>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="media post_item">
                            <img src="assets/img/post/post_2.png" alt="post">
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>The Amazing Hubble</h3>
                                </a>
                                <p>02 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="assets/img/post/post_3.png" alt="post">
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>Astronomy Or Astrology</h3>
                                </a>
                                <p>03 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="assets/img/post/post_4.png" alt="post">
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>Asteroids telescope</h3>
                                </a>
                                <p>01 Hours ago</p>
                            </div>
                        </div> --}}
                    </aside>
                    <aside class="single_sidebar_widget tag_cloud_widget">
                        {{-- <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                            <li>
                                <a href="#">project</a>
                            </li>
                            <li>
                                <a href="#">love</a>
                            </li>
                            <li>
                                <a href="#">technology</a>
                            </li>
                            <li>
                                <a href="#">travel</a>
                            </li>
                            <li>
                                <a href="#">restaurant</a>
                            </li>
                            <li>
                                <a href="#">life style</a>
                            </li>
                            <li>
                                <a href="#">design</a>
                            </li>
                            <li>
                                <a href="#">illustration</a>
                            </li>
                        </ul> --}}
                        {{-- <div class="row">
                            <div class="col-12"> --}}
                        {{-- <div class="col-lg-12"> --}}
                            <!-- Section Tittle -->
                            {{-- <div class="section-tittle mb-40">
                                <h3>Follow Us</h3>
                            </div> --}}
                            <!-- Flow Socail -->
                            {{-- <div class="single-follow mb-45">
                                <div class="single-box">
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="{{ asset('assets2/img/news/icon-fb.png') }}" alt=""></a>
                                        </div>
                                        <div class="follow-count">  
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div> 
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="{{ asset('assets2/img/news/icon-tw.png') }}" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                        <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="{{ asset('assets2/img/news/icon-ins.png') }}" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="{{ asset('assets2/img/news/icon-yo.png') }}" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- New Poster -->
                            <div class="news-poster d-none d-lg-block">
                                <img src="{{ asset('assets2/img/news/news_card.jpg') }}" alt="">
                            </div>
                        {{-- </div> --}}
                        {{-- </div>
                        </div> --}}
                    </aside>
                    <section class="whats-news-area pt-50 pb-20">
                        <div class="container">
                            <div class="row">

                            </div>
                        </div>
                    </section>
                    {{-- <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Feeds</h4>
                        <ul class="instagram_row flex-wrap">
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>

                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Subscribe</button>
                        </form>
                    </aside> --}}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection