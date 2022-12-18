@if ($message = Session::get('success'))
<div id="flash_alert" class="alert  alert-success alert-block ">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('status'))
<div id="flash_alert" class="alert  alert-info alert-block ">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('message'))
<div id="flash_alert" class="alert  alert-secondary alert-block ">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
  
@if ($message = Session::get('error'))
<div id="flash_alert" class="alert  alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if ($message = Session::get('warning'))
<div id="flash_alert" class="alert  alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if ($message = Session::get('info'))
<div id="flash_alert" class="alert  alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
  
@if ($errors->any())
<div id="flash_alert" class="alert  alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach        
    </ul>
</div>
@endif