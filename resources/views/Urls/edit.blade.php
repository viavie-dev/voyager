@extends('voyager::master')

@section('content')

    <h1 class="page-title">
        <i class="icon voyager-paperclip"></i> URL edit
    </h1>

    @if($errors->any())
        <div class="alert alert-danger">Some errors persist...</div>
    @endif

    <div class="card">
        <form action="{{ route('updateurl') }}" autocomplete="off" method="post" class="form-horizontal">
            <div class="card-body">
                @csrf
                <input type="hidden" name="id" value="{{ $url->id }}">

                <div class="form-group row">
                    <label for="url" class="col-sm-2 col-form-label">Url</label>
                    <div class="col-sm-10">
                        <input id="url" name="url" type="text" class="form-control"
                               value="{{ old('url') ?? $url->url }}" placeholder="Url">
                        @if ($errors->has('url'))
                            <span class="help-block">
                                    <strong>{!! $errors->first('url') !!}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea id="description" name="description" class="form-control text-monospace"
                                  placeholder="Description">{{ old('description') ?? $url->description }}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                    <strong>{!! $errors->first('description') !!}</strong>
                                </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <a href="{{ route('listurls') }}" class="btn btn-primary"><i class="voyager-angle-left"></i>&nbsp;Cancel</a>&nbsp;
                <button type="submit" class="btn btn-primary float-right"><i class="voyager-data"></i>&nbsp;Update
                </button>
            </div>

        </form>

    </div>

@endsection


@section('javascript')

@endsection
