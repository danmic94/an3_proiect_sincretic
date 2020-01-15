<!DOCTYPE html>
<html>
<head>
    <title>Cautare Strazi si Coduri Postale</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
</head>
<body>

<div class="container">
    <section >
        <h1>Orasul Digitalizat</h1>
        <div class="col-md-12">
            <label for="street_search">Cautare Strada</label>
            <input id="street_search" class="typeahead form-control" type="text">
            <label for="post_code_search">Cautare dupa Cod Postal</label>
            <input id="post_code_search" class="typeahead form-control" type="text">
        </div>
    </section>
    <br/>
    <br/>
    <br/>
</div>

<div class="row offset-md-1 col-md-10">
        <table id="evidenta" class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Cartier</th>
                <th scope="col">Strada</th>
                <th scope="col">Tip Strada</th>
                <th scope="col">Total Cladiri</th>
                <th scope="col">Numar Cladire</th>
                <th scope="col">Cod-Postal</th>
                <th scope="col">Tip Cladire</th>
                <th scope="col">Numar Apartamente</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
</div>

<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query) {
            const searchedBy = this.$element.attr('id');
            return $.get(path, { search: query, by_attribute: searchedBy }, function (data) {
                let resultData = data;
                $("#evidenta > tbody > tr").remove();
                for(let key in resultData){
                    let nrAps = resultData[key]['nr_apartamente'] === 1 ? 'N/A' : resultData[key]['nr_apartamente'];
                    $('#evidenta> tbody:last-child').append(
                        "<tr>" +
                            "<th scope=\"row\">" + resultData[key]['nume_cartier']     + "</th>" +
                            "<td>" + resultData[key]['nume_strada']     + "</td>" +
                            "<td>" + resultData[key]['tip_strada_nume']     + "</td>" +
                            "<td>" + resultData[key]['nr_cladiri']     + "</td>" +
                            "<td>" + resultData[key]['numar_cladire']     + "</td>" +
                            "<td>" + resultData[key]['cod_postal']     + "</td>" +
                            "<td>" + resultData[key]['tip_cladire_nume']     + "</td>" +
                            "<td>" + nrAps     + "</td>" +
                        "</tr>"
                    );
                }
            });
        }
    });
</script>

</body>
</html>
