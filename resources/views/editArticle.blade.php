<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URl('css/bootstrap.min.css')}}">
    <title>Edit Article</title>
</head>
<body>
    <div class="container">
        <div class="row"><div class="col-sm-12 d-flex justify-content-center "><h2 class="mt-4 font-weight-bold">Edit Article</h2></div></div>
        <div class="row">
            <div class="col-sm-3 mt-5 ">
                <form action="{{route('articles.update',$article->articleId )}}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="action" value="update">
                    <input type="text" name="name" placeholder="Writer" class="mb-2" value="{{$article->name}}">
                    <input type="text" name="title" placeholder="Title" class="mb-2"  value="{{$article->title}}">
                    <textarea name="body" id="" cols="30" rows="5" placeholder="Body" class="mb-2">{{$article->body}}</textarea>
                    <button type="submit" class="btn btn-primary">Edit article</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>