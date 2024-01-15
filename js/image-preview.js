function trigger(){
    document.querySelector('#myfile').click();
}
function displayPic(e){
if(e.files[0]){
    var reader= new FileReader();
    reader.onload = function(e){
        document.querySelector('#dispalypic').setAttribute('src',e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
}
}