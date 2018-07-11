@include('layouts.header')
<div class="container">
	<form method="POST" action="{{route('updateItem',[$item->id])}}">
	{{ csrf_field()}}
  <div class="form-group">
    <label for="desimg">desimg</label>
    <input type="text" class="form-control" name="desimg" id="desimg" aria-describedby="emailHelp" value="{{$item->desimg}}">
     <div class="form-group">
      @include('flash::message')
     	    @if ($errors->has('title'))
		<p class="bg-danger">{{$errors->first('title')}}</p>
    @endif
    <label for="title">title</label>
    <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" value="{{$item->title}}">  <div class="form-group">
    <label for="desa">desa</label>
    <input type="text" class="form-control" name="desa" id="desa" aria-describedby="emailHelp" value="{{$item->desa}}">
        <label for="desplaintext">desplaintext</label>
    <input type="text" class="form-control" name="desplaintext" id="desplaintext" aria-describedby="emailHelp" value="{{$item->desplaintext}}">
        <label for="pubDate">pubDate</label>
    <input type="text" class="form-control" name="pubDate" id="pubDate" aria-describedby="emailHelp" value="{{$item->pubDate}}">
        <label for="link">link</label>
    <input type="text" class="form-control" name="link" id="link" aria-describedby="emailHelp" value="{{$item->link}}">
        <label for="guid">guid</label>
    <input type="text" class="form-control" name="guid" id="guid" aria-describedby="emailHelp" value="{{$item->guid}}">
        <label for="slash">slash</label>
    <input type="text" class="form-control" name="slash" id="slash" aria-describedby="emailHelp" value="{{$item->slash}}">

    <input type="text" name="channelId" value="{{$item->Channel->id}}" hidden="hidden">
    <input type="text" name="id" value="{{$item->id}}" hidden="hidden">

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@include('layouts.footer')