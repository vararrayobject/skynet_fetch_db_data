{{-- 
/**
 * ==================================================================================================
 * @author Yogesh Gholap
 * @email yagholap@gmail.com
 * @create date 2021-06-29
 * @modify date 2021-06-29
 * @desc [description]
 * ==================================================================================================
 */
--}}

@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="col-12">
        <div class="tab-wrapper">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                @if (isset($post))
                                <h2>Edit Post</h2>
                                @else
                                <h2>Add Post</h2>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (isset($post))
                    {!! Form::model(null, ['method' => 'POST','route' =>  ['posts.update', $post]]) !!}
                    @method('put')
                    @else
                    {!! Form::model(null, ['method' => 'POST','route' =>  ['posts.store']]) !!}
                    @endif
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>User Id:</strong>
                                {!! Form::text('user_id', $post->user_id ?? null, array('placeholder' => 'User Id','class' =>
                                'form-control')) !!}
                            </div>
                            <div class="form-group">
                                <strong>Title:</strong>
                                {!! Form::text('title', $post->title ?? null, array('placeholder' => 'Title','class' =>
                                'form-control')) !!}
                            </div>
                            <div class="form-group">
                                <strong>Body:</strong>
                                {!! Form::text('body', $post->body ?? null, array('placeholder' => 'Body','class' =>
                                'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
                            <button type="submit" class="btn btn-success">{{ isset($post) ? 'Update' : 'Submit' }}</button>
                        </div>
                    </div>
                    <p class="text-center text-primary"><small></small></p>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection