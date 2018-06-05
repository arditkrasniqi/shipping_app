@include('inc.header')
<div class="col-12 col-sm-6 col-md-5">
    <form action="{{route('password-setup')}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="name" value="{{$tmp_name}}">
        <input type="hidden" name="email" value="{{$tmp_email}}">
        <input type="hidden" name="personalNumber" value="{{$tmp_personalNumber}}">
        <input type="hidden" name="roleId" value="{{$tmp_roleId}}">
        <div class="form-group">
            <label for="">Choose your Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <label for="">&nbsp;</label>
            <input type="submit" value="Save" class="btn btn-primary">
        </div>
    </form>
</div>
@include('inc.footer')