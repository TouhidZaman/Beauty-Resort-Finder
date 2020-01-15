@extends('layouts.app')
@section('head')
    <title>Welcome to Beauty Resort Finder</title>
    <style type="text/css">
        .card {
            /* Add shadows to create the "card" effect */
            transition: 0.3s;
            padding: 2% 2% 0 2%;
            margin: 0% 0 3% 2%;
            width: 45%;

        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        /* Add some padding inside the card container */
        .container {
            padding: 2px 16px;
        }
        #resort-list{
            padding-left: 7%;
            width: 66%;
            margin-top: -1%;
        }
        #right-menu{

        }
    </style>
@endsection
@section('content')
    @include('inc.allResortList')
@endsection
@section('footer')
    @include('inc.indexFooter')
@endsection
