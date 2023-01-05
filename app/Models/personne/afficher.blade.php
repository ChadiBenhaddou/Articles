<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      table,tr,td,th{
        border: 2px black solid;
        border-collapse: collapse;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        padding: 6px;
      }
      a{
        text-decoration: none;
        color:black
      }
    </style>
  </head>

  <body>



    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Address</th>
          <th>Telephone</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($personnes as $personne)
        <tr>
          <td>{{$personne['id']}}</td>
          <td>{{$personne['nom']}}</td>
          <td>{{$personne['prenom']}}</td>
          <td>{{$personne['address']}}</td>
          <td>{{$personne['telephone']}}</td>
          <td>
            <button><a href="{{route('edit-personne',[$personne['id']])}}">Edit</a></button>
            <form action="{{route('delete-personne',[$personne['id']])}}" method="POST">
              @method('delete')
              @csrf
              <button>Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>

</html>