
<?php 
$id=$_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from bidang where id_bidang='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);
 ?>
<div class="box-header with-border">
  <h3 class="box-title">Chat Personal <br><?php echo $d1['nama_bidang'] ?></h3>

  <div class="box-tools pull-right">
    <a href="?a=chat_personal" class="btn btn-info" >Kembali</a>
  </div>
</div>


<br>
<div class="col-md-6">
  

  <div style="border:solid; height:500px; overflow-y: scroll" id="chat">

  </div>

  <br>
  <form id="form_chat">
    <input type="hidden" class="form-control" name="pengirim" value="<?php echo $bidang ?>">
    <input type="hidden" class="form-control" name="penerima" value="<?php echo $id ?>">
    <div class="input-group">
                  <input type="text" class="form-control" name="pesan" id="pesan">
                  <span class="input-group-addon"><button type="button" id="send"><i class="fa fa-send"></i></button></span>
                </div>
  </form>
</div>

<script type="text/javascript">
  function chat(penerima){
    $.ajax({
      url : 'form/chat_personal/chat.php',
      data : {penerima: penerima}, 
      type : 'POST',
      success : function(data){
        $('#chat').html(data)
      }
    })
  }
  $('#send').click(function(){
    isi_data = $('#form_chat').serialize();
    $.ajax({
      url : 'form/chat_personal/simpan_chat.php',
      data : isi_data, 
      type : 'POST',
      success : function(data){
        $('#pesan').val('');
        chat('<?php echo $id ?>');

      },
      error : function(){
        console.log('err')
      }
    })
  });



// chat('<?php echo $id ?>');

function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("chat").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "form/chat_personal/chat.php?penerima=<?php echo $id ?>", true);
  xhttp.send();
}

setInterval(function(){
  loadXMLDoc();
},100);

window.onload=loadXMLDoc


</script>