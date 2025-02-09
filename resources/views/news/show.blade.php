@extends('layouts.front')

@section('content')
@php
$setting = \App\Models\Setting::first();
@endphp
<section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 posts-list">
             <div class="single-post">
                <div class="feature-img">
                  @if ($news->image)
                  <img class="img-fluid" src="{{ asset('storage/'. $news->image) }}" alt="" style="width: 100%">
                  @else
                  <img class="img-fluid" src="{{ asset('storage/assets/img/no_image.jpg') }}" alt="" style="width: 100%">
                  @endif   
                </div>
                <div class="blog_details">
                   <h2>{{ $news->title }}
                   </h2>
                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="#"><i class="fa fa-address-card"></i> {{ $news->category->name }}</a></li>
                      <li><a href="#"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('d M Y') }}</a></li>
                   </ul>
                   {!! $news->content !!}
                </div>
             </div>
             <div class="navigation-top">
                {{-- <div class="d-sm-flex justify-content-between text-center">
                   <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                      people like this</p>
                   <div class="col-sm-4 text-center my-2 my-sm-0">
                       <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p>
                   </div>
                   <ul class="social-icons">
                      <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                      <li><a href="#"><i class="fab fa-behance"></i></a></li>
                   </ul>
                </div> --}}
                {{-- <div class="navigation-area">
                   <div class="row">
                      <div
                         class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                         <div class="thumb">
                            <a href="#">
                               <img class="img-fluid" src="assets/img/post/preview.png" alt="">
                            </a>
                         </div>
                         <div class="arrow">
                            <a href="#">
                               <span class="lnr text-white ti-arrow-left"></span>
                            </a>
                         </div>
                         <div class="detials">
                            <p>Prev Post</p>
                            <a href="#">
                               <h4>Space The Final Frontier</h4>
                            </a>
                         </div>
                      </div>
                      <div
                         class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                         <div class="detials">
                            <p>Next Post</p>
                            <a href="#">
                               <h4>Telescopes 101</h4>
                            </a>
                         </div>
                         <div class="arrow">
                            <a href="#">
                               <span class="lnr text-white ti-arrow-right"></span>
                            </a>
                         </div>
                         <div class="thumb">
                            <a href="#">
                               <img class="img-fluid" src="assets/img/post/next.png" alt="">
                            </a>
                         </div>
                      </div>
                   </div>
                </div> --}}
                {{-- <div class="blog">
               <div class="media align-items-center">
                  <div class="media-body">
                     <img src="{{ asset('storage/' . $setting->ad_image_1) }}" alt="">
                  </div>                 
               </div>
             </div> --}}
             </div>
             
             {{-- <div class="widget-title">
                <div class="media align-items-center">
                  <img src="{{ asset('storage/' . $setting->logo) }}" alt="">
                  <div class="media-body">
                     <img src="{{ asset('storage/' . $setting->ad_image_1) }}" alt="">
                  </div> --}}
                   {{-- <img src="{{ asset('assets2/img/blog/author.png') }}" alt="">
                   <div class="media-body">
                      <a href="#">
                         <h4>Harvard milan</h4>
                      </a>
                      <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                         our dominion twon Second divided from</p>
                   </div> --}}
                {{-- </div>
             </div> --}}
             <div class="comments-area">
                <h4>Komentar</h4>
                @foreach ($news->comments->where('parent_id', null) as $comment)
                {{-- @foreach ($news->comments->where('parent_id', null) as $comment)              --}}
                <div class="comment-list">
                   <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                         <div class="thumb">
                            <img src="assets/img/comment/comment_1.png" alt="">
                         </div>
                         <div class="desc">
                            <p class="comment">
                                {{ $comment->content }}
                            </p>
                            <div class="d-flex justify-content-between">
                               <div class="d-flex align-items-center">
                                  <h5>
                                     <a href="#"><p><strong>{{ $comment->fullname }}</strong></p></a>
                                  </h5>
                                  <p class="date">{{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('d M Y') }}                            
                                    at {{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('H:i') }}</p>
                               </div>
                               <div class="reply-btn">
                                  <a href="#" class="btn-reply text-uppercase" onclick="toggleReplyForm({{ $comment->id }})">reply</a>
                                  <form action="{{ route('comments.store') }}" method="POST" id="reply-form-{{ $comment->id }}" style="display: none; margin-top: 10px;">
                                    @csrf
                                    <input type="hidden" name="news_id" value="{{ $news->id }}">
                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        
                                    <input type="text" name="fullname" class="form-control mb-2" placeholder="Nama Anda" required>
                                    <input type="email" name="email" class="form-control mb-2" placeholder="Email Anda" required>
                                    <textarea name="content" class="form-control mb-2" placeholder="Balasan Anda..." required></textarea>
                        
                                    <button type="submit" class="btn btn-sm btn-success">Kirim Balasan</button>
                                </form>
                               </div>
                            </div>
                            <!-- Tampilkan Balasan -->
                              @foreach ($comment->replies as $reply)
                              <div style="margin-left: 40px; margin-top: 10px; padding: 10px; border-left: 3px solid #007bff;">
                                    <strong>{{ $reply->fullname }}</strong> 
                                    <p>{{ $reply->content }}</p>
                              </div>
                              @endforeach
                         </div>
                      </div>
                   </div>
                </div>
                @endforeach
                {{-- <div class="comment-list">
                   <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                         <div class="thumb">
                            <img src="assets/img/comment/comment_2.png" alt="">
                         </div>
                         <div class="desc">
                            <p class="comment">
                               Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                               Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                            </p>
                            <div class="d-flex justify-content-between">
                               <div class="d-flex align-items-center">
                                  <h5>
                                     <a href="#">Emilly Blunt</a>
                                  </h5>
                                  <p class="date">December 4, 2017 at 3:12 pm </p>
                               </div>
                               <div class="reply-btn">
                                  <a href="#" class="btn-reply text-uppercase">reply</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="comment-list">
                   <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                         <div class="thumb">
                            <img src="assets/img/comment/comment_3.png" alt="">
                         </div>
                         <div class="desc">
                            <p class="comment">
                               Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                               Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                            </p>
                            <div class="d-flex justify-content-between">
                               <div class="d-flex align-items-center">
                                  <h5>
                                     <a href="#">Emilly Blunt</a>
                                  </h5>
                                  <p class="date">December 4, 2017 at 3:12 pm </p>
                               </div>
                               <div class="reply-btn">
                                  <a href="#" class="btn-reply text-uppercase">reply</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div> --}}
             </div>
             <div class="comment-form">
                <h4>Leave a Reply</h4>
                <form action="{{ route('comments.store') }}" method="POST" class="form-contact comment_form" id="commentForm">
                    @csrf
                    <input type="hidden" name="news_id" value="{{ $news->id }}">
                {{-- <form class="form-contact comment_form" action="#" id="commentForm"> --}}
                   <div class="row">
                      <div class="col-12">
                         <div class="form-group">
                            <textarea class="form-control w-100" name="content" id="content" cols="30" rows="9"
                               placeholder="Write Comment" required></textarea>
                         </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                            <input class="form-control" name="fullname" id="fullname" type="text" placeholder="Name" required>
                         </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                            <input class="form-control" name="email" id="email" type="email" placeholder="Email" required>
                         </div>
                      </div>
                      {{-- <div class="col-12">
                         <div class="form-group">
                            <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                         </div>
                      </div> --}}
                   </div>
                   <div class="form-group">
                      <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                   </div>
                </form>
             </div>
          </div>
          <div class="col-lg-4">
             <div class="blog_right_sidebar">
                <aside class="single_sidebar_widget search_widget">
                   <form action="#">
                      <div class="form-group">
                         <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder='Search Keyword'
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                            <div class="input-group-append">
                               <button class="btns" type="button"><i class="ti-search"></i></button>
                            </div>
                         </div>
                      </div>
                      <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                         type="submit">Search</button>
                   </form>
                </aside>
                <aside class="single_sidebar_widget post_category_widget">
                   <h4 class="widget_title">Category</h4>
                   <ul class="list cat-list">
                        @foreach ($categories as $cat)
                        <li><a href="{{ ('/category/' . $cat->slug) }}" class="d-flex">
                            <p>{{ $cat->name }}</p></a>
                        </li>
                        @endforeach
                    <li>
                         {{-- <a href="#" class="d-flex">
                            <p>Resaurant food</p>
                            <p>(37)</p>
                         </a>
                      </li> --}}
                      {{-- <li>
                         <a href="#" class="d-flex">
                            <p>Travel news</p>
                            <p>(10)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Modern technology</p>
                            <p>(03)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Product</p>
                            <p>(11)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Inspiration</p>
                            <p>(21)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Health Care</p>
                            <p>(21)</p>
                         </a>
                      </li> --}}
                   </ul>
                </aside>
                <aside class="single_sidebar_widget popular_post_widget">
                   <h3 class="widget_title">Recent Post</h3>
                   @foreach ($latestNews as $l)     
                  <div class="media post_item">
                     @if ($l->image)
                     <img src="{{ asset('storage/' . $l->image) }}" style="width: 100px;" alt="{{ $l->title }}">
                     @else
                     <img src="{{ asset('storage/assets/img/no_image.jpg') }}" style="width: 100px;">
                     @endif                      
                      <div class="media-body">
                         <a href="single-blog.html">
                            <h3>{{ Str::limit($l->title, 30, '...') }}</h3>
                         </a>
                         <p>{{ \Carbon\Carbon::parse($l->created_at)->translatedFormat('d F Y') }}</p>
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
                   <h4 class="widget_title">Tag Clouds</h4>
                   <ul class="list">
                    @foreach ($categories as $cat)
                      <li>
                         <a href="{{ ('/category/'. $cat->slug) }}">{{ $cat->name }}</a>
                      </li>  
                    @endforeach
                   </ul>
                </aside>
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
                </aside> --}}
                {{-- <aside class="single_sidebar_widget newsletter_widget">
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
 <script>
   function toggleReplyForm(commentId) {
       var form = document.getElementById('reply-form-' + commentId);
       if (form.style.display === "none") {
           form.style.display = "block";
       } else {
           form.style.display = "none";
       }
   }
   </script>
@endsection