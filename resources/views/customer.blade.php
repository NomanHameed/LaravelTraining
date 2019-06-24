@extends('layout')
@section('title')
    Customer List
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Customer List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="customer" method="POST" class="pb-3">
                <div class="form-group pb-2">
                    <label>Name: </label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    <div>{{ $errors->first('name') }}</div>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    <div>{{ $errors->first('email') }}</div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="active" id="active">
                        <option value="" disabled>Select an Option</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>


                <br>
                <button type="submit" class="btn btn-primary">Save</button>
                @csrf
            </form>
        </div>
    </div>
        <hr>

            <div class="row">
                <div class="col-6">
                    <h3>Active Customers</h3>
                    <ul>
                        @foreach($activeCustomer as $active)
                            <li>
                                {{ 'Name: '. $active->name . ' Email: '. $active->email }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-6">
                    <h3>Inactive Customers</h3>
                    <ul>
                        @foreach($inactiveCustomer as $inactive)
                            <li>
                                {{ 'Name: '. $inactive->name . ' Email: '. $inactive->email }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

    @endsection()