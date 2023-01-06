<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URl('css/bootstrap.min.css')}}">
    <title>Add Article</title>
</head>
<body>
    <div class="container">
        <div class="row"><div class="col-sm-12 d-flex justify-content-center "><h2 class="mt-4 font-weight-bold">Add Article</h2></div></div>
        <div class="row">
            <div class="col-sm-3 mt-5 ">
                <form action="{{route('articles.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="action" value="add">
                    <select name="name" id="" style="width: 200px; height:50px; margin-right:5px;" class="form-select form-select-lg mt-3 mb-2 d-inline">
                        @foreach($writers as $writer)
                        <option value="{{$writer->name}}">{{$writer->name}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="title" placeholder="Title" class="mb-2" >
                    <textarea name="body" id="" cols="30" rows="5" placeholder="Body" class="mb-2"></textarea>
                    <button type="submit" class="btn btn-primary">Add article</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>