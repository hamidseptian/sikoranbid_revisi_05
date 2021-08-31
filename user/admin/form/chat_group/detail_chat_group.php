<div class="box-header with-border">
  <h3 class="box-title">Chat Group</h3>

 
</div>


<br>
<div class="col-md-6">
  

  <div style="border:solid; height:500px; overflow-y: scroll" id="chat">

  </div>

  <br>
  <form id="form_chat">
    <input type="hidden" class="form-control" name="pengirim" value="<?php echo $bidang ?>">
    <div class="input-group">
                  <input type="text" class="form-control" name="pesan" id="pesan">
                  <span class="input-group-addon"><button type="button" id="send"><i class="fa fa-send"></i></button></span>
                </div>
  </form>
</div>

<script type="text/javascript">

  $('#send').click(function(){
    isi_data = $('#form_chat').serialize();
    $.ajax({
      url : 'form/chat_group/simpan_chat.php',
      data : isi_data, 
      type : 'POST',
      success : function(data){
        console.log(data);
        $('#pesan').val('');

      },
      error : function(){
        console.log('err')
      }
    })
  });




function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("chat").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "form/chat_group/chat.php", true);
  xhttp.send();
}

setInterval(function(){
  loadXMLDoc();
},100);

window.onload=loadXMLDoc


</script>