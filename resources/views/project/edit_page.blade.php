@extends('layout.base_layout')

@section('content')

    @include('layout.sidebar_nav')

<div class="col">
    <div class="d-flex justify-content-between border-bottom my-3">

        <h3 class="page_title"> Edit Project
            <i class="bi bi-arrow-right-short text-muted"></i>
            {{$project->title}}
        </h3>

        <div>
            <form method="POST" action={{route("project_delete")}}>
                @csrf
                <input type="hidden" name="id" value="{{$project->id}}">

                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="bi bi-trash3"></i>
                    Delete
                </button>
            </form>
        </div>

    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4">
        <form action="{{route('project_update')}}" method="POST">

            @csrf
            <input type="hidden" name="id" value="{{$project->id}}">

            <div class="mb-3">
                <label for="title" class="form-label">Project Name</label>
                <input type="text" class="form-control" name="title" required value="{{$project->title}}" maxlength="100">
            </div>

            <div class="mb-3">
                <label for="prefix" class="form-label">Prefix <span>(max: 3)</span></label>
                <input type="text" class="form-control" name="prefix" required value="{{$project->prefix}}"
                       maxlength="3" pattern="[^\s]+" title="please dont use the white space"
                       style="text-transform:uppercase" >
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" maxlength="255"> {{$project->description}} </textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-warning px-5">
                    <b>Update</b>
                </button>
            </div>

        </form>
    </div>
</div>



@endsection

