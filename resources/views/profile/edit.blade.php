@extends('../layouts.layout')

@section('content')
<div class="py-12">
  <div class="col-12">
    @include('profile.partials.update-profile-information-form')
  </div>
  <div class="mt-3 col-12">
    @include('profile.partials.update-password-form')
  </div>
</div>
@endsection
@section('scripts')
  <script>
  </script>
@endsection
