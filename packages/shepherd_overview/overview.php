<!-- Header -->
<header class="w3-container" style="padding-top:22px">
  <h5><b><i id="overview" class="fa"></i> Cluster Overview</b></h5>
</header>
<!-- END Header -->


<!-- Cluster Statistics -->
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-chevron-down w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="bytesRx">-1</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>CPU</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-chevron-down w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="messagesRx">-1</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Memory</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-database w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="bytesTx">-1</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Disk</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-chevron-up w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="messagesTx">-1</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Network</h4>
      </div>
    </div>
  </div>
<!-- END Cluster Statistics -->

<script>
  $( document ).ready(function() {
      var clusterDetail = clusterXML.getElementsByTagName("ClusterDetail")[0];
      members = clusterXML.getElementsByTagName("Members")[0];
      console.log('[overview] page content: ' + clusterDetail.getAttribute("name"));
      $('#clusterName').text(clusterDetail.getAttribute("name"));
      $('#primaryCoord').text(clusterDetail.getAttribute("primaryNode"));
      $('#secondaryCoord').text(clusterDetail.getAttribute("secondaryNode"));
      $('#memberCount').text(members.getAttribute("size"));
  });

  var id = setInterval(function(){
      var clusterDetail = clusterXML.getElementsByTagName("ClusterDetail")[0];
      members = clusterXML.getElementsByTagName("Members")[0];
      console.log('[overview] page content: ' + clusterDetail.getAttribute("name"));
      $('#clusterName').text(clusterDetail.getAttribute("name"));
      $('#primaryCoord').text(clusterDetail.getAttribute("primaryNode"));
      $('#secondaryCoord').text(clusterDetail.getAttribute("secondaryNode"));
      $('#memberCount').text(members.getAttribute("size"));
  }, 2000);
  intervalArrays.push(id);
</script>

<!-- Cluster Information -->
<div class="w3-container w3-twothird">
  <h5>Cluster Coordinator Information</h5>
  <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <tr>
      <td><b>Cluster Name</td>
      <td id="clusterName">Unknown</td>
    </tr>
    <tr>
      <td><b>Primary Coordinator</td>
      <td id="primaryCoord">Unknown</td>
    </tr>
    <tr>
      <td><b>Secondary Coordinator</td>
      <td id="secondaryCoord">Unknown</td>
    </tr>
    <tr>
      <td><b>Member Count</td>
      <td id="memberCount">-1</td>
    </tr>
  </table><br>
</div>
<!-- END Cluster Information -->

<script>
  $( document ).ready(function() {
    var clusterDetail = clusterXML.getElementsByTagName("ClusterDetail")[0];
    $('#clusterIp').text(clusterDetail.getAttribute("clusterIp"));
    $('#clusterPort').text(clusterDetail.getAttribute("clusterPort"));
    $('#version').text(clusterDetail.getAttribute("version"));
  });

  var id = setInterval(function(){
    var clusterDetail = clusterXML.getElementsByTagName("ClusterDetail")[0];
    $('#clusterIp').text(clusterDetail.getAttribute("clusterIp"));
    $('#clusterPort').text(clusterDetail.getAttribute("clusterPort"));
    $('#version').text(clusterDetail.getAttribute("version"));
  }, 2000);
  intervalArrays.push(id);
</script>

<!-- Cluster Resource Information -->
<div class="w3-container w3-third">
  <h5>Cluster Auxiliary Information</h5>
  <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <tr>
      <td><b>Cluster IP Address</td>
      <td id="clusterIp">Unknown</td>
    </tr>
    <tr>
      <td><b>Cluster Port</td>
      <td id="clusterPort">Unknown</td>
    </tr>
    <tr>
      <td><b>Cluster Version</td>
      <td id="version">Unknown</td>
    </tr>
    <tr>
      <td><b>Cluster State</td>
      <td id="clusterName">Unknown</td>
    </tr>
  </table><br>
</div>
<!-- END Cluster Resource Information -->



<!-- Cluster Events -->
<div class="w3-container">
  <h5>Cluster Events</h5>
  <table id="clusterMembers" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <thead><th>Severity</th><th>Time</th><th>Node Name</th><th>Event Class</th><th>Summary</th></thead>
  </table>
  <br>
</div>
<!-- END Cluster Events -->

  