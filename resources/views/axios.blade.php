<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JS Axios Demo</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1>JS Axios Demo </h1>
        <h4>This applications uses Axios. Axios is a Promise-based HTTP client for JavaScript which can be used in your front-end application and in your Node.js backend. </h4>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">GET /oauth/clients</div>
        <div class="panel-body">
          <button class="btn btn-primary" onclick="performGetRequest1()">Get Todos</button>
          <button class="btn btn-warning" onclick="clearOutput()">Clear</button>
          <div class="panel-body" id="getResult1"></div>
        </div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">PUT /oauth/clients/{client-id}</div>
        <div class="panel-body">
          <input type="text" class="form-control" id="todoId" placeholder="client ID ..."/><br/>
          <button class="btn btn-primary" onclick="performGetRequest2()">Get Todos</button>
          <button class="btn btn-warning" onclick="clearOutput()">Clear</button>
          <div class="panel-body" id="getResult2"></div>
        </div>
      </div>
       <div class="panel panel-primary">
        <div class="panel-heading">POST /oauth/clients</div>
        <div class="panel-body">
          <form class="form-inline" id="todoInputForm">
          @csrf
            <div class="form-group">
              <input type="text" class="form-control" id="todoTitle" placeholder="Todo Title ...">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form><br/>
          <button class="btn btn-warning" onclick="clearOutput()">Clear</button>
          <div class="panel-body" id="postResult"></div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      function generateSuccessHTMLOutput(response) {
        return  '<h4>Result</h4>' + 
                '<h5>Status:</h5> ' + 
                '<pre>' + response.status + ' ' + response.statusText + '</pre>' +
                '<h5>Headers:</h5>' + 
                '<pre>' + JSON.stringify(response.headers, null, '\t') + '</pre>' + 
                '<h5>Data:</h5>' + 
                '<pre>' + JSON.stringify(response.data, null, '\t') + '</pre>'; 
      }
      
      function generateErrorHTMLOutput(error) {
        return  '<h4>Result</h4>' + 
                '<h5>Message:</h5> ' + 
                '<pre>' + error.message + '</pre>' +
                '<h5>Status:</h5> ' + 
                '<pre>' + error.response.status + ' ' + error.response.statusText + '</pre>' +
                '<h5>Headers:</h5>' + 
                '<pre>' + JSON.stringify(error.response.headers, null, '\t') + '</pre>' + 
                '<h5>Data:</h5>' + 
                '<pre>' + JSON.stringify(error.response.data, null, '\t') + '</pre>'; 
      }
      
      function performGetRequest1() {
        var resultElement = document.getElementById('getResult1');
        resultElement.innerHTML = '';
      
        axios.get('http://localhost:8000/oauth/clients', 
        {
            headers: {
            'Access-Control-Allow-Origin': '*',
            },
            proxy: {
            host: 'localhost',
            port: 8080
            }
        })
          .then(function (response) {
            resultElement.innerHTML = generateSuccessHTMLOutput(response);
          })
          .catch(function (error) {
            resultElement.innerHTML = generateErrorHTMLOutput(error);
          });   
      }
      
      
      
      function performGetRequest2() {
        var resultElement = document.getElementById('getResult2');
        var clientid = document.getElementById('todoId').value;
        resultElement.innerHTML = '';
        
        axios.put('http://localhost:8000/oauth/clients'+clientid, 
        {
            headers: {
                'Access-Control-Allow-Origin': '*',
            },
            proxy: {
                host: 'localhost',
                port: 8080
            },
            name: 'New Client Name',
            redirect: 'http://example.com/callback'
        })
        .then(function (response) {
          console.log(response);
          resultElement.innerHTML = generateSuccessHTMLOutput(response);
        })
        .catch(function (error) {
            resultElement.innerHTML = generateErrorHTMLOutput(error);
        });
      }
      
      document.getElementById('todoInputForm').addEventListener('submit', performPostRequest);
      function performPostRequest(e) {
        var resultElement = document.getElementById('postResult');
        var todoTitle = document.getElementById('todoTitle').value;
        resultElement.innerHTML = '';
        
        axios.post('http://localhost:8000/oauth/clients', 
        {
            headers: {
            'Access-Control-Allow-Origin': '*',
            },
            proxy: {
            host: 'localhost',
            port: 8080
            },
            //userId: '1',
            title: todoTitle,
            name: 'Client Name',
            redirect: 'http://example.com/callback'
        })
        .then(function (response) {
          resultElement.innerHTML = generateSuccessHTMLOutput(response);
        })
        .catch(function (error) {
          resultElement.innerHTML = generateErrorHTMLOutput(error);
        });
        
        e.preventDefault();
      }

    </script>
  </body>
</html>
