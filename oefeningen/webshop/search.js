document.getElementById('search').addEventListener('keyup', function() {
    var query = this.value;
    if (query.trim() === '') {
        document.querySelector('.item-lijst').innerHTML = '';
        return;
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'search.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.querySelector('.item-lijst').innerHTML = xhr.responseText;
        }
    };
    xhr.send('query=' + query);
});