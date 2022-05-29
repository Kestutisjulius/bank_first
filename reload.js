import btn from './index.php';
function reload(){
    document.getElementById('iframe').src += '';
}
btn.onclick = reload;