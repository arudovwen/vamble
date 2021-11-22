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
                    <p>From our luxury well equipped suites to our well furnished kitchen and safe environment, here is a list of services we offer that will make your stay at Vamble Appartment & Suites a wonderful one.</p>


                </div>
            </div>
            <div class="row m-0 mb-sm-5">
                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <h3 class="mb-4" style="letter-spacing: .4rem">Excellent & Secured Environment</h3>
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
                    <img src="{{ asset('/images/vamb-img/banner3.jpg') }}" class="w-100 h-100 " alt="vamble building">
                </div>
                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <h3 class="mb-4" style="letter-spacing: .4rem">Well Furnished Apartments</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit molestias laboriosam asperiores qui
                        animi numquam. Numquam exercitationem vitae maiores perferendis natus dolorem beatae est! Cumque
                        expedita sint corrupti nihil at obcaecati nulla delectus reprehenderit commodi! Omnis eaque non
                        culpa voluptatum molestiae enim commodi molestias, quaerat neque nihil voluptate sapiente ipsam,
                        veniam in ea quasi rem nostrum unde atque voluptates porro? Accusantium quae quis dolorem aperiam
                        veritatis ipsam deserunt! Ducimus, quo?</p>
                </div>
            </div>
            <div class="row  m-0 mb-sm-5">
                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <h3 class="mb-4" style="letter-spacing: .4rem">Well Furnished Bedrooms</h3>
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

            <div class="row m-0 mb-sm-5 flex-column-reverse flex-sm-row">
                <div class="col-sm-6 px-0 service_img">
                    <img src="{{ asset('/images/vamb-img/kitchen.jpg') }}" class="w-100 h-100 " alt="vamble building">
                </div>
                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <h3 class="mb-4" style="letter-spacing: .4rem">Fully Furnished Kitchen</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit molestias laboriosam asperiores qui
                        animi numquam. Numquam exercitationem vitae maiores perferendis natus dolorem beatae est! Cumque
                        expedita sint corrupti nihil at obcaecati nulla delectus reprehenderit commodi! Omnis eaque non
                        culpa voluptatum molestiae enim commodi molestias, quaerat neque nihil voluptate sapiente ipsam,
                        veniam in ea quasi rem nostrum unde atque voluptates porro? Accusantium quae quis dolorem aperiam
                        veritatis ipsam deserunt! Ducimus, quo?</p>
                </div>
            </div>



        </div>
    </div>
@endsection
