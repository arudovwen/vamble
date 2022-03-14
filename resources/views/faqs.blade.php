@extends('layouts.app')
@section('title', 'Frequently Asked Questions (FAQS)')
@section('description', 'A list of Frequently Asked Questions')
@section('keywords',
    'FAQS, Frequently Asked Questions,Vamble Apartments,Vamble , Apartments, Hotels, Suites,Bookings, Online
    Apartments, Abuja, Abuja-Hotels,FCT-Hotels, Abuja-Apartments,Abuja-Stay,Home,Places,Jahi, Serviced Apartments Abuja',)
@section('script_head')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [{
                        "@type": "Question",
                        "name": "How much does a room cost?",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": " <p>Our rooms and apartments vary, you can check for the prices on the landing page or contact us via email , chat or by phone. <a href="
                            https: //www.vambleapartments.com">www.vambleapartments.com</a></p>"
                        }
                    }, {
                        "@type": "Question",
                        "name": " Is there a fixed duration for lodging?",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "<p> <
                            strong > < u > No,
                            <
                            /u></strong > You can lodge
                            for as long as you wish to stay. <
                            /p>"
                        }
                    }, {
                        "@type": "Question",
                        "name": "Do i have to pay online
                        before booking my stay ? ",
                        "acceptedAnswer" : {
                            "@type": "Answer",
                            "text": " <p>
                            No,
                            you can call to make your reservations,
                            then proceed to pay at the lodge. <
                            /p>"
                        }
                    }, {
                        "@type": "Question",
                        "name": "When will my credit card be charged?",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "We'll attempt to securely charge your credit card at the point of payment online. If there's a problem, you'll be notified on the spot and prompted to use another card. Once we receive verification of sufficient funds, your payment will be completed and transferred securely to us. Your account will be charged in 24 to 48 hours."
                        }
                    }, {
                        "@type": "Question",
                        "name": " Are there other entertainments around the vicinity?",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "<p>
                            Yes.we are situated at a very nice spot close to various entertainment spots. <
                            /p>"}
                        },
                        {
                            "@type": "Question",
                            "name": " Where can I find the
                            directions to the building ? ",
                            "acceptedAnswer" : {
                                "@type": "Answer",
                                "text": " <p>Our address is located at the top of the our website, <a href="
                                https: //www.vambleapartments.com">www.vambleapartments.com</a> page and on the contact page, you can use google
                                    map to locate us. < /p>"}
                            },
                            {
                                "@type": "Question",
                                "name": "What is the
                                difference between the Standard apartments,
                                the executive apartments and the luxury apartment ",
                                "acceptedAnswer": {
                                    "@type": "Answer",
                                    "text": " <p>
                                    All the aoartments differ in style,
                                    space,
                                    design and construction,
                                    with the platinum room the most expensive,
                                    followed by the executive room and they both include a fully equipped kitchen
                                    .The standard room doesnt include a kitchen. <
                                    /p>"}
                                },
                                {
                                    "@type": "Question",
                                    "name": "Are the rates on
                                    your website per person or per room ? ",
                                    "acceptedAnswer" : {
                                        "@type": "Answer",
                                        "text": "<p>
                                        All rates on the website are per room per stay,
                                        unless stated differently.


                                        <
                                        /p>"}
                                    },
                                    {
                                        "@type": "Question",
                                        "name": " Is breakfast included in
                                        the price ? ",
                                        "acceptedAnswer" : {
                                            "@type": "Answer",
                                            "text": " <p>
                                            We offer free breakfast
                                            for customers <
                                            /p>"}
                                        },
                                        {
                                            "@type": "Question",
                                            "name": "Do you offer
                                            special discounts ? ",
                                            "acceptedAnswer" : {
                                                "@type": "Answer",
                                                "text": "   <p>
                                                We provide the best available rates
                                                for the dates of your stay and we also offer on certain special days,
                                                just follow us on our social media and always check out < a href =
                                                "https://www.vambleapartments.com" > www.vambleapartments.com <
                                                /a> for special deals. <
                                                /p>"}
                                            }
                                        ]
                                    }
    </script>
     <script type="application/ld+json">
        {
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
                "name": "FAQS",
                "item": "https://vambleapartments.com/faqs"
            }]
        }
    </script>
@endsection



@section('content')
    <div class="about_banner_img d-flex flex-column align-items-center justify-content-center align-items-center">
        <h1 class="font-weight-bold ">Frequently Asked Questins</h1>
        <small class="text-white" style="z-index: 2"><i>A home away from home</i></small>
    </div>
    {{ Breadcrumbs::render('faqs') }}
    <div class="faqs">
        <div class="container py-0 py-md-5 ">

            <div>
                <h3 class="text-center mb-4 pb-2 text-primary fw-bold">FAQ</h3>
                <p class="text-center mb-5">
                    Find the answers for the most frequently asked questions below
                </p>

                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-primary"><i class="far fa-paper-plane text-primary pe-2"></i> How much does a
                            room cost?</h6>
                        <p>
                            Our rooms and apartments vary, you can check for the prices on the landing page or contact us
                            via email , chat or by phone. <a
                                href="https://www.vambleapartments.com">www.vambleapartments.com</a>
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-primary"><i class="fas fa-pen-alt text-primary pe-2"></i> Is there a fixed
                            duration for lodging?</h6>
                        <p>
                            <strong><u>No, </u></strong> You can lodge as long as you wish
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-primary"><i class="fas fa-user text-primary pe-2"></i> Do i have to pay online
                            before booking my stay?
                        </h6>
                        <p>
                            No, you can call to make your reservations , then proceed to pay at the lodge.
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-primary"><i class="fas fa-rocket text-primary pe-2"></i> Are there other
                            entertainments around the vicinity?
                        </h6>
                        <p>
                            Yes. we are situated at a very nice spot close to various entertainment spots.
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-primary"><i class="fas fa-home text-primary pe-2"></i> Where can I find the
                            directions to the building?
                        </h6>
                        <p>Our address is located at the top of the our website, <a
                                href="https://www.vambleapartments.com">www.vambleapartments.com</a> page and on the contact
                            page, you can use google
                            map to locate us.</p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-primary"><i class="fas fa-book-open text-primary pe-2"></i>What is the
                            difference between the Standard apartments ,the executive apartments and the platinum apartment
                        </h6>
                        <p>
                            All the aoartments differ in style, space, design and construction, with the platinum room the
                            most expensive , followed by the executive room and they both include a fully equipped kitchen.
                            The standard room doesnt include a kitchen.
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-primary"><i class="far fa-paper-plane text-primary pe-2"></i> Are the rates on
                            your website per person or per room?</h6>
                        <p>
                            All rates on the website are per room per stay, unless stated differently.


                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-primary"><i class="fas fa-pen-alt text-primary pe-2"></i> Do I pay a
                            reservation fee?</h6>
                        <p>
                            No, we will not charge you a reservation fee.
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-primary"><i class="fas fa-user text-primary pe-2"></i> Is breakfast included in
                            the price?
                        </h6>
                        <p>
                            We offer free breakfast for customers
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-primary"><i class="far fa-paper-plane text-primary pe-2"></i>Do you offer
                            special discounts ?</h6>
                        <p>
                            We provide the best available rates for the dates of your stay and we also offer on certain
                            special days, just follow us on our social media and always check out <a
                                href="https://www.vambleapartments.com">www.vambleapartments.com</a> for special deals.
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-primary"><i class="fas fa-pen-alt text-primary pe-2"></i>Where can I find the
                            contact details of the hotel?</h6>
                        <p>
                            You can find our contact details at the top of the landing page or visit the <a
                                href="/contact">contact page</a>

                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-primary"><i class="fas fa-user text-primary pe-2"></i> Are taxes included in
                            the room rates?
                        </h6>
                        <p>
                            Yes they are included in the price.
                        </p>
                    </div>

                </div>
            </div>
            <!--Section: FAQ-->

        </div>
    </div>
@endsection

@section('javascript')
    <script>

    </script>

@endsection
