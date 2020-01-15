<!DOCTYPE html>
<html>
<head>
    <title>Cautare Strazi si Coduri Postale</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
</head>
<body>
<br/>
<br/>
<br/>
<div class="container">
    <section >
        <h1>Strazi Ordonate Alfabetic Dupa Nume</h1>
    </section>
</div>
<br/>
<br/>
<br/>
<div class="row offset-md-1 col-md-10">
    <table id="evidenta" class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Strada</th>
                <th scope="col">Tip Strada</th>
                <th scope="col">Cartier</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($streets as $street)
                <tr>
                    <th scope="row"> {{ $street->nume_strada }} </th>
                    <td> {{ $street->tip_strada_nume }} </td>
                    <td> {{ $street->nume_cartier }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
