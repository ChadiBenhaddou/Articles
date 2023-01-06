<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URl('/css/bootstrap.min.css')}}">
    <title>Article</title>
</head>
<body>
    <div class="container">
        <div class="row"><div class="col-sm-12 d-flex justify-content-center "><h2 class="mt-4 font-weight-bold">Article of {{$article->name}} </h2></div></div>
        <div class="col-lg-3 overflow-auto d-flex flex-column justify-content-between mt-5 " style="border-radius: 13px; background-color:rgba(209, 209, 209, 0.4); padding: 10px; ">
            <div>
                <p class="fs-5 fw-lighter text-decoration-underline" >{{$article->name}}</p>
            <p class="fw-bolder text-primary d-inline">Title : </p>
            <p class="fw-bold">{{$article->title}}</p>
            <p class="fw-bolder text-primary d-inline">Body : </p>
            <p class="fw-bold">{{$article->body}}</p>
            </div>

            <form action="{{route('articles.index')}}" method="GET">
                <button class="btn btn-primary ">Hme</button>
            </form>
        </div>
    </div>
</body>
</html>