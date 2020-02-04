<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>bookStore</title>

        <!-- Scripts -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
            var books = []
            var displayAuthors = false

            function api(route, method = 'GET', target, data = {}) {
                axios({
                    method: method,
                    url: route,
                    data: data
                })
                .then(function (response) {
                    window[target](response.data)
                })
            }

            function getBooks(responseBooks = books) {
                let result   = ''
                window.books = responseBooks

                window.books.map((a) => a.basket = 0)

                for(let book of books) {
                    let authors = ['', book.authors]
                    
                    result += ` <tr><td>€ </td>
                                    <td align="right">${book.price}</td>
                                    <td align="left">/ ${book.discountPrice}</td>
                                    <td>${book.title}</td>
                                    <td>${authors[displayAuthors & 1]}</td>
                                    <td><button onclick="basketAdd('${book.type}','${book.isbn}')">Add</button></td>
                                </tr>`                    
                }

                document.getElementById("page").innerHTML = `<table>${result}</table>`
            }

            function basketAdd(type, isbn){
                books.find((a) => a.type == type && a.isbn == isbn).basket++

                basket()
            }

            function basketRemove(type, isbn){
                books.find((a) => a.type == type && a.isbn == isbn).basket--

                basket()
            }

            function setDisplayAuthors(){
                displayAuthors = !displayAuthors
                
                getBooks();
                basket(); 
            }

            function basket(){
                let basket = books.filter((a) => a.basket > 0)
                let result = ''

                for(let book of basket) {
                    let authors = ['', book.authors]

                    result += ` <tr><td>€</td>
                                    <td align="right">${book.price}</td>
                                    <td align="left">/ ${book.discountPrice}</td>
                                    <td>${book.title}</td>
                                    <td>${authors[displayAuthors & 1]}</td>
                                    <td>Qty ${book.basket}</td>
                                    <td><button onclick="basketRemove('${book.type}','${book.isbn}')">Remove</button></td>
                                </tr>`
                }

                document.getElementById("basket").innerHTML = `<table>${result}</table>`
                document.getElementById("qty").innerHTML    = books.reduce((a,b) => a + b.basket, 0)
                document.getElementById("total").innerHTML  = books.reduce((a,b) => a + (b.discountPrice * b.basket), 0).toFixed(2)
            }

            function importCSV() {
                 // TODO
            }
        </script>

        <!-- Styles -->
        <style>
            table { 
                width: 100%;
            }

            tr:hover {
                background-color: grey;
                color: white;
            }

            h2, h3, h4, span, button, input {
                text-transform: capitalize;
            }
        </style>
    </head>
    <body>
        <h1>bookStore</h1>

        <div id="buttons">
            <button onclick="api('/api/books','GET', 'getBooks')">get books</button>
            <button onclick="setDisplayAuthors()">display authors</button>
            <input type="file" onclick="importCSV()">
        </div>

        <h3>catalog</h3>
        <div id="page"></div>
        <h3>basket</h3>

        <div id="basket">empty</div>

        <h4>qty: <span id="qty"></span></h4>
        <h4>total: <span id="total"></span></h4>
    </body>
</html>
