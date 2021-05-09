@extends('backend.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.partials.messages')
            <div class="card p-5">
                <div class="card-header">
                    Edit District
                </div>
                <div class="card-body">
                  <form action="{{ route('admin.district.update', $district->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label for="name" class="form-label">District Name</label>
                          <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $district->name }}">
                      </div>

                      <div class="mb-3">
                          <label for="division_id" class="form-label">Select a Division</label>
                          <select class="form-control" name="division_id">
                            <option value="">Please select a division for the district</option>
                              @foreach ($divisions as $division)
                                  <option value="{{ $division->id }}" {{ $district->division->id === $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
                              @endforeach
                          </select>
                      </div>

                      <button type="submit" class="btn btn-primary">Update District</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection
