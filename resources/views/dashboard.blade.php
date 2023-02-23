<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Sn</td>
                                <td>title</td>
                                <td>Author</td>
                                <td>Created On</td>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->user->name }}</td>
                                <td>{{ $blog->created_at->format('d M Y') }}</td>
                                <th>
                                    <a href="{{ route('blog.edit', $blog->id)}}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                                    <a href="{{ route('blog.destroy', $blog->id)}}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete{{$blog->id}}').submit()"><i class="fas fa-trash-alt"></i> Delete</a>
                                    <form action="{{ route('blog.destroy', $blog->id)}}" method="post" id="delete{{$blog->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
