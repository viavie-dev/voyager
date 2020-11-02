@extends('voyager::master')

@section('content')
    <h1 class="page-title">
        <i class="icon voyager-paperclip"></i> Create a new URL
    </h1>
    <div class="card">
        <form action="{{ route('createurl') }}" method="post" class="form-horizontal">
            <div class="card-body">
                @csrf
                <div class="form-group row">
                    <label for="url" class="col-sm-2 col-form-label">Url</label>
                    <div class="col-sm-10">
                        <input id="url" name="url" type="text" value="{{ old('url') }}" class="form-control" placeholder="Url">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea id="description" name="description" class="form-control text-monospace" placeholder="Description">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer p-5">
                <a href="{{ route('listurls') }}" class="btn btn-primary"><i class="voyager-angle-left"></i>&nbsp;Cancel</a>&nbsp;
                <button type="submit" class="btn btn-primary float-right"><i class="voyager-data"></i>&nbsp;Save</button>
            </div>
        </form>
    </div>
@endsection
