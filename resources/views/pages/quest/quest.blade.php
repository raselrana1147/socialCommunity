
@extends('layouts.app')
@section('main_content')
    <!-- CONTENT GRID -->
    <div class="content-grid">
        <!-- SECTION BANNER -->
        <div class="section-banner">
            <!-- SECTION BANNER ICON -->
            <img class="section-banner-icon" src="{{ asset('front/img/banner/quests-icon.png') }}" alt="quests-icon">
            <!-- /SECTION BANNER ICON -->

            <!-- SECTION BANNER TITLE -->
            <p class="section-banner-title">Quests</p>
            <!-- /SECTION BANNER TITLE -->

            <!-- SECTION BANNER TEXT -->
            <p class="section-banner-text">Complete quests to gain experience and level up!</p>
            <!-- /SECTION BANNER TEXT -->
        </div>
        <!-- /SECTION BANNER -->

        <!-- SECTION HEADER -->
        <div class="section-header">
            <!-- SECTION HEADER INFO -->
            <div class="section-header-info">
                <!-- SECTION PRETITLE -->
                <p class="section-pretitle">Get an early lead!</p>
                <!-- /SECTION PRETITLE -->

                <!-- SECTION TITLE -->
                <h2 class="section-title">Featured Quests</h2>
                <!-- /SECTION TITLE -->
            </div>
            <!-- /SECTION HEADER INFO -->
        </div>
        <!-- /SECTION HEADER -->

        <!-- GRID -->
        <div class="grid grid-3-3-3-3 centered">
        @foreach($quests as $quest)
            @if($quest->is_featured == 1)
                <!-- QUEST ITEM -->
                    <div class="quest-item">
                        <!-- QUEST ITEM COVER -->
                        <figure class="quest-item-cover liquid">
                            <img src="{{ asset($quest->cover_picture) }}" alt="cover-01">
                        </figure>
                        <!-- /QUEST ITEM COVER -->

                        <!-- TEXT STICKER -->
                        <p class="text-sticker small-text">
                            <!-- TEXT STICKER ICON -->
                            <svg class="text-sticker-icon icon-plus-small">
                                <use xlink:href="#svg-plus-small"></use>
                            </svg>
                            <!-- TEXT STICKER ICON -->
                            {{ $quest->credit }} EXP
                        </p>
                        <!-- /TEXT STICKER -->

                        <!-- QUEST ITEM INFO -->
                        <div class="quest-item-info">
                            <!-- QUEST ITEM BADGE -->
                            <div class="quest-item-badge">
                                <img src="{{ asset($quest->icon) }}" alt="openq-b">
                            </div>
                            <!-- /QUEST ITEM BADGE -->

                            <!-- QUEST ITEM TITLE -->
                            <p class="quest-item-title">{{ $quest->title }}</p>
                            <!-- /QUEST ITEM TITLE -->

                            <!-- QUEST ITEM TEXT -->
                            <p class="quest-item-text">{{ $quest->description }}</p>
                            <!-- /QUEST ITEM TEXT -->

                            <!-- PROGRESS STAT -->
                            <div class="progress-stat">
                                @if($quest->type == 1)
                                    <!-- PROGRESS STAT BAR -->
                                    <div id="" class="progress-stat-bar" style="width: 228px; height: 4px; position: relative;">
                                        <canvas width="228" height="4"></canvas>
                                        <canvas width="228" height="4" style="width: {{ (count($social_links) >= $quest->qty?'100': (count($social_links) * 100)/$quest->qty) }}%"></canvas>
                                    </div>
                                    <!-- /PROGRESS STAT BAR -->

                                    <!-- BAR PROGRESS WRAP -->
                                    <div class="bar-progress-wrap small">
                                        <!-- BAR PROGRESS INFO -->
                                        <p class="bar-progress-info negative start"><span class="bar-progress-text no-space">{{ count($social_links) }}<span class="bar-progress-unit">/</span>{{ $quest->qty }}</span>completed</p>
                                        <!-- /BAR PROGRESS INFO -->
                                    </div>
                                    <!-- /BAR PROGRESS WRAP -->
                                @endif
                            </div>
                            <!-- /PROGRESS STAT -->

                            <!-- QUEST ITEM META -->
                            <div class="quest-item-meta">
                                <!-- USER AVATAR LIST -->
                                <div class="user-avatar-list">
                                    <!-- USER AVATAR -->
                                    <div class="user-avatar micro no-stats">
                                        <!-- USER AVATAR BORDER -->
                                        <div class="user-avatar-border">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-22-24"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR BORDER -->

                                        <!-- USER AVATAR CONTENT -->
                                        <div class="user-avatar-content">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-image-18-20" data-src="{{ asset('front/img/avatar/08.jpg') }}"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR CONTENT -->
                                    </div>
                                    <!-- /USER AVATAR -->

                                    <!-- USER AVATAR -->
                                    <div class="user-avatar micro no-stats">
                                        <!-- USER AVATAR BORDER -->
                                        <div class="user-avatar-border">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-22-24"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR BORDER -->

                                        <!-- USER AVATAR CONTENT -->
                                        <div class="user-avatar-content">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-image-18-20" data-src="{{ asset('front/img/avatar/16.jpg') }}"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR CONTENT -->
                                    </div>
                                    <!-- /USER AVATAR -->

                                </div>
                                <!-- /USER AVATAR LIST -->

                                <!-- QUEST ITEM META INFO -->
                                <div class="quest-item-meta-info">
                                    <!-- QUEST ITEM META TITLE -->
                                    <p class="quest-item-meta-title">+24 friends</p>
                                    <!-- /QUEST ITEM META TITLE -->

                                    <!-- QUEST ITEM META TEXT -->
                                    <p class="quest-item-meta-text">completed this quest</p>
                                    <!-- /QUEST ITEM META TEXT -->
                                </div>
                                <!-- /QUEST ITEM META INFO -->
                            </div>
                            <!-- /QUEST ITEM META -->
                        </div>
                        <!-- /QUEST ITEM INFO -->
                    </div>
                    <!-- /QUEST ITEM -->
                @endif
            @endforeach
        </div>
        <!-- /GRID -->

        <!-- SECTION HEADER -->
        <div class="section-header">
            <!-- SECTION HEADER INFO -->
            <div class="section-header-info">
                <!-- SECTION PRETITLE -->
                <p class="section-pretitle">Gain EXP and level up!</p>
                <!-- /SECTION PRETITLE -->

                <!-- SECTION TITLE -->
                <h2 class="section-title">Browse All Quests</h2>
                <!-- /SECTION TITLE -->
            </div>
            <!-- /SECTION HEADER INFO -->
        </div>
        <!-- /SECTION HEADER -->

        <!-- SECTION FILTERS BAR -->
        <div class="section-filters-bar v2">
            <!-- FORM -->
            <form class="form">
                <!-- FORM ITEM -->
                <div class="form-item split medium">
                    <!-- FORM SELECT -->
                    <div class="form-select">
                        <label for="quest-filter-show">Show</label>
                        <select id="quest-filter-show" name="quest_filter_show" data-action="{{ route('quest.filter.show') }}">
                            <option value="0">All Quests</option>
                            <option value="1">Completed Quests</option>
                        </select>
                        <!-- FORM SELECT ICON -->
                        <svg class="form-select-icon icon-small-arrow">
                            <use xlink:href="#svg-small-arrow"></use>
                        </svg>
                        <!-- /FORM SELECT ICON -->
                    </div>
                    <!-- /FORM SELECT -->

                    <!-- FORM SELECT -->

                    <!-- /FORM SELECT -->

                    <!-- FORM SELECT -->
                    <div class="form-select">
                        <label for="quest-filter-order">Order By</label>
                        <select id="quest-filter-order" name="quest_filter_order" data-action="{{ route('quest.filter.order') }}">
                            <option value="1">Ascending</option>
                            <option value="0">Descending</option>
                        </select>
                        <!-- FORM SELECT ICON -->
                        <svg class="form-select-icon icon-small-arrow">
                            <use xlink:href="#svg-small-arrow"></use>
                        </svg>
                        <!-- /FORM SELECT ICON -->
                    </div>
                    <!-- /FORM SELECT -->

                    <!-- BUTTON -->
                    {{--<button class="button secondary" id="quest_filter">Filter Quests</button>--}}
                    <!-- /BUTTON -->
                </div>
                <!-- /FORM ITEM -->
            </form>
            <!-- /FORM -->
        </div>
        <!-- /SECTION FILTERS BAR -->

        <!-- TABLE -->
        <div class="table table-quests split-rows">
            <!-- TABLE HEADER -->
            <div class="table-header">
                <!-- TABLE HEADER COLUMN -->
                <div class="table-header-column">
                    <!-- TABLE HEADER TITLE -->
                    <p class="table-header-title">Quest</p>
                    <!-- /TABLE HEADER TITLE -->
                </div>
                <!-- /TABLE HEADER COLUMN -->

                <!-- TABLE HEADER COLUMN -->
                <div class="table-header-column">
                    <!-- TABLE HEADER TITLE -->
                    <p class="table-header-title">Description</p>
                    <!-- /TABLE HEADER TITLE -->
                </div>
                <!-- /TABLE HEADER COLUMN -->

                <!-- TABLE HEADER COLUMN -->
                <div class="table-header-column centered padded-big-left">
                    <!-- TABLE HEADER TITLE -->
                    <p class="table-header-title">Experience</p>
                    <!-- /TABLE HEADER TITLE -->
                </div>
                <!-- /TABLE HEADER COLUMN -->

                <!-- TABLE HEADER COLUMN -->
                <div class="table-header-column padded-big-left">
                    <!-- TABLE HEADER TITLE -->
                    <p class="table-header-title">Progress</p>
                    <!-- /TABLE HEADER TITLE -->
                </div>
                <!-- /TABLE HEADER COLUMN -->
            </div>
            <!-- /TABLE HEADER -->

            <!-- TABLE BODY -->
            <div class="table-body same-color-rows" id="quest_filtered_data">
                
            </div>
            <!-- /TABLE BODY -->
        </div>
        <!-- /TABLE -->

        <!-- LOADER BARS -->
    {{--<div class="loader-bars">--}}
    {{--<div class="loader-bar"></div>--}}
    {{--<div class="loader-bar"></div>--}}
    {{--<div class="loader-bar"></div>--}}
    {{--<div class="loader-bar"></div>--}}
    {{--<div class="loader-bar"></div>--}}
    {{--<div class="loader-bar"></div>--}}
    {{--<div class="loader-bar"></div>--}}
    {{--<div class="loader-bar"></div>--}}
    {{--</div>--}}
    <!-- /LOADER BARS -->
    </div>
    <!-- /CONTENT GRID -->
@endsection