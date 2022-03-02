@if(session('message'))
<div class="login_good">
  <p class="message" style="color:green">{{ session('message')}}</P>
</div>
@endif