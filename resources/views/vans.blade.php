@extends('layouts.layout')

@section('title')
    <title>Vans | Admin Portal</title>
@endsection

@section('drivers')
    active
@endsection

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main">
        <!-- Content -->
        <livewire:vans/>
        <!-- End Content -->

        @include('layouts.includes.footer')

    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
