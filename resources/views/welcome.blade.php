@extends('layouts.layout')
@section('signup')
<div class="header">
    <span class="title">Get Started</span><span class="note">* denotes a required field</span>
</div>
<form action="store" method="get">
    @csrf
    <div class="form-input">
        <label for="full-name">What’s your name? *
            <br/>
            <span>Lorem ipsum dolor sit amet, lorem ipsum dolor.</span>
        </label>
        <input type="text" name="full-name" id="full-name" placeholder="Jane Bloggs">
    </div>
    <div class="form-input">
        <label for="email">Email address *
            <br/>
            <span>Lorem ipsum dolor sit amet, lorem ipsum dolor.</span>
        </label>
        <input type="email" name="email-address" id="email-address">
    </div>
    <div class="form-input">

        <label for="image-file">Profile photo
            <br/>
            <span>Lorem ipsum dolor sit amet, lorem ipsum dolor.</span>
        </label>
        <input type="file" name="image-file" id="image-file">
    </div>
    <div class="form-input">
        @include('flashes')
        <input type="submit" value="Submit">
    </div>
</form>
@endsection('signup')