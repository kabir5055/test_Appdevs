@extends('admin.master')
@section('title')
    Add Product
@endsection
@section('content')

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Todo</h3></div>
                        <div class="card-body">
                            <form action="{{ route('new.todo') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="todo_title" placeholder="Todo Title" />
                                    <label>Todo Title</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                                    <label>Description</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="date" name="date"/>
                                    <label>Date</label>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" name="image" type="file"/>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
