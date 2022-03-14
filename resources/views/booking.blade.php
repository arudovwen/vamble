@extends('layouts.app')
@section('title', ' Book Your Stay')
@section('description', 'Book your stay at Vamble apartments and suites')
@section('keywords',
    'Vamble Apartments,Vamble , Apartments, Hotels, Suites,Bookings, Online
    Apartments, Abuja, Abuja-Hotels,FCT-Hotels, Abuja-Apartments,Abuja-Stay,Home,Places,Jahi, Serviced Apartments Abuja',)
@section('script_java')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://vambleapartments.com/booking"
            },
            "headline": "Services Vamble Apartments and Suites",
            "image": [
                "https://vambleapartments.com/images/rooms/living2.jpg",
                "https://vambleapartments.com/images/rooms/bed1.jpg",
                "https://vambleapartments.com/images/rooms/sitting13.jpg",
            ],
            "datePublished": "2022-01-05T08:00:00+08:00",
            "dateModified": "2022-01-05T09:20:00+08:00",
            "author": {
                "@type": "Person",
                "name": "Success Ahon",
                "url": "https://arudovwen.me"
            },
            "publisher": {
                "@type": "Organization",
                "name": "Vamble Apartments and Suites",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://vambleapartments.com/logo.png"
                }
            }
        } {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "https://vambleapartments.com"
            }, {
                "@type": "ListItem",
                "position": 2,
                "name": "Booking",
                "item": "https://vambleapartments.com/booking"
            }]
        }
    </script>
@endsection

@section('content')
    {{ Breadcrumbs::render('booking') }}
    <div style="min-height: 50vh">
        <booking-page></booking-page>
    </div>


@endsection
