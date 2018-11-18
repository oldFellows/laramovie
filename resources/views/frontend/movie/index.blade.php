@extends('layouts.frontend')
@section('content')
    @foreach($movies as $movie)
        <?php
        $numberOfGenres = count($movie->genres);
        $numberOfCountries = count($movie->countries);
        $numberOfDirectors = count($movie->directors);
        $numberOfActors = count($movie->actors);
        $numberOfWriters = count($movie->writers);
        ?>
        <div class="section-film-preview bg-light w-100">
            <div class="title-film w-100 text-light text-center">
                <span class="pt-3 pb-3 d-block">{{ $movie->header_title }}</span>
            </div>
            <div class="film-name-in-preview text-center mt-3">
                {{ $movie->subheader_title }}
            </div>
            <div class="row mt-4 mb-3">
                <div class="col-12 col-md-6 text-right mt-3 ">
                    <p class="pr-3"><span class="ml-1"><img src="/img/star.png" alt=""></span>
                        <span class="field-film">نام فیلم : </span> <span>{{ $movie->name }}</span></p>
                    <p class="pr-3"><span class="ml-1"><img src="/img/play-button.png" alt=""></span>
                        <span class="field-film">ژانر : </span>
                        <?php $i = 0 ?>
                        @foreach($movie->genres as $genre)
                            @if($i == $numberOfGenres - 1 )
                                <span><a href="{{ route('frontend.genres.index' ,$genre->slug) }}">{{ $genre->name }}</a></span>
                            @else
                                <span><a href="{{ route('frontend.genres.index' ,$genre->slug) }}">{{ $genre->name }}</a></span>،
                            @endif
                            <?php $i++ ?>
                        @endforeach

                    </p>
                    <p class="pr-3"><span class="ml-1"><img src="/img/star.png" alt=""></span>
                        <span class="field-film">امتیاز فیلم : </span> <span>{{ $movie->rate }}</span></p>
                    <p class="pr-3"><span><img src="/img/flag.png" alt=""></span>
                        <span class="field-film">محصول کشور  : </span>
                        <?php $i = 0 ?>
                        @foreach($movie->countries as $country)
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
                        @foreach($movie->directors as $director)
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
                        @foreach($movie->writers as $writer)
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
                        @foreach($movie->actors as $actor)
                            @if($i == $numberOfActors - 1 )
                                <span>{{ $actor->name }}</span>
                            @else
                                <span>{{ $actor->name }}</span>،
                            @endif
                            <?php $i++ ?>
                        @endforeach
                    </p>
                    <p class="pr-3"><span><img src="/img/alarm-clock.png" alt=""></span>
                        <span class="field-film">زمان  : </span> <span>{{ $movie->duration }}</span></p>
                    <p class="pr-3"><span><img src="/img/translation.png" alt=""></span>
                        <span class="field-film">زبان  : </span><span>{{ $movie->language }}</span></p>
                    <p class="pr-3"><span><img src="/img/appointment.png" alt=""></span>
                        <span class="field-film">تاریخ اکران  : </span> <span>{{ $movie->release_year }}</span></p>
                </div>
                <div class="col-12 col-md-5 text-center mt-3">
                    <img src="{{ $movie->image }}" class="img-fluid" alt="{{ $movie->image_alt }}">
                </div>
            </div>
            <div class="row pr-3 mt-3 pl-3">
                <div class="col-12 w-100 summary-about-film text-right">
                    <p class="field-film">خلاصه داستان فیلم : </p>
                    <p>
                        {{ $movie->summary }}
                    </p>
                </div>
            </div>
            <div class="row mr-0 text-center download-link-section w-100">
                <div class="col-12 col-md-6 time-section text-light pr-0 pt-3 pb-3 pl-0 ">
                    <span>تاریخ انتشار : </span><span>{{ $movie->updated_at }}</span>
                </div>
                <div class="col-12 col-md-6 text-white download-link-section pr-0 pt-3 pb-3 pl-0 ">
                    <a href="{{ route('frontend.movies.single' , $movie->slug) }}" >ادامه ی مطلب</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection


@section('pagination')
    {{ $movies->links() }}
@endsection