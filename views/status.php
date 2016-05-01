<div class="content-wrapper">
	<section class="content-header">
	    <h1 align="center"><?php echo $conf->meta->server_name; ?></h1></h1><br>
	    <p align="center"><?php echo $conf->meta->discription; ?></p>
	</section>
	<div class="content"><br><br>
	<?php  if($Update > 1.1) {
                echo '<div class="callout callout-warning"><h4>Update Available!</h4><p>Smart Stats has an update. Download it from <a href="https://github.com/smartclash/statuspage/releases" target="_blank">Here</a></div>';
        }
        ?>
	<?php echo $serverStatus; ?><br><br> <!-- Displays whether the server offline or online.-->
			
	    <div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class=
				"fa fa-gears"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Ram Used</span><br><span class=
					"info-box-number"><?php echo $usedram; ?><small> MB</small></span>
				</div><!-- /.info-box-content -->
			</div><!-- /.info-box -->
		</div><!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-home"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Total Clans</span><br> <span class=
					"info-box-number"><?php echo $memClans; ?></span>
				</div><!-- /.info-box-content -->
			</div><!-- /.info-box -->
		</div><!-- /.col -->
		<!-- fix for small devices only -->
		<div class="clearfix visible-sm-block"></div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class=
				"fa fa-chevron-up"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Online Players</span><br><span class=
					"info-box-number"><?php echo $onPlayers; ?></span>
				</div><!-- /.info-box-content -->
			</div><!-- /.info-box -->
		</div><!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class=
				"fa fa-users"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">DB Players</span></span><br><span class=
					"info-box-number"><?php echo $players; ?></span>
				</div><!-- /.info-box-content -->
			</div><!-- /.info-box -->
		</div><!-- /.col -->
	</div><br><br>
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Our Progress</h3>
						</div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Server Stability</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 50%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-red">50%</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>War</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 10%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-yellow">10%</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Re-starter</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 100%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue">100%</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 80%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">80%</span></td>
                </tr>
                <tr>
                  <td>5.</td>
                  <td>Better API</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">30%</span></td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
	</div>
	</section>
	</div>
