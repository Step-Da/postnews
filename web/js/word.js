var showCode = false;
var editLock = true;

function editMode(){
    richTextBox.document.designMode = 'On';
}

function classicToolsMethods(command) {
    richTextBox.document.execCommand(command, false, null);
}

function selectToolsMethods(command, arg){
    richTextBox.document.execCommand(command, false, arg);
}

function triggerCode(){
    if(showCode){
        richTextBox.document.getElementsByTagName('body')[0].innerHTML = richTextBox.document.getElementsByTagName('body')[0].textContent;
        showCode = false;
    }
    else{
        richTextBox.document.getElementsByTagName('body')[0].textContent = richTextBox.document.getElementsByTagName('body')[0].innerHTML;
        showCode = true;
    }

    var valueArticle = $('#richTextBox').contents().find("body").text();
    let element = document.querySelector('#atext');
    element.value = valueArticle;
    
}

function triggerEditLock(){
    if(editLock){
        richTextBox.document.designMode = 'Off';
        editLock = false;
        // $('.fa-lock').classList.remove("fa-unlock-alt");
        
    }
    else{
        richTextBox.document.designMode = 'On';
        editLock = true;
        // $('.fa-unlock-alt').classList.remove("fa-lock");
    }
}

var nameFile;
$('#nameFileList').change(function(){
    nameFile = $("#nameFileList option:selected").text();
});

$('#addImage').click(function(){
    dir = '/upload/' + nameFile;
    selectToolsMethods('insertImage', dir);
});

$('#createArticleButton').click(function(){
    triggerCode();
});

$('#statusList').change(function(){
    let element = document.querySelector('#statusInput');
    element.value = this.value;
});