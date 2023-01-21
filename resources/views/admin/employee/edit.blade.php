@extends('admin.layouts.app')

@section('content')
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Company</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('employees.index') }}" enctype="multipart/form-data"> Back</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('employees.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>employee Name:</strong>
                            <input type="text" name="name" value="{{ $employee->name }}" class="form-control" placeholder="employee name">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>employee Email:</strong>
                            <input type="email" name="email" class="form-control" placeholder="employee Email" value="{{ $employee->email }}">
                            @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>employee phone:</strong>
                            <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control" placeholder="employee phone">
                            @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Company name:</strong>
                            <select name="company_id" id="company_id">
                                @foreach($companies as $company )
                                    <option value="{{$company->id}}" @if($company->id == $employee->company_id) selected @endif>{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </form>
        </div>
    </body>
@endsection

