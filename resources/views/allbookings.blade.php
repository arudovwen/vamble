@extends('layouts.app')

@section('content')
<div class="allbookings">
  <div class="container py-5 ">
  <h3>Your Bookings</h3>

  <div class="">
   <div class="row justify-content-end">
     <div class="col-sm-6">
        <div class="form-group">
      <label for="">Search booking</label>
      <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="Search Booking #">

    </div>
     </div>
   </div>
  </div>
  <div id="accordianId" role="tablist" aria-multiselectable="true" class="mb-5">
    <div class="card">
      <div class="card-header" role="tab" id="section1HeaderId">
        <h5 class="mb-0">
          <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
              <div class="d-flex justify-content-between">
                 <div> 21/07/2021</div>
                 <div>#48793756 </div>
              </div>

          </a>
        </h5>
      </div>
      <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
        <div class="card-body">
           <div class="mb-4">
              <h6 class="text-center">Your booking details</h6>
              <div>
                <div class="mb-4">
                 <div class="d-flex justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted">ID</span>: #65864868
                  </div>
                    <div class="mb-1">
                    <span class="text-muted">Date</span> :
                    <span>20/2/2021</span>
                  </div>
                 </div>


                 <div class="d-flex justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted">Guest name</span> :
                    <span>John Doe</span>
                  </div>

                  <div class="mb-1">
                    <span class="text-muted">Guest email</span> :
                    <span>Johndoe@gmail.com</span>
                  </div>
                 </div>

                  <div class="mb-1">
                    <span class="text-muted">Apartment type</span> :
                    <span>Standard Apartment</span>
                  </div>

                 <div class="d-flex justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted">Check In Date</span> :
                    <span>20/10/2021</span>
                  </div>
                   <div class="mb-1">
                    <span class="text-muted">Check Out Date</span> :
                 <span>24/10/2021</span>
                  </div>
                 </div>

                  <div class="w-100 d-flex justify-content-between mb-1">
                    <div class="pr-3">
                      <span class="text-muted"> No of Guests</span> :
                      <span>4</span>
                    </div>

                    <div class="mb-1">
                      <span class="text-muted"> No of Nights</span> :
                      <span>4</span>
                    </div>
                  </div>

                <div class="d-flex justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted"> Price per night</span> :
                    <span>150,000 naira</span>
                  </div>

                  <div class="mb-1">
                    <span class="text-muted"> Total price</span> :
                    <span>450,000 naira</span>
                  </div>
                </div>

                 <div class="d-flex  justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted"> Payment type</span> :
                    <span>Online </span>
                  </div>

                  <div class="mb-1">
                    <span class="text-muted"> Payment status</span> :
                    <span>Paid</span>
                  </div>
                 </div>

                  <div class="mb-1">
                    <span class="text-muted"> Amount paid</span> :
                    <span>NGN 0.00 </span>
                  </div>

                </div>
                <div class="d-flex justify-content-between">
                  <div>
                    <button type="button" class="btn btn-primary btn-sm">
                      Make payment
                    </button>
                  </div>
                  <div>
                    <button type="button" class="btn btn-primary btn-sm">
                      Print invoice
                    </button>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
     <div class="card">
      <div class="card-header" role="tab" id="section1HeaderId">
        <h5 class="mb-0">
          <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
              <div class="d-flex justify-content-between">
                 <div> 21/07/2021</div>
                 <div>#48793756 </div>
              </div>

          </a>
        </h5>
      </div>
      <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
        <div class="card-body">
           <div class="mb-4">
              <h6 class="text-center">Your booking details</h6>
              <div>
                <div class="mb-4">
                 <div class="d-flex justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted">ID</span>: #65864868
                  </div>
                    <div class="mb-1">
                    <span class="text-muted">Date</span> :
                    <span>20/2/2021</span>
                  </div>
                 </div>


                 <div class="d-flex justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted">Guest name</span> :
                    <span>John Doe</span>
                  </div>

                  <div class="mb-1">
                    <span class="text-muted">Guest email</span> :
                    <span>Johndoe@gmail.com</span>
                  </div>
                 </div>

                  <div class="mb-1">
                    <span class="text-muted">Apartment type</span> :
                    <span>Standard Apartment</span>
                  </div>

                 <div class="d-flex justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted">Check In Date</span> :
                    <span>20/10/2021</span>
                  </div>
                   <div class="mb-1">
                    <span class="text-muted">Check Out Date</span> :
                 <span>24/10/2021</span>
                  </div>
                 </div>

                  <div class="w-100 d-flex justify-content-between mb-1">
                    <div class="pr-3">
                      <span class="text-muted"> No of Guests</span> :
                      <span>4</span>
                    </div>

                    <div class="mb-1">
                      <span class="text-muted"> No of Nights</span> :
                      <span>4</span>
                    </div>
                  </div>

                <div class="d-flex justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted"> Price per night</span> :
                    <span>150,000 naira</span>
                  </div>

                  <div class="mb-1">
                    <span class="text-muted"> Total price</span> :
                    <span>450,000 naira</span>
                  </div>
                </div>

                 <div class="d-flex  justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted"> Payment type</span> :
                    <span>Online </span>
                  </div>

                  <div class="mb-1">
                    <span class="text-muted"> Payment status</span> :
                    <span>Paid</span>
                  </div>
                 </div>

                  <div class="mb-1">
                    <span class="text-muted"> Amount paid</span> :
                    <span>NGN 0.00 </span>
                  </div>

                </div>
                <div class="d-flex justify-content-between">
                  <div>
                    <button type="button" class="btn btn-primary btn-sm">
                      Make payment
                    </button>
                  </div>
                  <div>
                    <button type="button" class="btn btn-primary btn-sm">
                      Print invoice
                    </button>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
     <div class="card">
      <div class="card-header" role="tab" id="section1HeaderId">
        <h5 class="mb-0">
          <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
              <div class="d-flex justify-content-between">
                 <div> 21/07/2021</div>
                 <div>#48793756 </div>
              </div>

          </a>
        </h5>
      </div>
      <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
        <div class="card-body">
           <div class="mb-4">
              <h6 class="text-center">Your booking details</h6>
              <div>
                <div class="mb-4">
                 <div class="d-flex justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted">ID</span>: #65864868
                  </div>
                    <div class="mb-1">
                    <span class="text-muted">Date</span> :
                    <span>20/2/2021</span>
                  </div>
                 </div>


                 <div class="d-flex justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted">Guest name</span> :
                    <span>John Doe</span>
                  </div>

                  <div class="mb-1">
                    <span class="text-muted">Guest email</span> :
                    <span>Johndoe@gmail.com</span>
                  </div>
                 </div>

                  <div class="mb-1">
                    <span class="text-muted">Apartment type</span> :
                    <span>Standard Apartment</span>
                  </div>

                 <div class="d-flex justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted">Check In Date</span> :
                    <span>20/10/2021</span>
                  </div>
                   <div class="mb-1">
                    <span class="text-muted">Check Out Date</span> :
                 <span>24/10/2021</span>
                  </div>
                 </div>

                  <div class="w-100 d-flex justify-content-between mb-1">
                    <div class="pr-3">
                      <span class="text-muted"> No of Guests</span> :
                      <span>4</span>
                    </div>

                    <div class="mb-1">
                      <span class="text-muted"> No of Nights</span> :
                      <span>4</span>
                    </div>
                  </div>

                <div class="d-flex justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted"> Price per night</span> :
                    <span>150,000 naira</span>
                  </div>

                  <div class="mb-1">
                    <span class="text-muted"> Total price</span> :
                    <span>450,000 naira</span>
                  </div>
                </div>

                 <div class="d-flex  justify-content-between">
                    <div class="mb-1">
                    <span class="text-muted"> Payment type</span> :
                    <span>Online </span>
                  </div>

                  <div class="mb-1">
                    <span class="text-muted"> Payment status</span> :
                    <span>Paid</span>
                  </div>
                 </div>

                  <div class="mb-1">
                    <span class="text-muted"> Amount paid</span> :
                    <span>NGN 0.00 </span>
                  </div>

                </div>
                <div class="d-flex justify-content-between">
                  <div>
                    <button type="button" class="btn btn-primary btn-sm">
                      Make payment
                    </button>
                  </div>
                  <div>
                    <button type="button" class="btn btn-primary btn-sm">
                      Print invoice
                    </button>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

  </div>
 <div class="text-right">
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
 </div>
</div>
</div>
@endsection
