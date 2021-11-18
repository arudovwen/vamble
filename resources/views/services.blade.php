@extends('layouts.app')

@section('content')
    <div class="services ">
        <div class="about_banner_img d-flex justify-content-center align-items-center">
            <h1 class="font-weight-bold">Services We Offer</h1>
        </div>
        {{ Breadcrumbs::render('services') }}
        <div class="content pt-0 py-sm-5">


            <div class="row m-0 mb-sm-5">
                <div class="col-sm-12 bg-white py-5 px-3 px-sm-5 ">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio adipisci ea ab excepturi, aspernatur
                        quo porro error unde. Esse eos beatae quae soluta dolores id nemo aliquam atque rem. Explicabo
                        quibusdam asperiores at a velit pariatur esse, dolorum iure unde?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio adipisci ea ab excepturi, aspernatur
                        quo porro error unde. Esse eos beatae quae soluta dolores id nemo aliquam atque rem. Explicabo
                        quibusdam asperiores at a velit pariatur esse, dolorum iure unde?</p>

                </div>
            </div>
            <div class="row m-0 mb-sm-5">
                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <h3 class="mb-4">Excellent Environment</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit molestias laboriosam asperiores qui
                        animi numquam. Numquam exercitationem vitae maiores perferendis natus dolorem beatae est! Cumque
                        expedita sint corrupti nihil at obcaecati nulla delectus reprehenderit commodi! Omnis eaque non
                        culpa voluptatum molestiae enim commodi molestias, quaerat neque nihil voluptate sapiente ipsam,
                        veniam in ea quasi rem nostrum unde atque voluptates porro? Accusantium quae quis dolorem aperiam
                        veritatis ipsam deserunt! Ducimus, quo?</p>
                </div>
                <div class="col-sm-6 px-0 service_img">
                    <img src="{{ asset('/images/vamb-img/banner.jpg') }}" class="w-100 h-100 " alt="vamble building">
                </div>
            </div>
            <div class="row m-0 mb-sm-5 flex-column-reverse flex-sm-row">
                <div class="col-sm-6 px-0 service_img">
                    <img src="{{ asset('/images/vamb-img/kitchen.jpg') }}" class="w-100 h-100 " alt="vamble building">
                </div>
                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <h3 class="mb-4">Great Kitchen</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit molestias laboriosam asperiores qui
                        animi numquam. Numquam exercitationem vitae maiores perferendis natus dolorem beatae est! Cumque
                        expedita sint corrupti nihil at obcaecati nulla delectus reprehenderit commodi! Omnis eaque non
                        culpa voluptatum molestiae enim commodi molestias, quaerat neque nihil voluptate sapiente ipsam,
                        veniam in ea quasi rem nostrum unde atque voluptates porro? Accusantium quae quis dolorem aperiam
                        veritatis ipsam deserunt! Ducimus, quo?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <h3 class="mb-4">Well Furnished Apartments</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit molestias laboriosam asperiores qui
                        animi numquam. Numquam exercitationem vitae maiores perferendis natus dolorem beatae est! Cumque
                        expedita sint corrupti nihil at obcaecati nulla delectus reprehenderit commodi! Omnis eaque non
                        culpa voluptatum molestiae enim commodi molestias, quaerat neque nihil voluptate sapiente ipsam,
                        veniam in ea quasi rem nostrum unde atque voluptates porro? Accusantium quae quis dolorem aperiam
                        veritatis ipsam deserunt! Ducimus, quo?</p>
                </div>
                <div class="col-sm-6 px-0 service_img">
                    <img src="{{ asset('/images/vamb-img/bedroom.jpg') }}" class="w-100 h-100 " alt="vamble building">
                </div>
            </div>



        </div>
    </div>
@endsection
