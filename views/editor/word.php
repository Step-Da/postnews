<?php 
  use yii\helpers\Html; 
  $dir = Yii::getAlias('@web/upload');
?>
<div onload="editMode();">
  <div>
    <button onclick="classicToolsMethods('bold');" class="btn btn-dark edit-font"><i class="fa fa-bold"></i></button>
    <button onclick="classicToolsMethods('italic');" class="btn btn-dark edit-font"><i class="fa fa-italic"></i></button>
    <button onclick="classicToolsMethods('underline');" class="btn btn-dark edit-font"><i class="fa fa-underline"></i></button>
    <button onclick="classicToolsMethods('strikeThrough');" class="btn btn-dark edit-font"><i class="fa fa-strikethrough"></i></button>
    &nbsp;
    <button onclick="classicToolsMethods('justifyLeft');" class="btn btn-dark edit-font"><i class="fa fa-align-left"></i></button>
    <button onclick="classicToolsMethods('justifyCenter');" class="btn btn-dark edit-font"><i class="fa fa-align-center"></i></button>
    <button onclick="classicToolsMethods('justifyRight');" class="btn btn-dark edit-font"><i class="fa fa-align-right"></i></button>
    <button onclick="classicToolsMethods('justifyFull');" class="btn btn-dark edit-font"><i class="fa fa-align-justify"></i></button>
    &nbsp;
    <button onclick="classicToolsMethods('cut');" class="btn btn-dark edit-font"><i class="fa fa-cut"></i></button>
    <button onclick="classicToolsMethods('copy');" class="btn btn-dark edit-font"><i class="fa fa-copy"></i></button>
    <button onclick="classicToolsMethods('indent');" class="btn btn-dark edit-font"><i class="fa fa-indent"></i></button>
    <button onclick="classicToolsMethods('outdent');" class="btn btn-dark edit-font"><i class="fa fa-dedent"></i></button>
    &nbsp;
    <button onclick="classicToolsMethods('subscript');" class="btn btn-dark edit-font"><i class="fa fa-subscript"></i></button>
    <button onclick="classicToolsMethods('superscript');" class="btn btn-dark edit-font"><i class="fa fa-superscript"></i></button>
    <button onclick="classicToolsMethods('undo');" class="btn btn-dark edit-font"><i class="fa fa-undo"></i></button>
    <button onclick="classicToolsMethods('redo');" class="btn btn-dark edit-font"><i class="fa fa-repeat"></i></button>
  </div>
  <br>
  <div>
    <button onclick="classicToolsMethods('insertUnorderedList');" class="btn btn-dark edit-font"><i class="fa fa-list-ul"></i></button>
    <button onclick="classicToolsMethods('insertOrderedList');" class="btn btn-dark edit-font"><i class="fa fa-list-ol"></i></button>
    <button onclick="classicToolsMethods('insertParagraph');" class="btn btn-dark edit-font"><i class="fa fa-paragraph"></i></button>
    <button onclick="classicToolsMethods('insertHorizontalRule');" class="btn btn-dark edit-font"><i class="fa fa-minus"></i></button>
    &nbsp;
    <select onchange="selectToolsMethods('formatBlock', this.value);" class="edit-font edit-select">
      <option value="" disabled selected>Заголовки</option>
      <option value="H1">H1</option>
      <option value="H2">H2</option>
      <option value="H3">H3</option>
      <option value="H4">H4</option>
      <option value="H5">H5</option>
      <option value="H6">H6</option>
    </select>
    &nbsp;
    <button onclick="selectToolsMethods('createLink', prompt('Введите текст ссылки', 'http://'));" class="btn btn-dark edit-font"><i class="fa fa-link"></i></button>
    <button onclick="classicToolsMethods('unlink');" class="btn btn-dark edit-font"><i class="fa fa-unlink"></i></button>
    <?= Html::dropDownList('fileName', 'null', $list, $param); ?> 
    <button id='addImage' class="btn btn-dark edit-font"><i class="fa fa-file-image-o"></i></button>
    <!-- <button onclick="toggleSource();" class="btn btn-dark edit-font"><i class="fa fa-code"></i></button> -->
    <button onclick="triggerEditLock();" class="btn btn-dark edit-font"><i class="fa fa-lock"></i></button>
  </div>
  <br>
  <div>
    <div class="line">
      <select onchange="selectToolsMethods('fontName', this.value);" class="edit-font edit-select-font">
        <option value="" disabled selected>Шрифты</option>
        <option value="Times New Roman">Time New Roman</option>
        <option value="Comic Sans MS">Comic Sans MS</option>
        <option value="Couries">Couries</option>
        <option value="Georgia">Georgia</option>
        <option value="Verdana">Verdana</option>
        <option value="Calibri">Calibri</option>
      </selact>
      &nbsp;
      <input type="number" onchange="selectToolsMethods('fontSize', this.value);" max="7" min="1" value="1" class="edit-font edit-samll-field">
      &nbsp;
      <div class="color-panel">
        <div>
          <i class="fa fa-font edit-color-label"></i><input type="color" onclick="selectToolsMethods('foreColor', this.value);" class="edit-color">
        </div>
        <div>
          <i class="fa fa-adjust edit-color-label"></i><input type="color" onclick="selectToolsMethods('hiliteColor', this.value);" class="edit-color">
        </div>
      </div>
    </div>
  </div>
  <br>
  <iframe name="richTextBox" class="richTextBox"></iframe>
  <!-- <button onclick="triggerCode();">Code</button> -->
</div>