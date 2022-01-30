<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    dt{
            font-size: 2.5rem !important;
    line-height: 1.41667em !important;
    font-weight: bold !important;
    color: #33475b !important;
    font-family: "Josefin Sans", sans-serif;
    }
    dd{
            font-size: 2rem;
    line-height: 1.5em;
    color: #19232c !important;
    font-family: Arial, Helvetica, sans-serif;
    }
</style>
<body>

<div class="jumbotron text-center">
  <h1>{{ $category->cat_title }} Class Details</h1>

</div>

<div class="container">

  <dl >
    <dt>Title</dt>
    <dd>{{ $category->cat_title }}</dd>
    <dt>Description</dt>
    <dd>{{ $category->cat_desc }}</dd>
    <dt>Class Strength</dt>
    <dd>- {{ $category->cat_max_student }}</dd>
    <dt>Status</dt>
    <dd>
        @if ($category->cat_status == 0)
            Closed
        @elseif ($category->cat_status == 2)
            Cancelled
        @else
            Open
        @endif
  </dl>
    {{-- <a href="{{ url('organization/deleteClass/'.$category->cat_id) }}" class="btn btn-danger float-right">Delete Class</a> --}}

</div>


</body>
</html>
