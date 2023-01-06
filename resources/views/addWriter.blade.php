<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URl('css/bootstrap.min.css')}}">
    <title>Add Writer</title>
</head>
<body>
    <div class="container">
        <div class="row"><div class="col-sm-12 d-flex justify-content-center "><h2 class="mt-4 font-weight-bold">Add Article</h2></div></div>
        <div class="row">
            <div class="col-sm-3 mt-5 ">
                <form action="{{route('writer.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="action" value="add">
                    <input type="text" name="name" placeholder="Writer name" class="mb-2" >
                    <button type="submit" class="btn btn-primary">Add writer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>