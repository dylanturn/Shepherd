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
        <h4>Bytes Rx</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-chevron-down w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="messagesRx">-1</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Messages Rx</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-chevron-up w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="bytesTx">-1</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Bytes Tx</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-chevron-up w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="messagesTx">-1</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Messages Tx</h4>
      </div>
    </div>
  </div>
<!-- END Cluster Statistics -->

<!-- Cluster Information -->
<div class="w3-container w3-twothird">
  <h5>Cluster Information</h5>
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

<!-- Cluster Resource Information -->
<div class="w3-container w3-third">
  <h5>Cluster Resource Utilization</h5>
  <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <tr>
      <td><b>CPU</td>
      <td style="width:50%">
        <div class="w3-progress-container w3-grey" >
          <div id="myBar" class="w3-progressbar w3-red" style="width:75%">
            <div class="w3-center w3-text-white">75%</div>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td><b>Memory</td>
      <td style="width:50%">
        <div class="w3-progress-container w3-grey">
          <div id="myBar" class="w3-progressbar w3-blue" style="width:75%">
            <div class="w3-center w3-text-white">75%</div>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td><b>Disk</td>
      <td style="width:50%">
        <div class="w3-progress-container w3-grey">
          <div id="myBar" class="w3-progressbar w3-teal" style="width:75%">
            <div class="w3-center w3-text-white">75%</div>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td><b>Network</td>
      <td style="width:50%">
        <div class="w3-progress-container w3-grey">
          <div id="myBar" class="w3-progressbar w3-green" style="width:75%">
            <div class="w3-center w3-text-white">75%</div>
          </div>
        </div>
      </td>
    </tr>
  </table><br>
</div>
<!-- END Cluster Resource Information -->

<!-- Cluster Members -->
<div class="w3-container">
  <h5>Cluster Events</h5>
  <table id="clusterMembers" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <thead><th>Severity</th><th>Time</th><th>Node Name</th><th>Event Class</th><th>Summary</th></thead>
  </table>
  <br>
</div>
<!-- END Cluster Members -->

  