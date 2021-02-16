@extends('layouts.app')
@section('main_content')

    <!-- CONTENT GRID -->
    <div class="content-grid">
        <!-- SECTION BANNER -->
        <div class="section-banner">
            <!-- SECTION BANNER ICON -->
            <img class="section-banner-icon" src="{{ asset('front/img/banner/badges-icon.png') }}" alt="badges-icon">
            <!-- /SECTION BANNER ICON -->

            <!-- SECTION BANNER TITLE -->
            <p class="section-banner-title">Badges</p>
            <!-- /SECTION BANNER TITLE -->

            <!-- SECTION BANNER TEXT -->
            <p class="section-banner-text">Check out all your unlocked and locked badges!</p>
            <!-- /SECTION BANNER TEXT -->
        </div>
        <!-- /SECTION BANNER -->

        <!-- GRID -->
        <div class="grid grid-3-3-3-3 top-space centered">
        @foreach($badges as $badge)
            <!-- BADGE ITEM STAT -->
                <div class="badge-item-stat">
                    <!-- TEXT STICKER -->
                    <p class="text-sticker">
                        <!-- TEXT STICKER ICON -->
                        <svg class="text-sticker-icon icon-plus-small">
                            <use xlink:href="#svg-plus-small"></use>
                        </svg>
                        <!-- TEXT STICKER ICON -->
                        {{ $badge->credit }} Exp
                    </p>
                    <!-- /TEXT STICKER -->

                    <!-- BADGE ITEM STAT IMAGE PREVIEW -->
                    <img class="badge-item-stat-image-preview badge-image-small" src="{{ asset( $badge->icon) }}" alt="badge-bronze-s">
                    <!-- /BADGE ITEM STAT IMAGE PREVIEW -->

                    <!-- BADGE ITEM STAT IMAGE -->
                    <img class="badge-item-stat-image" src="{{ asset($badge->icon) }}" alt="badge-bronze-b">
                    <!-- /BADGE ITEM STAT IMAGE -->

                    <!-- BADGE ITEM STAT TITLE -->
                    <p class="badge-item-stat-title">{{ $badge->title }}</p>
                    <!-- /BADGE ITEM STAT TITLE -->

                    <!-- BADGE ITEM STAT TEXT -->
                    <p class="badge-item-stat-text">{{ $badge->description }}</p>
                    <!-- /BADGE ITEM STAT TEXT -->

                    <div class="progress-stat">
                        <!-- PROGRESS STAT BAR -->
                        <div class="progress-stat-bar" style="width: 204px; height: 4px; position: relative;">
                            <canvas width="204" height="4"></canvas>
                            <canvas width="204" height="4" style="width: {{ (count($posts) >= $badge->qty?'100': (count($posts) * 100)/$badge->qty) }}%"></canvas>
                        </div>
                        <!-- /PROGRESS STAT BAR -->

                        <!-- BAR PROGRESS WRAP -->
                        <div class="bar-progress-wrap">
                            <!-- BAR PROGRESS INFO -->
                            <p class="bar-progress-info negative center">
                                @if(count($posts) >= $badge->qty)
                                    <span class="bar-progress-text no-space">
                                        Unlocked
                                    </span>
                                @else
                                    <span class="bar-progress-text no-space">
                                        {{ count($posts) }}
                                        <span class="bar-progress-unit">/</span>
                                        {{ $badge->qty }}
                                    </span>
                                @endif
                            </p>
                            <!-- /BAR PROGRESS INFO -->
                        </div>
                        <!-- /BAR PROGRESS WRAP -->
                    </div>
                </div>
                <!-- /BADGE ITEM STAT -->
            @endforeach

        </div>
        <!-- /GRID -->
    </div>
    <!-- /CONTENT GRID -->

@endsection