var text = 'Try to fit this text into 100 pixels!';
var max_width = 100;

var test = document.createElement('div');
test.className = 'Same Class as your real element';  // give it the same font, etc as a normal button
test.style.width = 'auto';
test.style.position = 'absolute';
test.style.left = '-2000px';
document.body.appendChild(test);            
test.innerHTML = text;

if ($(test).width() > max_width) {

    for (var i=text.length; i >= 0; i--) {
        test.innerHTML = text.substring(0, i) + '...';
        if ($(test).width() <= max_width) {
            text = text.substring(0, i) + '...';
            break;
        }
    }
}

document.body.removeChild(test);