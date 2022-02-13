@props([
   'message' => '選択して下さい',
   'default',
])

@php
$prefs = ['佐賀県','長崎県','福岡県','大分県','熊本県']
@endphp

<select {{ $attributes->merge(['name' => 'pref','class' => 'aa'])}} >
   <option value="">{{ $message }}</option>
   @foreach ($prefs as $pref)
   <option value="{{ $pref }}" {{ $pref === $default ? 'selected' : '' }} >{{ $pref }}</option>
   @endforeach
</select>