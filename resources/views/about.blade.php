@extends('layouts.app')

@section('content')
    <div class="about_banner_img d-flex justify-content-center align-items-center">
        <h1>About Vamble Apartments & Suites</h1>
    </div>
    {{ Breadcrumbs::render('about') }}
    <div class="about">
        <div class="content py-5">


            <div class="row">
                <div class="col-sm-6 px-0 about_img d-none d-sm-block">
                    <img src="{{ asset('/images/v2.jpg') }}" class="w-100 h-100  " style="object-fit: cover"
                        alt="vamble building">
                </div>
                <div class="col-sm-6 bg-white p-5 text-left">
                    <h3 class=" line_half">About Vamble Apartments & Suites</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit molestias laboriosam asperiores qui
                        animi numquam. Numquam exercitationem vitae maiores perferendis natus dolorem beatae est! Cumque
                        expedita sint corrupti nihil at obcaecati nulla delectus reprehenderit commodi! Omnis eaque non
                        culpa voluptatum molestiae enim commodi molestias, quaerat neque nihil voluptate sapiente ipsam,
                        veniam in ea quasi rem nostrum unde atque voluptates porro? Accusantium quae quis dolorem aperiam
                        veritatis ipsam deserunt! Ducimus, quo?</p>
                </div>
                <div class="col-sm-12 bg-white p-5">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio adipisci ea ab excepturi, aspernatur
                        quo porro error unde. Esse eos beatae quae soluta dolores id nemo aliquam atque rem. Explicabo
                        quibusdam asperiores at a velit pariatur esse, dolorum iure unde?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio adipisci ea ab excepturi, aspernatur
                        quo porro error unde. Esse eos beatae quae soluta dolores id nemo aliquam atque rem. Explicabo
                        quibusdam asperiores at a velit pariatur esse, dolorum iure unde?</p>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        console.log('working now')
    </script>

@endsection
