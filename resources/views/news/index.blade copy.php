@extends('layouts.front')

@section('content')


    <div>
        {{-- <h3><a href="/news/{{ $item->slug }}">{{ $item->title }}</a></h3> --}}
        {{-- <p>{{ Str::limit($item->content, 100) }}</p> --}}
    </div>


{{-- {{ $news->links() }} --}}

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-7 col-xl-8 mt-0">
                <div class="position-relative overflow-hidden rounded">
                    {{-- @foreach ($$latestCategories as $item) --}}
                    @foreach ($news as $item)
                        
                    <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded img-zoomin w-100" alt="">
                    <div class="d-flex justify-content-center px-4 position-absolute flex-wrap" style="bottom: 10px; left: 0;">
                        <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i> 06 minute read</a>
                        <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> 3.5k Views</a>
                        <a href="#" class="text-white me-3 link-hover"><i class="fa fa-comment-dots"></i> 05 Komentar</a>
                        <a href="#" class="text-white link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                    </div>
                </div>
                <div class="border-bottom py-3">
                    <a href="/news/{{ $item->slug }}" class="display-4 text-dark mb-0 link-hover">{{ $item->title }}</a>
                </div>
                <p class="mt-3 mb-4">{{ Str::limit($item->content, 100,'...') }}</p>
                @endforeach
                <div class="bg-light p-4 rounded">
                    <div class="news-2">
                        <h3 class="mb-4">Top Story</h3>
                    </div>
                    <div class="row g-4 align-items-center">
                        <div class="col-md-6">
                            <div class="rounded overflow-hidden">
                                <img src="{{ asset('assets/img/news-2.jpg') }}" class="img-fluid rounded img-zoomin w-100" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <a href="#" class="h3">Stoneman Clandestine Ukrainian claims successes against Russian.</a>
                                <p class="mb-0 fs-5"><i class="fa fa-clock"> 06 minute read</i> </p>
                                <p class="mb-0 fs-5"><i class="fa fa-eye"> 3.5k Views</i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
               <div class="bg-light rounded p-4 pt-0">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="rounded overflow-hidden">
                                <img src="{{ asset('assets/img/news-3.jpg') }}" class="img-fluid rounded img-zoomin w-100" alt="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <a href="#" class="h4 mb-2">HoiiiGet the best speak market, news.</a>
                                <p class="fs-5 mb-0"><i class="fa fa-clock"> 06 minute read</i> </p>
                                <p class="fs-5 mb-0"><i class="fa fa-eye"> 3.5k Views</i></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="{{ asset('assets/img/news-3.jpg') }}" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Get the best speak market, news.</a>
                                        <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                        <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="{{ asset('assets/img/news-4.jpg') }}" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Get the best speak market, news.</a>
                                        <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                        <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="{{ asset('assets/img/news-5.jpg') }}" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Get the best speak market, news.</a>
                                        <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                        <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="{{ asset('assets/img/news-6.jpg') }}" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Get the best speak market, news.</a>
                                        <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                        <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="{{ asset('assets/img/news-7.jpg') }}" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Get the best speak market, news.</a>
                                        <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                        <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="{{ asset('assets/img/news-7.jpg') }}" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Get the best speak market, news.</a>
                                        <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                        <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
 