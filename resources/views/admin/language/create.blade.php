@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Language</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Language</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.language.store') }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label for="">Language</label>
                        <select name="lang" id="language-select" class="form-control select2">
                            <option value=""> --select-- </option>
                            @foreach (config('language') as $key => $lang)
                                <option value="{{ $key }}">{{ $lang['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input readonly type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="">Slug</label>
                        <input readonly type="text" class="form-control" id="slug" name="slug">
                    </div>

                    <div class="form-group">
                        <label for="">Is it default?</label>
                        <select name="default" id="" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="language-select" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>

                </form>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#language-select').on('change', function(){
                let value = $(this).val();
                let name = $(this).children(':selected').text();
                $('#slug').val(value);
                $('#name').val(name);
            })
        });
    </script>
@endpush
