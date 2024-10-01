@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <button type="button" class="btn btn-info btn-sm px-2">
                            <a class="dropdown-item" href="{{ route('tags.create') }}">
                                Add Tags
                            </a>
                        </button>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 ">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Tag Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td>{{ $tag->name }}</td>

                                            <td>
                                                <button type="button" class="btn btn-success btn-sm px-2">
                                                    <a class="dropdown-item" href="{{ route('tags.edit', $tag->id) }}">
                                                        Edit
                                                    </a>
                                                </button>
                                                <form method="POST" action="{{ route('tags.destroy', $tag->id) }}"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm px-2"
                                                        onclick="return confirm('Are you sure you want to delete this tag?');">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
