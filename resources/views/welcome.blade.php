@extends('layouts.app')

@section('content')
<div class="firstContent">


<div  class="booking">
    <x-booking></x-booking>
    <div class="text-center pt-5 text-muted">

       <span class="text-muted"  data-toggle="tooltip" data-placement="top"  title="Scroll down">
            <span>KNOW MORE ABOUT US</span> <br>
  <i class="fa fa-chevron-down animate__animated animate__heartBeat animate__slower animate__infinite	infinite" aria-hidden="true"></i>

       </span>
</div>
</div>
</div>

<div class="secondContent">
    <div class="content">
        <h2 >Lorem ipsum, dolor sit amet consectetur </h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid illum quaerat, quam sapiente fugit expedita maiores sed deserunt dolorem dicta perspiciatis pariatur odio magni et, saepe eius cum amet quis reiciendis ut, officia a! Distinctio molestias nisi repellat necessitatibus libero.</p>

        <div class="buttons">
             <button type="button" class="btn btn-outline-dark ">Our Appartments</button>

        </div>
    </div>

 <x-mini></x-mini>
</div>

<div class="thirdContent">
    <div class="content">
        <h2 class="mb-5">ROOMS</h2>
        <div class="row mb-5">
            <div class="col-xs-12 col-sm-6  border">

            </div>
             <div class="col-xs-12 col-sm-6 p-5 text-left border">
                  <h3 class="app_head">Standard Apartment</h3>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, hic? Commodi, nulla. Hic voluptas illo quisquam praesentium vero fugit cumque eveniet similique quasi, cupiditate odio distinctio neque natus fugiat, veniam mollitia recusandae porro. Sequi, quod accusamus numquam hic dicta culpa!</p>
                    <button type="button" class="btn btn-outline-dark"> Book room</button>
            </div>
        </div>

         <div class="row mb-5">
               <div class="col-xs-12 col-sm-6 p-5 text-left border">
                    <h3 class="app_head">Executive Apartment</h3>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, hic? Commodi, nulla. Hic voluptas illo quisquam praesentium vero fugit cumque eveniet similique quasi, cupiditate odio distinctio neque natus fugiat, veniam mollitia recusandae porro. Sequi, quod accusamus numquam hic dicta culpa!</p>
                    <button type="button" class="btn btn-outline-dark"> Book room</button>
            </div>
            <div class="col-xs-12 col-sm-6  border">

            </div>

        </div>

         <div class="row mb-5">
            <div class="col-xs-12 col-sm-6  border">

            </div>
             <div class="col-xs-12 col-sm-6 p-5 text-left border">
                 <h3 class="app_head">Luxury Apartment</h3>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, hic? Commodi, nulla. Hic voluptas illo quisquam praesentium vero fugit cumque eveniet similique quasi, cupiditate odio distinctio neque natus fugiat, veniam mollitia recusandae porro. Sequi, quod accusamus numquam hic dicta culpa!</p>
                    <button type="button" class="btn btn-outline-dark"> Book room</button>
            </div>
        </div>
    </div>
</div>
<div class="fourthContent">
    <div class="content">
          <div class="row mb-5">
            <div class="col-xs-12 col-sm-4  text-center">
                    <div class="rounded-circle border p-5 about_image">

                    </div>
            </div>
             <div class="col-xs-12 col-sm-8  text-center ">
                  <h3 class="app_head">What we are about</h3>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, hic? Commodi, nulla. Hic voluptas illo quisquam praesentium vero fugit cumque eveniet similique quasi, cupiditate odio distinctio neque natus fugiat, veniam mollitia recusandae porro. Sequi, quod accusamus numquam hic dicta culpa!</p>
                    <button type="button" class="btn btn-outline-dark"> Know more <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="fifthContent">
    <div class="content">
        <h2 class="mb-5">GALLERY</h2>
        <div class="row mb-5">
            <div class="col-xs-12 col-sm-3  border" style="height: 400px">

            </div>
             <div class="col-xs-12 col-sm-3  border">

            </div>
             <div class="col-xs-12 col-sm-3  border">

            </div>
             <div class="col-xs-12 col-sm-3  border">

            </div>

        </div>


    </div>
</div>
@endsection
