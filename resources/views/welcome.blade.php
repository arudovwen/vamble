@extends('layouts.app')

@section('content')

<div class="firstContent">
 <div id="bannerId" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
         <li data-target="#bannerId" data-slide-to="0" class="active"></li>
         <li data-target="#bannerId" data-slide-to="1"></li>
         <li data-target="#bannerId" data-slide-to="2"></li>
     </ol>
     <div class="carousel-inner" role="listbox">
         <div class="carousel-item landing-item active bg-danger">
             <img data-src="holder.js/900x500/auto/#777:#555/text:First slide" class="" alt="First slide">
         </div>
         <div class="carousel-item  landing-item bg-info">
             <img data-src="holder.js/900x500/auto/#666:#444/text:Second slide" alt="Second slide">
         </div>
         <div class="carousel-item  landing-item bg-secondary ">
             <img data-src="holder.js/900x500/auto/#666:#444/text:Third slide" alt="Third slide">
         </div>
     </div>
     <a class="carousel-control-prev" href="#bannerId" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
     </a>
     <a class="carousel-control-next" href="#bannerId" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
     </a>
 </div>

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
            <a href="/accomodations"> <button type="button" class="btn btn-outline-dark ">Our Appartments</button></a>

        </div>
    </div>

 <x-mini></x-mini>
</div>

<div class="thirdContent">
    <div class="content">
        <h2 class="mb-5">ROOMS</h2>
        <div class="row mb-5">
            <div class="col-xs-12 col-sm-6  border">
                    <div id="roomId" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#roomId" data-slide-to="0" class="active"></li>
                            <li data-target="#roomId" data-slide-to="1"></li>
                            <li data-target="#roomId" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item room-item active bg-dark">
                                <img data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide">
                            </div>
                            <div class="carousel-item room-item bg-dark">
                                <img data-src="holder.js/900x500/auto/#666:#444/text:Second slide" alt="Second slide">
                            </div>
                            <div class="carousel-item room-item  bg-dark">
                                <img data-src="holder.js/900x500/auto/#666:#444/text:Third slide" alt="Third slide">
                            </div>
                        </div>

                    </div>
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
                    <div id="roomId1" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#roomId1" data-slide-to="0" class="active"></li>
                            <li data-target="#roomId1" data-slide-to="1"></li>
                            <li data-target="#roomId1" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active bg-dark">
                                <img data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide">
                            </div>
                            <div class="carousel-item bg-dark">
                                <img data-src="holder.js/900x500/auto/#666:#444/text:Second slide" alt="Second slide">
                            </div>
                            <div class="carousel-item bg-dark">
                                <img data-src="holder.js/900x500/auto/#666:#444/text:Third slide" alt="Third slide">
                            </div>
                        </div>

                    </div>
            </div>

        </div>

         <div class="row mb-5">
            <div class="col-xs-12 col-sm-6  border">
                    <div id="roomId2" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#roomId2" data-slide-to="0" class="active"></li>
                            <li data-target="#roomId2" data-slide-to="1"></li>
                            <li data-target="#roomId2" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active bg-dark">
                                <img data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide">
                            </div>
                            <div class="carousel-item bg-dark">
                                <img data-src="holder.js/900x500/auto/#666:#444/text:Second slide" alt="Second slide">
                            </div>
                            <div class="carousel-item bg-dark">
                                <img data-src="holder.js/900x500/auto/#666:#444/text:Third slide" alt="Third slide">
                            </div>
                        </div>

                    </div>
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
                   <a href="/about"> <button type="button" class="btn btn-outline-dark"> Know more <i class="fa fa-arrow-right" aria-hidden="true"></i></button></a>
            </div>
        </div>
    </div>
</div>
<div class="fifthContent">
    <div class="content container-fluid">
        <h2 class="mb-5">GALLERY</h2>
       <div>
            <div class="row mb-5">
            <div class="col-xs-3 col-sm-3  border bg-light" style="height: 400px">

            </div>
             <div class="col-xs-12 col-sm-3  border bg-info">

            </div>
             <div class="col-xs-12 col-sm-3  border bg-secondary">

            </div>
             <div class="col-xs-12 col-sm-3  border bg-success">

            </div>

        </div>
       </div>
         <div class="text-center">
             <a href="/gallery"> <button type="button" class="btn btn-outline-dark"> See more <i class="fa fa-arrow-right" aria-hidden="true"></i></button></a>
         </div>


    </div>
</div>

@endsection
