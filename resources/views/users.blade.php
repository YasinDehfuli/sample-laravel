@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            Users
            <a href="{{route('user.create')}}" class="btn btn-success float-start">
                New User
            </a>
        </h1>
        @include('component.err')
        <form method="get" action="" class="py-3">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="name" placeholder="{{__("Name")}}"
                    value="{{request()->input('name')}}">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="mobile" placeholder="{{__("Mobile")}}"
                           value="{{request()->input('mobile')}}">
                </div>
                <div class="col">
                    <select name="order" id="sort" class="form-control" >
                        <option value=""> {{__("Sort")}} </option>
                        <option value="idd"> Latest id </option>
                        <option value="id"> newest id </option>
                        <option value="named"> Name z-a </option>
                        <option value="name"> Name a-z  </option>
                    </select>
                </div>
                <div class="col">
                    <button class="btn btn-primary">
                        Search
                    </button>
                </div>
            </div>
        </form>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    name
                </th>
                <th>
                    email
                </th>
                <th>
                    mobile
                </th>
                <th>
                    -
                </th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>
                    {{$user->id}}
                </td>
                <td>
                    @if($user->vip)
                        ⭐
                    @endif
                    {{$user->name}}

                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->mobile}}
                </td>
                <td>
                    <a href="{{route('user.delete',$user->id)}}" class="btn btn-danger ms-2">
                        &times;
                    </a>
                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-secondary">
                        Edit
                    </a>
                </td>
            </tr>
            @endforeach

        </table>

        {{$users->appends(request()->input())->links()}}
    </div>
@endsection
@section('footer')
    <script>
        setTimeout(function () {
            document.querySelector('#sort').value = '{{request()->input('order')}}';
        },100);
    </script>
@endsection
