@extends('layout.base_layout')

@section('content')

    @include('layout.sidebar_nav')

    {{--    TEST SUITES TREE COLUMN--}}
    <div class="col shadow-sm" style="max-width: 700px">

        {{-- COLUMN header--}}
        <div class="border-bottom mt-2 pb-2 mb-2 d-flex justify-content-between" >
            <span class="fs-5">
                 Test Run  <i class="bi bi-arrow-right-short"></i> {{$testRun->title}}
            </span>

            <a href="{{route('test_run_edit_page', [$testRun->project_id, $testRun->id])}}"
               class="btn btn-sm btn-outline-dark me-1"
               title="Repository Settings">
                <i class="bi bi-gear"></i>
            </a>
        </div>

        <div class="pb-2" id="chart">
            @include('test_run.chart')
        </div>

        <div id="tree">
            @include('test_run.tree')
        </div>

    </div>


    <div class="col" id="test_case_col">

       <h4 class="ms-5 mt-3">
           Select Test Case.
       </h4>

    </div>

@endsection

@section('footer')

    <script src="{{asset('js/test_run.js')}}"></script>

@endsection
