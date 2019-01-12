@if(isset($categoryName))
    <div class="alert alert-info">
        <p>Category: <strong>{{$categoryName}}</strong></p>
    </div>

@elseif(isset($authorName))
    <div class="alert alert-info">
        <p>Author: <strong>{{$authorName}}</strong></p>
    </div>

@elseif(isset($tagName))
    <div class="alert alert-info">
        <p>Tagged: <strong>{{$tagName}}</strong></p>
    </div>

@elseif($term = request('q'))
    <div class="alert alert-info">
        <p>Search Result For: <strong>{{$term}}</strong></p>
    </div>

@endif