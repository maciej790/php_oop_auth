<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Główny widok aplikacji</h1>
</body>
<script>
    (async () => {
        // Dane do wysłania
        const dane = {
            title: 'New task',
        };

        // Konfiguracja żądania
        const opcje = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Access-Control-Allow-Headers': 'X-Requested-With',
                'Access-Control-Allow-Methods': 'GET, POST, PUT, DELETE',
                'Access-Control-Allow-Origin': '*',
            },
            body: JSON.stringify(dane),
        };

        // Wysłanie żądania za pomocą Fetch
        const response = await fetch('http://localhost/php_app/api/getAllTasks.php')
        const data = await response.json();
        console.log(data);


    })();
</script>

</html>