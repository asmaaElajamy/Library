<div class="card">
    <div class="card-header text-center">Categories</div>

<div class="card-body">
@if(count($allcategories)>0)
<ul>
 @foreach($allcategories as $category)
 <hr>
    <li><a href="{{route('category',$category->id)}}">{{$category->name}}</a>
    </li>
 @endforeach
</ul>                
@endif
</div>
    </div>