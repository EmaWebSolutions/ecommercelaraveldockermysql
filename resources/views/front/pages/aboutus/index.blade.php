@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')
    <!-- breadcrumb area start here  -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-wrap text-center">
                <h2 class="page-title">{{ __('About Us') }}</h2>
                <ul class="breadcrumb-pages">
                    <li class="page-item"><a class="page-item-link" href="{{ route('front') }}">{{ __('Home') }}</a></li>
                    <li class="page-item">{{ __('About Us') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end here  -->

    <!-- about us area start here  -->
    <div class="about-us-area section">
        <div class="container">
            <div class="row align-items-lg-center">
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="about-us-image">
                        <img src="{{ asset(aboutUsPage() . siteContentAboutPage('about_us')->Image) }}"
                            alt="{{ __('about us image') }}" />
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="about-us-content">
                        <div class="section-header-area">
                            <h3 class="sub-title">
                                {{ langConverter(siteContentAboutPage('about_us')->en_Subtitle, siteContentAboutPage('about_us')->fr_Subtitle) }}
                            </h3>
                            <h2 class="section-title">{!! langConverter(
                                siteContentAboutPage('about_us')->en_Title_One,
                                siteContentAboutPage('about_us')->fr_Title_One,
                            ) !!}</h2>
                    </div>
                        {!! langConverter(
                            siteContentAboutPage('about_us')->en_Description_One,
                            siteContentAboutPage('about_us')->fr_Description_One,
                        ) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about us area end here  -->


    <!-- Our Features area start here  -->
    <div class="our-features-area section-top pb-100">
        <div class="container">
            <div class="section-header-area text-center">
                <h3 class="sub-title">
                    {!! siteContentAboutPage('features')->en_Title !!}
                </h3>
                <h2 class="section-title">
                    {!! siteContentAboutPage('features')->en_Subtitle !!}
                </h2>
            </div>
            <div class="row our-features-area-wrap">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-features text-center">
                        <div class="features-icon">
                            <img src="{{ asset(aboutUsPage() . siteContentAboutPage('features')->Icon_One) }}"
                                alt="{{ __('features-icon') }}" />
                        </div>
                        <h3 class="features-title">
                            {!! langConverter(
                                siteContentAboutPage('features')->en_Title_One,
                                siteContentAboutPage('features')->fr_Title_One,
                            ) !!}
                        </h3>
                        <p class="features-content">
                            {!! langConverter(
                                siteContentAboutPage('features')->en_Description_One,
                                siteContentAboutPage('features')->fr_Description_One,
                            ) !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-features text-center">
                        <div class="features-icon">
                            <img src="{{ asset(aboutUsPage() . siteContentAboutPage('features')->Icon_Two) }}"
                                alt="{{ __('features-icon') }}" />
                        </div>
                        <h3 class="features-title">
                            {!! langConverter(
                                siteContentAboutPage('features')->en_Title_Two,
                                siteContentAboutPage('features')->fr_Title_Two,
                            ) !!}
                        </h3>
                        <p class="features-content">
                            {!! langConverter(
                                siteContentAboutPage('features')->en_Description_Two,
                                siteContentAboutPage('features')->fr_Description_Two,
                            ) !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-features text-center">
                        <div class="features-icon">
                            <img src="{{ asset(aboutUsPage() . siteContentAboutPage('features')->Icon_Three) }}"
                                alt="{{ __('features-icon') }}" />
                        </div>
                        <h3 class="features-title">
                            {!! langConverter(
                                siteContentAboutPage('features')->en_Title_Three,
                                siteContentAboutPage('features')->fr_Title_Four,
                            ) !!}
                        </h3>
                        <p class="features-content">
                            {!! langConverter(
                                siteContentAboutPage('features')->en_Description_Three,
                                siteContentAboutPage('features')->fr_Description_Three,
                            ) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Features area end here  -->

   

@endsection
