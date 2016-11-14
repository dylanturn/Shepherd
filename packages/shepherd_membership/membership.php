<!-- Header -->
<header class="w3-container" style="padding-top:22px">
  <h5><b><i id="membership" class="fa"></i> Cluster Membership</b></h5>
</header>
<!-- END Header -->

<!-- Cluster Members -->
<script>
  $( document ).ready(function() {
    var membership = clusterXML.getElementsByTagName("Members")[0];
    var members = membership.getElementsByTagName("Member");
    console.log('[membership] page content: ' + members.length);    
    $("#clusterMembers tr").remove();
    $("#clusterMembers").append("<thead><th>Member Name</th><th>Member IP Address</th><th>Member Ping</th></thead>");
    for (i = 0; i < members.length; i++) {
      var name = members[i].getAttribute("name");
      var ipaddress = members[i].getAttribute("ipaddress");
      var ping = members[i].getAttribute("ping");
      $("#clusterMembers").append("<tr><td>"+name+"</td><td>"+ipaddress+"</td><td>"+ping+"</td></tr>");
    }
  });

  var id = setInterval(function(){
    var membership = clusterXML.getElementsByTagName("Members")[0];
    var members = membership.getElementsByTagName("Member");
    console.log('[membership] page content: ' + members.length);    
    $("#clusterMembers tr").remove();
    $("#clusterMembers").append("<thead><th>Member Name</th><th>Member IP Address</th><th>Member Ping</th></thead>");
    for (i = 0; i < members.length; i++) {
      var name = members[i].getAttribute("name");
      var ipaddress = members[i].getAttribute("ipaddress");
      var ping = members[i].getAttribute("ping");
      $("#clusterMembers").append("<tr><td>"+name+"</td><td>"+ipaddress+"</td><td>"+ping+"</td></tr>");
    }
  }, 2000);
  intervalArrays.push(id);
</script>

<div class="w3-container">
  <h5>Cluster Members</h5>
  <table id="clusterMembers" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <thead><th>Member Name</th><th>Member IP Address</th><th>Member Ping</th></thead>
  </table>
  <br>
</div>
<!-- END Cluster Members -->