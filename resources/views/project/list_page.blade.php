@extends('layout.base_layout')

@section('content')
    <div class="col">

        <div class="border-bottom my-3">
            <h3 class="page_title">
                Projects
                <a  href="{{route("project_create_page")}}" >
                    <button type="button" class="btn btn-primary"> <i class="bi bi-plus-lg"></i> Create new project</button>
                </a>
            </h3>
        </div>

        @foreach($projects as $project)
            <div class="card mb-2 shadow-sm">
                <div class="card-body">

                    <div>
                        <a class="card-title fs-2" href="{{route("project_show_page", $project->id)}}">{{$project->title}}</a>
                    </div>

                    <div>
                        <span class="text-muted"> {{$project->description}} </span>
                    </div>

                    <div class="d-flex justify-content-between border-top mt-2" >
                        <span class="text-muted align-self-end pt-2">
                                <b>{{$project->suitesCount()}}</b> Test Suites
                                | <b>{{$project->casesCount()}}</b> Test Cases
{{--                                | <b>{{$project->automatedCasesCount()}}</b> automated--}}
                        </span>
                    </div>

                </div>
            </div>

        @endforeach


    </div>





@endsection
