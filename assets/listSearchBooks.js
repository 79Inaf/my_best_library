const targetDiv = document.getElementById('searchBooks');

document.getElementById('searchHeadline').addEventListener('input', function (e) {

    let search = e.target.value;

    fetch('/api/searchBooks/' + search)
        .then(response => response.json())
        .then(data => {
            targetDiv.innerHTML = ''
            if (data == '') {
                const p = document.createElement('p')
                targetDiv.append(p)
                p.innerHTML = 'Aucun résultat'
                p.className = 'text-center text-white m-5 fs-1'

            } else {
                for (const book of data) {
                    const htmlCard = book.html.content
                    targetDiv.innerHTML += htmlCard
                }            
            }
        })
});