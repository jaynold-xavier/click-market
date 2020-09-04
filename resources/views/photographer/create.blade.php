@extends('skeleton.index')

@section('heading')
        <style>
                small{color:red; font-weight: bolder;}
        </style>
    REGISTER YOURSELF
@endsection

@section('content')
        <div class="container">
                <form action="{{route('photographer.index')}}" method="post" name="frmreg">
                        @csrf
                        <div class="form-group">
                          <label for="name">Name:<span class="required">*</span></label>
                          <input type="text" class="form-control" name="name" value="{{old('name')}}" aria-describedby="namehelpId">
                          <small id="namehelpId" class="form-text">{{$errors->first('name')}}</small>
                        </div>
                        <div class="form-group">
                          <label for="dt">Date of Birth:<span class="required">*</span></label>
                          <input type="date" class="form-control" max="<?php echo(date_format(date_create("1999-12-31"),'Y-m-d')) ?>" value="{{old('dt')}}" name="dt" aria-describedby="dtHelpId">
                          <small id="dtHelpId" class="form-text">{{$errors->first('dt')}}</small>
                        </div>
                        <div class="form-group">
                          <label for="email">Email:<span class="required">*</span></label>
                          <input type="email" class="form-control" name="email" value="{{old('email')}}" aria-describedby="emailHelpId" placeholder="Ex. mathias@gmai.com">
                          <small id="emailHelpId" class="form-text">{{$errors->first('email')}}</small>
                        </div>
                        <div class="form-group">
                          <label for="phone">Mobile No:<span class="required">*</span></label>
                          <input type="tel" class="form-control" name="phone" value="{{old('phone')}}" aria-describedby="phonehelpId" placeholder="Ex. +91 445622349">
                          <small id="phonehelpId" class="form-text">{{$errors->first('email')}}</small>
                        </div>
                        <div class="form-group">
                                <label for="weblink">Webiste Link<span class="required">*</span>:</label>
                                <input type="url" class="form-control" name="weblink" aria-describedby="webhelpId" value="{{old('weblink')}}" placeholder="http://gabmarco.abc.com">
                                <small id="webhelpId" class="form-text">{{$errors->first('weblink')}}</small>
                        </div>
                        <div class="form-group">
                          <label for="avatar">Avatar: </label>
                          <div class="row" id="avaopts">
                                  @for ($i = 0; $i < 7; $i++)
                                        <div class="col">
                                            <img onclick="selectAvatar(this)" src="{{'http://api.adorable.io/avatars/face/' . $i}}" alt="ava0" width="40%">
                                            <small id="avatarhelpId" class="form-text text-muted">SELECTED</small>
                                        </div>
                                  @endfor
                          </div>
                          <input type="hidden" name="avatar" value="{{old('avatar') ? old('avatar') : 'http://api.adorable.io/avatars/face/2'}}">
                          <small id="webhelpId" class="form-text">{{$errors->first('avatar')}}</small>
                        </div>
                        
                        <div style="text-align: center">
                                <button type="submit" class="btn btn-primary" btn-lg btn-block">SUBMIT</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-info" btn-lg btn-block">RESET</button>
                        </div>
                </form>
        </div>
        <script>
                var cols = document.getElementById('avaopts').getElementsByClassName('col');
                var index = String(document.frmreg.avatar.value).slice(-1);     //to get last char avatar hidden field value to solve reloading prob

                //set default style to default onreload value
                cols[parseInt(index)].getElementsByTagName('img')[0].style.border = "3px red solid";
                cols[parseInt(index)].getElementsByTagName('small')[0].style.visibility = "visible";

                function selectAvatar(col) {
                        for (let index = 0; index < cols.length; index++) {
                                if(cols[index].getElementsByTagName('img')[0].src == col.src){
                                        col.style.border = "3px red solid";
                                        cols[index].getElementsByTagName('small')[0].style.visibility = "visible";
                                        document.frmreg.avatar.value = col.src;
                                }else{
                                        cols[index].getElementsByTagName('img')[0].style.border = '';
                                        cols[index].getElementsByTagName('small')[0].style.visibility = "hidden";
                                }
                        }
                }
        </script>
@endsection