<!DOCTYPE html>
<html>
<head>
	<title>abc</title>
	  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<form method="POST" action="{{route('store')}}">
	{{ csrf_field()}}
  <div class="form-group">
    <label for="desimg">desimg</label>
    <input type="text" class="form-control" name="desimg" id="desimg" aria-describedby="emailHelp" >
     <div class="form-group">
    <label for="title">title</label>
        @if ($errors->has('title'))
        {{$errors->first('title')}}
    @endif
    <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" >  <div class="form-group">
    <label for="desa">desa</label>
    <input type="text" class="form-control" name="desa" id="desa" aria-describedby="emailHelp" >
        <label for="desplaintext">desplaintext</label>
    <input type="text" class="form-control" name="desplaintext" id="desplaintext" aria-describedby="emailHelp">
        <label for="pubDate">pubDate</label>
    <input type="text" class="form-control" name="pubDate" id="pubDate" aria-describedby="emailHelp">
        <label for="link">link</label>
    <input type="text" class="form-control" name="link" id="link" aria-describedby="emailHelp">
        <label for="guid">guid</label>
    <input type="text" class="form-control" name="guid" id="guid" aria-describedby="emailHelp" >
        <label for="slash">slash</label>
    <input type="text" class="form-control" name="slash" id="slash" aria-describedby="emailHelp">

    <input type="text" name="channelId" value="{{$channelId}}" hidden="hidden">
<!--     <input type="text" name="id" hidden="hidden"> -->

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</body>
</html>