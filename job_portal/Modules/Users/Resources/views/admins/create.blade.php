@extends('layouts.master', ['title' => 'Admins'])
@section('content')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Categories</h2>
                <ul class="breadcrumb padding-0">
                    <li class="breadcrumb-item"><a href="{{route('admins.index')}}">Admins list</a></li>
                    <li class="breadcrumb-item active">Add new admin</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form action="{{route('admins.store')}}" id="form_advanced_validation" method="POST" enctype="multipart/form-data">
                @csrf
                @component('components.input',['label' => 'Name', 'type'  => 'text','name'  => 'name'])@endcomponent
                @component('components.input',['label' => 'Email address', 'type'  => 'email','name'  => 'email'])@endcomponent
                @component('components.file_input',['label' => 'Profile image ','name'  => 'profile_image_file','accept'=>'image/*'])@endcomponent
                @component('components.select',['label' => 'Role', 'name'=> 'role_id', 'classes' => 'select2'])
                    @slot('options')
                        @foreach($roles as $r)
                            <option value="{{$r->id}}">{{$r->name}}</option>
                        @endforeach
                    @endslot
                @endcomponent
                @component('components.input',['label' => 'Password', 'type' => 'password','name'  => 'password'])@endcomponent
                @component('components.input',['label' => 'Confirm password', 'type' => 'password','name' => 'password_confirmation'])@endcomponent
                <button class="btn btn-raised btn-primary btn-round waves-effect submitBtn" type="submit" id="submit-all">SUBMIT</button>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(e){
            // Submit form data via Ajax
            $("#form_advanced_validation").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        $('.submitBtn').attr("disabled","disabled");
                        $('#form_advanced_validation').css("opacity",".5");
                    },
                    success: function(response){ //console.log(response);
                        $('#form_advanced_validation').css("opacity","");
                        $(".submitBtn").removeAttr("disabled");
                        $(".has-error").text("");

                        if(response.errors){
                            $.each(response.errors, function( index, value ) {
                                $('#' + index).after(`<span class="has-error text-danger mt-1">${value}</span>`);
                            });
                        }
                        if(response.success){
                            location.href = response.url
                        }
                    }
                });
            });
        });
    </script>
@endpush
