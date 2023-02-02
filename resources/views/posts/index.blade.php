@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h2>Posts</h2>
                    <a href="" class="btn btn-primary ml-auto"><i class="fa fa-plus"></i> Create post</a>
                </div>

                <div class="table-responsive">
                    <table class="table card-table">
                        <thead>
                        <tr>
                            <th>User name</th>
                            <th>Post Title</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                {{ $post->title}}
                                </td>
                                <td>

                                    {{-- @if(auth()->user()->canSendInvoiceEmail())--}}
                                    <a href="{{ route('posts.send_to_email', $post->id) }}" class="btn btn-info btn-sm"><i class="fa fa-mail-bulk"></i></a>
                                    {{--                                    @else--}}
                                    {{--                                        <a href="javascript:void(0)" title="This feature is not active in your plan" class="btn btn-dark btn-sm"><i class="fa fa-mail-bulk"></i></a>--}}
                                    {{--                                    @endif--}}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">
                                <div class="float-right">
                                    {!! $posts->links() !!}
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
