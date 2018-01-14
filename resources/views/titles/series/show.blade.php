@include('layouts.header')
<article class="page-content">
    <div class="centered-content">
        <section class="item-header">
            <h1 class="hero-header">{{$series->title}}</h1>
        </section>
        <article class="item">
            <section class="item-meta-info">
                <ul class="title-genres">
                    @for($i = 0; $i < 2; $i++)
                        @if (isset($title->genres[$i]))
                            <li>{{ $title->genres[$i]->name }}</li>
                        @endif
                    @endfor
                </ul>
                <div class="meta-info-group">
                    <section class="seasons-table">
                        <table>
                            <thead>
                            <tr>
                                <th span="2">Seasons</th>
                                <th span="2">Number of Episodes</th>
                                <th span="2">Year</th>  
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($seasons as $season)
                            <tr>
                                <td class="link" span="2"><a href="http://{{ $_SERVER['HTTP_HOST'] }}/titles/series/{{ $series->title_id }}/seasons/{{ $season->season_number }}">{{$season->season_number}}</a></td>
                                <td span="2">{{ count($season->episodes) }}</td>
                                <td span="2">{{ substr($season->episodes[0]['air_date'], 0,4) }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </section>
                    <section class="row-flex-start">
                        <h2><span>short</span><span>Facts</span></h2>
                    </section>
                    <section class="facts-table">
                        <table>
                            @for($i = 0; $i < 3; $i++)
                                @if(isset($title->creators[$i]))
                                    @if ($i === 0 && $i === count($title->creators)-1)
                                        <tr class="row-padding-botom">
                                            <th span="2">Creator</th>
                                            <td class="link"span="2">
                                                <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $title->creators[$i]->id }}">{{ $title->creators[$i]->name }}</a>
                                            </td>
                                        </tr>
                                    @elseif ($i === 0)
                                        <tr>
                                            <th span="2">Creators</th>
                                            <td class="link"span="2">
                                                <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $title->creators[$i]->id }}">{{ $title->creators[$i]->name }}</a>
                                            </td>
                                        </tr>
                                    @elseif ($i === 2  || !isset($title->creators[$i+1]))
                                        <tr class="table-flex-end row-padding-botom">
                                            <td class="link"span="2">
                                                <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $title->creators[$i]->id }}">{{ $title->creators[$i]->name }}</a>
                                            </td>
                                        </tr>
                                    @elseif (isset($title->creators[$i]))
                                        <tr class="table-flex-end">
                                            <td class="link"span="2">
                                                <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $title->creators[$i]->id }}">{{ $title->creators[$i]->name }}</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endfor    
                            @for($i = 0; $i < 3; $i++)
                                @if ($i === 0 && !isset($directors[$i+1]))
                                    <tr class="row-padding-botom">
                                        <th span="2">Director</th>
                                        <td class="link"span="2">
                                            <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $directors[$i]['id'] }}">{{ $directors[$i]['name'] }}</a>
                                        </td>
                                    </tr>
                                @elseif ($i === 0 && isset($directors[$i+1]))
                                    <tr>
                                        <th span="2">Directors</th>
                                        <td class="link"span="2">
                                            <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $directors[$i]['id'] }}">{{ $directors[$i]['name'] }}</a>
                                        </td>
                                    </tr>
                                @elseif ($i === 2)
                                    <tr class="table-flex-end row-padding-botom">
                                        <td class="link"span="2">
                                            <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $directors[$i]['id'] }}">{{ $directors[$i]['name'] }}</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr class="table-flex-end">
                                        <td class="link"span="2">
                                            <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $directors[$i]['id'] }}">{{ $directors[$i]['name'] }}</a>
                                        </td>
                                    </tr>
                                @endif
                            @endfor
                            @for($i = 0; $i < 2; $i++)
                                @if(isset($producers[$i]))
                                    @if($i === 0 && isset($producers[$i+1]))
                                        <tr>
                                            <th span="2">Producers</th>
                                            <td class="link"span="2">
                                                <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $producers[$i]['id'] }}">{{ $producers[$i]['name'] }}</a>
                                            </td>
                                        </tr>
                                    @elseif ($i === 0 && !isset($producers[$i+1]))
                                        <tr class="row-padding-botom">
                                            <th span="2">Producer</th>
                                            <td class="link"span="2">
                                                <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $producers[$i]['id'] }}">{{ $producers[$i]['name'] }}</a>
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="table-flex-end row-padding-botom">
                                            <td class="link"span="2">
                                                <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $producers[$i]['id'] }}">{{ $producers[$i]['name'] }}</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endfor
                            @for($i = 0; $i < 3; $i++)
                                @if ($i === 0 && $i === count($screenwriters)-1)
                                    <tr class="row-padding-botom">
                                        <th span="2">Writer</th>
                                        <td class="link" span="2">
                                            <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $screenwriters[$i]['id'] }}">{{ $screenwriters[$i]['name'] }}</a>
                                        </td>
                                    </tr>
                                @elseif ($i === 0)
                                    <tr>
                                        <th span="2">Writers</th>
                                        <td class="link" span="2">
                                            <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $screenwriters[$i]['id'] }}">{{ $screenwriters[$i]['name'] }}</a>
                                        </td>
                                    </tr>
                                @elseif ($i === 2)
                                    <tr class="table-flex-end row-padding-botom">
                                        <td class="link" span="2">
                                            <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $screenwriters[$i]['id'] }}">{{ $screenwriters[$i]['name'] }}</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr class="table-flex-end">
                                        <td class="link" span="2">
                                            <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $screenwriters[$i]['id'] }}">{{ $screenwriters[$i]['name'] }}</a>
                                        </td>
                                    </tr>
                                @endif
                            @endfor
                            @for($i = 0; $i < 5; $i++)
                                @if(isset($actors[$i]))
                                    @if($i === 0)
                                        <tr>
                                            <th span="2">Cast</th>
                                            <td class="link" span="2">
                                                <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $actors[$i]['id'] }}">{{ $actors[$i]['name'] }}</a>
                                            </td>
                                        </tr>
                                    @elseif ($i === 4 || !isset($actors[$i+1]))
                                        <tr class="table-flex-end row-padding-botom">
                                            <td class="link" span="2">
                                                <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $actors[$i]['id'] }}">{{ $actors[$i]['name'] }}</a>
                                            </td>
                                        </tr>
                                        <tr class="table-flex-end alt-color">
                                            <td class="link" span="2"><a>VIEW FULL CAST</a></td>
                                        </tr>
                                    @else 
                                        <tr class="table-flex-end">
                                            <td class="link" span="2">
                                                <a href="http://{{ $_SERVER['HTTP_HOST'] }}/people/{{ $actors[$i]['id'] }}">{{ $actors[$i]['name'] }}</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endfor
                        </table>
                        <section class="plot-sumary">
                            <h3>PLOT SUMMARY</h3>
                            <div class="card">
                                <p>{{ $series->plot_summary }}</p>
                            </div>
                        </section>
                    </section>
                </div>
            </section>
            <section class="item-img card">
                <figure class="card-image is-16by9">
                @foreach($title->photos as $photo)
                    @if($photo->width == 780 && $photo->photo_type == "backdrop")
                        <img id="title-img" src="{{ $photo->photo_path }}" alt="poster">
                        @break
                    @endif
                    @if($loop->last)
                        <img id="title-img" src="{{ $photo->photo_path }}" alt="poster">
                    @endif
                @endforeach
                </figure>
            </section>
        </article>     
        <p>Rating: 
            <?php
                $ratingSummary = 0;
                $i = 0;
                foreach ($title->ratings as $rating) {
                    $ratingSummary = $ratingSummary + $rating->rating;
                    $i++;
                }
                if ($i == 0) {
                    echo "-";
                } else {
                    $ratingSummary = $ratingSummary / $i;
                    echo $ratingSummary;
                }
            ?>
        </p>
        @if(Auth::check())
            <a href="http://{{ $_SERVER['HTTP_HOST'] }}/reviews/create">Create a review</a>
        @endif
    </div>
</article>
</p>
{{--  <a href="http://{{ $_SERVER['HTTP_HOST'] }}/titles/series/{{ $series->title_id }}/seasons">All Seasons</a><br>  --}}

<div id="hz-carousel">
    @foreach($title->photos as $photo)
        @if($photo->width == 300)
        <div class="slide">
            <img src="{{ $photo->photo_path }}" alt="poster">
        </div>
        @endif
    @endforeach
</div>
{{--  <a href="http://{{ $_SERVER['HTTP_HOST'] }}/series">Back to all series</a>
<time datetime="{{ $series->release_year }}">{{ date('d F Y', strtotime($series->release_year)) }}</time><br> --}}
@include('layouts.footer') 