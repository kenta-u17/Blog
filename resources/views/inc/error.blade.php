@if($errors->any())
  <ul style="color: red">
  @foreach($errors->all() as $error)
      <li class="error_message">{{ $error }}</li>
  @endforeach
  </ul>
@endif
