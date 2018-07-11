@include('layouts.app')
      @include('flash::message')
<body class="container">
  <div class="row">
    <div class="col-md-12">
      <h4>
        @foreach($channels as $channel)
        <a href="{{route('index',[$channel->id])}}">
          {{$channel->title}}|
        </a>
        @endforeach
      </h4>
        @can('create-item', $channel)
          <button type="button" class="btn btn-primary" style="float: right;" id="addItem{{$channelId}}">add</button>
        @endcan
      <p class="clearfix"></p>

      <form method="GET" action="{{ route('index',[$channelId]) }}">
         {{ csrf_field()}}
        <div id="custom-search-input">
          <div class="input-group col-md-12">
                   
            <input type="text" class="  search-query form-control" placeholder="Search" id="content"  name="content" />
            <input type="text" name="channelId" id="channelId" value="{{$channelId}}" hidden="hidden">
            <span class="input-group-btn">
              <button class="btn btn-danger" type="submit" id="btnSearch">
                <span class=" glyphicon glyphicon-search"></span>
              </button>
            </span>
          </div>
        </div>
      </form>

      <p class="clearfix"></p>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
         <thead>
          <th>desimg</th>
          <th>title</th>
          <th>desa</th>
          <th>desplaintext</th>
          <th>pubDate</th>
          <th>link</th>
          <th>guid</th>
          <th>slash</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          @if($items !== null)
          @foreach($items as $item)
          <tr>
            <td><img src="{{$item->desimg}}" alt="img"></td>
            <td>{{$item->title}}</td>
            <td><a href="{{$item->desa}}">link</a></td>
            <td>{{$item->desplaintext}}</td>
            <td>{{$item->pubDate}}</td>
            <td><a href="{{$item->link}}">link</a></td>
            <td>{{$item->guid}}</td>
            <td>{{$item->slash}}</td>
            <td>
          @can('update-item',$item)              
              <a href="{{route('edit',[$item->id])}}"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" id="btnEit{{$item->id}}" name="btnEit{{$item->id}}"><span class="glyphicon glyphicon-pencil"></span></button></p></a>
          @endcan              
            </td>
            <td>
          @can('delete-item',$item)
              <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" id="btnDel{{$item->id}}" name="btnDel{{$item->id}}"><span class="glyphicon glyphicon-trash"></span></button></p>
              @endcan
              <!-- </a> --></td>
          @endforeach

          </tr>

        </tbody>
        
      </table>
                  @else
              <p>No result</p>
            @endif
      {{$items->links()}}

    </div>

  </div>
</div>
</div>
<div id="test"></div>
@include('layouts.footer')
<script type="text/javascript">
  $(document).ready(function(){
    <?php foreach ($items as $item): ?>
      $("#btnDel"+{{$item->id}}).click(function(){        
        if(confirm("Bạn chắc chắn muốn xóa!!") == true){
          window.location.href = "{{route('delItem',[$item->id])}}";
        }
      });
    <?php endforeach ?>
      $('#addItem{{$channelId}}').click(function(){
        window.location.href = "{{route('item/create',$channelId)}}";
      });

      $('#content').keyup(function(e) {
        $.ajax({
          url:"searchAjax",
          type: 'get',
          dataType: 'json',

          data: {
            content: $('#content').val(),
            channelId: $('#channelId').val()
          }
        }).done(function(ketqua) {

          

        });
      });
  });
</script>