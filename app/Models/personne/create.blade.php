<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>

  <body>
    <form action="{{route('create-personne')}}" method="POST">
      @csrf
      <h3>Créer Personne</h3>
      <label for="nom">Nom</label>
      <input type="text" name="nom" id="nom">
      <br>
      <label for="prenom">Prénom</label>
      <input type="text" name="prenom" id="prenom">
      <br>
      <label for="address">Address</label>
      <input type="text" name="address" id="address">
      <br>
      <label for="telephone">Telephone</label>
      <input type="text" name="telephone" id="telephone">
      <br>
      <button type="submit">Create</button>
    </form>
  </body>

</html>