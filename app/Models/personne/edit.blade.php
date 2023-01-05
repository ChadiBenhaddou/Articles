<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>

  <body>
    <form action="{{route('update-personne',[$personne['id']])}}" method="POST">
      @csrf
      @method("put")
      <h3>Update personne</h3>
      <label for="nom">Nom</label>
      <input type="text" name="nom" value="{{$personne['nom']}}" id="nom">
      <br>
      <label for="prenom">Prénom</label>
      <input type="text" name="prenom" value="{{$personne['prenom']}}" id="prenom">
      <br>
      <label for="address">Address</label>
      <input type="text" name="address" value="{{$personne['address']}}" id="address">
      <br>
      <label for="telephone">Telephone</label>
      <input type="text" name="telephone" value="{{$personne['telephone']}}" id="telephone">
      <br>
      <button type="submit">Update</button>
    </form>
  </body>

</html>