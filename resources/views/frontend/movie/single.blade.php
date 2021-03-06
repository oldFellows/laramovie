@extends('layouts.frontend')
@section('metaTag')
    @if(isset($movieItem))
        <meta name="description" content="{{ $movieItem->summary }}">
        <meta name="keywords" content="{{ $movieItem->meta_keywords }}">
    @endif
@endsection

@section('content')
    @if(isset($movieItem))
        <div class="section-film-preview bg-light w-100">
            <div class="title-film w-100 text-light text-center">
                <span class="pt-3 pb-3 d-block">{{ $movieItem->header_title }}</span>
            </div>
            <div class="film-name-in-preview text-center mt-3">
                <h1 style="font-size:1.5rem !important;">{{ $movieItem->subheader_title }}</h1>
            </div>
            <div class="row mt-4 mb-3">
                <div class="col-12 col-md-6 text-right mt-3 ">
                    <p class="pr-3"><span class="ml-1"><img src="/img/star.png" alt=""></span>
                        <span class="field-film">نام فیلم : </span> <span>{{ $movieItem->name }}</span></p>
                    <p class="pr-3"><span class="ml-1"><img src="/img/play-button.png" alt=""></span>
                        <span class="field-film">ژانر : </span>
                        <?php $i = 0 ?>
                        @foreach($movieItem->genres as $genre)
                            @if($i == $numberOfGenres - 1 )
                                <span><a href="{{ route('frontend.genres.index' ,$genre->slug) }}">{{ $genre->name }}</a></span>
                            @else
                                <span><a href="{{ route('frontend.genres.index' ,$genre->slug) }}">{{ $genre->name }}</a></span>،
                            @endif
                            <?php $i++ ?>
                        @endforeach

                    </p>
                    <p class="pr-3"><span class="ml-1"><img src="/img/star.png" alt=""></span>
                        <span class="field-film">امتیاز فیلم : </span> <span>{{ $movieItem->rate }}</span></p>
                    <p class="pr-3"><span><img src="/img/flag.png" alt=""></span>
                        <span class="field-film">محصول کشور  : </span>
                        <?php $i = 0 ?>
                        @foreach($movieItem->countries as $country)
                            @if($i == $numberOfCountries - 1 )
                                <span>{{ $country->name }}</span>
                            @else
                                <span>{{ $country->name }}</span>،
                            @endif
                            <?php $i++ ?>
                        @endforeach
                    </p>
                    <p class="pr-3"><span><img src="/img/video-camera%20(1).png" alt=""></span>
                        <span class="field-film">کارگردان  : </span>
                        <?php $i = 0 ?>
                        @foreach($movieItem->directors as $director)
                            @if($i == $numberOfDirectors - 1 )
                                <span>{{ $director->name }}</span>
                            @else
                                <span>{{ $director->name }}</span>،
                            @endif
                            <?php $i++ ?>
                        @endforeach
                    </p>
                    <p class="pr-3"><span><img src="/img/pen.png" alt=""></span>
                        <span class="field-film">نویسنده  : </span>
                        <?php $i = 0 ?>
                        @foreach($movieItem->writers as $writer)
                            @if($i == $numberOfWriters - 1 )
                                <span>{{ $writer->name }}</span>
                            @else
                                <span>{{ $writer->name }}</span>،
                            @endif
                            <?php $i++ ?>
                        @endforeach
                    </p>
                    <p class="pr-3"><span><img src="/img/avatar.png" alt=""></span>
                        <span class="field-film">بازیگران  : </span>
                        <?php $i = 0 ?>
                        @foreach($movieItem->actors as $actor)
                            @if($i == $numberOfActors - 1 )
                                <span>{{ $actor->name }}</span>
                            @else
                                <span>{{ $actor->name }}</span>،
                            @endif
                            <?php $i++ ?>
                        @endforeach
                    </p>
                    <p class="pr-3"><span><img src="/img/alarm-clock.png" alt=""></span>
                        <span class="field-film">زمان  : </span> <span>{{ $movieItem->duration }}</span></p>
                    <p class="pr-3"><span><img src="/img/translation.png" alt=""></span>
                        <span class="field-film">زبان  : </span><span>{{ $movieItem->language }}</span></p>
                    <p class="pr-3"><span><img src="/img/appointment.png" alt=""></span>
                        <span class="field-film">تاریخ اکران  : </span> <span>{{ $movieItem->release_year }}</span></p>
                </div>
                <div class="col-12 col-md-5 text-center mt-3">
                    <img src="{{ $movieItem->image }}" class="img-fluid" alt="{{ $movieItem->image_alt }}">
                </div>
            </div>
            <div class="row pr-3 mt-3 pl-3">
                <div class="col-12 w-100 summary-about-film text-right">
                    <p class="field-film">خلاصه داستان فیلم : </p>
                    <p>
                        {{ $movieItem->summary }}
                    </p>
                </div>
            </div>
            <div class="row mr-0  alert alert alert-info download-link-section w-100">

                @foreach($movieItem->download_links as $download_link)

                    <div class="col-12 col-md-12  shadow alert alert-info pr-0 pt-3 pb-3 pl-0 text-right ">
                        <span class="d-inline-block pr-4 pl-2">دانلود با کیفیت </span>
                        <span class="d-inline-block pl-4">{{ $download_link->quality_name }}</span>
                        <a href="{{ $download_link->link }}">
                            <button type="button" class="btn btn-danger">لینک دانلود</button>
                        </a>


                    </div>

                @endforeach

                @foreach($movieItem->subtitles as $subtitle)
                    <div class="col-12 col-md-12  shadow alert alert-info pr-0 pt-3 pb-3 pl-0 text-right ">
                        <a href="{{ $subtitle->download_link }}">
                            <button type="button" class="btn btn-primary">جستجوی زیر نویس</button>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    @endif


@endsection


@section('helpDownload')
    @include('frontend.partials.helpDownload')
@endsection


@section('comment')

    @include('frontend.comment.form',['item' => $movieItem,'flag' => 1])
    @include('frontend.comment.list',['item' => $movieItem])



@endsection
