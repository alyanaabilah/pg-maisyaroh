@extends('layouts.admin')


@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Kupon</h2>
        </div>
        <div class="card-body">
            <form action="/admin/coupon/{{$coupon->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="coupon_code">Kode</label>
                    <input type="text" value="{{ $coupon->coupon_code }}" class="form-control @error('coupon_code') is-invalid @enderror" code="coupon_code" id="coupon_code" aria-describedby="coupon_code" placeholder="Kupon" value="{{old ('coupon_code')}}">
                    @error('coupon_code')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="coupon_name">Kupon</label>
                    <input type="text" value="{{ $coupon->coupon_name }}" class="form-control @error('coupon_name') is-invalid @enderror" required name="coupon_name" id="coupon_name" aria-describedby="coupon_name" placeholder="Kupon" value="{{old ('coupon_name')}}">
                    @error('coupon_name')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Tipe">Tipe</label>
                    <select class="form-control" name="coupon_type" id="coupon_type">
                        @if(old('coupon_id', $coupon->coupon_id)== $coupon->id)
                        <option value="{{$coupon->id}}" selected>{{$coupon->coupon_type}}</option>
                        @else
                        <option value="1">Diskon</option>
                        <option value="2">Subsidi</option>
                        @endif
                    </select>
                    @error('Tipe')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="coupon_price">Harga Subsidi</label>
                    <input type="text" value="{{ $coupon->coupon_price }}" class="form-control @error('coupon_price') is-invalid @enderror" required name="coupon_price" id="coupon_price" aria-describedby="coupon_price" placeholder="Harga Subsidi" value="{{old ('coupon_price')}}">
                    @error('coupon_price')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="start_datetime">Waktu Mulai</label>
                    <input type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime($coupon->start_datetime)) }}" class="form-control @error('start_datetime') is-invalid @enderror" required name="start_datetime" id="start_datetime" aria-describedby="start_datetime" placeholder="Waktu Mulai" value="{{old ('start_datetime')}}">
                    @error('start_datetime')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="end_datetime">Waktu Berakhir</label>
                    <input type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime($coupon->end_datetime)) }}" class="form-control @error('end_datetime') is-invalid @enderror" required name="end_datetime" id="end_datetime" aria-describedby="end_datetime" placeholder="Waktu Berakhir" value="{{old ('end_datetime')}}">
                    @error('end_datetime')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="radio" name="status">
                    @error('status')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
            </form>
        </div>
    </div>
</div>




@endsection