@extends('layout.base_layout')

@section('content')

    @include('layout.sidebar_nav')

    <div class="col">

        <div class="d-flex justify-content-between border-bottom my-3">

            <h3 class="page_title">
                {{$repository->title}}
                <i class="bi bi-arrow-right-short text-muted"></i>
                Edit Repository
            </h3>

            <div>
                <form method="POST" action="{{route("repository_delete")}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$repository->id}}">
                    <input type="hidden" name="project_id" value="{{$repository->project_id}}">

                    <button type="submit" class="btn btn-sm  btn-danger">
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
            <form  method="POST" action="{{route('repository_update')}}">
                @csrf

                <input type="hidden" name="id" value="{{$repository->id}}">
                <input type="hidden" name="project_id" value="{{$repository->project_id}}">

                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input type="text" class="form-control" name="title" required maxlength="100" value="{{$repository->title}}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" maxlength="255">{{$repository->description}}</textarea>
                </div>

                <button type="submit" class="btn btn-warning px-5">
                    <b>Update</b>
                </button>
            </form>
        </div>


    </div>



@endsection

