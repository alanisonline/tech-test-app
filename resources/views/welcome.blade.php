@extends('layouts.layout')
@section('signup')
<div class="header">
    <span class="title">Get Started</span><span class="note">* denotes a required field</span>
</div>
<form action="store" method="post" onsubmit="showSpinner()" enctype="multipart/form-data">
    @csrf
    <div class="form-input">
        <label for="full_name">What’s your name? *
            <br/>
            <span>Lorem ipsum dolor sit amet, lorem ipsum dolor.</span>
        </label>
        <input type="text" name="full_name" id="full_name" placeholder="Jane Bloggs">
    </div>
    <div class="form-input">
        <label for="email_address">Email address *
            <br/>
            <span>Lorem ipsum dolor sit amet, lorem ipsum dolor.</span>
        </label>
        <input type="email" name="email_address" id="email_address">
    </div>
    <div class="form-input">
        <label for="image_file">Profile photo
            <br/>
            <span>Lorem ipsum dolor sit amet, lorem ipsum dolor.</span>
        </label>
        <input type="file" name="image_file" id="image_file">
    </div>
    <div class="form-input">
        @include('flashes')
        <input type="submit" value="Submit">
    </div>
    <div class="overlay">
        @include('spinner')
    </div>
</form>
@endsection('signup')