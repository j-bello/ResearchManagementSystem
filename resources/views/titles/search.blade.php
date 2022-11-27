<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@meilisearch/instant-meilisearch/templates/basic_search.css" />

        <style>
            .ais-SearchBox-input {
    width: 100%;
    border: 3px solid rgb(0, 3, 158);
    border-right: none;
    padding: 5px;
    height: 20px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: #8886a3;
}
.ais-SearchBox-submit {
    width: 40px;
    height: 36px;
    border: 1px solid rgb(0, 3, 158);
    background: rgb(0, 3, 158);
    text-align: center;
    color: #fff !important;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
    right: 0;
    position: relative;
    box-sizing: border-box;
    top: 50%;
    left: 0;
    padding: 0;
    user-select: none;
    transform: translateY(-50%);
    cursor: pointer;
}
        </style>
    </head>
      <body>

      

          <div id="app" class="wrapper"></div>
      </body>
      <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
      <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
      <script src="https://cdn.jsdelivr.net/npm/react-instantsearch-dom@6.7.0/dist/umd/ReactInstantSearchDOM.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@meilisearch/instant-meilisearch/dist/instant-meilisearch.umd.min.js"></script>
      <script>
        const { InstantSearch, SearchBox, Hits, Highlight, Configure } = ReactInstantSearchDOM;
        const searchClient = instantMeiliSearch(
          "http://localhost:7700"
        );
        const App = () => (
          React.createElement(InstantSearch, {
            indexName: "titles",
            searchClient: searchClient
          }, [
            React.createElement(SearchBox, { key: 1 }),
            React.createElement(Hits, { hitComponent: Hit, key: 2 }),
            React.createElement(Configure, { hitsPerPage: 5 })]
          )
        );

        const Hit = (props) => (
          React.createElement(Highlight, {
            attribute: "title",
            hit: props.hit
          })

        );

        const domContainer = document.querySelector('#app');
        ReactDOM.render(React.createElement(App), domContainer);
      </script>

      <script>
        const client = new MeiliSearch({ host: 'http://localhost:7700', apiKey: 'masterKey' });
        client.getKeys();
    </script>

      <script>
         const client = new MeiliSearch('http://localhost:7700', 'apiKey');
         client.index('titles').search();
      </script>

    </html>


</x-app-layout>

