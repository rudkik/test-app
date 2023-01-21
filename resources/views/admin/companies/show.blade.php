@extends('admin.layouts.app')

@section('content')
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 table-responsive">
                    <strong>Company Logo:</strong>
                    <img src="{{ Storage::url($company->logo) }}" alt=""><br>
                    <strong>Company Name:</strong>
                    <input type="text" name="name" value="{{ $company->name }}" class="form-control" placeholder="Company name" disabled>
                    <strong>Company Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Company Email" value="{{ $company->email }}" disabled>
                    <strong>Company Address:</strong>
                    <input type="text" name="address" value="{{ $company->address }}" class="form-control" placeholder="Company Address" disabled>
                    @php
                        $url = 'https://geocode-maps.yandex.ru/1.x/?apikey=2357d3e5-a50d-4c76-9be3-46b03c7b2ffa&geocode='.urlencode($company->address) ;
                        $results = file_get_contents($url);

                         if(preg_match("#<pos>([0-9\.]*) ([0-9\.]*)</pos>#i", $results, $out)) {

                        $lng=floatval(trim($out[1]));
                        $lat=floatval(trim($out[2]));
                        $img = '<img alt="" border="0" hspace="10" align="" valign="" src="https://static-maps.yandex.ru/1.x/?ll='. $lng . ','. $lat .'&spn=0.016457,0.00619&l=map">';
                        }
                    @endphp
                    @if(!empty($img))
                    {!! $img !!}
                    @endif
                    <br>
                    <strong>Company Employees:</strong>
                    @foreach($employees as $employee)
                        <div class="card">
                            <h1>Name: {{ $employee->name }}</h1>
                            <h2>Email: {{ $employee->email }}</h2>
                            <h3>Phone: {{ $employee->phone }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
@endsection


