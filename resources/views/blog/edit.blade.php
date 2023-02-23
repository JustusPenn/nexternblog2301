<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modify '. $blog->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                <form action="{{ route('blog.update', $blog->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <input type="text"
                        class="form-control" name="title" id="title" aria-describedby="titleId" value="{{ $blog->title }}" placeholder="Enter Title">
                        @error('title')
                            <small id="titleId" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Choose Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Select Cover Image" aria-describedby="ImageHelpId">
                        @error('image')
                            <div id="ImageHelpId" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5">{{ $blog->description }}</textarea>
                        @error('description')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 text-end">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
