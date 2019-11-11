@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Contact Us</div>
                <form action="/contact-us" method="post">
                    @csrf
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" id="fromName" placeholder="Your Name"
                                required>
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" id="email" placeholder="Your Email"
                                required="">
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" class="form-control" id="message" required></textarea>
                        </div>
                        <br>
                        @captcha()
                        <br>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
