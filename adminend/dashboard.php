<?php include_once("header.php"); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php var_dump($_SESSION); ?>
      <!-- Small boxes (Stat box) -->
      <?php /*
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$low ?? ""}}</h3>

              <p>Total Low</p>
            </div>
            <div class="icon">
              <i class="fa fa-hourglass-end"></i>
            </div>
            <a href="{{route('ytl')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$average ?? ""}}</h3>

              <p>Total Average</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('ytl')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$high ?? ""}}</h3>

              <p>Total High</p>
            </div>
            <div class="icon">
              <i class="fa fa-hourglass"></i>
            </div>
            <a href="{{route('ytl')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$averagetrustscore ?? ""}}
                <small style='color:#ffffff'>({{$averagetrustlevel[0]->scale_name ?? ""}})</small></h3>

              <p>Trust Level</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('ytl')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
      </div> */ ?>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        
       
      </div>
      <!-- /.row (main row) -->
<?php /*
    <div class="row">
      <div class="col-md-12">
        
        <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>
                          @if(count($attributes)>0)                                
                                    @foreach($attributes as $key => $awitem)  

                                    <th>{{$awitem->attribute_code}}</th>
                   
                        @endforeach
                                @endif
                                <th>Score</th>
                                <th>Level</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                      @if(count($awareness)>0) 
                         @if($kounter = 1)@endif                               
                                  @foreach($awareness as $key => $value)
                      <tr>
                        <td>{{$kounter++}}</td>
                        @if(count($attributes)>0)  
                        @if($totalvalue = 0)@endif                              
                                  @foreach($attributes as $akey => $awitem) 
                                    <td>
                                      
                                      <?php 
                                      //dd($awitem);
                                      //if($awitem->attribute_id==''){
                                        $awvalue = Awareness::get_awareness_row($value->awareness_key, $awitem->attribute_id);
                                        //var_dump($awvalue);
                                        echo $thevalue = $awvalue->attribute_value;
                                        $totalvalue = $totalvalue + $thevalue
                                      //}
                                      ?>

                                    </td>
                                  @endforeach
                                @endif
                                <td>
                                  <?php 

                      $totalscore = $totalvalue/$attributeproduct; 
                      echo $totalscore;

                    ?>
                                </td>
                                <td>
                                  <?php 
                                 // dd($totalscore);
                      $trustlevel = Scale::get_level($totalscore);
                      echo $trustlevel[0]->scale_name;
                    ?>
                                </td>
                              </tr>
                                @endforeach
                            @endif
                      
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          @if(count($attributes)>0)                                
                  @foreach($attributes as $key => $awitem)  

                  <th>{{$awitem->attribute_code}}</th>

                  @endforeach
                  @endif
                  <th>Score</th>
                  <th>Level</th>
                        </tr>
                      </tfoot>
                  </table>
                </div>

      </div>      
    </div>
*/ ?>
   
    </section>
    <!-- /.content -->



  </div>
<?php include_once("footer.php"); ?>