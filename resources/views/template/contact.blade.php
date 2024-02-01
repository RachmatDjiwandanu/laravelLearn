@extends('layouts.main')
<title>TPG2 | {{ $title }}</title>
@section('content')
    
<section class="page-section" id="contact">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Contact Me</h2>
                <hr class="divider" />
                <p class="text-muted mb-5">Ada kendala/masalah? Kirimi kami pesan dan kami akan menghubungi Anda sesegera mungkin!</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="/contact" method="post">
                   @csrf
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea name="message" id="message" class="form-control" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                        <label for="message">Message</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                    
                    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Submit</button></div>
                </form>
            </div>
        </div>
        
        @foreach ($items as $item)
        <div class="card w-75 mb-3">
            <div class="card-body">
              <h5 class="card-title">Isi Pedas</h5>
              
              <p class="card-text">{{ $item->message }}</p>
             
            
              <a href="{{ route('template.edit',$item) }}"  class="btn btn-primary">Edit</a>
            </div>
          </div>
          @endforeach

        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-4 text-center mb-5 mb-lg-0">
                <i class="bi-telephone fs-2 mb-3 text-muted"></i>
                <div> (021) 8894749</div>
            </div>
        </div>
    </div>
</section>
@endsection