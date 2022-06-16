var keywoard = document.getElementById('keyword');
var wadah = document.getElementById('vid-grid');

keyword.addEventListener('keyup',function(){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status == 200){
            wadah.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET','asset/ajax/olahraga.php?keyword=' + keyword.value,true);
    xhr.send();

});

