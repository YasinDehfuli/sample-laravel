@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            User
        </h1>
        @include('component.err')
        <form class="" method="post"
              enctype="multipart/form-data"
              @if(isset($user))
              action="{{route('user.update',$user->id)}}"
              @else
              action="{{route('user.store')}}"
            @endif>
            @csrf

            <div class="row">
                <div class="col-md-3 mt-3">
                    <div class="form-group">
                        <label for="name">
                            {{__('Name')}}
                        </label>
                        <input name="name" type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="{{__('Name')}}" value="{{old('name',$user->name??null)}}"
                        />
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="form-group">
                        <label for="email">
                            {{__('Email address')}}
                        </label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               placeholder="{{__('Email address')}}" value="{{old('email',$user->email??null)}}"/>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="form-group">
                        <label for="mobile">
                            {{__('Mobile')}}
                        </label>
                        <input name="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror"
                               placeholder="{{__('Mobile')}}" value="{{old('mobile',$user->mobile??null)}}"/>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="form-group">
                        <label for="credit">
                            {{__('Credit')}}
                        </label>
                        <input name="credit" type="text"
                               class="currency form-control @error('credit') is-invalid @enderror"
                               placeholder="{{__('Credit')}}" value="{{old('credit',$user->credit??null)}}"/>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="form-group">
                        <label for="credit">
                            {{__('Date of born')}}
                        </label>
                        <datepicker xname="dob" xplaceholder="{{__('Date of born')}}"></datepicker>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="form-group">
                        <label for="password">
                            {{__('Password')}}
                        </label>
                        <input name="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="{{__('Password')}}" value="{{old('password')}}"/>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="form-group">
                        <label for="password_confirm">
                            {{__('Password confirm')}}
                        </label>
                        <input name="password_confirmation" type="password"
                               class="form-control @error('password_confirm') is-invalid @enderror"
                               placeholder="{{__('Password confirm')}}" value="{{old('password_confirm')}}"/>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="form-group">
                        <label for="avatar">
                            {{__('Avatar')}}
                        </label>
                        <input name="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror"
                               placeholder="{{__('Avatar')}}"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <label> &nbsp; </label>
                    <input name="" type="submit" class="btn btn-primary mt-2" value="{{__('Save')}}"/>
                </div>
            </div>
        </form>
        @if(isset($user))
            @foreach($user->getMedia() as $media)
                <img src="{{$media->getUrl('thumb800')}}" width="256" alt="">
            @endforeach
        @endif

    </div>
@endsection
