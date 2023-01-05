<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href='css/bootstrap.min.css'>
    <style>
        img:hover {
  transform: scale(1.2); 
}
    </style>

    <title>All Articles</title>
</head>
<body>
    <div class="container">
        <div class="row mt-3  mb-4">
            <div class="col-lg-4 d-flex justify-content-start  mt-4">
                <form action="/filter" method="get">
                    <h5 class="font-weight-bold">Writers :</h5>
                    <input type="text" style="width: 200px; height:50px; margin-right:5px;" class="form-select-lg mt-3 d-inline" name="name" placeholder="Writer name" class="mb-2">
                    <button class="btn btn-primary d-inline " style="margin-bottom: 5px" type="submit" >Go</button>
                </form>
            </div>
            <div class="col-lg-4 d-flex justify-content-center mt-4 font-weight-bold"><h2>All Articles</h2></div>
            <div class="col-lg-4 d-flex justify-content-end"><a href="{{route('articles.create')}}"><img style="transition: transform 1s;" src="icons/ajouter.png" alt=""></a></div>
        </div>
        <div class="row gap-3 justify-content-center">
            @foreach ($listArticles as $article)

            <div class="col-lg-3 overflow-auto d-flex flex-column justify-content-between" style="border-radius: 13px; background-color:rgba(209, 209, 209, 0.4); padding: 10px; ">
                <div>
                    <p class="fs-5 fw-lighter text-decoration-underline" >{{$article->name}}</p>
                <p class="fw-bolder text-primary d-inline">Title : </p>
                <p class="fw-bold">{{$article->title}}</p>
                <p class="fw-bolder text-primary d-inline">Body : </p>
                <p class="fw-bold">{{$article->body}}</p>
                </div>

                <div class="d-flex justify-content-between align-items-end">
                    <form action='/articles/{{$article->articleId}}' method="GET">
                        <button class="btn btn-primary ">Read more</button>
                    </form>

                    <div class="d-flex">
                        <form action="{{route('articles.edit' , $article->articleId)}}" method="get">
                            <button type="submit" style="border: none"><img style="transition: transform 1s;" src="icons/edit.png" alt=""></button>
                        </form>
                        <form action="{{route('articles.destroy' , $article->articleId)}}" method="post">@csrf
                            <input type="hidden" name="action" value="delete">
                            @method('delete')<button type="submit" style="border: none"><img style="transition: transform 1s;" src="icons/delete.png" alt=""></button>
                        </form>
                        

                    </div>
                </div>
                
            </div>
        @endforeach
        </div>
        
    </div>
</body>
</html>