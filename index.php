    
<?php
    include "layout/header.php";
    include "info.php";
    
?>
    <div class="col-md-2"></div>
    <div class="col-md-8">
    
        <div class="row">
                <div class="col-md-12" style="margin-top:50px;">
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <li role="presentation" class="active" style="width:20%;">
                            <a href="#list-item" data-toggle="tab">
                            
                                <span>List</span>
                            </a>
                        </li>
                        <li role="presentation" style="width:20%;">
                            <a href="#add-item" data-toggle="tab">          
                                <span>Add Info</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="list-item">
                            
                            <table class="table table-hover" id="tbl-info-list">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($infoList){
                                            foreach($infoList as $value){
                                                 echo '
                                                    <tr>
                                                        <th scope="row" data-id="'.$value['id'].'">'.$value["id"].'</th>
                                                        <td>'.$value["firstname"].'</td>
                                                        <td>'.$value["lastname"].'</td>
                                                        <td class="email-list" data-id="'.$value["id"].'">'.$value["email"].'</td>
                                                    </tr>
                                                    ';
                                            }
                                        }
                                       
                                    ?>
                                    
                                    
                                </tbody>
                             </table>
                             
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="add-item">
                            <form action="info.php" method="POST" onsubmit="return false;" id="frm-add">
                                <input type="hidden" value="add" name="method">

                                <div class="row" style="margin-top:50px;">
                                    <div class="input-group">
                                        <span class="input-group-addon">Firstname</span>
                                        <input id="firstname" type="text" class="form-control" name="firstname" placeholder="Enter Firstname" required="">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:50px;">
                                    <div class="input-group">
                                        <span class="input-group-addon">Lastname</span>
                                        <input id="lastname" type="text " class="form-control" name="lastname" placeholder="Enter Lastname" required="">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:50px;">
                                    <div class="input-group">
                                        <span class="input-group-addon">Email</span>
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Enter Email Address" required="">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:50px;">
                                    <div class="input-group" style="width:100%;">
                                        <button type="submit" form="frm-add" class="btn btn-default" style="width:100%;">Add Info</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                    </div>
                </div>
        </div>

       
        
    </div>
    <div class="col-md-2"></div>
    

    
<?php
    include "layout/footer.php";
?>