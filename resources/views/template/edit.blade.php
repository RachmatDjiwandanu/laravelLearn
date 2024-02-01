@extends('layouts.main')
<title>TPG2 | </title>
@section('content')

    <body class="bg-gradient-primary">

        <section class="vh-100 bg-image"
            style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Edit Message</h2>

                                    <form action="{{ route('template.update', $contact->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Masukkan Konten Post">{{ old('message', $contact->message) }}</textarea>
                                            <label for="message">Message</label>
                                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                        </div>
                                        
                                        <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Submit</button></div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </body>
@endsection
